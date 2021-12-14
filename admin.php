<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</html>
<div align="center">
数据库 finalassign 下的所有数据表：
<br><a href=index.html>返回</a><hr><table border="2">
<?php
include("conn.php");

// 获取表名
$res = mysqli_query($conn, "show tables");
$row = mysqli_num_rows($res);
for($i=0; $i<$row; $i++) {
    $tableName = mysqli_fetch_array($res)[0];
    // 拼凑 a 标签 -- 方便跳转
    echo '<tr><td>';
    echo '<a href="tableInfo.php?tableName=' . $tableName . '">' . $tableName . '</a>';
    echo '</td></tr>';
}

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
