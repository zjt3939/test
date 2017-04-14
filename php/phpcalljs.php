<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="phpcalljs.php" methods="post" >
        <input type="text" name="a" value="1">
        <input type="submit" value="触发">

    </form>
    <?php
            echo '<script>
            window.onload = function(){
                alert("1");
            }
            </script>';
    ?>
</body>
</html>