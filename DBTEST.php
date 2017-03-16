<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        require_once('conn.php');
        $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    // $query ='desc tasks';
    // $result = @mysql_query($query) or die('sql错误'.mysql_error());
    // print_r(mysql_fetch_array($result,MYSQL_ASSOC));
        if(($_SERVER['REQUEST_METHOD']=='POST')&&!empty($_POST['task'])){

            // filter_var:函数通过指定的过滤器过滤变量。第一个参数为变量,第二个参数为郭陆琪ID,也就是过滤的方式,第三个是过滤器选项，下面是定义了最小值为1
            if(isset($_POST['parent_id'])&&filter_var($_POST['parent_id'],FILTER_VALIDATE_INT,array('min_range'=>1))){
                $parent_id = $_POST['parent_id'];
            }else{
                $parent_id = 0;
            }

            // 对字符串做安全检查
            //mysqli_real_escape_string()函数转义SQL语句中使用的字符串中的特殊字符
            //第一个参数是必须，规定要转义的字符串
            //第二个参数可选。，规定MySQL连接。如果为规定则使用上一次的连接
            $task = mysqli_real_escape_string($dbc,strip_tags($_POST['task']));

            //添加到数据库
            $q = "insert into tasks (parent_id,task) values($parent_id,'$task')";
            // mysqli_query()函数 对数据库执行查询，成功返回一个mysqli_result对象,失败返回false
            //第一个参数为数据的连接，必须
            //第二个参数为查询的语句
            $r = mysqli_query($dbc,$q);

            //上报查询操作的结果
            //mysqli_affected_rows()函数返回先前的select,insert,update,replac或delete查询中受影响的行数
            //参数为数据库连接，返回值，整数>0表示所受影响的行数的总数，0表示没有记录受到影响,-1表示查询错误
            if(mysqli_affected_rows($dbc)==1){
                echo '<p>The task has been added!</p>';
            }else{
                echo '<p>The task could not be added！</p>';
            }
        }

        //end of submission IF
        echo '
            <form action="DBTEST.php" method="post">
                <fieldset>
                    <legend>ASS a task</legend>
                    <p>Task: <input type="text" name="task" size="60" maxlength="100" require></p>
                    <p>Parent Task:
                        <select name="parent_id">
                            <option value="0">None</option>';
        $q = 'select task_id,parent_id,task from tasks where date_completed="0000-00-00 00:00L00" order by date_added ASC';
        $r = mysqli_query($dbc,$q);
        $task = array();

        while(list($task_id,$parent_id,$task) = mysqli_fetch_array($r,MYSQLI_NUM)){
            echo "<option value=\"$task_id\">$task</option>\n";
            $tasks[] = array(
                'task_id'=>$task_id,
                'parent_id'=>$parent_id,
                'task' =>$task
            );
        }
        echo '
                        </select>
                    </p>
                    <input type="submit" value="Add This Task" name="submit">
                </fieldset>
            </form>';

        //根据parent_id 对任务进行排序
        function parent_sort($x,$y){
            return ($x['parent_id']>$y['parent_id']);
        }
        usort($tasks,'parent_sort');

        //显示所有的task
                
        echo '<h2>Curent To-do List</h2><ul>';
        foreach($tasks as $task){
            echo "<li>{$task['task']}</li>\n";
        }
        echo '</ul>';

    ?>

</body>
</html>