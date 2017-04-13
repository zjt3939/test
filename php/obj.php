<?php
class User{
    public static $name = 'ffff';
    function __construct(){
        self::doThis();
        echo self::$name;
    }

    private function doThis(){
        echo "done";
    }
}

$var = new User();
