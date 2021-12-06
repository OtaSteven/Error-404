<?php
session_start();
require "db_conn.php"; // Making sure this file has the connection to our database
require_once "function.php";

if(isset($_GET['id']))
{
  $id =  $_GET['id'];

  $sql = "SELECT * FROM sets_list where ID = $id";
  $result = $conn->query($sql);

  if($result->num_rows != 1)
  {
    // redirect to show page
    die('ID is not in db');
  }
  $data = $result->fetch_assoc();

  $saveID = array();
  
  
  if (!empty($data['link1']))
  {
    $pictureID = mysqli_query($conn,"Select ID from objectslist where link = '".$data['link1']."'");
    $row = mysqli_fetch_assoc($pictureID);
    array_push($saveID, $row['ID']);
  }

  if (!empty($data['link2']))
  {
    $pictureID =  mysqli_query($conn, "Select ID from objectslist where link = '".$data['link2']."'");
    $row = mysqli_fetch_assoc($pictureID);
    array_push($saveID, $row['ID']);
  }

  if (!empty($data['link3']))
  {
    $pictureID =  mysqli_query($conn, "Select ID from objectslist where link = '".$data['link3']."'");
    $row = mysqli_fetch_assoc($pictureID);
    array_push($saveID, $row['ID']);
  }

  if (!empty($data['link4']))
  {
    $pictureID =  mysqli_query($conn, "Select ID from objectslist where link = '".$data['link4']."'");
    $row = mysqli_fetch_assoc($pictureID);
    array_push($saveID, $row['ID']);
  }

  if (!empty($data['link5']))
  {
    $pictureID =  mysqli_query($conn, "Select ID from objectslist where link = '".$data['link5']."'");
    $row = mysqli_fetch_assoc($pictureID);
    array_push($saveID, $row['ID']);
  }

  if (!empty($data['link6']))
  {
    $pictureID =  mysqli_query($conn, "Select ID from objectslist where link = '".$data['link6']."'");
    $row = mysqli_fetch_assoc($pictureID);
    array_push($saveID, $row['ID']);
  }

  if (!empty($data['link7']))
  {
    $pictureID =  mysqli_query($conn, "Select ID from objectslist where link = '".$data['link7']."'");
    $row = mysqli_fetch_assoc($pictureID);
    array_push($saveID, $row['ID']);
  }

  if (!empty($data['link8']))
  {
    $pictureID =  mysqli_query($conn, "Select ID from objectslist where link = '".$data['link8']."'");
    $row = mysqli_fetch_assoc($pictureID);
    array_push($saveID, $row['ID']);
  }

  if (!empty($data['link9']))
  {
    $pictureID =  mysqli_query($conn, "Select ID from objectslist where link = '".$data['link9']."'");
    $row = mysqli_fetch_assoc($pictureID);
    array_push($saveID, $row['ID']);
  }

  if (!empty($data['link10']))
  {
    $pictureID =  mysqli_query($conn, "Select ID from objectslist where link = '".$data['link10']."'");
    $row = mysqli_fetch_assoc($pictureID);
    array_push($saveID, $row['ID']);
  }

  if (!empty($data['link11']))
  {
    $pictureID =  mysqli_query($conn, "Select ID from objectslist where link = '".$data['link11']."'");
    $row = mysqli_fetch_assoc($pictureID);
    array_push($saveID, $row['ID']);
  }

  if (!empty($data['link12']))
  {
    $pictureID =  mysqli_query($conn, "Select ID from objectslist where link = '".$data['link12']."'");
    $row = mysqli_fetch_assoc($pictureID);
    array_push($saveID, $row['ID']);
  }

  $_SESSION['saveArray'] = $saveID;       //updates the session to have correct images if user decides to present a set

  header('Location: ' . $_SERVER['PHP_SELF']);      //Will revert the url to presentation.php
}




?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  <!-- Connecting to bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/style.css"> <!-- Specific file for all customization-->

    <title>Set Presenter</title>
  </head>       <!-- End of Head -->

  <body style="font-family:arial;">
    <section class="nbar" style="background-color:#eee;">
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
              <?php if(isset($_SESSION['username']) && ($_SESSION['Type'] == 'Admin' || $_SESSION['Type'] == 'Teacher')) { ?>
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

    <form method="POST">
    <div style="text-align: center; margin-top: 0.5%;">
      <input style="margin-right: 25%; height: 50px" type="submit" name="left" value="<< Left">
      <a class="returnButton"href="demo.php">Return</a> 
      <input style="height: 50px;" type="submit" name="shuffle" value="Shuffle">
      <input style="margin-left: 25%; height: 50px"type="submit" name="right" value="Right >>">
    </div>
    </form>

    <br>
    

    <?php
    if (!(isset($_POST['left']) || isset($_POST['right']) || isset($_POST['shuffle'])))
        displayPicture($conn);
    ?>
    <?php
    if(isset($_POST['left']))
    {
      shiftLeft($conn);
      displayPicture($conn);
    }
    if(isset($_POST['right']))
    {
      shiftRight($conn);
      displayPicture($conn); 
    }
    if(isset($_POST['shuffle']))
    {
      shufflePicture($conn);
      displayPicture($conn);
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    <!-- Getting the bundles of Bootstrap -->
    
  </body>     <!-- End of Body -->
</html>