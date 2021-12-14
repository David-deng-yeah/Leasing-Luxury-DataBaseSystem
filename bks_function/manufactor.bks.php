<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</html>
<div align="center"><table border="2">

<?php
include("../conn.php");
$manu_name = $_GET['manu_name'];

//打印表头
$columns = array('name','color','manufacturer');
echo '<tr style="background-color:red">';
for($i=0; $i<count($columns); $i++) {
    echo '<td><b>' . $columns[$i] . '</b></td>';
}
echo '</tr><tr>';//回车
//打印数据
$name = $manu_name;
$res=mysqli_query($conn, 'call bags_for_manufacturer("' . $name . '")');
$row = mysqli_num_rows($res);
// 遍历每行
for($i=0; $i<$row; $i++) {
    //echo '<form method="GET" action="table.bks.php"><tr>';
    $dbrow = mysqli_fetch_array($res);
    // 按列循环打印属性
    for($j=0; $j<count($columns); $j++) {
        $key = $columns[$j];    // 属性名
        $val = $dbrow[$j];    // 属性值值
        echo '<td><input name="' . $key . '" value="' . $val . '"></td>';
    }
    echo '</tr></tr>';
}
?>

</table>

<!-- 
<?php
if($row==0) {
    echo "表中没有记录";
}
?> -->
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
