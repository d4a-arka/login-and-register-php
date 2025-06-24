<?php
    $hostname="localhost";
    $username="root";
    $password="";
    $database_name="tiket";

    $conn = mysqli_connect($hostname,$username,$password,$database_name);

    if ($conn->connect_error) {
        echo "Conn Error";
        die("error");
    } 
    echo "Conn Succes";