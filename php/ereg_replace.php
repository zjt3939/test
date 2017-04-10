<?php
$string = "This is a test";
echo str_replace(" is"," was",$string);
echo "<br>";
echo ereg_replace("( )is","\\1was",$sting);
echo "<br>";
echo ereg_replace("(( )is)"."\\2waws",$string);
/*This was a test
This was a test
This was a test*/