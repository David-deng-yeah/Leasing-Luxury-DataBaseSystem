<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</html>
<?php
include("conn.php");

if(!isset($_GET["tableName"])) {
    die("请选择数据表");
}
$tableName = $_GET["tableName"];

// 获取字段名
$columns = array();
$res = mysqli_query($conn, "show columns from " . $tableName);
$row = mysqli_num_rows($res);
for($i=0; $i<$row; $i++) {
    $dbrow = mysqli_fetch_array($res);
    array_push($columns, $dbrow[0]);
}

// // 获取主键名称
// $sql = "SELECT column_name FROM INFORMATION_SCHEMA.`KEY_COLUMN_USAGE` WHERE table_name='" . $tableName . "' AND constraint_name='PRIMARY'";
// $res = mysqli_query($conn, $sql);
// $primaryKeyName = mysqli_fetch_array($res)[0];

// // 删除操作 -- 调用存储过程 delete_xxxx() 
// if($_GET["opType"]=="delete") {
//     $sql = "call delete_" . $tableName;
// }

// // 更新操作 -- 调用存储过程 update_xxxx() 
// if($_GET["opType"]=="update") {
//     $sql = "call update_" . $tableName;
// }

// 插入操作 -- 调用存储过程 add_xxxx() 
if($_GET["opType"]=="insert") {
    //$sql = "call insert_" . $tableName;
    $sql = "call add_".$tableName;
}

// 构造 sql 语句
// $sql = substr($sql, 0, -1); // 去掉 s 字符
$sql .= '(';

// 构造参数
$parameters = "";
foreach($columns as $key) {
    $parameters .= '"' . $_GET[$key] . '",';
}
$parameters = substr($parameters, 0, -1); // 去掉 , 字符

// // 填参数
// if($_GET["opType"]=="delete") {
//     $sql .= $_GET[$primaryKeyName];   // 删除过程需要单个参数
// } else {
//     $sql .= $parameters;    // 所有参数
// }
$sql .= $parameters;
$sql .= ')';

// 执行操作
// echo '<td>'.$sql.'</td>';
$res = mysqli_query($conn, $sql);
echo '<script>alert("操作成功");window.location.href=document.referrer;</script>';

// 获取 sql 接口的返回信息
// $fetch_array = mysqli_fetch_array($res);
// $st = $fetch_array[0];
// $msg = $fetch_array[1];

// 响应
// if($st==1) {
//     $st = "成功";
// } else {
//     $st = "失败";
// }
// echo '<script>alert("状态: ' .$st . '\n信息: ' . $msg . '");window.location.href=document.referrer;</script>';
?>