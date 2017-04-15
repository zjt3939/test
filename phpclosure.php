<?php

//例一
//在函数里定义一个匿名函数，并调用它
// function printStr(){
//     $func = function($str){
//         echo $str;
//     };
//     $func('这是例一中的闭包');
// }

// printStr();

// echo "<br>";


//例二
//在函数中把匿名函数返回并调用
// function getPrintStrFunc(){
//     $func = function($str){
//         echo $str;
//     };
//     return $func;
// };
// //getPrintStrFunc()调用函数getPrintStrFunc，得到返回值为$func,然后$printFunc('string')，就相当于执行$func('string')
// $printFunc= getPrintStrFunc();
// $printFunc('这是闭包');


//例三
//把匿名函数当作参数传递，并且调用
// function callFunc($func){
//     $func('some string');
// };
/*
// $printStrFunc = function($str){
//     echo $str;
// };
// callFunc($printStrFunc);
//上面相当于执行下面的语句
*/

// callFunc(function($str){
//     echo $str;
// });

//连接闭包和外界变量的关键字:use
//闭包可以保存所在代码块上下文的一些变量和值。php在默认情况下，匿名函数不能调用所在代码块的上下文变量，而需要通过使用use关键字'

// function getMoney(){
//     $rmb = 1;
//     $doller = 6;
//     $func = function() use($rmb){
//         echo $rmb;
//         echo $doller;
//     };
//     $func();
// }
// getMoney();//结果可以输入1 而第二个值就把报undefined错

//use所引用的也只不过是变量的一个副本，所以在$func中更改$rmb的值，外面块的$rmb值不变'

// function getMoney(){
//     $rmb = 1;
//     $doller = 6;
//     $func = function() use($rmb){
//         $rmb+=1;
//         echo '$func中的$Rmb的值'.$rmb;//$func中的$Rmb的值2
//     };
//     $func();
//     echo "<br>";
//     echo 'getMoney中的$Rmb的值'.$rmb;//getMoney中的$Rmb的值1
   
// }
// getMoney();//结果可以输入1 而第二个值就把报undefined错

//如果想通过$func来改变getMoneny中的值的话，可以使用完全引用
// function getMoney(){
//     $rmb =1;
//     $func= function() use(&$rmb){
//     echo $rmb;
//     echo "<br>";
//         $rmb++;
//     };
//     $func();//1
//     echo $rmb;//2
    
// }

// getMoney();


// //如果将匿名函数返回给外界，匿名函数会保存use所引用的变量，而外界则不能得到这些变量，这样形成'闭包'概念会更加清晰
// function getMoneyFunc(){
//     $rmb =1;
//     $func =function() use(&$rmb){
//         echo $rmb;
//         //将$rmb++'
//         $rmb++;
//     };
//     return $func;
// };
// $getMoney =getMoneyFunc();
// $getMoney();//1
// $getMoney();//2
// $getMoney();//3
// $getMoney();//4

