<?php
/**
 * 编辑消息测试
 */
	include '../session.php';
	include '../conn.php';
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑消息</title>
</head>
<body>
<form action="../api.php?action=msg_edit" method="post">
<table>
	<tr>
		<td>编号：</td>
		<td><input type="text" id="id" name="id" /></td>
	</tr>
	<tr>
		<td>作者：</td>
		<td><input type="text" id="writer" name="writer" /></td>
	</tr>
	<tr>
		<td>读者：</td>
		<td><input type="text" id="reader" name="reader" /></td>
	</tr>
	<tr>
		<td>消息：</td>
		<td><input type="text" id="text" name="text" /></td>
	</tr>
	<tr>
		<td>写时间：</td>
		<td><input type="text" id="date_write" name="date_write" /></td>
	</tr>
	<tr>
		<td>读时间：</td>
		<td><input type="text" id="date_read" name="date_read" /></td>
	</tr>
	<tr>
		<td>状态：</td>
		<td><input type="text" id="status" name="status" /></td>
	</tr>
	<tr>
		<td>类型：</td>
		<td><input type="text" id="type" name="type" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="提交" /></td>
	</tr>
</table>
</form>
</body>
</html>