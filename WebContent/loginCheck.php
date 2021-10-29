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

//Getting values from login.html
$name = $_POST['Username'];
$pass = $_POST['Password'];

//Preventing MySql injection (so that these varaibles won't be inserted into the database)
$name = stripslashes($name);
$pass = stripslashes($pass);

//Select database
$sql = "SELECT * FROM entry_details";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
/* echo "Name: " . $name . " Password: " . $pass;
Checking what row gets from database
while($row = mysqli_fetch_assoc($result)) 
{
    echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["password"]. "<br>";
}
*/

if ($row['username'] == $name && $row['password'] == $pass)
{
    //echo "Login success! Welcome " .$row['username'];
    header("Location: http://localhost:8080/Home.html");
    exit();
}
else
{
    header("Location: http://localhost:8080/login.html");
    exit();
}
?>
