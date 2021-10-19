<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "projectuser";

$conn = mysqli_connect($servername, $username, $password, $database_name);
//now check the connection
if (!$conn)
{
    die("Connection Failed:" . mysqli_connect_error());
}

if (isset($_POST['save']))
{
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql_query = "INSERT INTO entry_details (username, email, password)
    VALUES ('$name', '$email', '$pass')";

    if (mysqli_query($conn, $sql_query))
    {
        echo "New Details Entry inserted successfully!";
    }
    else
    {
        echo "Error" . mysqli_error($conn);
    }
    
    mysqli_close($conn);

    header("Location: http://localhost:8080/login.html");
    die();
}
?>
