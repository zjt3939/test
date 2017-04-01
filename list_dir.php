<?php
$arr = [];
function list_dir($start){
    //scandir — 列出指定路径中的文件和目录
    $arr[] =$start;
    $contents = scandir($start);
    foreach($contents as $item){
        // is_dir — 判断给定文件名是否是一个目录
        //判断"$start/$item"是一个目录并且$item不是.开头，然后递归遍历该目录
        if(is_dir("$start/$item")&&(substr($item,0,1)!='.')){
            list_dir("$start/$item");
        }else{

        }
    } 
}

list_dir('.');
