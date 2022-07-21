<?php

    include 'init/init.php';

    $task = new CTasks;
    if($task->middleware($_GET)){
        if($task->delete($_GET['id'])){
            header("Location: /ITsloution/admin/cat_index.php");
        } 
    }else{
        header("Location: /ITsolution/admin/cat_index.php");
    }

?>