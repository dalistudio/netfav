<?php
/**
 * 版权所有 (c) 2014，保留所有权利。
 * NetFav 2.0
 *
 * 注册
 */

include 'session.php';
$Type = $_GET['Type'];
$PwdMsg = "";
$Msg ="";
if($Type=="oldpwd")
{
	$Type="chang";
	$PwdMsg = "密码错误";
}
if($Type=="name")
{
	$Type="";
	$Msg = "用户已经存在";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/Default.css" />
<title>添加用户</title>
<script type="text/javascript">
function onCheck()
{
	
	var Pwd1 = document.getElementById('pwd1');
	var Pwd2 = document.getElementById('pwd2');
	var Post = document.getElementById('button');
	
	<?php
	if($Type=="")
	{
		echo('var Name = document.getElementById("user");');
		echo('if(Name.value=="")');
		echo('	document.getElementById("divName").innerHTML="必填";');
		echo('else');
		echo('	document.getElementById("divName").innerHTML="";');
	}
	else
	{
		echo('	document.getElementById("divOld").innerHTML="";');
	}
	?>
	
	if(Pwd1.value=="")
		document.getElementById('divPwd1').innerHTML="必填";
	else
		document.getElementById('divPwd1').innerHTML="";
	
	if(Pwd2.value=="")
		document.getElementById('divPwd2').innerHTML="必填";
	else
		document.getElementById('divPwd2').innerHTML="";
		
	if(Pwd1.value != Pwd2.value)
	{
		document.getElementById('divPwd1').innerHTML="密码不同";
		document.getElementById('divPwd2').innerHTML="密码不同";
		Post.disabled = true;
	}
	else
	{
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
<?php
if($Type=="")
	echo('<form action="api.php?action=user_add" method="post">');
else if($Type=="chang")
	echo('<form action="api.php?action=user_edit" method="post">');
echo('<table class="tbl" width="350" border="0">');
  

  	echo('<tr>');
  	if($Type=="")
		echo('<th colspan="3">注册用户</th>');
	else if($Type=="chang")
		echo('<th colspan="3">修改密码</th>');
	echo('</tr>');

	echo('<tr>');
 	echo('<td width="80"><div align="right">用户：</div></td>');
  	echo('<td width="60">');
	if($Type=="")
	{
		echo('<input name="user" type="text" id="user" onkeyup="onCheck();" size="16" maxlength="16" />');
	}
	else if($Type=="chang")
	{
		echo('<div align="center">'.$_SESSION['name']); // 显示用户名
	}
  echo('</td>');
  echo('<td><div id="divName" align="center" style="color:red">'.$Msg.'</div></td>');
  echo('</tr>');
  
  if($Type=="chang")
  {
	echo('<tr>');
    echo('<td><div align="right">旧密码：</div></td>');
    echo('<td>');
    echo('  <input name="oldpwd" type="password" size="17" maxlength="16" onkeyup="onCheck();" />');
    echo('</td>');
    echo('<td><div id="divOld" align="center" style="color:red">'.$PwdMsg.'</div></td>');
  	echo('</tr>');
  }
  ?>  
  <tr>
    <td><div align="right">密码：</div></td>
    <td>
      <input name="passwd" type="password" id="pwd1" size="17" maxlength="16" onkeyup="onCheck();" />
    </td>
    <td><div id="divPwd1" align="center" style="color:red"></div></td>
  </tr>
  <tr>
    <td><div align="right">确认密码：</div></td>
    <td>
      <input type="password" id="pwd2" size="17" maxlength="16" onkeyup="onCheck();" />
    </td>
    <td><div id="divPwd2" align="center" style="color:red"></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" id="button" value="提交" disabled="disabled" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>