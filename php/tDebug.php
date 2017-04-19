<?php
trait tDebug{

    public function dumpObject(){
        $class = get_class($this);
        $attribute = get_object_vars($this);
        $mothods = get_class_methods($this);
        echo "Information about the $class object";
        echo "<h3>Attribute</h3><ul>";
        foreach($attribute as $k=>$v){
            echo "<li>$k:$v</li>";
        }
        echo "</ul>";

        echo "<h3>Methods</h3><ul>";
        foreach($methods as $v){
            echo "<li>$v</li>";
        }   
        echo "</ul>";
    }


}