<?php
// 获取查询参数
$anneversion = $_GET['anneversion'];
$option = $_GET['option'];

// 查询并生成对应的选项列表
if ($option == 'sinum') {
    $query = "SELECT DISTINCT sinum FROM timedmaps WHERE anneversion='$anneversion'";
    $result = mysql_query($query) or die(mysql_error());
    $options = array();
    while ($row = mysql_fetch_assoc($result)) {
        $options[] = $row['sinum'];
    }
}
else if ($option == 'auto') {
    $query = "SELECT DISTINCT auto FROM timedmaps WHERE anneversion='$anneversion'";
    $result = mysql_query($query) or die(mysql_error());
    $options = array();
    while ($row = mysql_fetch_assoc($result)) {
        $options[] = $row['auto'];
    }
}

// 输出JSON格式的选项列表
header('Content-Type: application/json');
echo json_encode($options);
?>
