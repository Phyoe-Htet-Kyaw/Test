<?php

    include "init/init.php";

    $task = new Btasks;
    if($task->middleware($_GET)){
        if($task->delete($_GET['id'])){
            header("Location: /CMS/blog_index.php");
        }
    }else{
        header("Location: /CMS/blog_index.php");
    }

?>