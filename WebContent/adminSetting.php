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
    <title>Setting</title>

    <style>
        table
        {
            margin-left: auto;
            margin-right: auto;
            max-height: 400px;
        }
        table.leftSide
        {
            left: 0;
        }
        table.rightSide
        {
            right: 0;
        }
        table.items
        {
            overflow-y: scroll;
            display: block;
            position: relative;
        }
        th 
        {
            position: sticky;
            border: solid purple;
            padding: 10px;
            top: 0;
            background-color: black;
            color: white;
        }
        td
        {
            border: solid purple;
            padding: 10px;
        }
    </style>


</head>

<!-- navbar section-->
<body style="font-family:Helvetica, Arial, sans-serif;">
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
            <?php if(isset($_SESSION['username']) && ($_SESSION['Type'] == 'Admin' || $_SESSION['Type'] == 'Teacher')) { ?>
					<li class="nav-item"> <a class="nav-link" href="Library.php">Library</a> </li>
					<?php } ?>
					<li class="nav-item">
					<a class="nav-link" href="demo.php">Presentation</a>
					</li>
					<?php if(isset($_SESSION['username']) && ($_SESSION['Type'] == 'Admin' || $_SESSION['Type'] == 'Parent' || $_SESSION['Type'] == 'Teacher')) { ?>
					<li class="nav-item">
						<a class="nav-link" href="editorHome.php">Editor</a>
					</li>
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
                else if ($_SESSION['Type'] == 'Teacher')
                {
                  echo 'Teacher'.$_SESSION['id'];
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

<!-- landing page welcome and body -->
<table border="solid black" class="rightSide items" width="500px" style="text-align:center;">
    <tr>
        <th colspan="4" style="font-size: 24px;">Database</th>
        <th><button style="background-color: #ace5ee; border-radius: 5px; height: 60px"><a style="text-decoration: none; color: black;" href="<?php  $_SERVER['PHP_SELF']; ?>">Refresh</a></button></th>
    </tr>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Assign Set 1</th>
        <th>Assign Set 2</th>
        <th>Assign Set 3</th>
    </tr>
    <tbody id = "myTableData">
    <?php
        $search_result = mysqli_query($conn,"select * from entry_details");
        $setResult = mysqli_query($conn,"select * from sets_list");
        while($data = mysqli_fetch_array($search_result)) 
        { ?>
        <tr <?php if ($data['Type'] == 'Admin' || $data['Type'] == 'Teacher') echo 'style = "display: none;"'; ?>>
            <td><input type="hidden" name = "userID[]" value = "<?php echo $data['id']; ?>"><?php echo $data['id']; ?></td>
            <td><?php echo $data['username']; ?></td>
            <td><?php echo $data['Set1']; ?></td>
            <td><?php echo $data['Set2']; ?></td>
            <td><?php echo $data['Set3']; ?></td>
        </tr>
    <?php } ?>  
</tbody>
</table> 

<br>

<form method="POST">
    <table border="solid black" class="leftSide" width="535px" style="text-align:center;">
        <tr height="50px">
	        <th><input style="background-color: #79BBEB; width: 65px; height: 50px; color:black;" type="submit" name="searchIcon" value="Search" disabled></th>
            <th><input size="37px" type="text" id="itemToSearch" placeholder="Enter ID/Name" style="text-align: center"></th>
            <th><input type = "submit" name ="reset" value="Reset"></th>
	    </tr>
    </table>
</form>

<br>

<form method="POST">
    <table border="solid black" class="leftSide items" width="600px" style="text-align:center;">
        <tr>
            <th colspan="6" style="font-size: 24px;">Set Selection</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Assign Set 1</th>
            <th>Assign Set 2</th>
            <th>Assign Set 3</th>
            <th>Save</th>
        </tr>
        <tbody id = "myTableData">
        <?php
            $search_result = mysqli_query($conn,"select * from entry_details");
            $setResult = mysqli_query($conn,"select * from sets_list");
            while($data = mysqli_fetch_array($search_result)) 
            { ?>
            <tr <?php if ($data['Type'] == 'Admin' || $data['Type'] == 'Teacher') echo 'style = "display: none;"'; ?>>
                <td><input type="hidden" name = "userID[]" value = "<?php echo $data['id']; ?>"><?php echo $data['id']; ?></td>
                <td><?php echo $data['username']; ?></td>
                
                <td class = "row-data">
                    <select id="userSet2" name="userSet1[]">
                    
                    <?php foreach($setResult as $rowSet)
                    { ?>
                        <option value="<?php echo $rowSet['setName']; ?>"><?php echo $rowSet['setName']; ?></option>
                    <?php } ?>
                    </select>
                </td>
                <td class = "row-data">
                    <select id="userSet2" name="userSet2[]">
                    
                    <?php foreach($setResult as $rowSet)
                    { ?>
                        <option value="<?php echo $rowSet['setName']; ?>"><?php echo $rowSet['setName']; ?></option>
                    <?php } ?>
                    </select>
                </td>
                <td class = "row-data">
                    <select id="userSet3" name="userSet3[]">
                    <?php foreach($setResult as $rowSet)
                    { ?>
                        <option value="<?php echo $rowSet['setName']; ?>"><?php echo $rowSet['setName']; ?></option>
                    <?php } ?>
                    </select>
                </td>
                <td>
                    <button name="save" value="<?php echo $data['id']; ?>">Save</button>
                    <!---<input type="submit" name="save[]" value="Submit" onclick="show()" /> --->
                </td>
            </tr>
        <?php } ?>  
	</tbody>
    </table> 
</form>





<?php
if (isset($_POST['save']))      //When the button name 'save' is click on
{
    $userID = $_POST['userID'];
    $button = $_POST['save'];
    $set1 = $_POST['userSet1'];
    $set2 = $_POST['userSet2'];
    $set3 = $_POST['userSet3'];

    updateTableSet($conn, $userID, $button, $set1, $set2, $set3);
}
?>

<script>
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
<!-- Getting the bundles of Bootstrap -->
</body>
</html>