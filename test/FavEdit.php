<?php
/**
 * 编辑收藏夹测试
 */
	include '../session.php';
	include '../conn.php';
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑收藏夹</title>
</head>
<body>
<form action="../api.php?action=fav_edit" method="post">
<table>
	<tr>
		<td>收藏夹编号：</td>
		<td><input type="text" id="id" name="id" /></td>
	</tr>
	<tr>
		<td>用户编号：</td>
		<td><input type="text" id="user_id" name="user_id" /></td>
	</tr>
	<tr>
		<td>网站名称：</td>
		<td><input type="text" id="name" name="name" /></td>
	</tr>
	<tr>
		<td>网站描述：</td>
		<td><input type="text" id="desc" name="desc" /></td>
	</tr>
	<tr>
		<td>描述网址：</td>
		<td><input type="text" id="desc_url" name="desc_url" /></td>
	</tr>
	<tr>
		<td>排序：</td>
		<td><input type="text" id="level" name="level" /></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<table width="100%"><tr><td align="center">名称</td><td align="center">地址</td><td align="center">提示</td></tr></table>
		</td>
	</tr>
	<tr>
		<td>网址1：</td>
		<td><input type="text" id="url1_name" name="url1_name" /><input type="text" id="url1" name="url1" /><input type="text" id="url1_tip" name="url1_tip" /></td>
	</tr>
	<tr>
		<td>网址2：</td>
		<td><input type="text" id="url2_name" name="url2_name" /><input type="text" id="url2" name="url2" /><input type="text" id="url2_tip" name="url2_tip" /></td>
	</tr>
	<tr>
		<td>网址3：</td>
		<td><input type="text" id="url3_name" name="url3_name" /><input type="text" id="url3" name="url3" /><input type="text" id="url3_tip" name="url3_tip" /></td>
	</tr>
	<tr>
		<td>网址4：</td>
		<td><input type="text" id="url4_name" name="url4_name" /><input type="text" id="url4" name="url4" /><input type="text" id="url4_tip" name="url4_tip" /></td>
	</tr>
	<tr>
		<td>网址5：</td>
		<td><input type="text" id="url5_name" name="url5_name" /><input type="text" id="url5" name="url5" /><input type="text" id="url5_tip" name="url5_tip" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="提交" /></td>
	</tr>
</table>
</form>
</body>
</html>