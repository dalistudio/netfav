<?php
/**
 * 版权所有 (c) 2014，保留所有权利。
 * NetFav 2.0
 *
 * 修改密码
 */

	include 'session.php';
	include 'conn.php';
	include 'netfav.php';
	
	$Old  = $_REQUEST['old'];
	$Pwd  = $_REQUEST['pwd'];
	
	$user_sql = "SELECT user_id, user_pwd FROM user WHERE user_name='".$_SESSION['name']."';";
	$user_result = $mysqli->query($user_sql);
	$row = $user_result->fetch_object();
	
	$Id = $row->user_id;
	$OldPwd = $row->user_pwd;
	
	if(strcmp($Old,$OldPwd)==0)
	{
		$nf = new NetFav();
		$nf->User_Edit($Id, $_SESSION['name'], $Pwd);
		header('Location: /main.php');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/Default.css" />
<title>修改密码</title>
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
<form action="change.php" method="post">
<table class="tbl" width="350" border="0">
  <tr>
    <th colspan="3">修改密码</th>
  </tr>
  <tr>
  	<td width="25%" align="right">用户：</td>
  	<td><input type="text" id="Edit1" value="<?=$_SESSION['name'];?>" readonly="readonly" /></td>
  	<td width="25%"><div id="Edit1_Tip" align="center" style="color:red"></div></td>
  </tr>
  <tr>
  	<td align="right">旧密码：</td>
  	<td><input type="password" id="Edit4" name="old" onkeyup="onCheck();" /></td>
  	<td><div id="Edit4_Tip" align="center" style="color:red"></div></td>
  </tr>
  <tr>
  	<td align="right">新密码：</td>
  	<td><input type="password" id="Edit2" name="pwd" onkeyup="onCheck();" /></td>
  	<td><div id="Edit2_Tip" align="center" style="color:red"></div></td>
  </tr>
  <tr>
  	<td align="right">确认密码：</td>
  	<td><input type="password" id="Edit3" onkeyup="onCheck();" /></td>
  	<td><div id="Edit3_Tip" align="center" style="color:red"></div></td>
  </tr>
  <tr>
  	<td></td>
  	<td><input type="submit" id="button" value="提交" disabled="disabled" /></td>
  	<td></td>
  </tr>
</table>
</form>
</body>
</html>