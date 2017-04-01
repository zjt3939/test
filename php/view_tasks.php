<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>
        Current To-Do List
    </h2>
    <?php
        function make_list($parent){
            global $tasks;
            echo "<ol>";
            foreach($parent as $tasks_id=>$todo){
                echo "<li>$todo";
                if(isset($tasks[$tasks_id])){
                    make_list($tasks[$tasks_id]);
                }
                echo "</li>";
            }
            echo "</ol>";
        }
        require_once('../conn.php');
        $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $q = 'select task_id,parent_id,task from tasks 
                order by parent_id ,date_added ASC';
        $r = mysqli_query($dbc,$q);
        var_dump($r);
        $tasks = [];
        //list — 把数组中的值赋给一些变量 
        while(list($task_id,$parent_id,$task)=mysqli_fetch_array($r,MYSQLI_NUM)){
            $tasks[$parent_id][$task_id] = $task;
        }
        make_list($tasks[0]);
    ?>

</body>
</html>