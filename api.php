<?php
/**
 * 版权所有 (c) 2014，保留所有权利。
 * NetFav 2.0
 *
 * API 接口
 */

	include 'session.php';
	include 'conn.php';
	
	header("Content-Type: text/html; charset=UTF-8");
	
	$Action = $_REQUEST['action'];
	
	switch($Action)
	{
		case 'user_add': // 添加用户
			User_Add($mysqli);
			break;
		case 'user_del': // 删除用户
			User_Del($mysqli);
			break;
		case 'user_edit': // 编辑用户
			User_Edit($mysqli);
			break;
		case 'fav_add': // 添加收藏夹
			Fav_Add($mysqli);
			break;
		case 'fav_del': // 删除收藏夹
			Fav_Del($mysqli);
			break;
		case 'fav_edit': // 编辑收藏夹
			Fav_Edit($mysqli);
			break;
		case 'msg_add': // 添加消息
			Msg_Add($mysqli);
			break;
		case 'msg_del': // 删除消息
			Msg_Del($mysqli);
			break;
		case 'msg_edit': // 编辑消息
			Msg_Edit($mysqli);
			break;
	}
	
	// 添加用户
	function User_Add($mysqli)
	{
		$User	= $_REQUEST['user'];	// 用户的名称
		$Pwd	= $_REQUEST['pwd'];	// 用户的密码
		$Level	= $_REQUEST['level'];	// 用户的级别
		$Father	= $_REQUEST['father'];	// 用户的上级
		
		$sql  = "INSERT INTO user SET ";
		$sql .= "user_name='".$User."',";
		$sql .= "user_pwd='".$Pwd."',";
		$sql .= "user_level='".$Level."',";
		$sql .= "user_father='".$Father."'";

		$result = $mysqli->query($sql);
		if($result)
		{
			echo('恭喜您，注册成功！<br />');
			echo('<a href="/index.php">请返回登录...</a>');
		}
		else
		{
			if($mysqli->errno=="1062")
			{
				echo('用户已存在，请换个名字！<br />');
				echo('<a href="/reg.php">返回</a>');
			}
			else 
			{
				printf("错误: %s - %s<br />",$mysqli->errno,$mysqli->error);
			}
		}
	}
	
	// 删除用户
	function User_Del($mysqli)
	{
		$Id 	= $_REQUEST['id']; // 用户的编号
		
		$sql = "DELETE FROM user WHERE user_id='".$Id."';";
		$result = $mysqli->query($sql);
		if($result)
		{
			header('Location: /main.php');
		}
	}
	
	// 编辑用户
	function User_Edit($mysqli)
	{
		$Id 	= $_REQUEST['id']; // 用户的编号
		$User	= $_REQUEST['user'];	// 用户的名称
		$Pwd	= $_REQUEST['pwd'];	// 用户的密码
		$Level	= $_REQUEST['level'];	// 用户的级别
		$Father	= $_REQUEST['father'];	// 用户的上级
		
		$sql  = "UPDATE user SET ";
		$sql .= "user_name='".$User."',";
		$sql .= "user_pwd='".$Pwd."',";
		$sql .= "user_level='".$Level."',";
		$sql .= "user_father='".$Father."'";
		$sql .= " WHERE ";
		$sql .= "user_id='".$Id."';";
		
		$result = $mysqli->query($sql);
		if($result)
		{
			echo('操作成功！<br />');
			echo('<a href="/main.php">返回</a>');
		}
	}
	
	// 添加收藏夹
	function Fav_Add($mysqli)
	{
		$Level = $_REQUEST['level'];
		$User_Id = $_REQUEST['user_id'];
		$Name = $_REQUEST['name'];
		$Desc = $_REQUEST['desc'];
		$Desc_Url = $_REQUEST['desc_url'];
		
		$Url1 = $_REQUEST['url1'];
		$Url1_Name = $_REQUEST['url1_name'];
		$Url1_Tip = $_REQUEST['url1_tip'];
		
		$Url2 = $_REQUEST['url2'];
		$Url2_Name = $_REQUEST['url2_name'];
		$Url2_Tip = $_REQUEST['url2_tip'];
		
		$Url3 = $_REQUEST['url3'];
		$Url3_Name = $_REQUEST['url3_name'];
		$Url3_Tip = $_REQUEST['url3_tip'];
		
		$Url4 = $_REQUEST['url4'];
		$Url4_Name = $_REQUEST['url4_name'];
		$Url4_Tip = $_REQUEST['url4_tip'];
		
		$Url5 = $_REQUEST['url5'];
		$Url5_Name = $_REQUEST['url5_name'];
		$Url5_Tip = $_REQUEST['url5_tip'];
		
		$sql  = "INSERT INTO fav SET ";
		$sql .= "user_id='".$User_Id."',";
		$sql .= "fav_name='".$Name."',";
		$sql .= "fav_desc='".$Desc."',";
		$sql .= "fav_desc_url='".$Desc_Url."',";
		$sql .= "fav_level='".$Level."',";
		$sql .= "fav_url1='".$Url1."',";
		$sql .= "fav_url1_name='".$Url1_Name."',";
		$sql .= "fav_url1_tip='".$Url1_Tip."',";
		
		$sql .= "fav_url2='".$Url2."',";
		$sql .= "fav_url2_name='".$Url2_Name."',";
		$sql .= "fav_url2_tip='".$Url2_Tip."',";
		
		$sql .= "fav_url3='".$Url3."',";
		$sql .= "fav_url3_name='".$Url3_Name."',";
		$sql .= "fav_url3_tip='".$Url3_Tip."',";
		
		$sql .= "fav_url4='".$Url4."',";
		$sql .= "fav_url4_name='".$Url4_Name."',";
		$sql .= "fav_url4_tip='".$Url4_Tip."',";
		
		$sql .= "fav_url5='".$Url5."',";
		$sql .= "fav_url5_name='".$Url5_Name."',";
		$sql .= "fav_url5_tip='".$Url5_Tip."'";
		
		$result = $mysqli->query($sql);
		if($result)
		{
			echo('操作成功！<br />');
			echo('<a href="/main.php">返回</a>');
		}
	}
	
	// 删除收藏夹
	function Fav_Del($mysqli)
	{
		$Id 	= $_REQUEST['id']; // 收藏夹的编号
		
		$sql = "DELETE FROM fav WHERE fav_id='".$Id."';";
		$result = $mysqli->query($sql);
		
		if($result)
		{
			header('Location: /main.php');
		}
	}
	
	// 编辑收藏夹
	function Fav_Edit($mysqli)
	{
		$Id = $_REQUEST['id']; // 收藏夹的编号
		$Level = $_REQUEST['level'];
		$User_Id = $_REQUEST['user_id'];
		$Name = $_REQUEST['name'];
		$Desc = $_REQUEST['desc'];
		$Desc_Url = $_REQUEST['desc_url'];
		
		$Url1 = $_REQUEST['url1'];
		$Url1_Name = $_REQUEST['url1_name'];
		$Url1_Tip = $_REQUEST['url1_tip'];
		
		$Url2 = $_REQUEST['url2'];
		$Url2_Name = $_REQUEST['url2_name'];
		$Url2_Tip = $_REQUEST['url2_tip'];
		
		$Url3 = $_REQUEST['url3'];
		$Url3_Name = $_REQUEST['url3_name'];
		$Url3_Tip = $_REQUEST['url3_tip'];
		
		$Url4 = $_REQUEST['url4'];
		$Url4_Name = $_REQUEST['url4_name'];
		$Url4_Tip = $_REQUEST['url4_tip'];
		
		$Url5 = $_REQUEST['url5'];
		$Url5_Name = $_REQUEST['url5_name'];
		$Url5_Tip = $_REQUEST['url5_tip'];
		
		$sql  = "UPDATE fav SET ";
		$sql .= "user_id='".$User_Id."',";
		$sql .= "fav_name='".$Name."',";
		$sql .= "fav_desc='".$Desc."',";
		$sql .= "fav_desc_url='".$Desc_Url."',";
		$sql .= "fav_level='".$Level."',";
		$sql .= "fav_url1='".$Url1."',";
		$sql .= "fav_url1_name='".$Url1_Name."',";
		$sql .= "fav_url1_tip='".$Url1_Tip."',";
		
		$sql .= "fav_url2='".$Url2."',";
		$sql .= "fav_url2_name='".$Url2_Name."',";
		$sql .= "fav_url2_tip='".$Url2_Tip."',";
		
		$sql .= "fav_url3='".$Url3."',";
		$sql .= "fav_url3_name='".$Url3_Name."',";
		$sql .= "fav_url3_tip='".$Url3_Tip."',";
		
		$sql .= "fav_url4='".$Url4."',";
		$sql .= "fav_url4_name='".$Url4_Name."',";
		$sql .= "fav_url4_tip='".$Url4_Tip."',";
		
		$sql .= "fav_url5='".$Url5."',";
		$sql .= "fav_url5_name='".$Url5_Name."',";
		$sql .= "fav_url5_tip='".$Url5_Tip."'";
		
		$sql .= " WHERE ";
		$sql .= "fav_id='".$Id."';";
		
		$result = $mysqli->query($sql);
		if($result)
		{
			echo('操作成功！<br />');
			echo('<a href="/main.php">返回</a>');
		}
	}
	
	// 添加消息
	function Msg_Add($mysqli)
	{
		$Writer = $_REQUEST['writer'];
		$Reader = $_REQUEST['reader'];
		$Text = $_REQUEST['text'];
		$Date_write = $_REQUEST['date_write'];
		$Date_read = $_REQUEST['date_read'];
		$Status = $_REQUEST['status'];
		$Type = $_REQUEST['type'];
		
		$sql  = "INSERT INTO msg SET ";
		$sql .= "msg_writer='".$Writer."',";
		$sql .= "msg_reader='".$Reader."',";
		$sql .= "msg_text='".$Text."',";
		$sql .= "msg_date_write='".$Date_write."',";
		if(!strcmp($Date_read,'')==0)$sql .= "msg_date_read='".$Date_read."',";
		$sql .= "msg_status='".$Status."',";
		$sql .= "msg_type='".$Type."'";
		
		$result = $mysqli->query($sql);
		if($result)
		{
			echo('操作成功！<br />');
			echo('<a href="/main.php">返回</a>');
		}
	}
	
	// 删除消息
	function Msg_Del($mysqli)
	{
		$Id 	= $_REQUEST['id']; // 消息的编号
		
		$sql = "DELETE FROM msg WHERE msg_id='".$Id."';";
		$result = $mysqli->query($sql);
		
		if($result)
		{
			header('Location: /main.php');
		}
	}
	
	// 编辑消息
	function Msg_Edit($mysqli)
	{
		$Id = $_REQUEST['id'];
		$Writer = $_REQUEST['writer'];
		$Reader = $_REQUEST['reader'];
		$Text = $_REQUEST['text'];
		$Date_write = $_REQUEST['date_write'];
		$Date_read = $_REQUEST['date_read'];
		$Status = $_REQUEST['status'];
		$Type = $_REQUEST['type'];
		
		$sql  = "UPDATE msg SET ";
		$sql .= "msg_writer='".$Writer."',";
		$sql .= "msg_reader='".$Reader."',";
		$sql .= "msg_text='".$Text."',";
		$sql .= "msg_date_write='".$Date_write."',";
		$sql .= "msg_date_read='".$Date_read."',";
		$sql .= "msg_status='".$Status."',";
		$sql .= "msg_type='".$Type."'";
		
		$sql .= " WHERE ";
		$sql .= "msg_id='".$Id."';";
		
		$result = $mysqli->query($sql);
		if($result)
		{
			echo('操作成功！<br />');
			echo('<a href="/main.php">返回</a>');
		}
	}