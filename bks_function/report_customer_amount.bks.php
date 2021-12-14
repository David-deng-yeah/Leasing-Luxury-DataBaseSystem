<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</html>
<div align="center"><table border="2">

<?php
include("../conn.php");
$customerID = $_GET['customerID'];

//打印表头
$columns = array('Last_name','First_name','Manufacturer','Name','Cost');
echo '<tr style="background-color:red">';
for($i=0; $i<count($columns); $i++) {
    echo '<td><b>' . $columns[$i] . '</b></td>';
}
echo '</tr><tr>';//回车
//打印数据
$res=mysqli_query($conn, 'call report_customer_amount("' . $customerID . '")');
$row = mysqli_num_rows($res);
// 遍历每行
for($i=0; $i<$row; $i++) {
    //echo '<form method="GET" action="table.bks.php"><tr>';
    $dbrow = mysqli_fetch_array($res);
    // 按列循环打印属性
    for($j=0; $j<count($columns); $j++) {
        $key = $columns[$j];    // 属性名
        $val = $dbrow[$j];    // 属性值值
        //echo '<td><input name="' . $key . '" value="' . $val . '"></td>';
        if($val == null){
            echo '<td></td>';
        }
        else{
            if($key=="Cost")
                echo '<td>'.'$'.$val.'</td>';
            else
                echo '<td>'.$val.'</td>';
        }
    }
    echo '</tr></tr>';
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
