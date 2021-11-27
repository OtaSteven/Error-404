<?php

require_once('db_conn.php');

if(isset($_GET['id']) && isset($_POST['editForm'])){
    $id = $_GET['id'];
    $setName = $_POST['setName'];
    $link1 = $_POST['link1'];
    $link2 = $_POST['link2'];
    $link3 = $_POST['link3'];
    $link4 = $_POST['link4'];
    $link5 = $_POST['link5'];
    $link6 = $_POST['link6'];
    $link7 = $_POST['link7'];
    $link8 = $_POST['link8'];
    $link9 = $_POST['link9'];
    $link10 = $_POST['link10'];
    $link11 = $_POST['link11'];
    $link12 = $_POST['link12'];

    $sql = "UPDATE sets_list SET 
            setName= '$setName',
            link1 = '$link1',
            link2 = '$link2',
            link3 = '$link3',
            link4 = '$link4',
            link5 = '$link5',
            link6 = '$link6',
            link7 = '$link7',
            link8 = '$link8',
            link9 = '$link9',
            link10 = '$link10',
            link11 = '$link11',
            link12 = '$link12'
            WHERE id = $id";

    if($conn->query($sql) === TRUE){
        header('Location: setEditor.php');
    }else{
        echo "something went wrong";
    }
    
}else{
    echo "invalid";
}