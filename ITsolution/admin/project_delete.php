<?php

    include "init/init.php";

    $task = new Projects;
    if($task->middleware($_GET)){
        if($task->delete($_GET['id'])){
            header("Location: /ITsolution/admin/project_index.php");
        }
    }else{
        header("Location: /ITsolution/admin/project_index.php");
    }

?>