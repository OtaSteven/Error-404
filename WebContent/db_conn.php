<?php

//variable of server and database
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "projectaccount";      //The name, "projectaccount", can be replace to what your folder name is in phpMyAdmin
//=============================================

$conn = mysqli_connect($servername, $username, $password, $database_name);      //assign conn variable to the database


//now check the connection
if (!$conn)     //if the connection with the server fail
{
    die("Connection Failed:" . mysqli_connect_error());
}

?>