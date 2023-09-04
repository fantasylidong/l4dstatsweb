<?php

/****************************************************************************
 *
 * LEFT 4 DEAD (2) PLAYER STATISTICS ©2019-2020 PRIMEAS.DE
 * BASED ON THE PLUGIN FROM MUUKIS MODIFIED BY FOXHOUND FOR SOURCEMOD
 *
 * - https://forums.alliedmods.net/showthread.php?p=2678290#post2678290
 * - https://www.primeas.de/
 ****************************************************************************/

//ini_set('display_errors',1);
//error_reporting(E_ALL);
error_reporting(0);

require_once("../_source/geoip2.phar");

use GeoIp2\Database\Reader;

$geoip = new Reader('../_source/GeoLite2-Country.mmdb');
include("../_source/common.php");
$tpl = new Template("" . $templatefiles['campaign_layout.tpl']);
if (strstr($_GET['id'], "/")) exit;
$campaign = mysql_real_escape_string($_GET['id']);
if (strstr($_GET['type'], "/")) exit;
$type = strtolower($_GET['type']);
if (strstr($_GET['anneversion'], "/")) exit;
$anneversion = strtolower($_GET['anneversion']);
if (strstr($_GET['sinum'], "/")) exit;
$sinum = intval($_GET['sinum']);
if (strstr($_GET['sitime'], "/")) exit;
$sitime = intval($_GET['sitime']);
if (strstr($_GET['usebuy'], "/")) exit;
$usebuy = intval($_GET['usebuy']);
if (strstr($_GET['auto'], "/")) exit;
$auto = intval($_GET['auto']);
if (strstr($_GET['finishplayernum'], "/")) exit;
$finishplayernum = intval($_GET['finishplayernum']);
if ($type == "anne" || $type == "witchparty" || $type == "allcharger" || $type == "alone" || $type == "hunters") {
    $typelabel = "";
    if ($type == "anne") $typelabel = "(普通药役)";
    else if ($type == "witchparty") $typelabel = "(女巫派对)";
    else if ($type == "allcharger") $typelabel = "(牛牛冲刺)";
    else if ($type == "alone") $typelabel = "(单人装逼)";
    else if ($type == "hunters") $typelabel = "(ht训练)";
    $disptype = ucfirst($type);
    setcommontemplatevariables($tpl);
    $tpl->set("title", "- 地图完成时间统计 (" . $disptype . ")");
    $tpl->set("page_heading", "具体模式 (" . $typelabel . ")");
    $disptype = ucfirst($type);
    if ($type == "anne") {
        $mode = 1;
    } else if ($type == "witchparty") {
        $mode = 2;
    } else if ($type == "allcharger") {
        $mode = 3;
    } else if ($type == "alone") {
        $mode = 4;
    } else if ($type == "hunters") {
        $mode = 5;
    }
    setcommontemplatevariables($tpl);
    $title = $coop_campaigns[$campaign];
    if ($title . "" == "") {
        $tpl->set("title", "无效地图"); // Window title
        $tpl->set("page_heading", "无效地图"); // Page header
        $output = "<meta http-equiv=\"refresh\" content=\"3; URL=index.php?type=coop\"><center>你将会被转到 ...</center>";
        $tpl->set("body", trim($output));
        $tpl->set("top10", $top10);
        echo $tpl->fetch("" . $templatefiles['campaign_layout.tpl']);
        exit;
    }
    $tpl->set("gm", "" . $disptype . "");
    $tpl->set("gm2", "" . $typelabel . "");
    $tpl->set("page_heading", " " . $title . " ");
    for($i = 1; $i < 6; $i ++)
    {
        $query = "SELECT DISTINCT
            timedmaps.time,
            timedmaps.map,
            GROUP_CONCAT(players.name ORDER BY players.steamid SEPARATOR ', ') AS finishplayer
            FROM timedmaps
            LEFT JOIN players ON timedmaps.steamid = players.steamid
			WHERE timedmaps.anneversion = '{$anneversion}'
				AND timedmaps.sinum = '{$sinum}'
				AND timedmaps.sitime = '{$sitime}'
				AND timedmaps.usebuy = '{$usebuy}'
				AND timedmaps.auto = '{$auto}'
                AND timedmaps.players = '{$finishplayernum}'
				AND LOWER(timedmaps.map) LIKE LOWER('{$campaign}{$i}%%')
				AND timedmaps.mode = '{$mode}'
                GROUP BY timedmaps.time, timedmaps.map
                ORDER BY timedmaps.time
                LIMIT 10";
        $result = mysql_query($query) or die(mysql_error());
        if (mysql_num_rows($result) <= 0) continue;
        $time = array();
        $player = array();
        $rank = array();
        $difficult = array();
        $j = 1;
        $stats = new Template("" . $templatefiles['campaigns_page.tpl']);
        $map = new Template("" . $templatefiles["campaign_detailed_coop.tpl"]);
        while ($row = mysql_fetch_array($result)) {
            $stats->set("page_subject", $row['map']);
            $time[] = formatage($row['time']);
            $difficult[] = $sinum . "特" . $sitime . "秒" . ($usebuy == 1 ? "用" : "不用") . "B数" . ($auto == 1 ? "自动" : "固定") . "刷特";
            $player[] = $row['finishplayer'];
            $rank[] = $j++;
        }
        $map->set("rank", $rank);
        $map->set("time", $time);
        $map->set("difficult", $difficult);
        $map->set("Anne版本", $anneversion);
        $map->set("完成人员", $player);
        $body = $map->fetch("" . $templatefiles["campaign_detailed_coop.tpl"]);
        $stats->set("page_body", $body);
        $output .= $stats->fetch("" . $templatefiles['campaigns_page.tpl']);
    }
} else {
    $tpl->set("title", "- 地图"); // Window title
    $tpl->set("page_heading", "地图"); // Page header
    setcommontemplatevariables($tpl);
    $output = "<meta http-equiv=\"refresh\" content=\"3; URL=index.php?type=coop\"><br /><center>You will be forwarded ...</center>";
}

$tpl->set("body", $output);
echo $tpl->fetch("" . $templatefiles['campaign_layout.tpl']);

?>