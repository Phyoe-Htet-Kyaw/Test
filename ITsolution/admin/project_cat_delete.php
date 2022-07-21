<?php

    include 'init/init.php';

    $task = new Procategory;
    if($task->middleware($_GET)){
        if($task->delete($_GET['id'])){
            header("Location: /ITsolution/admin/project_category.php");
        } 
    }else{
        header("Location: /ITsolution/admin/project_category.php");
    }

?>