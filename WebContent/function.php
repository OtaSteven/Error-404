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

function updateTableSet($conn, $userID, $button, $set1, $set2, $set3)
{
    /*
    print_r($userID);
    echo "<br>";
    print_r($_SESSION['set1']);
    echo "<br>";
    print_r($_SESSION['set2']);
    echo "<br>";
    print_r($_SESSION['set3']);
    echo "<br>";
    */

    foreach($userID as $value)
    {
        if ($button == $value)
        {
            // write query for all entry_details
            $sql = "Select * from entry_details where id = '$value'";
            // make query and get result
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0)
            {
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        $tableUpdate = 'Update entry_details SET Set1 = "'.$set1[$value-1].'", Set2 = "'.$set2[$value-1].'", Set3 = "'.$set3[$value-1].'" where id = "'.$value.'"';
                    
                        //If statements to make sure that the connection and our inputs are successfully inserted into the database
                        if (mysqli_query($conn, $tableUpdate))
                        {
                            echo '<script>alert("Successfully update the table")</script>';
                        }
                        else
                        {
                            echo "Error" . mysqli_error($conn);
                        }
                        
                    }
                    //print_r($row);       //prints out all the data in $row (a certain row in the database)
            }
            else
            {
                echo "<script>alert('No selection made');</script>";
            }
        }
    }
}

