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
        table.center
        {
            margin-left: auto;
            margin-right: auto;
        }
        table.items
        {
            overflow-y: scroll;
            display: block;
            position: relative;
        }
        th
        {
            border: solid black;
            padding: 10px;
        }
        td
        {
            border: solid black;
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

<!-- landing page welcome and body -->
<form method="POST">
    <table border="solid black" class="center" width="535px" style="text-align:center;">
        <tr height="50px">
	        <th><input style="background-color: #79BBEB; width: 65px; height: 50px; color:black;" type="submit" name="searchIcon" value="Search" disabled></th>
            <th><input size="37px" type="text" id="itemToSearch" placeholder="Enter ID/Name" style="text-align: center"></th>
            <th><input type = "submit" name ="reset" value="Reset"></th>
	    </tr>
    </table>
    <table border="solid black" class="center items" width="535px" style="text-align:center;">
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
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['username']; ?></td>
                
                <td>
                    <select name="sets" id="set">
                    <?php foreach($setResult as $rowSet)
                    { ?>
                        <option value="<?php $rowSet['ID'] ?>"><?php echo $rowSet['setName']; ?></option>
                    <?php } ?>
                    </select>
                </td>
                <td>
                    <select name="sets" id="set">
                    <?php foreach($setResult as $rowSet)
                    { ?>
                        <option value="<?php $rowSet['ID'] ?>"><?php echo $rowSet['setName']; ?></option>
                    <?php } ?>
                    </select>
                </td>
                <td>
                    <select name="sets" id="set">
                    <?php foreach($setResult as $rowSet)
                    { ?>
                        <option value="<?php $rowSet['ID'] ?>"><?php echo $rowSet['setName']; ?></option>
                    <?php } ?>
                    </select>
                </td>
            </tr>
            <?php } ?>
	    </tbody>
    </table>
</form>

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