<?php
session_start();
require "db_conn.php"; // Making sure this file has the connection to our database
require_once "function.php";
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">      <!-- Connecting to bootstrap -->
<link rel="stylesheet" type="text/css" href="css/style.css"> <!-- Specific file for all customization-->
<!-- Getting JQuery bundles -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Getting the js file we made -->
<!--- <script src="script.js"></script> -->

<title>Demo</title>
<style>
    table {
        overflow-y: scroll;
        width: 100%;
        display: block;
        position: relative;
    }
    tr, td {
        text-align: center;
        border: thin solid;
    }
    th {
        position: sticky;
        border: thin solid;
        top: 0;
        background-color: black;
        color: white;
    }
    html, body 
    {
        overflow-y: visible;
    }
    input.larger 
    {
        width: 30px;
        height: 30px;
    }
</style>
</head>


<body style="font-family:Helvetica, Arial, sans-serif;">
<!--- navbar section --->
<section class="nbar" style="background-color: #eee;">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark justify-content-center">
        
        <a href="Home.php" class="navbar-brand mr-auto">Error 404</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav justify-content-center">
                <li class="nav-item active">
                    <a class="nav-link" href="Home.php">Home<span class="sr-only"></span></a>
                </li>
                <?php if(isset($_SESSION['username']) && $_SESSION['Type'] == 'Admin') { ?>
                        <li class="nav-item"> <a class="nav-link" href="Library.php">Library</a> </li>
                    <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="demo.php">Presentation</a>
                </li>
                <?php if(isset($_SESSION['username']) && $_SESSION['Type'] == 'Admin') { ?>
                    <li class="nav-item"><a class="nav-link" href="editorHome.php">Editor</a></li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="About.php">About</a>
                </li>
            </ul>

            <!--- Checks if user is on an account, and if they are display their username and the logout option --->
            <?php if(isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>
                <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
                  <li class="nav-item">
                    <p class = "nav-link" style="text-decoration: none">
                    <?php 
                    if ($_SESSION['Type'] == 'Admin')
                    {
                      echo $_SESSION['username'];
                    }
                    else
                    {
                      echo 'User'.$_SESSION['id'];
                    } ?>
                    </p>
                  </li>
                  <?php if(isset($_SESSION['username']) && $_SESSION['Type'] == 'Admin') { ?>
                    <li class="nav-item"><a class="nav-link" href="adminSetting.php">Setting</a></li>
                  <?php } ?>
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                  </li>
                </ul>
            <?php } else {?> <!-- ENDING IF STATEMENT -->
                <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="SignUp.html">Sign Up</a>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </nav>
</section>
<br>

<!--- LEFT SIDE OF THE SCREEN --->
<div style='float:left'>
<h3 style='text-align:center; padding-left:100px'><label id="totalCheckedBoxes">Total Items Selected: 0</label></h3>
<form method="POST">
    <table width="300" height= "50px" style="margin-left:10%; overflow-y:hidden; background-color:black">
        <tr height="50px">
	        <th><input style="background-color: #79BBEB; width: 65px; height: 50px; color:black;" type="submit" name="searchIcon" value="Search" disabled></th>
            <th><input size="37px" type="text" id="itemToSearch" placeholder="Enter picture/id" style="text-align: center"></th>
            <th><input type = "submit" name ="reset" value="Reset"></th>
	    </tr>
    </table>
    <table border="1" width="300" height="700px" style="margin-left:10%; float:top;">
	    <tr>
            <th width="50" >#</th>
            <th width="200">Name</th>
            <th width="200">Type</th>
            <th width="100">Picture</th>
            <th width="100">Check</th>
	    </tr>
	    <tbody id = "myTableData">
        <?php
        $search_result = mysqli_query($conn,"select * from objectslist");
        while($data = mysqli_fetch_array($search_result)) 
        { ?>
            <tr>
                <td><?php echo $data['ID']; ?></td>
                <td><?php echo $data['itemName']; ?></td>
                <td><?php echo $data['Type']; ?></td>
                <td><img src="<?php echo $data['link']?>" width=50px; height=50px;></td>
                <td style="text-align: center; vertical-align: middle"><input class="larger" type="checkbox" name='check[]' value="<?php echo $data['ID'];?>" onchange="whenBoxIsChecked()"></td>
            </tr>
        <?php } ?>
	    </tbody>
    </table>
<br>
<input type="submit"  name="generate" value="Generate" data-inline="true" style="height:50px; width:225px; margin-left: 25%;">
<input type="submit"  name="save" value="Save" data-inline="true" style="height:50px; width:225px;">
<br><br>
</form>
<br>
</div>

<!--- RIGHT SIDE OF THE SCREEN WHERE PICTURES ARE DISPLAY --->
<div style='float:right'>
<?php
if (isset($_POST['reset']) || isset($_POST['searchIcon']))
{
    $_PUT['itemToSearch'] = '';
}
if(isset($_POST['generate']))
{
    if(!empty($_POST['check']))
    {
        $checkedArray = $_POST['check'];
        $_SESSION['saveArray'] = $checkedArray;
        $count = count($checkedArray);

        if ($count >= 3 and $count <= 12)
        {
            foreach($_SESSION['saveArray'] as $value)
            {
                // write query for all entry_details
                $sql = "Select * from objectslist where id = '$value'";
                // make query and get result
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0)
                {
                        echo '<div class=container>';
                        echo '<div class="column">';
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
            echo '<a class="btn btn-primary btn-lg px-4 me-sm-3" href="presentation.php" target="_blank">Present</a>';
        }
        else
        {
            echo "<script>alert('Make sure the pictures are between 3 ~ 12.');</script>";
        }
    }
    else{
        echo "<script>alert('Nothing is selected');</script>"; 
    }
}
//Begin Save Button 
if(isset($_POST['save']))
{
    //beginning of code for save
    $saveArray = $_SESSION['saveArray'];
    foreach($saveArray as $valueSave)
    {
        
        $x[] = $valueSave;
        echo 'output 1';
        print_r($valueSave);
    }
    if($x[0] == NULL)
    {
        $x[0] = '';
    }
    if($x[1] == NULL)
    {
        $x[1] = '';
    }
    if($x[2] == NULL)
    {
        $x[2] = '';
    }
    if($x[3] == NULL)
    {
        $x[3] = '';
    }
    if($x[4] == NULL)
    {
        $x[4] = '';
    }
    if($x[5] == NULL)
    {
        $x[5] = '';
    }
    if($x[6] == NULL)
    {
        $x[6] = '';
    }
    if($x[7] == NULL)
    {
        $x[7] = '';
    }
    if($x[8] == NULL)
    {
        $x[8] = '';
    }
    if($x[9] == NULL)
    {
        $x[9] = '';
    }
    if($x[10] == NULL)
    {
        $x[10] = '';
    }
    if($x[11] == NULL)
    {
        $x[11] = '';
    }
    
    $sqlSave = "INSERT INTO sets_list (link1, link2, link3, link4, link5, link6, link7, link8, link9, link10, link11, link12) 
    VALUES ($x[0], $x[1], $x[2], $x[3], $x[4], $x[5], $x[6], $x[7] , $x[8], $x[9], $x[10], $x[11])";
    print_r($sqlSave);

    

}
?>
</div>
<!-- End Save Button -->
<script>
$("input[type=checkbox]").on("click", function () 
{
    var count = $("input[type=checkbox]:checked").length;
    document.getElementById("totalCheckedBoxes").innerHTML = "Total Items Selected: " + count;
    if(count < 12) {	//max limit of 12 checked. 
        $("input[type=checkbox]").removeAttr("disabled");		// re-enable all checkboxes
    } else {
        $("input[type=checkbox]").prop("disabled","disabled");		// disable all checkboxes
        $("input[type=checkbox]:checked").removeAttr("disabled");	// only enable already checked elements.
    }
});

$(document).ready(function()
{
    $("#itemToSearch").on("keyup", function() 
    {
        var value = $(this).val().toLowerCase();
        $("#myTableData tr").filter(function() 
        {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>


</html>