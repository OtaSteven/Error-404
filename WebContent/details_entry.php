<?php

require_once 'db_conn.php';

if (isset($_POST['save']))      //When the button name 'save' is click on
{
    $name = $_POST['username'];     //gets data from the input name 'username'
    $email = $_POST['email'];       //gets data from the input name 'email'
    $pass = $_POST['password'];     //gets data from the input name 'password'
    $type = $_POST['userType'];     //gets data from the input name 'userType'

    $sql_query = "INSERT INTO entry_details (username, email, password, type)
    VALUES ('$name', '$email', '$pass', '$type')";           //This is where all the data we collected are stored into MySql database

    //If statements to make sure that the connection and our inputs are successfully inserted into the database
    if (mysqli_query($conn, $sql_query))
    {
        echo "New Details Entry inserted successfully!";
    }
    else
    {
        echo "Error" . mysqli_error($conn);
    }
    
    mysqli_close($conn);        //making sure to close the connection with MySql

    header("Location: Confirmation.html");   //Sends the user to the confirmation screen
    die();

}
?>
