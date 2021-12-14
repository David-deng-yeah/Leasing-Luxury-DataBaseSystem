<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</html>
<div align="center">

<table border="2">
<?php
include("conn.php");

//打印表头
$columns = array('bag_id','names','Color','Manufacturer','Price','nums');
echo '<tr style="background-color:red">';
for($i=0; $i<count($columns); $i++) {
    echo '<td><b>' . $columns[$i] . '</b></td>';
}
echo '<td><b>操作</b></td>';
echo '</tr><tr>';//回车


//打印数据
$res=mysqli_query($conn, 'call bags_avaliable()');
$row = mysqli_num_rows($res);
// 遍历每行
for($i=0; $i<$row; $i++) {
    //这里进行租借计算
    //echo '<form method="GET" action="bks_function/rent_.bks.php"><tr>';
    echo '<form method="GET" action="customerLog.php"><tr>';
    $dbrow = mysqli_fetch_array($res);
    // 按列循环打印属性
    for($j=0; $j<count($columns); $j++) {
        $key = $columns[$j];    // 属性名
        $val = $dbrow[$j];    // 属性值值
        echo '<td><input name="' . $key . '" value="' . $val . '"></td>';
    }
    echo '<td><input type="submit" value="租借" style="width:40px"> ';//按钮
    echo '</tr></tr>';//换行
    echo '</tr></form>';
}
?>
</table>

</div>

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
