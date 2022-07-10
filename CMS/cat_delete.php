<?php

    include 'init/init.php';

    $task = new CTasks;
    if($task->middleware($_GET)){
        if($task->delete($_GET['id'])){
            header("Location: /CMS/cat_index.php");
        } 
    }else{
        header("Location: /CMS/cat_index.php");
    }

?>