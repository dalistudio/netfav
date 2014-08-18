<?php
/**
 * 版权所有 (c) 2014，保留所有权利。
 * NetFav 2.0
 *
 * 会话
 */
ini_set('session.name',"SID"); 			// 设置会话名称
ini_set('session.use_cookies',1);		// 使用cookies方式传播SID
ini_set('session.use_only_cookies',1);	// 只是用cookies方式
session_start();
