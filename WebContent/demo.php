<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">      <!-- Connecting to bootstrap -->
  <link rel="stylesheet" type="text/css" href="css/style.css"> <!-- Specific file for all customization-->
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
          <?php if(isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>
          <li class="nav-item"> <a class="nav-link" href="Library.php">Library</a> </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="demo.php">Presentation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="About.html">About</a>
          </li>
        </ul>

        <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
          <li class="nav-item">
            <a class="nav-link" href="login.html">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="SignUp.html">Sign Up</a>
          </li>
        </ul>
      </div>
    </nav>
  </section>
  <!--- columns splitting the page --->
  <div class="container">
    <div class="row">
    <div class="col-4">
      <div style="leftside">
        <ul class="list-group"> <!--need to add new checkboxes according to objectList database-->
          <li class="list-group-item">
            <input class="form-check-input-me-1" type="checkbox" value="">
            First checkbox
          </li>
          
        </ul>
      </div>
    </div>
    <div class="col-8">
      <div style="rightside">
        Column 2
      </div>
    </div>
    </div>
  </div>

  


  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Getting the bundles of Bootstrap -->
  <script src="script.js"></script>
</body>
</html>