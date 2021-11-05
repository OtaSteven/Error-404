<?php
//variable of server and database
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "projectaccount";
//=============================================

$conn = mysqli_connect($servername, $username, $password, $database_name);      //assign conn variable to the database


//now check the connection
if (!$conn)     //if the connection with the server fail
{
    die("Connection Failed:" . mysqli_connect_error());
}

if (isset($_POST['save']))      //When the button name 'save' is click on
{
    $name = $_POST['name'];     //gets data from the input name 'name'
    $link = $_POST['link'];     //gets data from the input name 'link'

    $sql_query = "INSERT INTO objectslist (name, link)
    VALUES ('$name', '$link')";           //This is where all the data we collected are stored into MySql database

    //If statements to make sure that the connection and our inputs are successfully inserted into the database
    if (mysqli_query($conn, $sql_query))
    {
        echo "New object entry inserted successfully!";
    }
    else
    {
        echo "Error" . mysqli_error($conn);
    }
    
    mysqli_close($conn);        //making sure to close the connection with MySql

    header("Location: Home2.php");   //Sending the user back to the login screen
    die();

}
?>
