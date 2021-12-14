<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</html>
<div align="center"><table border="2">

<?php
include("conn.php");

// 检验提交参数
if(!isset($_GET["tableName"])) {
    die("请选择数据表");
}
$tableName = $_GET["tableName"];

echo "数据表 " . $tableName . " 下的数据记录有:<br><a href=admin.php>返回</a><hr>";

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
echo '<td><input type="submit" value="插入" style="width:40px">';
// 隐藏字段: 表名和操作类型
echo '<input name="tableName" value="' . $tableName . '" style="display:none;">';
echo '<input name="opType" value="insert" style="display:none;">';
echo '</tr></form>';

// ---------------打印数据----------------
$res = mysqli_query($conn, "call show_" . $tableName);
$row = mysqli_num_rows($res);
// 遍历每行
for($i=0; $i<$row; $i++) {
    echo '<form method="GET" action="table.bks.php"><tr>';
    $dbrow = mysqli_fetch_array($res);

    $url = "table.bks.php?tableName=" . $tableName . '&'; // 构造get提交的url

    // 按列循环打印属性
    for($j=0; $j<count($columns); $j++) {
        $key = $columns[$j];    // 属性名
        $val = $dbrow[$key];    // 属性值值
        echo '<td><input name="' . $key . '" value="' . $val . '"></td>';

        $url .= $key . '=' . $val . '&';
    }

    $url .= 'opType=delete';

    // 隐藏字段: 表名和操作类型
    echo '<input name="tableName" value="' . $tableName . '" style="display:none;">';
    echo '<input name="opType" value="update" style="display:none;">';
    // 按钮
    echo '<td><input type="submit" value="修改" style="width:40px"> ';
    echo '<a href="' . $url . '">删除</a></td>';
    echo '</tr></form>';
}
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
        padding: 10px;
    }
    input {
        width: 130px;
    }
</style>
