<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</html>
<div align="center">
    
<?php
echo '<td>当前日期: '.date("Y-m-d").'<td>'
?>
<table border="2">
<?php
include("conn.php");
$customerID = $_GET['customerID'];

//异常检测------------------
$tmp_sql = 'select * from customer where customer_id = "'.$customerID.'"';
$tmp_res = mysqli_query($conn, $tmp_sql);
if(mysqli_num_rows($tmp_res)==0){
    echo '<script>alert("操作失败,不存在的用户id");window.location.href=document.referrer;</script>';
    die("customerID is uncorrect");
}
//异常检测------------------

//打印表头
$columns = array('customer_id','bag_id','Name','Color','Manufacturer','Insurance','Price','DateRent','DateReturn');
echo '<tr style="background-color:red">';
for($i=0; $i<count($columns); $i++) {
    echo '<td><b>' . $columns[$i] . '</b></td>';
}
echo '<td><b>操作</b></td>';
echo '</tr><tr>';//回车


//打印数据
$res=mysqli_query($conn, 'call record_by_customerID("' . $customerID . '")');
$row = mysqli_num_rows($res);

// 遍历每行
for($i=0; $i<$row; $i++) {
    //每一列都是一个表单
    echo '<form method="GET" action="bks_function/return_.bks.php"><tr>';
    $dbrow = mysqli_fetch_array($res);
    // 按列循环打印属性
    for($j=0; $j<count($columns); $j++) {
        $key = $columns[$j];    // 属性名
        $val = $dbrow[$j];    // 属性值值
        echo '<td><input name="' . $key . '" value="' . $val . '"></td>';
    }
    echo '<td><input type="submit" value="归还" style="width:40px"> ';//按钮
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
