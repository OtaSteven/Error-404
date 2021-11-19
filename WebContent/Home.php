<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">      <!-- Connecting to bootstrap -->
  <link rel="stylesheet" type="text/css" href="css/style.css"> <!-- Specific file for all customization-->
  
  <title>Home</title>

  <style>
    img 
    {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 45%;
      height: auto;
      opacity: 0.5;
      border-radius: 5px;
      z-index: -1;
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

<!-- landing page welcome and body -->
    <header class="head container-fluid">
      <img class="blur" src="images/tempgif.gif" alt="temp">
      <div class="welcome">
        <h1 class="fw-bolder">Welcome to the Web App</h1>
        <p class="fw-bold">A simple page to help you get started using the app</p>
        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="SignUp.html" target="_blank">Get Started</a>
        <a class="btn btn-outline-dark btn-lg px-4" href="demo.php" target="_blank">Demo</a> <!-- links to presentation page -->
      </div>
    </header>

<!-- text/description section -->
  <div id="container">
    <div class="description text-white">
      <div>
        <h2 class="text-center fw-bolder pt-4 pb-5">The Web App</h2>
      </div>

      <div class="row justify-content-md-center">
        <div class="col col-lg-2">
          <h3>How it Works</h3>
          <p>Using specific sets of images chosen by the user, the group of 6 images rotate  with the same format.</p>
        </div> 
        <div class="col col-lg-4"></div> <!-- empty to make space between how and purpose (maybe add image -->
        <div class="col col-lg-2">
          <h3>Purpose</h3>
          <p>Designed to help ABAs, this web app is made with their purpose to help students.</p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Getting the bundles of Bootstrap -->
</body>
</html>