<?php
session_start();
require "db_conn.php"; // Making sure this file has the connection to our database
require_once "function.php";

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  <!-- Connecting to bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/style.css"> <!-- Specific file for all customization-->


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
            <?php if(isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>
              <li class="nav-item"> <a class="nav-link" href="Library.php">Library</a> </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href="demo.php">Presentation</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="About.php">About</a>
            </li>
          </ul>
  
          <!--- Checks if user is on an account, and if they are display their username and the logout option --->
          <?php if(isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>
          <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
              <li class="nav-item">
                  <p class = "nav-link" style="text-decoration: none">
                  <?php echo $_SESSION['username']; ?>
                  </p>
              </li>
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
    <form method="POST">
      <input type="submit" name="left" value="<< Left">
      <input type="submit" name="right" value="Right >>">
      <input type="submit" name="shuffle" value="Shuffle">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    <!-- Getting the bundles of Bootstrap -->
    
  </body>     <!-- End of Body -->
</html>