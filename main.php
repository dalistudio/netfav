<?php
/**
 * 版权所有 (c) 2014，保留所有权利。
 * NetFav 2.0
 *
 * 主页面
 */

include 'session.php';
include 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/Default.css" />
<title>我的网址</title>
</head>
<body>
<table class="tbl"  width="500" border="0">
  <tr>
    <th colspan="2">用户信息</th>
  </tr>
  <tr>
    <td width="50%" align="left"><div align="center">用户：
      <?=$_SESSION['name']?>
    </div></td>
    <td width="50%" align="right"><a href="reg.php?Type=chang">修改密码</a> | <a href="login.php?logout=yes">安全退出</a></td>
  </tr>
</table>

<br />

<table class="tbl" width="500" border="0">
  <tr>
    <th>网址分享</th>
  </tr>
  <tr>
    <td>
    <!-- 网址分享 -->
	<?php
		$sql = "SELECT * FROM fav WHERE user_id=".$_SESSION['father']." ORDER BY fav_level;"; 
		$result = $mysqli->query($sql); // 执行SQL语句
		
		print('<table width="100%" border="1">');
		print('<tr bgcolor="#cccccc">');
		print('<td width="25%" align="center">名称</td>');
		print('<td width="15%" align="center">地址1</td>');
		print('<td width="15%" align="center">地址2</td>');
		print('<td width="15%" align="center">地址3</td>');
		print('<td width="15%" align="center">地址4</td>');
		print('<td width="15%" align="center">地址5</td>');
		print('</tr>');
		print('</table>');
		
		while($row = $result->fetch_object())
		{
			print('<table width="100%" border="1">');
			print('<tr>');
			print('<td width="25%" align="center"><a href="http://'.$row->fav_desc_url.'" title="'.$row->fav_desc.'" target="_blank">'.$row->fav_name.'</a></td>');
			print('<td width="15%" align="center"><a href="http://'.$row->fav_url1.'" title="'.$row->fav_url1_tip.'" target="_blank">'.$row->fav_url1_name.'</a></td>');
			print('<td width="15%" align="center"><a href="http://'.$row->fav_url2.'" title="'.$row->fav_url2_tip.'" target="_blank">'.$row->fav_url2_name.'</a></td>');
			print('<td width="15%" align="center"><a href="http://'.$row->fav_url3.'" title="'.$row->fav_url3_tip.'" target="_blank">'.$row->fav_url3_name.'</a></td>');
			print('<td width="15%" align="center"><a href="http://'.$row->fav_url4.'" title="'.$row->fav_url4_tip.'" target="_blank">'.$row->fav_url4_name.'</a></td>');
			print('<td width="15%" align="center"><a href="http://'.$row->fav_url5.'" title="'.$row->fav_url5_tip.'" target="_blank">'.$row->fav_url5_name.'</a></td>');
			print('</tr>');
			print('</table>');
		}
	?>
    </td>
  </tr>
</table>

<br />

<table class="tbl" width="500" border="0">
  <tr>
    <th>我的网址</th>
  </tr>
  <tr>
    <td>
    <!-- 我的网址 -->
	<?php
		$sql = "SELECT * FROM fav WHERE user_id=".$_SESSION['id']." ORDER BY fav_level;"; 
		$result = $mysqli->query($sql); // 执行SQL语句
		
		print('<table width="100%" border="1">');
		print('<tr bgcolor="#cccccc">');
		print('<td width="25%" align="center">名称</td>');
		print('<td width="15%" align="center">地址1</td>');
		print('<td width="15%" align="center">地址2</td>');
		print('<td width="15%" align="center">地址3</td>');
		print('<td width="15%" align="center">地址4</td>');
		print('<td width="15%" align="center">地址5</td>');
		print('</tr>');
		print('</table>');
		
		while($row = $result->fetch_object())
		{
			print('<table width="100%" border="1">');
			print('<tr>');
			print('<td width="25%" align="center"><a href="http://'.$row->fav_desc_url.'" title="'.$row->fav_desc.'" target="_blank">'.$row->fav_name.'</a></td>');
			print('<td width="15%" align="center"><a href="http://'.$row->fav_url1.'" title="'.$row->fav_url1_tip.'" target="_blank">'.$row->fav_url1_name.'</a></td>');
			print('<td width="15%" align="center"><a href="http://'.$row->fav_url2.'" title="'.$row->fav_url2_tip.'" target="_blank">'.$row->fav_url2_name.'</a></td>');
			print('<td width="15%" align="center"><a href="http://'.$row->fav_url3.'" title="'.$row->fav_url3_tip.'" target="_blank">'.$row->fav_url3_name.'</a></td>');
			print('<td width="15%" align="center"><a href="http://'.$row->fav_url4.'" title="'.$row->fav_url4_tip.'" target="_blank">'.$row->fav_url4_name.'</a></td>');
			print('<td width="15%" align="center"><a href="http://'.$row->fav_url5.'" title="'.$row->fav_url5_tip.'" target="_blank">'.$row->fav_url5_name.'</a></td>');
			print('</tr>');
			print('</table>');
		}
	?>
    </td>
  </tr>
</table>
</body>
</html>