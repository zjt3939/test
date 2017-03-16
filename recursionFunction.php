<?php
// function list_dir($start){
//     $content = scandir($start);
//     //scandir()函数 函数返回指定指定的目录中的文件和目录的数组
//     foreach($content as $item){
//         //is_dir()函数检查指定的文件是否是目录（如果文件名存在并且为目录则返回true）
//         if(is_dir("$start/$item")&&(substr($item,0,1)!='.')){
//             list_dir("$start/$item");

//         }else{

//         }
//     }
// }
// list_dir('.');

$a = array(
    'key1'=>'value1',
    'key2'=>'value2',
    'key3'=>'value3',
    'key4'=>'value',
);
foreach($a as $key=>$value){
    $b[$key]=$value;
}
print_r($b);