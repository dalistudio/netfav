<?php
/**
 * 版权所有 (c) 2014，保留所有权利。
 * NetFav 2.0
 *
 * 注册
 */

	include 'session.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/Default.css" />
<title>注册用户</title>
<script type="text/javascript">
	function onCheck()
	{
		var Edit1 = document.getElementById('Edit1');
		var Edit2 = document.getElementById('Edit2');
		var Edit3 = document.getElementById('Edit3');
		var Post = document.getElementById('button');

		if(Edit2.value != Edit3.value)
		{
			document.getElementById('Edit2_Tip').innerHTML="密码不同";
			document.getElementById('Edit3_Tip').innerHTML="密码不同";
			Post.disabled = true;
		}
		else
		{
			document.getElementById('Edit2_Tip').innerHTML="";
			document.getElementById('Edit3_Tip').innerHTML="";
			Post.disabled = false;
		}
	}
</script>
</head>
<body>  
<table class="tbl" width="350" border="0">
  <tr>
    <td> <a href="index.php">返回</a></td>
  </tr>
</table>
<br />
<form action="api.php?action=user_add" method="post">
<table class="tbl" width="350" border="0">
  <tr>
    <th colspan="3">注册用户</th>
  </tr>
  <tr>
  	<td width="25%" align="right">用户：</td>
  	<td><input type="text" id="Edit1" name="user" onkeyup="onCheck();" /></td>
  	<td width="25%"><div id="Edit1_Tip" align="center" style="color:red"></div></td>
  </tr>
  <tr>
  	<td align="right">密码：</td>
  	<td><input type="password" id="Edit2" name="pwd" onkeyup="onCheck();" /></td>
  	<td><div id="Edit2_Tip" align="center" style="color:red"></div></td>
  </tr>
  <tr>
  	<td align="right">确认密码：</td>
  	<td><input type="password" id="Edit3" onkeyup="onCheck();" /></td>
  	<td><div id="Edit3_Tip" align="center" style="color:red"></div></td>
  </tr>
  <tr>
  	<td><input type="hidden" name="father" value="1" /></td>
  	<td><input type="submit" id="button" value="提交" disabled="disabled" /></td>
  	<td><input type="hidden" name="level" value="2" /></td>
  </tr>
</table>
</form>
</body>
</html>