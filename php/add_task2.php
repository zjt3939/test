<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add_task2</title>
</head>
<body>
    <?php
        $dbc =mysqli_connect('localhost','root','00000000','weibo');
        if(($_SERVER['REQUEST_METHOD']=='POST')&&!empty($_POST['task'])){
            if(isset($_POST['parent_id'])&&filter_var($_POST['parent_id'],FILTER_VALIDATE_INT,['min_range'=>1])){
                $parent_id = $_POST['parent_id'];
            }else{
                $parent_id =0;
            }

            $q =sprintf("insert into tasks (parent_id,task) values (%d,'%s')",$parent_id,mysqli_real_escape_string($dbc,strip_tags($_POST['task'])));
            $r = mysqli_query($dbc,$q);

            if(mysqli_affected_rows($dbc)==1){
                echo "<p>The task has been added</p>";
            }else{
                echo '<p>The task could not be added</p>';
            }
            
        }
        echo '<form action="add_task2.php" method="post">
        <fieldset>
            <legend>Add a Task</legend>
            <p>Task: <input type="text" name="task" size="60" maxlength="100"></p>
            <p>Parent Task: <select name="parent_id" id=""> <option value="0">None</option>';
        $q = 'select  task_id,parent_id,task from tasks where date_completed="0000-0000 00:00:00" order by date_added ASC';
        $r =mysqli_query($dbc,$q);
        $tasks =[];
        while(list($task_id,$parent_id,$task)=mysqli_fetch_array($r,MYSQLI_NUM)){
            echo "<option value=\"$task_id\">$task<option/>\n";
            $tasks[] = ['task_id'=>$task_id,'parent_id'=>$parent_id,'task'=>$task];
        } 
        echo '</select></p>
        <input type="submit" value="Add this task" name="submit">
        </fieldset>
        </form>';
    ?>
</body>
</html>