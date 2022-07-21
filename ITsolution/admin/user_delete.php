<?php

    include "init/init.php";

    $task = new Utasks;
    if($task->middleware($_GET)){
        if($task->delete($_GET['id'])){
            header("Location: /ITsolution/admin/user_index.php");
        }
    }else{
        header("Location: /ITsolution/admin/user_index.php");
    }

?>