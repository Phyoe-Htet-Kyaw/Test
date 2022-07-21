<?php

include 'init/init.php';

$task = new Ttasks;
if($task->middleware($_GET)){
    if($task->delete($_GET['id'])){
        header("Location: /CMS/tag_index.php");
    } 
 }else{
    header("Location: /CMS/tag_index.php");
 }

?>