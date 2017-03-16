<?php
header("Content-type:text/html;charset=utf8");
define('DB_USER','root');
define('DB_PASSWORD','00000000');
define('DB_HOST','localhost');
define('DB_NAME','weibo');

// // 连接数据库
// $conn = @mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('数据库连接失败'.mysql_error());

// // 选择所需要的数据库
// mysql_select_db(DB_NAME,$conn)or die('数据库错误,错误信息：'.mysql_error());

// // 设置字符编码
// mysql_query('SET NAMES UTF8')or die('SQL错误，错误信息：'.mysql_error());
