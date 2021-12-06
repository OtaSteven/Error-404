<?php
session_start();
require_once 'db_conn.php';
require_once "function.php";

if(!isset($_GET['row_id'])){
    // redirect to show page
    die('id not provided');
}
$id =  $_GET['row_id'];

$result = mysqli_query($conn, "SELECT * FROM entry_details where ID = $id");

if($result->num_rows != 1){
    // redirect to show page
    die('id is not in db');
}

$data = $result->fetch_assoc();

print_r($data);

$userSet1 = $_SESSION['set1'];
$userSet2 = $_SESSION['set2'];
$userSet3 = $_SESSION['set3'];

echo "<br>";
print_r($userSet1);
echo "<br>";
print_r($userSet2);
echo "<br>";
print_r($userSet3);

$updateTable = 'Update entry_details SET Set1 = "'.$userSet1[$id-1].'", Set2 = "'.$userSet2[$id-1].'", Set3 = "'.$userSet3[$id-1].'" where id = "'.$id.'"';

//header("Location: Home.php");

?>
