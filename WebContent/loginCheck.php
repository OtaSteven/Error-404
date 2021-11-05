<?php
session_start();
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
if (isset($_POST['save']))
{
    //Getting values from login.html
    $name = $_POST['user'];
    $pass = $_POST['pass'];

    // write query for all entry_details
    $sql = "Select * from entry_details where username = '$name' and password = '$pass'";
    // make query and get result
    $result = mysqli_query($conn, $sql);
    
    if ($result->num_rows > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        header("Location: /Home2.php");
        exit();
    }
    else
    {
        echo("Error with user log in");
        header("Location: /login.html?error=login");
        exit();
    }
     
}
?>
