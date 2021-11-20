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
      padding-top: 5%;
      margin-left: auto;
      margin-right: auto;
      width: 65%;
      height: auto;
      max-width: 75%;
      opacity: 0.35;
      border-radius: 5px;
      z-index: -1;
      background-size: contain; 
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
    <header class="container-fluid" style="height: 100vh;">
      <img class="blur" src="images/tempgif.gif" alt="temp">
      <div class="welcome">
        <h1 class="fw-bolder">Welcome to the Web App</h1>
        <p class="fw-bold">A simple page to help you get started using the app. With the buttons below, you can Get Started and sign up or try our demo. Scroll down for more information.</p>
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
        <div class="col col-lg-3">
          <h3>How it Works</h3>
          <p>Using a set of at least 3 images selected by the user, the group of images rotate in order to help students learn. You can test a preview using our demo above.</p>
        </div> 
        <div class="col col-lg-2"></div> <!-- empty to make space between how and purpose (maybe add image -->
        <div class="col col-lg-3">
          <h3>More Information</h3>
          <p>For more options, sign up for our web app today and find features to help you help your students. With features such as access to the library database.</p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Getting the bundles of Bootstrap -->
</body>
</html>