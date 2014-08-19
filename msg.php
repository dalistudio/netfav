<?php
	include 'session.php';
	include 'conn.php';
	include 'netfav.php';

	$Text = $_REQUEST['text'];
	
	date_default_timezone_set('PRC');//其中PRC为“中华人民共和国”
	$datetime = strtotime("now"); // 获得当前日期
	$mysqldate = date("Y-m-d H:i:s", $datetime); // 转换为指定格式的字符串
	
	$nf = new NetFav();
	$nf->Msg_Add($_SESSION['id'], $_SESSION['father'], $Text, $mysqldate, '', 0, 0); // 状态为0表示未读，类型为0表示普通
	
	header("Content-Type: text/html; charset=UTF-8");
	echo('操作成功！<br />');
	echo('<a href="/main.php">返回</a>');