<?php
// $studentID => array('name'=>'Name','grade'=>XX.X);
$students = array(
    256 => array('name' => 'Jon','grade' => 98),
    2 => array('name' => 'Vance','grade' => 85),
    9 => array('name' => 'Strphen','grade' => 94)
);

function name_sort($x,$y){
    return strcasecmp($x['name'],$y['name']);
}

function grade_sort($x,$y){
    return strcasecmp($x['grade'],$y['grade']);
}
uasort($students,'name_sort');
print_r($students);
echo '<br></br>';
uasort($students,'grade_sort');
print_r($students);
echo "<br><br>";
uksort($students,'grade_sort');
print_r($students);
echo "<br><br>";
function string_sort($x,$y){
    return strcasecmp($x['name'],$y['name']);
}
usort($students,'string_sort');
print_r($students);

