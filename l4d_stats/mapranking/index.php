<?php

/****************************************************************************

   LEFT 4 DEAD (2) PLAYER STATISTICS ©2019-2020 PRIMEAS.DE
   BASED ON THE PLUGIN FROM MUUKIS MODIFIED BY FOXHOUND FOR SOURCEMOD

 - https://forums.alliedmods.net/showthread.php?p=2678290#post2678290
 - https://www.primeas.de/

****************************************************************************/

ini_set('display_errors',1);
error_reporting(E_ALL);
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
	$tpl->set("page_heading", "具体模式 （" . $typelabel . "）");
	<!-- 创建anneversion下拉菜单 -->
	<label for='anneversion'>Anneversion:</label>
	<select id='anneversion' name='anneversion' onchange='updateOptions()'>
		<?php
		// 查询并创建不重复的anneversion列表
		$query_anneversion = "SELECT DISTINCT anneversion FROM timedmaps";
		$result_anneversion = mysql_query($query_anneversion) or die(mysql_error());
		if (mysql_num_rows($result_anneversion) > 0) {
			while ($row = mysql_fetch_assoc($result_anneversion)) {
				echo "<option value='{$row['anneversion']}'>{$row['anneversion']}</option>";
			}
		}
		?>
	</select>

	<!-- 创建sinum下拉菜单 -->
	<label for='sinum'>Sinum:</label>
	<select id='sinum' name='sinum'>
		<!-- 此处留空，待JavaScript动态创建 -->
	</select>

	<!-- 创建sitime下拉菜单 -->
	<label for='sitime'>Sitime:</label>
	<select id='sitime' name='sitime'>
		<!-- 此处留空，待JavaScript动态创建 -->
	</select>

	<!-- 创建usebuy下拉菜单 -->
	<label for='usebuy'>Usebuy:</label>
	<select id='usebuy' name='usebuy'>
		<!-- 此处留空，待JavaScript动态创建 -->
	</select>

	<!-- 创建auto下拉菜单 -->
	<label for='auto'>Auto:</label>
	<select id='auto' name='auto'>
		<!-- 此处留空，待JavaScript动态创建 -->
	</select>

	<!-- 引入JavaScript代码 -->
	<script type='text/javascript'>
	function updateOptions() {
		// 获取选中的anneversion值
		var anneversion = document.getElementById('anneversion').value;

		// 发送AJAX请求获取相应的sinum选项
		var xhr_sinum = new XMLHttpRequest();
		xhr_sinum.onreadystatechange = function() {
			if (xhr_sinum.readyState == XMLHttpRequest.DONE) {
				if (xhr_sinum.status == 200) {
					// 解析JSON数据并更新sinum选项
					var sinum_options = JSON.parse(xhr_sinum.responseText);
					var sinum_select = document.getElementById('sinum');
					sinum_select.options.length = 0;
					sinum_select.options[0] = new Option('', '');
					for (var i=0; i<sinum_options.length; i++) {
						sinum_select.options[i+1] = new Option(sinum_options[i], sinum_options[i]);
					}

					// 清空sitime和usebuy选项
					var sitime_select = document.getElementById('sitime');
					sitime_select.options.length = 0;
					sitime_select.options[0] = new Option('', '');
					var usebuy_select = document.getElementById('usebuy');
					usebuy_select.options.length = 0;
					usebuy_select.options[0] = new Option('', '');
				}
				else {
					console.error(xhr_sinum.statusText);
				}
			}
		};
		xhr_sinum.open('GET', 'get_options.php?anneversion='+encodeURIComponent(anneversion)+'&option=sinum', true);
		xhr_sinum.send();

		// 发送AJAX请求获取相应的auto选项
		var xhr_auto = new XMLHttpRequest();
		xhr_auto.onreadystatechange = function() {
			if (xhr_auto.readyState == XMLHttpRequest.DONE) {
				if (xhr_auto.status == 200) {
					// 解析JSON数据并更新auto选项
					var auto_options = JSON.parse(xhr_auto.responseText);
					var auto_select = document.getElementById('auto');
					auto_select.options.length = 0;
					auto_select.options[0] = new Option('', '');
					for (var i=0; i<auto_options.length; i++) {
						auto_select.options[i+1] = new Option(auto_options[i], auto_options[i]);
					}

					// 如果选中了所有sinum中没有的值，则清空sitime和usebuy选项
					var sinum_select = document.getElementById('sinum');
					var sitime_select = document.getElementById('sitime');
					var usebuy_select = document.getElementById('usebuy');
					if (sinum_select.selectedIndex == -1) {
						sitime_select.options.length = 0;
						sitime_select.options[0] = new Option('', '');
						usebuy_select.options.length = 0;
						usebuy_select.options[0] = new Option('', '');
					}
				}
				else {
					console.error(xhr_auto.statusText);
				}
			}
		};
		xhr_auto.open('GET', 'get_options.php?anneversion='+encodeURIComponent(anneversion)+'&option=auto', true);
		xhr_auto.send();
	}
	</script>
	// Handle form submission
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Get selected options
		$anneversion = $_POST["anneversion"];
		$sinum = $_POST["sinum"];
		$sitime = $_POST["sitime"];
		$usebuy = $_POST["usebuy"];
		$auto = $_POST["auto"];
	}else{
		$anneversion = "2023-01";
		$sinum = 6;
		$sitime = 16;
		$usebuy = 0;
		$auto = 1;
	}
	$maparr = array();
	$totals = array();
	if ($type == "anne"){ $campaigns = $coop_campaigns; $mode = 1; }
	else if ($type == "witchparty") { $campaigns = $coop_campaigns; $mode = 2; }
	else if ($type == "allcharger") { $campaigns = $coop_campaigns; $mode = 3; }
	else if ($type == "alone") { $campaigns = $coop_campaigns; $mode = 4; }
	else if ($type == "hunters") { $campaigns = $coop_campaigns; $mode = 5; }
	foreach ($campaigns as $prefix => $title) {
		$stats = new Template("" . $templatefiles['campaigns_page.tpl']);
		$stats->set("page_subject", $title);
		$maps = new Template("campaigns_page_coop.tpl");
		$totalbesttime = 0;
		$Allfinishplayer = "";
		for($i = 1; $i < 6; $i ++)
		{
			$query = "SELECT timedmaps.*, players.*, maps.* FROM timedmaps
			LEFT JOIN players ON timedmaps.steamid = players.steamid
			LEFT JOIN maps ON LOWER(maps.name) LIKE LOWER('{$prefix}.$i')
			WHERE anneversion = '{$anneversion}' 
				AND sinum = '{$sinum}' 
				AND sitime = '{$sitime}'
				AND usebuy = '{$usebuy}' 
				AND auto = '{$auto}' 
				AND LOWER('{$prefix}.{$i}."%"') LIKE LOWER(timedmaps.name)
				AND mode = '{$mode}'
			ORDER BY time ASC LIMIT 10";
			$result = mysql_query($query) or die(mysql_error());
			if (mysql_num_rows($result) <= 0) continue;
			$besttime = -1;
			$finishplayer = "";
			$j = 1;
			while ($row = mysql_fetch_array($result)) {
				$totalbesttime += $row['time'];
				if($besttime == -1){
					$besttime = $row['time'];
					$finishplayer .= $row['players.name'];
					$Allfinishplayer .= $row['players.name'];
				}else if($row['time'] == $besttime)
				{
					$finishplayer .= $row['players.name'];
					$Allfinishplayer .= $row['players.name'];
				}
				$currentmap = $row['map'];
				$line = ($j & 1) ? "<tr>" : "	<tr>";
				$maparr[] = $line . "<tr><td data-title=\"地图:\">" . $title . "</td><td data-title=\"最佳完成时长:\">" . formatage($besttime * 60) . "</td>" . "<td data-title=\"Anne版本:\">" . $anneversion . "</td><td data-title=\"特感数量:\">" . number_format($sinum) . "</td>" . "<td data-title=\"刷新间隔:\">" . number_format($sitime) . "</td><td data-title=\"B数使用:\">" . number_format($usebuy) . "</td>" .  "<td data-title=\"刷特模式:\">" . number_format($auto) . "</td>".  "<td data-title=\"完成玩家:\">" . $finishplayer . "</td>";
				$j++;
			}
		}	
		$maparr[] = $line . "<tr><td data-title=\"总计:\">" . $title . "</td><td data-title=\"最佳完成时长:\">" . formatage($totalbesttime * 60) . "</td>" . "<td data-title=\"Anne版本:\">" . $anneversion . "</td><td data-title=\"特感数量:\">" . number_format($sinum) . "</td>" . "<td data-title=\"刷新间隔:\">" . number_format($sitime) . "</td><td data-title=\"B数使用:\">" . number_format($usebuy) . "</td>" .  "<td data-title=\"刷特模式:\">" . number_format($auto) . "</td>".  "<td data-title=\"完成玩家:\">" . $Allfinishplayer . "</td>";
		$stats->set("maps", $maparr);
		$body = $stats->fetch("" . $templatefiles["campaigns_page_coop.tpl"]);
		$stats->set("page_body", $body);
		$stats->set("page_link", "<a class=\"alink-link2\" href=\"campaign.php?id=" . $prefix . "&type=" . $type . "\">查看完整数据</a>");
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