<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</html>
<div align="center"><table border="2">
<hr>
<style type="text/css">
h1 {font-size: 200%}
</style>

<?php
include("conn.php");

$tableName = "customer";

echo '<h1 font-size:250%;>请输入您的用户信息</h1>';

// 打印表头
$columns = array();
$res = mysqli_query($conn, "show columns from " . $tableName);
$row = mysqli_num_rows($res);
echo '<tr style="background-color:red">';
for($i=0; $i<$row; $i++) {
    $dbrow = mysqli_fetch_array($res);
    echo '<td><b>' . $dbrow[0] . '</b></td>';
    array_push($columns, $dbrow[0]);
}
echo '<td><b>操作</b></td>';

//这里是一个表单，用以提交插入请求
echo '</tr><form method="GET" action="table.bks.php"><tr>';

// 打印插入栏
foreach($columns as $key) {
    echo '<td><input name="' . $key . '" value=""></td>';
}
// 按钮
echo '<td><input type="submit" value="注册" style="width:40px">';
// 隐藏字段: 表名和操作类型
echo '<input name="tableName" value="' . $tableName . '" style="display:none;">';
echo '<input name="opType" value="insert" style="display:none;">';
echo '</tr></form>';
?>

</table>


<?php
if($row==0) {
    echo "表中没有记录";
}
?>
<hr></div>

<style>
    tr {
        text-align: center;
    }
    td {
        padding: 20px;
    }
    input {
        width: 150px;
    }
</style>
