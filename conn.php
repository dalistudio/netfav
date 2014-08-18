<?php
/**
 * 版权所有 (c) 2014，保留所有权利。 
 * NetFav 2.0
 * 
 * 数据库连接
 */

$HOST = "127.0.0.1";	// MySQL Server IP 地址
$PORT = "3306";			// MySQL 服务的端口
$USER = "root";			// MySQL 数据库的用户名
$PWD  = "wdl1031";		// MySQL 数据库用户的密码
$DB   = "netfav2";		// MySQL 选择的数据库

// 创建 MySQLi 并连接数据库
$mysqli = new mysqli();
$mysqli->connect($HOST, $USER, $PWD, $DB, $PORT);