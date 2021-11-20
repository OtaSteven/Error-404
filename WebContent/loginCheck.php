<?php
session_start();

require_once 'db_conn.php';


if (isset($_POST['save']))
{
    //Getting values from login.html
    $name = $_POST['user'];
    $pass = $_POST['pass'];

    // write query for all entry_details
    $sql = "Select * from entry_details where (username = '$name' OR email = '$name') and password = '$pass'";
    // make query and get result
    $result = mysqli_query($conn, $sql);
    
    if ($result->num_rows > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['Type'] = $row['Type'];

        //print_r($row);       //prints out all the data in $row (a certain row in the database)
        header("Location: Home.php");
        exit();
    }
    else
    {
        echo("Error with user log in");
        header("Location: login.html?error=login");
        exit();
    }
     
}
?>
