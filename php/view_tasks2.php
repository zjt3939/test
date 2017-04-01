<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tasks2</title>
</head>
<body>
    <h2>Current To-Do-List</h2>
    <?php
        function make_list($parent){
            global $tasks;
            echo '<ol>';
            foreach($parent as $task_id=>$todo){
                echo <<<EOT
                <li><input type="checkbox" name="tasks[$task_id]" value="done">$todo
EOT;
                if(isset($tasks[$task_id])){
                    make_list($tasks[$task_id]);
                }
                echo '</li>';
            }
            echo '</ol>';
        }
        $dbc=mysqli_connect('localhost','root','00000000','weibo');
        if(($_SERVER['REQUEST_METHOD']=='post')&&isset($_POST['tasks'])&&is_array($_POST['tasks'])&&!empty($_POST['tasks'])){
            $q ='Update tasks set date_completed=Now() where task_id in (';
            foreach($_POST['tasks'] as $task_id=>$v){
                $q.=$task_id.',';
            }
            $q = substr($q,0,-2).',';
            $r = mysqli_query($dbc,$q);

            if(mysqli_affected_rows($dbc)==count($_POST['tasks'])){
                echo '<p>The tasks have been marked as completed!</p>';
            }else{
                echo '<p>Not all tasks could be marked as completed</p>';
            }
        }
        $q ='select task_id,parent_id,task from tasks where date_completed="0000-00-00 00:00:00" order by parent_id,date_added ASC';
        $r = mysqli_query($dbc,$q);
        $tasks = [];
        while(list($task_id,$parent_id,$task)=mysqli_fetch_array($r,MYSQLI_NUM)){
            $tasks[$parent_id][$task_id] = $task;
        }
        echo <<<EOT
        <p>
        check the box next to a task and click"Updata" to mark a task as completed</p>
        <form action="view_tasks2.php" method="post">
EOT;
    make_list($tasks[0]);
    echo <<<EOT
    <input type="submit" value="Update">
    </form>
EOT;
    ?>
</body>
</html>