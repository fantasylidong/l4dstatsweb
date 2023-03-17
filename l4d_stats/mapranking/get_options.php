<?php
// 获取当前选中的下拉菜单和值
$currentDropdown = $_GET["currentDropdown"];
$currentDropdownValue = $_GET["currentDropdownValue"];

// 获取数据库连接
$db = mysql_connect("10.0.0.4", "morzlee", "anne123") or die("Could not connect");
mysql_select_db("database_name", $db);

// 根据当前选中的列和值，查询下一列的可选项（去重）
$query = "SELECT DISTINCT " . getNextColumn($currentDropdown) . " FROM l4d2stats.timedmaps WHERE " . $currentDropdown . " = '" . mysql_real_escape_string($currentDropdownValue) . "' ORDER BY " . getNextColumn($currentDropdown) . " ASC";
$result = mysql_query($query);

// 生成下一列的可选项
$options = "";
while($row = mysql_fetch_assoc($result)) {
    $options .= "<option value='" . $row[getNextColumn($currentDropdown)] . "'>" . $row[getNextColumn($currentDropdown)] . "</option>";
}

// 返回下一列的可选项
echo $options;

// 关闭数据库连接
mysql_close($db);

// 根据当前选中的列，返回下一列的列名
function getNextColumn($currentColumn) {
    switch ($currentColumn) {
        case "anneversion":
            return "sinum";
            break;
        case "sinum":
            return "sitime";
            break;
        case "sitime":
            return "auto";
            break;
        case "auto":
            return "usebuy";
            break;
        case "usebuy":
            return "";
            break;
        default:
            return "";
            break;
    }
}
?>
