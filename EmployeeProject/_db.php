<?php
    $conn = new mysqli('localhost','root','','employee');

    if($conn->connect_error){
        echo "Database Connect Error !!!";
    }
?>