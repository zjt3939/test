<?php
    //$sdbc将保存数据库连接。我们对此对其初始化，然后在每个函数里让它成为全局变量。
    $sdbc = NULL;

    //定义打开会话的函数
    function open_session(){
        global $sdbc;
        $sdbc = mysqli_connect('localhost','root','00000000','sessionDb');
        return true;
    }

    //定义关闭会话的函数
    function close_session(){
        global $sdbc;
        return mysqli_close($sdbc);
    }

    //定义读取会话数据的函数
    function read_session($sid){
        global $sdbc;
        $q = sprintf('select data from sessions where id="%s"',mysqli_real_escape_string($sdbc,$sid));
        $r = mysqli_qurey($sdbc,$q);
        if(mysqli_num_rows($r)==1){
            list($data) = mysqli_fetch_array($r,MYSQLI_NUM);
            return $data;
        }else{
            return '';
        }
    }
    
    //定义向数据库写入数据的函数
    function write_session($sid,$data){
        global $sdbc;
        $q = sprintf('replace into sessions(id,data) values("%s","%s")',mysqli_real_escape_string($sdbc,$sid),
        mysqli_real_escape_string($sdbc,$data));
        $r = mysqli_query($sdbc,$q);
        return true;
    }

    //创建销毁会话数据的函数
    function destroy_session($sid){
        global $sdbc;
        $q = sprintf('delete from sessions where id ="%s"',mysqli_real_escape_string($sdbc,$sid));
        $r = mysqli_query($sdbc,$q);
        $_SESSION = [];
        return true;
    }

    //定义垃圾回收函数
    function clean_session($expire){
        global $sdbc;
        $q = sprintf('delete from sessions where date_add(last_accessed,interval %d second)<now()',(int)$expire);
        $r = mysqli_query($sdbc,$q);
        return true;
    }


    //php使用会话处理函数
    session_set_save_handler('open_session','close_session','read_session','write_session','destroy_session','clean_session');

    //启动会话
    session_start();