<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</html>
<div align="center">
个人购买记录
<br><a href=index.html>返回</a>
<hr>

<table border="2">
<?php
//数据库功能三，查询用户购买记录
echo '<form method="GET" action="personPageInfo.php">';
echo '<tr>';
// 打印manu的文本
echo '<td>输入个人id进行查询</td>';
echo '<td><input type="text" name="customerID" style="width:120;"></input></td>';
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
