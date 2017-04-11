<?php
//开始定义类
class HelloWorld{
    //开始定义第一个方法
    function sayHello($language='English'){
        echo '<p>';
        switch($language){
            case 'Dutch':
                echo 'Hello ,wereld';
                break;
            case 'French':
                echo 'bonjour,mondel';
                break;
            case 'German':
                echo 'Hallo,Welt';
                break;
            default:
                echo 'Hellp,world';
                break;
        }
        echo '</p>';
    }

}