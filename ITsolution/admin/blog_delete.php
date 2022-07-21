<?php

    include "init/init.php";

    $task = new Btasks;
    if($task->middleware($_GET)){
        if($task->delete($_GET['id'])){
            header("Location: /ITsolution/admin/blog_index.php");
        }
    }else{
        header("Location: /ITsolution/admin/blog_index.php");
    }

?>