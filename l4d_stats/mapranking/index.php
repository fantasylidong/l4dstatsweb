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
	$tpl->set("page_heading", "具体模式 " . $typelabel );
	// Handle form submission
    if(isset($_POST['submit'])) {
        // 获得表单数据
        $anneversion = $_POST['anneversion'];
        $sinum = $_POST['sinum'];
        $sitime = $_POST['sitime'];
        $auto = $_POST['auto'];
        $usebuy = $_POST['usebuy'];
		$finishplayernum = $_POST['finishplayernum'];
	}else{
		$anneversion = "2023-01";
		$sinum = 6;
		$sitime = 16;
		$usebuy = 0;
		$auto = 1;
		$finishplayernum = 4;
	}
	if ($type == "anne"){ $campaigns = $coop_campaigns; $mode = 1; }
	else if ($type == "witchparty") { $campaigns = $coop_campaigns; $mode = 2; }
	else if ($type == "allcharger") { $campaigns = $coop_campaigns; $mode = 3;}
	else if ($type == "alone") { $campaigns = $coop_campaigns; $mode = 4;}
	else if ($type == "hunters") { $campaigns = $coop_campaigns; $mode = 5; }
	foreach ($campaigns as $prefix => $title) {
        if($prefix =="")continue;
		$stats = new Template("" . $templatefiles['campaigns_page.tpl']);
		$stats->set("page_subject", $title);
		$maps = new Template("campaigns_page_coop.tpl");
		$totalbesttime = 0;
		$Allfinishplayer = "";
        $maparr = array();
        $totals = array();
		for($i = 1; $i < 6; $i ++)
		{
			$query = "SELECT timedmaps.map, timedmaps.time, players.name FROM timedmaps
			LEFT JOIN players ON timedmaps.steamid = players.steamid
			WHERE timedmaps.anneversion = '{$anneversion}'
				AND timedmaps.sinum = '{$sinum}'
				AND timedmaps.sitime = '{$sitime}'
				AND timedmaps.usebuy = '{$usebuy}'
				AND timedmaps.auto = '{$auto}'
				AND LOWER(timedmaps.map) LIKE LOWER('{$prefix}{$i}%')
				AND timedmaps.mode = '{$mode}'
                AND timedmaps.time = (
                SELECT
                time
                FROM
                timedmaps
                WHERE
                timedmaps.anneversion = '{$anneversion}'
                AND timedmaps.sinum = '{$sinum}'
                AND timedmaps.sitime = '{$sitime}'
                AND timedmaps.usebuy = '{$usebuy}'
                AND timedmaps.auto = '{$auto}'
				AND timedmaps.players = '{$finishplayernum}'
                AND LOWER(timedmaps.map) LIKE LOWER('{$prefix}{$i}%')
                AND timedmaps.mode = '{$mode}'
                ORDER BY time ASC
                LIMIT 1
                )";

			$result = mysql_query($query) or die(mysql_error());
			if (mysql_num_rows($result) <= 0) continue;
			$besttime = -1;
			$finishplayer = "";
            $currentmap = "";
			while ($row = mysql_fetch_array($result)) {
				if($besttime == -1){
                    $totalbesttime += $row['time'];
					$besttime = $row['time'];
					$finishplayer .= $row['name'];
                    if($Allfinishplayer == "")
					    $Allfinishplayer .= $row['name'];
                    else
                        $Allfinishplayer .= "," . $row['name'];
				}else if($row['time'] == $besttime)
				{
					$finishplayer .= "," . $row['name'];
					$Allfinishplayer .= "," . $row['name'];
				}
				$currentmap = $row['map'];
			}
            $line = ($j & 1) ? "<tr>" : "	<tr>";
            $usebuy_display = ($usebuy == 0) ? '否' : '是';
            $auto_display = ($auto == 0) ? '固定' : '自动';
            $maparr[] = $line . "<tr><td data-title=\"地图:\">" . $currentmap . "</td><td data-title=\"最佳完成时长:\">" . formatage($besttime ) . "</td>" . "<td data-title=\"Anne版本:\">" . $anneversion . "</td><td data-title=\"特感数量:\">" . number_format($sinum) . "</td>" . "<td data-title=\"刷新间隔:\">" . number_format($sitime) . "</td><td data-title=\"B数使用:\">" . $usebuy_display . "</td>" . "<td data-title=\"刷特模式:\">" . $auto_display . "</td>" . "<td data-title=\"完成玩家:\">" . $finishplayer . "</td>";
        }
        $delimiter = ",";
        $array = explode($delimiter, $Allfinishplayer);
        $array = array_unique($array);
        $Allfinishplayer= implode($delimiter, $array);
        $usebuy_display = ($usebuy == 0) ? '否' : '是';
        $auto_display = ($auto == 0) ? '固定' : '自动';
		$maparr[] = $line . "<tr><td data-title=\"总计:\">" . $title . "</td><td data-title=\"最佳完成时长:\">" . formatage($totalbesttime) . "</td>" . "<td data-title=\"Anne版本:\">" . $anneversion . "</td><td data-title=\"特感数量:\">" . number_format($sinum) . "</td>" . "<td data-title=\"刷新间隔:\">" . number_format($sitime) . "</td><td data-title=\"B数使用:\">" . $usebuy_display . "</td>" .  "<td data-title=\"刷特模式:\">" . $auto_display . "</td>".  "<td data-title=\"完成玩家:\">" . $Allfinishplayer . "</td>";
		$stats->set("maps", $maparr);
		$body = $stats->fetch("" . $templatefiles["campaigns_page_coop.tpl"]);
		$stats->set("page_body", $body);
		$stats->set("page_link", "<a class=\"alink-link2\" href=\"campaign.php?id=" . $prefix . "&type=" . $type . "&anneversion=" . $anneversion  . "&sinum=" . $sinum . "&sitime=" . $sitime . "&usebuy=" . $usebuy . "&auto=" . $auto . "&finishplayernum=" . $finishplayernum . "\">查看完整数据</a>");
		$output .= $stats->fetch("" . $templatefiles['campaigns_page.tpl']);
	}
}
else {
	$tpl->set("title", "mapranking");
	$tpl->set("page_heading", "mapranking");
	setcommontemplatevariables($tpl);
	$output = "<meta http-equiv=\"refresh\" content=\"3; URL=index.php?type=coop\"><br /><center>You will be forwarded ...</center>\n";
}
$tpl->set("body", trim($output));
echo $tpl->fetch("" . $templatefiles['campaigns_layout.tpl']);

?>