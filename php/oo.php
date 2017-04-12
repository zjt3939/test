<?php
class User{
    public $name;
    public $age;
    static $grade;

    function __construct(){
        $this->name = 'zjt';
        $this->age = 23;
        self::$grade =56;
    }
    final function getName(){
        echo $this->name;
    }
}

$zjt = new User();
echo $zjt->name;
echo '<br>';

$ztt =$zjt;
$ztt->name='ztt';
echo $ztt->name;
echo '<br>';
echo $zjt->name;
$a = 'name';
echo $ztt->$a;
echo $ztt::$grade;

$ztt->getName();