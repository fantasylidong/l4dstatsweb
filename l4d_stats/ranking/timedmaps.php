<?php

/****************************************************************************

   LEFT 4 DEAD (2) PLAYER STATISTICS ©2019-2020 PRIMEAS.DE
   BASED ON THE PLUGIN FROM MUUKIS MODIFIED BY FOXHOUND FOR SOURCEMOD

 - https://forums.alliedmods.net/showthread.php?p=2678290#post2678290
 - https://www.primeas.de/

****************************************************************************/

//ini_set('display_errors',1);
//error_reporting(E_ALL);
error_reporting(0);

require_once("../_source/geoip2.phar");
use GeoIp2\Database\Reader;
$geoip = new Reader('../_source/GeoLite2-Country.mmdb');
include("../_source/common.php");
$tpl = new Template("" . $templatefiles['timedmaps_layout.tpl']);
if (strstr($_GET['steamid'], "/")) exit;
$id = trim(mysql_real_escape_string($_GET['steamid']));
if (strstr($_GET['id'], "/")) exit;
$mapprefix = trim(mysql_real_escape_string($_GET['id']));
if (strstr($_GET['gamemode'], "/")) exit;
$gamemode = trim(mysql_real_escape_string($_GET['gamemode']));
setcommontemplatevariables($tpl);
$result = mysql_query("SELECT * FROM " . $mysql_tableprefix . "players WHERE steamid = '" . $id . "'");
$row = mysql_fetch_array($result);
$totalpoints = $row['points'] + $row['points_survival'] + $row['points_survivors'] + $row['points_infected'] + ($game_version != 1 ? $row['points_realism'] + $row['points_scavenge_survivors'] + $row['points_scavenge_infected'] + $row['points_realism_survivors'] + $row['points_realism_infected'] + $row['points_mutations'] : 0);
$rankrow = mysql_fetch_array(mysql_query("SELECT COUNT(*) AS rank FROM " . $mysql_tableprefix . "players WHERE points + points_survival + points_survivors + points_infected" . ($game_version != 1 ? " + points_realism + points_scavenge_survivors + points_scavenge_infected + points_realism_survivors + points_realism_infected + points_mutations" : "") . " >= '" . $totalpoints . "'"));
$playername = $row['name'];
$tpl->set("player_name", $playername);
$steamid = $row['steamid'];
$tpl->set("steam_id", $steamid);
$tpl->set("title", "- 地图完成时间统计");
$tpl->set("page_heading", "地图完成时间");
$fulloutput = "";
$campaigns = array();
if (mysql_error()) { $fulloutput = "<p><b>MySQL Error:</b> " . mysql_error() . "</p>\n";}
else if (!$timedmaps_show_all && !(strlen($id) > 0 || strlen($mapprefix) > 0 && strlen($gamemode) > 0)) { $fulloutput = "<p><b>You must provide a player <a href=\"http://developer.valvesoftware.com/wiki/SteamID\" target=\"_blank\">Steam ID</a> or proper map info to display Timed Maps statistics!</b></p>";}
else {
	$forstart = 0;
	$forstop = 6;
	if (strlen($gamemode) > 0){$forstart = $forstop = (int)$gamemode;}
	for ($j = $forstart; $j <= $forstop; $j++){
		$query_where = "";
		$query_orderby = "ASC";
		switch ($j) {
			case 0: $campaigns = $coop_campaigns;break;
			case 1: $campaigns = $versus_campaigns;break;
			case 2: $campaigns = $realism_campaigns;break;
			case 3: $campaigns = $survival_campaigns;$query_orderby = "DESC";break;
			case 4: $campaigns = $scavenge_campaigns;break;
			case 5: $campaigns = $realismversus_campaigns; break;
			case 6: $campaigns = $mutations_campaigns;break;
		}
		$query_where = " AND m1.gamemode = " . $j;
		if ($id) $query_where .= " AND p.steamid = '" . $id . "'";
		if ($id) $query_where .= " AND p.steamid = '" . $id . "'";
		$previous_map = "";
		$starttag = "";
		$endtag = "";
		foreach ($campaigns as $prefix => $title) {
			if ($mapprefix && strcmp($mapprefix . "", $prefix . "") != 0) continue;
			$arr_maprunners = array();
			$stats = new Template("" . $templatefiles['page.tpl']);
			$stats->set("page_subject", $title);
			$maprun = new Template("" . $templatefiles['timedmaps.tpl']);
			$query = "SELECT m1.*, p.name, p.ip FROM " . $mysql_tableprefix . "timedmaps AS m1 INNER JOIN " . $mysql_tableprefix . "players AS p ON m1.steamid = p.steamid INNER JOIN " . $mysql_tableprefix . "maps AS m2 ON m1.map = m2.name AND m1.gamemode = m2.gamemode";
			if (strlen($prefix) > 0) $query .= " WHERE m1.map like '" . $prefix . "%' and m2.custom = 0";
			else $query .= " WHERE m2.custom = 1";
			$query .= $query_where;
			$query .= " ORDER BY m1.sinum DESC, m1.gamemode ASC, m1.map ASC, m1.difficulty DESC, m1.time " . $query_orderby . ", p.name ASC";
			$result = mysql_query($query);
			if (!$result || mysql_num_rows($result) <= 0) continue;
			$i = 1;
			while ($row = mysql_fetch_array($result)) {
				$line = "<tr";"";
				$line .= ($i++ & 1) ? ">" : " class=\"alt\">";
				if ($previous_map != $row['map']){$starttag = "";$endtag = "";}
				else {$starttag = "";$endtag = "";}
				$difficulty = "Unknown";
				switch ($row['difficulty']){
					case 1: $difficulty = "普通";break;
					case 2: $difficulty = "高级";break;
					case 3: $difficulty = "专家";break;}
				$gamemode = "Unknown";
				switch ($row['gamemode']){
					case 0: $gamemode = "战役模式";break;
					case 2: $gamemode = "写实模式";break;
					case 3: $gamemode = "生还者模式";break;
					case 6: $gamemode = "突变模式";break;
				}
				switch ($row['mode']){
					case 1: $gamemode = "AnneHappy药役";break;
					case 2: $gamemode = "女巫派对";break;
					case 3: $gamemode = "牛牛冲刺";break;
					case 4: $gamemode = "单人装逼";break;
					case 5: $gamemode = "1vht";break;
				}
				switch ($row['auto']){
					case 0: $auto = "固定刷特";break;
					case 1: $auto = "自动刷特";break;
				}
				$line .= "<td data-title=\"游戏模式:\">" . $starttag . "" . $gamemode . "</td><td data-title=\"地图:\">" . $starttag . "" . $row['map'] . $endtag . "</td>";
				$country_record = $geoip->country($row['ip']);
				$line .= "<td data-title=\"难度:\">" . $starttag . $difficulty . $endtag . "</td>";
				$thetime = "";
				$thetime = formatage($row['time']);
				$line .= "<td data-title=\"完成时间:\">" . $starttag . $thetime . $endtag . "</td>";
				$sinum = $row['sinum'];
				$line .= "<td data-title=\"特感数量:\">" . $starttag . $sinum . "特" . $endtag . "</td>";
				$sitime = $row['sitime'];
				$line .= "<td data-title=\"刷新间隔:\">" . $starttag . $sitime . "秒" . $endtag . "</td>";
				switch ($row['usebuy']){
					case 0: $usebuy = "是";break;
					case 1: $usebuy = "否";break;
				}
				$line .= "<td data-title=\"B数使用:\">" . $starttag . $usebuy . $endtag . "</td>";
				switch ($row['auto']){
					case 0: $auto = "固定刷特";break;
					case 1: $auto = "自动刷特";break;
				}
				$line .= "<td data-title=\"刷特模式:\">" . $starttag . $auto . $endtag . "</td>";
				$annever = $row['anneversion'];
				$line .= "<td data-title=\"Anne版本:\">" . $starttag . $annever . $endtag . "</td>";
				$line .= "</tr>";
				$arr_maprunners[] = $line;
				$previous_map = $row['map'];
			}
			if (mysql_num_rows($result) == 0) $arr_maprunners[] = "<tr><td colspan=\"3\" align=\"center\">There are no map timings!</td</tr>";
			$maprun->set("maprunners", $arr_maprunners);
			$body = $maprun->fetch("" . $templatefiles['timedmaps_output.tpl']);
			$stats->set("page_body", $body);
			$fulloutput .= $stats->fetch("" . $templatefiles['timedmaps_page.tpl']);
		}

	}
}
$tpl->set('body', trim($fulloutput));
echo $tpl->fetch("" . $templatefiles['timedmaps_layout.tpl']);

?>