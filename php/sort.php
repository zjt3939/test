<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sort</title>
</head>
<body>
    <?php
        $students = array(
            256=>array('name'=>'Jon','grade'=>98.5),
            2=>array('name'=>'Vance','grade'=>87),
            112=>array('name'=>'nce','grade'=>7)
        );
        function name_sort($x,$y){
            static $count = 1;
            echo "<p>Iteration $count:{$x['name']}vs.{$y['name']}</p>\n";
            $count++;
            return strcasecmp($x['name'],$y['name']);
        }

        function grade_sort($x,$y){
            static $count = 1;
            echo "<p>Iteration $count:{$x['grade']}vs.{$y['grade']}</p>\n";
            $count++;
            return ($x['grade']<$y['name']);
        }

        //sort by name
        uasort($students,'name_sort');
        echo "<h2>Array Sorted By name</h2><pre>".print_r($students)."</pre>";

        //sort by grade_sort
        uasort($students,'grade_sort');
        echo "<h2>Array Sorted By grade</h2><pre>".print_r($students)."</pre>";
        
    ?>
</body>
</html>