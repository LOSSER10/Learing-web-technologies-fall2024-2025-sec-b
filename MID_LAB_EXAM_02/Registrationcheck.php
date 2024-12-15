<?php

    

    $file_name =  $_FILES['myfile']['name'];
   
    $src = $_FILES['myfile']['tmp_name'];
    $des = "upload/". $file_name;

    if(move_uploaded_file($src, $des)){
        echo "success";
    }else{
        echo "error";
    }
?>