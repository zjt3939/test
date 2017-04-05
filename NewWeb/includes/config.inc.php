<?php
/* 
    网站配置文件
*/

//Errors are emailed header_register_callback
$contact_email = 'zjt3939@163.com';

// 假如是在本地运行
$host = substr($_SERVER['HTTP_HOST'],0,5);
if(in_array($host,['local','127.0','192.1'])){
    $local  = TRUE;
}else{
    $local = FALSE;
}

if($local){
    $debug = true;
    //URI是资源表示符
    define('BASE_URI','path/to/html/folder');
    define('BASE_URL,'http://localhost/tt/NewWeb/');
    define('DB','path/to/live/mysql.inc.php');
}else{
    define('BASE_URI','path/to/html/folder');
    define('BASE_URL,'http://www.example.com/');
    define('DB','path/to/live/mysql.inc.php');
}

/*if($p=='thismodule')$debug =TRUE;
require('./includes/config.inc.php');

$debug = TRUE;
*/
if(!isset($debug)){
    $debug = FALSE;
}

function my_error)handler($e_number,$e_message,$e_file,$e_line,$e_vars){
    global $debug,$contact_email;
    $message = "An error occurred in script '$e_file' on line $e_line:$e_message";
    $message.=print_r($e_vars);
    if($debug){
        echo '<div class="error">'.$message.'</div>';
        //打印一条php回溯
        debug_print_backtrace();
    }else{
        //发送错误信息到某个地方
        error_log($message,1,$contact_email);//send email
        if(($e_number !=E_NOTICE)&&($e_number<2048)){
            echo '<div class="error">a system error occured,we apologize for the inconvenience</div>';
        
        }
    }
}
set_error_handler('my_error_handler');