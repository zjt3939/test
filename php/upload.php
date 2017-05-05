<?php
    // var_dump($_FILES['file']);
    // var_dump($_FILES, $_POST); 
    if(is_uploaded_file($_FILES['userfile']['tmp_name'])){
		// echo "上传的临时文件已经找到，等待移动中";
        move_uploaded_file($_FILES['userfile']['tmp_name'],'D:/xampp/img/'.$_FILES['userfile']['name']);
	}else{
		echo "在临时文件夹中找不到上传的文件";
	}

?>