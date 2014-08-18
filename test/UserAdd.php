<?php
/**
 * 添加用户测试
 */
	include '../session.php';
	include '../conn.php';
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加用户</title>
</head>
<body>
<form action="../api.php?action=user_add" method="post">
<table>
	<tr>
		<td>用户：</td>
		<td><input type="text" id="user" name="user" /></td>
	</tr>
	<tr>
		<td>密码：</td>
		<td><input type="text" id="pwd" name="pwd" /></td>
	</tr>
	<tr>
		<td>级别：</td>
		<td><input type="text" id="level" name="level" /></td>
	</tr>
	<tr>
		<td>父级：</td>
		<td><input type="text" id="father" name="father" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="提交" /></td>
	</tr>
</table>
</form>
</body>
</html>