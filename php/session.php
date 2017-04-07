<?php
//将db_sessions.inc.php包含进来
require('db_sessions.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>创建新的会话</title>
</head>
<body>
    <?php
        if(empty($_SESSION)){
            $_SESSION['blah'] = 'umwwlaut';
            $_SESSION['this'] = 36158888.89;
            $_SESSION['that'] = 'blwwwue';
            echo '<p>Session data stored.</p>';
        }else{
            echo '<p>Session Data Exists: <pre>'.print_r($_SESSION,1).'</pre></p>';
        }

        if(isset($_GET['logout'])){
            session_destroy();
            echo ' <p>Sesson destroyed</p>';
        }else{
            echo ' <a href="session.php?logout =true">Log Out</a>';
        }
        echo '<p>Session Data: <pre>'.print_r($_SESSION).'</pre></p>';
    echo '</body>';
    echo '</html>';
    session_write_close();
    ?>