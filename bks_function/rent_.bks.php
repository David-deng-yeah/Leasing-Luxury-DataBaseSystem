<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</html>

<?php
include("../conn.php");
//表单信息
$customerID = $_GET['customer_id'];
$bagID = $_GET['bag_id'];
//$DateRent = $_GET['DateRent'];
$DateRent = Date("Y-m-d");
$DateReturn = $_GET['DateReturn'];
$Insurance = $_GET['Insurance'];
$ReturnOP = 'rent';

//异常检测------------------
if($Insurance != 1 and $Insurance != 0){
    echo '<script>alert("操作失败，Insurance不正确");window.location.href=document.referrer;</script>';
    die("Insurance is uncorrect");
}
if(! preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$DateReturn)){
    echo '<script>alert("操作失败，日期不正确");window.location.href=document.referrer;</script>';
    die("date is uncorrect");
}
$tmp_sql = 'select * from customer where customer_id = "'.$customerID.'"';
$tmp_res = mysqli_query($conn, $tmp_sql);
if(mysqli_num_rows($tmp_res)==0){
    echo '<script>alert("操作失败,不存在的用户id");window.location.href=document.referrer;</script>';
    die("customerID is uncorrect");
}
//异常检测------------------

//进行租借操作
//租借就是：往rentals表格里insert，触发trigger然后将bags里对应的num--
//构造sql
$sql = 'insert into rentals(
            customer_id, 
            DateRent,
            DateReturn,
            Insurance,
            bag_id,
            ReturnOP
            ) values (
                "'.$customerID.'",
                "'.$DateRent.'",
                "'.$DateReturn.'",
                "'.$Insurance.'",
                "'.$bagID.'",
                "'.$ReturnOP.'"
            );';
//进行查询
// echo '<td>'.$sql.'</td>';
$res = mysqli_query($conn, $sql);
echo '<script>alert("操作成功");window.location.href=document.referrer;</script>';
die("114514");
?>

