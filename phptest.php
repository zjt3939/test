<?php
Class test{
    public $name='zzzz';
    public function getname(){
        echo $this->name;
    }


}

$test1 =new test();
$test1->getname();