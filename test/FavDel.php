<?php
/**
 * 删除收藏夹测试
 */
	include '../session.php';
	include '../conn.php';
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除收藏夹</title>
</head>
<body>
<form action="../api.php?action=fav_del" method="post">
<table>
	<tr>
		<td>收藏夹编号：</td>
		<td><input type="text" id="id" name="id" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="提交" /></td>
	</tr>
</table>
</form>
</body>
</html>