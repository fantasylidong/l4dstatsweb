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
$tpl = new Template("" . $templatefiles['campaigns_layout.tpl']);
if (strstr($_GET['type'], "/")) exit;
$type = strtolower($_GET['type']);
if ($type == "coop" || $type == "versus" || $type == "realism" || $type == "survival" || $type == "scavenge" || $type == "realismversus" || $type == "mutations") {
	$typelabel = "";
	if ($type == "coop") $typelabel = "(战役)";
	else if ($type == "versus" && $team == "") $typelabel = "(对抗)";
	else if ($type == "scavenge" && $team == "") $typelabel = "(清道夫)";
	else if ($type == "realism" && $team == "") $typelabel = "(写实)";
	else if ($type == "survival" && $team == "") $typelabel = "(生存)";
	else if ($type == "realismversus" && $team == "") $typelabel = "(写实对抗)";
	else if ($type == "versus" && $team == "survivors") $typelabel = "(对抗: 生还者)";
	else if ($type == "versus" && $team == "infected") $typelabel = "(对抗: 感染者)";
	else if ($type == "scavenge" && $team == "survivors") $typelabel = "(清道夫: 生还者)";
	else if ($type == "scavenge" && $team == "infected") $typelabel = "(清道夫: 感染者)";
	else if ($type == "realismversus" && $team == "survivors") $typelabel = "(写实对抗: 生还者)";
	else if ($type == "realismversus" && $team == "infected") $typelabel = "(写实对抗: 感染者)";
	else if ($type == "mutations" && $team == "") $typelabel = "(突变模式)";
	else $team = "";
	$disptype = ucfirst($type);
	setcommontemplatevariables($tpl);
	$tpl->set("title", "- 地图 (" . $disptype . ")");
	$tpl->set("page_heading", "地图 " . $typelabel . "");
	$maparr = array();
	$totals = array();
	if ($type == "coop"){ $campaigns = $coop_campaigns; $query_where = " AND gamemode = 0"; }
	else if ($type == "versus") { $campaigns = $versus_campaigns; $query_where = " AND gamemode = 1"; }
	else if ($type == "realism") { $campaigns = $realism_campaigns; $query_where = " AND gamemode = 2"; }
	else if ($type == "survival") { $campaigns = $survival_campaigns; $query_where = " AND gamemode = 3"; }
	else if ($type == "scavenge") { $campaigns = $scavenge_campaigns; $query_where = " AND gamemode = 4"; }
	else if ($type == "realismversus") { $campaigns = $realismversus_campaigns; $query_where = " AND gamemode = 5"; }
	else if ($type == "mutations") { $campaigns = $mutations_campaigns; $query_where = " AND gamemode = 6"; }
	foreach ($campaigns as $prefix => $title) {
		$query = "SELECT playtime_nor + playtime_adv + playtime_exp as playtime, points_nor + points_adv + points_exp as points, kills_nor + kills_adv + kills_exp as kills";
		if ($type == "coop" || $type == "realism" || $type == "survival" || $type == "mutations") $query .= ", restarts_nor + restarts_adv + restarts_exp as restarts";
		else if ($type == "versus" || $type == "scavenge" || $type == "realismversus") {
			$query .= ", infected_win_nor + infected_win_adv + infected_win_exp as infected_win";
			$query .= ", points_infected_nor + points_infected_adv + points_infected_exp as points_infected";
			$query .= ", survivor_kills_nor + survivor_kills_adv + survivor_kills_exp as kill_survivor";
		}
		$query .= " FROM " . $mysql_tableprefix . "maps";
		if (strlen($prefix) > 0) $query .= " WHERE LOWER(name) like '" . strtolower($prefix) . "%' and custom = 0";
		else $query .= " WHERE custom = 1 AND playtime_nor + playtime_adv + playtime_exp > 0";
		$query .= $query_where;
		$result = mysql_query($query) or die(mysql_error());
		if (mysql_num_rows($result) <= 0) continue;
		$playtime = 0;
		$points = 0;
		$points_infected = 0;
		$kills = 0;
		$kill_survivor = 0;
		$restarts = 0;
		$infected_win = 0;
		while ($row = mysql_fetch_array($result)) {
			$playtime += $row['playtime'];
			$points += $row['points'];
			$kills += $row['kills'];
			if ($type == "coop" || $type == "realism" || $type == "survival" || $type == "mutations")
				$restarts += $row['restarts'];
			else if ($type == "versus" || $type == "scavenge" || $type == "realismversus") {
				$points_infected += $row['points_infected'];
				$kill_survivor += $row['kill_survivor'];
				$infected_win += $row['infected_win'];
			}
		}
		$totals['playtime'] += $playtime;
		$totals['points'] += $points;
		$totals['kills'] += $kills;
		if ($type == "coop" || $type == "realism" || $type == "survival" || $type == "mutations")
			$totals['restarts'] += $restarts;
		else if ($type == "versus" || $type == "scavenge" || $type == "realismversus") {
			$totals['points_infected'] += $points_infected;
			$totals['kill_survivor'] += $kill_survivor;
			$totals['infected_win'] += $infected_win;
		}
		$maparr[] = $line . "<tr><td data-title=\"地图:\">" . $title . "</td><td data-title=\"游玩时长:\">" . formatage($playtime * 60) . "</td>" . (($type == "versus" || $type == "scavenge" || $type == "realismversus") ? "<td data-title=\"输掉回合数:\">" . number_format($infected_win) . "</td><td data-title=\"当感染者分数:\">" . number_format($points_infected) . "</td>" : "") . "<td data-title=\"当生还者分数:\">" . number_format($points) . (($type == "versus" || $type == "scavenge" || $type == "realismversus") ? "" : " (" . number_format(getppm($points, $playtime), 2) . ")") . "</td><td data-title=\"消灭的感染者:\">" . number_format($kills) . "</td>" . (($type == "versus" || $type == "scavenge" || $type == "realismversus") ? "<td data-title=\"消灭的生还者:\">" . number_format($kill_survivor) . "</td>" : "") . (($type == "coop" || $type == "realism" || $type == "survival" || $type == "mutations") ? "<td data-title=\"重启次数:\">" . number_format($restarts) . "</td>" : "") . "</tr>";
		$i++;
	}
	$arr_achievements = array();
	if ($totals['kills'] > $population_minkills) {
		$popkills = getpopulation($totals['kills'], $population_file);
		$arr_achievements[] = "<div class=\"col-md-12 h-100\"><div class=\"card-body worldmap d-flex flex-column justify-content-center text-center\"><span>消灭的感染者数量已经超过 <a class=\"alink-link2\" href=\"http://google.com/search?q=site:en.wikipedia.org+" . $popkills[0] . "&btnI=1\" target=\"_blank\">" . $popkills[0] . "</a> 的人口 - 人口数量为: " . number_format($popkills[1]) . " 人.</span><span><small>也即将超过 <a class=\"alink-link2\" href=\"http://google.com/search?q=site:en.wikipedia.org+" . $popkills[2] . "&btnI=1\" target=\"_blank\">" . $popkills[2] . "</a> 的人口 - 人口数量为: " . number_format($popkills[3]) . " 人!</small></span></div></div><br />";
	}
	if (count($arr_achievements) == 0) $arr_achievements[] = "<div class=\"col-md-12 h-100\"><div class=\"card-body worldmap d-flex flex-column justify-content-center text-center\"><span>消灭的感染者数量少于美国人口最小的州.</span></div></div><br />";
	$line = ($i & 1) ? "" : "<tr>";
	$maparr[] = $line . "<tr><td class=\"alink-link2\">总计:</td><td class=\"alink-link2\">" . formatage($totals['playtime'] * 60) . "</td>" . (($type == "versus" || $type == "scavenge" || $type == "realismversus") ? "<td class=\"alink-link2\">" . number_format($totals['infected_win']) . "</td><td class=\"alink-link2\">" . number_format($totals['points_infected']) . "</b></td>" : "") . "<td class=\"alink-link2\">" . number_format($totals['points']) . (($type == "versus" || $type == "scavenge" || $type == "realismversus") ? "" : " (" . number_format(getppm($totals['points'], $totals['playtime']), 2) . ")") . "</td><td class=\"alink-link2\">" . number_format($totals['kills']) . "</td>" . (($type == "versus" || $type == "scavenge" || $type == "realismversus") ? "<td class=\"alink-link2\">" . number_format($totals['kill_survivor']) . "</td>" : "") . (($type == "coop" || $type == "realism" || $type == "survival" || $type == "mutations") ? "<td class=\"alink-link2\">" . number_format($totals['restarts']) . "</td>" : "") . "</tr>";
	$stats = new Template("" . $templatefiles["campaigns_overview_" . $type . ".tpl"]);
	$stats->set("arr_achievements", $arr_achievements);
	$totalpop = getpopulation($totals['kills'], $population_file, False);
	$stats->set("totalpop", $totalpop);
	$stats->set("maps", $maparr);
	$output = $stats->fetch("" . $templatefiles["campaigns_overview_" . $type . ".tpl"]);
	foreach ($campaigns as $prefix => $title) {
		$stats = new Template("" . $templatefiles['campaigns_page.tpl']);
		$stats->set("page_subject", $title);
		$maps = new Template("campaigns_page_" . $type . ".tpl");
		$maparr = array();
		$query = "SELECT name, playtime_nor + playtime_adv + playtime_exp as playtime, points_nor + points_adv + points_exp as points, kills_nor + kills_adv + kills_exp as kills";
		if ($type == "coop" || $type == "realism" || $type == "survival" || $type == "mutations") $query .= ", restarts_nor + restarts_adv + restarts_exp as restarts";
		else if ($type == "versus" || $type == "scavenge" || $type == "realismversus") {
			$query .= ", infected_win_nor + infected_win_adv + infected_win_exp as infected_win";
			$query .= ", points_infected_nor + points_infected_adv + points_infected_exp as points_infected";
			$query .= ", survivor_kills_nor + survivor_kills_adv + survivor_kills_exp as kill_survivor";
		}
		$query .= " FROM " . $mysql_tableprefix . "maps";
		if (strlen($prefix) > 0) $query .= " WHERE LOWER(name) like '" . strtolower($prefix) . "%' and custom = 0";
		else $query .= " WHERE custom = 1 AND playtime_nor + playtime_adv + playtime_exp > 0";
		$query .= $query_where;
		$query .= " ORDER BY name ASC";
		$result = mysql_query($query) or die(mysql_error());
		if (mysql_num_rows($result) <= 0) continue;
		$i = 1;
		while ($row = mysql_fetch_array($result)) {
				$line = ($i & 1) ? "<tr>" : "	<tr>";
				$maparr[] = $line . "<td data-title=\"地图:\">" . $row['name'] . "</td><td data-title=\"游玩时间:\">" . formatage($row['playtime'] * 60) . "</td>" . (($type == "versus" || $type == "scavenge" || $type == "realismversus") ? "<td data-title=\"失败回合:\">" . number_format($row['infected_win']) . "</td><td data-title=\"当感染者每分钟获取分数:\">" . number_format($row['points_infected']) . "</td>" : "") . "<td data-title=\"当生还者每分钟获取分数:\">" . number_format($row['points']) . (($type == "versus" || $type == "scavenge" || $type == "realismversus") ? "" : " (" . number_format(getppm($row['points'], $row['playtime']), 2) . ")") . "</td><td data-title=\"消灭的感染者:\">" . number_format($row['kills']) . "</td>" . (($type == "versus" || $type == "scavenge" || $type == "realismversus") ? "<td data-title=\"消灭的生还者:\">" . number_format($row['kill_survivor']) . "</td>" : "") . (($type == "coop" || $type == "realism" || $type == "survival" || $type == "mutations") ? "<td data-title=\"重启次数:\">" . number_format($row['restarts']) . "</td>" : "") . "</tr>\n";
				$i++;
		}
		$maps->set("maps", $maparr);
		$body = $maps->fetch("" . $templatefiles["campaigns_page_" . $type . ".tpl"]);
		$stats->set("page_body", $body);
		$stats->set("page_link", "<a class=\"alink-link2\" href=\"campaign.php?id=" . $prefix . "&type=" . $type . "\">查看完整数据</a>");
		$output .= $stats->fetch("" . $templatefiles['campaigns_page.tpl']);
	}
}
else {
	$tpl->set("title", "Campaigns");
	$tpl->set("page_heading", "Campaigns");
	setcommontemplatevariables($tpl);
	$output = "<meta http-equiv=\"refresh\" content=\"3; URL=index.php?type=coop\"><br /><center>You will be forwarded ...</center>\n";
}
$tpl->set("body", trim($output));
echo $tpl->fetch("" . $templatefiles['campaigns_layout.tpl']);

?>