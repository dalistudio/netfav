<?php
/**
 * 版权所有 (c) 2014，保留所有权利。
 * NetFav 2.0
 *
 * 收藏夹操作页面
 */
	include 'session.php';
	include 'conn.php';

	$Action = $_REQUEST['action'];
	$Id   = $_REQUEST['id'];
	
	switch($Action)
	{
		case 'del':
			FavDel($mysqli);
			break;
		case 'edit':
			FavEdit($mysqli);
			break;
		case 'add':
			FavAdd($mysqli);
			break;
	}
	
	function FavDel($mysqli)
	{
		global $Id;
		$sql = "SELECT * FROM fav WHERE user_id=".$_SESSION['id']." and fav_id=".$Id." ORDER BY fav_level;";
		
		$result = $mysqli->query($sql); // 执行SQL语句
		$row = $result->fetch_object();

		print('
				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<link rel="stylesheet" type="text/css" href="css/Default.css" />
				<title>我的网址</title>
				</head>
				<body>
				<table class="tbl" width="600" border="1">
				<tr><th colspan="6">网址</th></tr>
				<tr bgcolor="#cccccc">
				<td width="25%" align="center">名称</td>
				<td width="15%" align="center">地址1</td>
				<td width="15%" align="center">地址2</td>
				<td width="15%" align="center">地址3</td>
				<td width="15%" align="center">地址4</td>
				<td width="15%" align="center">地址5</td>
				</tr>
				<tr>
				<td width="25%" align="center">'.$row->fav_name.'</td>
				<td width="15%" align="center">'.$row->fav_url1_name.'</td>
				<td width="15%" align="center">'.$row->fav_url2_name.'</td>
				<td width="15%" align="center">'.$row->fav_url3_name.'</td>
				<td width="15%" align="center">'.$row->fav_url4_name.'</td>
				<td width="15%" align="center">'.$row->fav_url5_name.'</td>
				</tr>
				</table>
				<br />
				<form action="api.php" method="post">
				是否真的删除这条记录?<br /><input type="submit" value="删除记录" />&nbsp;&nbsp;&nbsp;&nbsp;<a href="main.php">或者返回</a>
				<input type="hidden" name="action" value="fav_del"><input type="hidden" name="id" value="'.$Id.'">
				</form>
				</body>
				</html>
				');
		
	}
	
	function FavEdit($mysqli)
	{
		global $Id;
		$sql = "SELECT * FROM fav WHERE user_id=".$_SESSION['id']." and fav_id=".$Id." ORDER BY fav_level;";
		
		$result = $mysqli->query($sql); // 执行SQL语句
		$row = $result->fetch_object();
		print('
				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<link rel="stylesheet" type="text/css" href="css/Default.css" />
				<title>我的网址</title>
				</head>
				<body>
				<table class="tbl" width="600" border="1">
				<tr><th colspan="6">编辑网址</th></tr>
				<tr bgcolor="#cccccc">
				<td width="25%" align="center">名称</td>
				<td width="15%" align="center">地址1</td>
				<td width="15%" align="center">地址2</td>
				<td width="15%" align="center">地址3</td>
				<td width="15%" align="center">地址4</td>
				<td width="15%" align="center">地址5</td>
				</tr>
				<tr>
				<td width="25%" align="center">'.$row->fav_name.'</td>
				<td width="15%" align="center">'.$row->fav_url1_name.'</td>
				<td width="15%" align="center">'.$row->fav_url2_name.'</td>
				<td width="15%" align="center">'.$row->fav_url3_name.'</td>
				<td width="15%" align="center">'.$row->fav_url4_name.'</td>
				<td width="15%" align="center">'.$row->fav_url5_name.'</td>
				</tr>
				</table>
				<br />
				
				<form action="api.php?action=fav_edit" method="post">
				<table class="tbl">
				<tr>
				<th colspan="2">编辑收藏夹</th>
				</tr>
				<tr>
				<tr>
				<td>收藏夹编号：</td>
				<td><input type="text" id="id" name="id" value="'.$row->fav_id.'" readonly="readonly" /> 只读，不能修改</td>
				</tr>
				<tr>
				<td>用户编号：</td>
				<td><input type="text" id="user_id" name="user_id" value="'.$row->user_id.'" readonly="readonly" /> 只读，不能修改</td>
				</tr>
				<tr>
				<td>网站名称：</td>
				<td><input type="text" id="name" name="name" value="'.$row->fav_name.'" /> 最好不要超过8个中文字</td>
				</tr>
				<tr>
				<td>网站描述：</td>
				<td><input type="text" id="desc" name="desc" value="'.$row->fav_desc.'" /> 鼠标停留在网址名上时，自动提示的内容。</td>
				</tr>
				<tr>
				<td>描述网址：</td>
				<td><input type="text" id="desc_url" name="desc_url" value="'.$row->fav_desc_url.'" /> 点击网站名称时跳转的内容，可作为介绍。</td>
				</tr>
				<tr>
				<td>排序：</td>
				<td><input type="text" id="level" name="level" value="'.$row->fav_level.'" /> 显示网址时的顺序，数值小的排在前面。</td>
				</tr>
				<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				</tr>
				<tr>
				<td></td>
				<td>
				<table width="100%"><tr><td align="center">名称</td><td align="center">地址</td><td align="center">提示</td></tr></table>
				</td>
				</tr>
				<tr>
				<td>网址1：</td>
				<td><input type="text" id="url1_name" name="url1_name" value="'.$row->fav_url1_name.'" /><input type="text" id="url1" name="url1" value="'.$row->fav_url1.'" /><input type="text" id="url1_tip" name="url1_tip" value="'.$row->fav_url1_tip.'" /></td>
				</tr>
				<tr>
				<td>网址2：</td>
				<td><input type="text" id="url2_name" name="url2_name" value="'.$row->fav_url2_name.'" /><input type="text" id="url2" name="url2" value="'.$row->fav_url2.'" /><input type="text" id="url2_tip" name="url2_tip" value="'.$row->fav_url2_tip.'" /></td>
				</tr>
				<tr>
				<td>网址3：</td>
				<td><input type="text" id="url3_name" name="url3_name" value="'.$row->fav_url3_name.'" /><input type="text" id="url3" name="url3" value="'.$row->fav_url3.'" /><input type="text" id="url3_tip" name="url3_tip" value="'.$row->fav_url3_tip.'" /></td>
				</tr>
				<tr>
				<td>网址4：</td>
				<td><input type="text" id="url4_name" name="url4_name" value="'.$row->fav_url4_name.'" /><input type="text" id="url4" name="url4" value="'.$row->fav_url4.'" /><input type="text" id="url4_tip" name="url4_tip" value="'.$row->fav_url4_tip.'" /></td>
				</tr>
				<tr>
				<td>网址5：</td>
				<td><input type="text" id="url5_name" name="url5_name" value="'.$row->fav_url5_name.'" /><input type="text" id="url5" name="url5" value="'.$row->fav_url5.'" /><input type="text" id="url5_tip" name="url5_tip" value="'.$row->fav_url5_tip.'" /></td>
				</tr>
				<tr>
				<td></td>
				<td><input type="submit" value="提交" /></td>
				</tr>
				</table>
				</form>
				</body>
				</html>
				');
	}
	
	function FavAdd($mysqli)
	{
		print('
				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<link rel="stylesheet" type="text/css" href="css/Default.css" />
				<title>我的网址</title>
				</head>
				<body>
				
				<form action="api.php?action=fav_add" method="post">
				<table class="tbl">
				<tr>
				<th colspan="2">添加收藏夹</th>
				</tr>
				<tr>
				<td>用户编号：</td>
				<td><input type="text" id="user_id" name="user_id" value="'.$_SESSION['id'].'" readonly="readonly" /> 只读，不能修改</td>
				</tr>
				<tr>
				<td>网站名称：</td>
				<td><input type="text" id="name" name="name" /> 最好不要超过8个中文字</td>
				</tr>
				<tr>
				<td>网站描述：</td>
				<td><input type="text" id="desc" name="desc" /> 鼠标停留在网址名上时，自动提示的内容。</td>
				</tr>
				<tr>
				<td>描述网址：</td>
				<td><input type="text" id="desc_url" name="desc_url" /> 点击网站名称时跳转的内容，可作为介绍。</td>
				</tr>
				<tr>
				<td>排序：</td>
				<td><input type="text" id="level" name="level" /> 显示网址时的顺序，数值小的排在前面。</td>
				</tr>
				<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
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
				<td><input type="text" id="url4_name" name="url4_name" value="'.$row->fav_url4_name.'" /><input type="text" id="url4" name="url4" value="'.$row->fav_url4.'" /><input type="text" id="url4_tip" name="url4_tip" value="'.$row->fav_url4_tip.'" /></td>
				</tr>
				<tr>
				<td>网址5：</td>
				<td><input type="text" id="url5_name" name="url5_name" value="'.$row->fav_url5_name.'" /><input type="text" id="url5" name="url5" value="'.$row->fav_url5.'" /><input type="text" id="url5_tip" name="url5_tip" value="'.$row->fav_url5_tip.'" /></td>
				</tr>
				<tr>
				<td></td>
				<td><input type="submit" value="提交" /></td>
				</tr>
				</table>
				</form>
				</body>
				</html>
				');
	}