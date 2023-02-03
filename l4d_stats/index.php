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



include("_source/common.php");
$tpl = new Template("" . $templatefiles['index_layout.tpl']);
setcommontemplatevariables($tpl);
$result = mysql_query("SELECT * FROM " . $mysql_tableprefix . "players WHERE lastontime >= '" . intval(mktime(idate("H"), idate("i") - 5, 0)) . "' ORDER BY " . $TOTALPOINTS . " DESC");
$result2 = mysql_query("SELECT * FROM " . $mysql_tableprefix . "players WHERE lastontime >= '" . intval(mktime(idate("H"), idate("i") - 1440, 0)) . "' ORDER BY " . $TOTALPOINTS . " DESC");
$result3 = mysql_query("SELECT * FROM " . $mysql_tableprefix . "players WHERE lastontime >= '" . intval(mktime(idate("H"), idate("i") - 43200, 0)) . "' ORDER BY " . $TOTALPOINTS . " DESC");
$playercount = number_format(mysql_num_rows($result));
$playercount2 = number_format(mysql_num_rows($result2));
$playercount3 = number_format(mysql_num_rows($result3));
setcommontemplatevariables($tpl);
$tpl->set("title", ""); // Window title
$tpl->set("page_heading", "30天内活跃玩家? (". $playercount3 . ")<br>&nbsp;&nbsp;&nbsp;&nbsp;24小时内活跃玩家? (". $playercount2 . ")<br>&nbsp;&nbsp;&nbsp;&nbsp;目前在线玩家? (" . $playercount . ")" );

if (mysql_error()) { $output = "<p><b>MySQL Error:</b> " . mysql_error() . "</p>"; }
else {
	$arr_online = array();
	$stats = new Template("" . $templatefiles['index_output.tpl']);
	$i = 1;
	while ($row = mysql_fetch_array($result)) {
		if ($row['lastontime'] > time()) $row['lastontime'] = time();
		$lastgamemode = "Unknown";
		switch ($row['lastgamemode']) {
			case 0: $lastgamemode = "战役模式"; break;
			case 1: $lastgamemode = "对抗模式"; break;
			case 2: $lastgamemode = "写实模式"; break;
			case 3: $lastgamemode = "生存模式"; break;
			case 4: $lastgamemode = "清道夫模式"; break;
			case 5: $lastgamemode = "写实对抗模式"; break;
			case 6: $lastgamemode = "突变模式"; break;
		}
		switch ($row['lastannemode']){
			case 1: $lastgamemode = "AnneHappy药役";break;
			case 2: $lastgamemode = "女巫派对";break;
			case 3: $lastgamemode = "牛牛冲刺";break;
			case 4: $lastgamemode = "单人装逼";break;
			case 5: $lastgamemode = "1vht";break;
		}
		$playername = ($showplayerflags ? "" : "")  . htmlentities($row['name'], ENT_COMPAT, "UTF-8") . "";
		$line = createtablerowtooltip($row, $i);
		$line .= "<tr onclick=\"window.location='./ranking/player.php?steamid=" . $row['steamid']."'\" style=\"cursor:pointer\"><td data-title=\"游戏模式:\">" . $lastgamemode . "</td>";
		$line .= "<td data-title=\"玩家:\">" . $playername . "</td><td data-title=\"分数:\">" . gettotalpoints($row) . "</td><td data-title=\"游玩时间:\">" . gettotalplaytime($row) . "</td></tr>";
		$arr_online[] = $line;
		$i++;
	}
	if (count($arr_online) == 0) $arr_online[] = "<tr><th colspan=\"5\" class=\"text-center\">当前服务器组无人在线.</th></tr>";
	$stats->set("online", $arr_online);
	$output = $stats->fetch("" . $templatefiles['index_output.tpl']);
}

$tpl->set('body', trim($output));
echo $tpl->fetch("" . $templatefiles['index_layout.tpl']);

?>