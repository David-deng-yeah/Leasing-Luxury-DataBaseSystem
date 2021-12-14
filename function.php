<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</html>
<div align="center">
数据库功能区
<br><a href=index.html>返回</a>
<hr>

<table border="2">
<?php
include("conn.php");

//数据库功能一，查询manufactor
//添加manu的查询
echo '<form method="GET" action="bks_function/manufactor.bks.php">';
echo '<tr>';
// 打印manu的文本
echo '<td>Bags by Manufacturer</td>';
echo '<td><input type="text" name="manu_name" value="请输入设计师名字" style="width:120;"></input></td>';
// 按钮
echo '<td><input type="submit" value="查询" style="width:40px">';
// 隐藏字段: 表名和操作类型
echo '</tr>';
echo '</form>';
?>
</table>

<hr>

<table border="2">
<?php
//数据库功能二，查询最佳用户
echo '<form method="GET" action="bks_function/best_customer.bks.php">';
echo '<tr>';
// 打印manu的文本
echo '<td>Best Customers</td>';
// 按钮
echo '<td><input type="submit" value="查询" style="width:40px">';
echo '</tr>';
echo '</form>';
?>
</table>

<hr>

<table border="2">
<?php
//数据库功能三，查询用户购买记录
echo '<form method="GET" action="bks_function/report_customer_amount.bks.php">';
echo '<tr>';
// 打印manu的文本
echo '<td>report customer amount</td>';
echo '<td><input type="text" name="customerID" value="请输入用户ID" style="width:120;"></input></td>';
// 按钮
echo '<td><input type="submit" value="查询" style="width:40px">';
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
