<?php
$test = $_GET['test'];
$ary ='';
foreach($test as $te){
	$ary .= $te;
}


echo $ary;