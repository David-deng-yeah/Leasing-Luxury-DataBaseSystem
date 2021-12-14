<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</html>
<div align="center">
请输入你的基本信息
<br><a href=index.html>返回</a>
<hr>

<table border="2">
<?php
include("conn.php");

//打印表头
$columns = array('bag_id','customer_id','DateReturn','Insurance','操作');
echo '<tr style="background-color:red">';
for($i=0; $i<count($columns); $i++) {
    echo '<td><b>' . $columns[$i] . '</b></td>';
}
// echo '<td><b>操作</b></td>';
echo '</tr><tr>';//回车

//表单中读入
$bags_id = $_GET['bag_id'];

echo '<form method="GET" action="bks_function/rent_.bks.php">';
echo '<tr>';
//echo '<td><b name="bag_id">'.$bags_id.'</b></td>';
echo '<td><input type="text" name="bag_id" value="'.$bags_id.'" style="width:120;"></input></td>';
echo '<td><input type="text" name="customer_id" value="请输入 customer id" style="width:120;"></input></td>';
echo '<td><input type="text" name="DateReturn" value="请输入 Date Return" style="width:120;"></input></td>';
echo '<td><input type="text" name="Insurance" value="请输入 Insurance" style="width:120;"></input></td>';
// 按钮
echo '<td><input type="submit" value="租借" style="width:40px">';
// 隐藏字段: 表名和操作类型
echo '</tr>';
echo '</form>';
?>
</table>

<hr>



</div>
<style>
    tr {
        text-align: center;
    }
    td {
        padding: 10px;
    }
</style>
