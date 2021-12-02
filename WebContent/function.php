<?php

function displayPicture($conn)
{
    foreach($_SESSION['saveArray'] as $value)
    {
        // write query for all entry_details
        $sql = "Select * from objectslist where id = '$value'";
        // make query and get result
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0)
        {
            echo '<div class="container">';
            echo '<div class="column" style="margin-right: 3%;">';
            while ($row = mysqli_fetch_assoc($result))
            {
                echo '<img src="'.$row['link'].'">';
            }
            echo '</div>';
            echo '</div>';
            //print_r($row);       //prints out all the data in $row (a certain row in the database)
        }
        else
        {
            header("Location: demo.php?error=obtaining picture");
            echo "<script>alert('Error getting pictures');</script>";
        }
    //echo "ID of picture: ".$value.' ';
    }
}

function shiftLeft($conn)
{
    $firstvalue = reset($_SESSION['saveArray']);  //set the internal pointer of an array to its first element
    $firstkey = key($_SESSION['saveArray']);      //takes key according to reset's pointer
    
    $arrayElement = array($firstkey=>$firstvalue);  //stores that one element from pointer
    
    array_shift($_SESSION['saveArray']);  //shift to remove first element
    
    $arrayElement = array_merge($_SESSION['saveArray'],$arrayElement);    //merge-add arrayElement to the end of original array since we shift it LEFT

    $_SESSION['saveArray'] = $arrayElement;
}

function shiftRight($conn)
{
    $lastvalue = end($_SESSION['saveArray']);
    $lastkey = key($_SESSION['saveArray']);
    
    $arr1 = array($lastkey=>$lastvalue);
    
    array_pop($_SESSION['saveArray']);
    
    $arr1 = array_merge($arr1,$_SESSION['saveArray']);

    $_SESSION['saveArray'] = $arr1;
}

function shufflePicture($conn)
{
    shuffle($_SESSION['saveArray']);
}