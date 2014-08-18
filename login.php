<?php
/**
 * 版权所有 (c) 2014，保留所有权利。
 * NetFav 2.0
 *
 * 登录/退出
 */

	include 'session.php';
	include 'conn.php';

//	$User = $_POST['User'];
//	$Pwd  = $_POST['Pwd'];
//	printf("%s - %s",$User,$Pwd);
//	check_auth($User,$Pwd,$mysqli);

	// 注销session
	if($_GET['logout'] == 'yes')
	{
		session_destroy(); // 销毁会话
		header('Location: index.php');
		die();
	}
	
// 检查登陆信息
function check_auth($User,$Pwd,$mysqli)
{
	// 判断如果用户名和密码正确
	// 这里需要搜索数据库
	$sql="SELECT * FROM user WHERE user_name='".$User."';";
	$result = $mysqli->query($sql); // 执行SQL语句

	// 循环每一行记录
	while($row = $result->fetch_object())
	{
		$PwdSha = hash('sha256',$row->user_pwd); // 从数据库获取密码
		$MyPwd = hash('sha256',session_id().$PwdSha); // 会话编号+密码散列
		
		// 如果用户名相同，则比较密码。
		if($User == $row->user_name)
		{
			if($Pwd == $MyPwd)
			{
				$UserId 	= $row->user_id;
				$UserName 	= $row->user_name;
				$UserLevel 	= $row->user_level;
				$UserFather = $row->user_father;
				$_SESSION['id'] 	= $UserId;
				$_SESSION['name'] 	= $UserName;
				$_SESSION['level'] 	= $UserLevel;
				$_SESSION['father'] = $UserFather;
				return true; // 返回真
			}
		}
		else // 错误
		{
			return false; // 返回假，阻止POST请求
		}
	}
	$result->close(); // 释放资源

}

// 如果提交按钮存在且不为空，并且检查登陆信息正确
if(isset($_POST['Login']) && ($_POST[Login]=='登陆') && ($name=check_auth($_POST['User'],$_POST['Pwd'],$mysqli)))
{
	header('Location: /main.php'); // 跳转页面
	die(); // 不执行之后的代码
}
else
{
	header('Location: /index.php');
	die();
}

?>