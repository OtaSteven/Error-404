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
    <div style="display: block; margin-left: auto; margin-right: auto; width: 100%; background-color: black">
      <img style="align:center; height:100px" src="https://cdn.discordapp.com/attachments/891069703643082796/899757427904360448/1_hFwwQAW45673VGKrMPE2qQ.png">
    </div>
    <header class="page-header header container-fluid">
      <div style="height:75%; left: 50%; text-align:center">
        <br><br>
        <h1>Our Company Goals</h1>
        <p>The goal of our company is to help autistic children. We have a series of quizzes that stimulates their brain. <br>With our vast library of options to choose from they will never be bored.</p>
        <br><br>
        <h1>Contact Information</h1>
        <p>The best way to contact our company is through email, we have a company phone number as well. <br>Below are the emails of our development team. Thank you!</p>
      </div>
    </header>
    <div style="text-align:center; height: auto">
      <div class="description text-white">
        <br>
        <br>
        <h2>Company Phone: (916)Error-404</h2>
        <br>
        <h3>Team Emails:</h3>
        <table align="center">
          <br>
          <tr>
            <td>Isaiah Samaniego: daniellosamaniego@csus.edu</td>
            <td>Yi Lei: YiLei@csus.edu</td>
          </tr>
          <tr>
            <td>Jesse Quach: jessequach@csus.edu</td>
            <td>Steven Ho: sho8517@gmail.com</td>
          </tr>
          <tr>
            <td>Ethan Ha: NicholasHa@csus.edu</td>
            <td>Arash: ArashAmirebrahimi@csus.edu</td>
          </tr>
          </table>
      </div>
    </div>


  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Getting the bundles of Bootstrap -->
  <script src="script.js"></script>
</body>
</html>