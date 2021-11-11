<?php
session_start();
require 'objectslist.php';
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
    table {
      overflow-y: scroll;
      height: 955px;
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
      background-color: white;
    }
    html, body {
      overflow-y: visible;
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
          <?php if(isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>
          <li class="nav-item"><a class="nav-link" href="Library.php">Library</a> </li>
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

  <div style='float:left'>
  <form method="POST">
  <table border="1" width="300" style="margin-left:30%;float:top;">
    <tr>
      <th width="50" >#</th>
      <th width="200">Name</th>
      <th width="100">Check</th>
    </tr>
      <?php
        include "db_conn.php"; // Using database connection file here
        $records = mysqli_query($conn,"select * from objectslist"); // fetch data from 
        while($data = mysqli_fetch_array($records)) { ?>
        <tr>
          <td><?php echo $data['ID']; ?></td>
          <td><?php echo $data['name']; ?></td>
          <td style="text-align: center; vertical-align: middle"><input type = "checkbox" name='check[]' value="<?php echo $data['ID']; ?>"></td>
        </tr>
      <?php } ?>
  </table>
  <input type="submit" name="generate" value="Generate">

  </form>
  </div>
  
  <div style='float:right'>
  <?php
    if(isset($_POST['generate']))
    {
      if(!empty($_POST['check']))
      {
        $checkedArray = $_POST['check'];
        $count = count($checkedArray);
        if ($count >= 3 and $count <= 12)
        {
          foreach($checkedArray as $value)
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
                  echo "<script>alert('Error getting pictures');</script>";
                  header("Location: demo.php?error=obtaining picture");
              }
            //echo "ID of picture: ".$value.' ';
          }
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
  ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Getting the bundles of Bootstrap -->
  <!--- <script src="script.js"></script> -->
</body>
</html>


