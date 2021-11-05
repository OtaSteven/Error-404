<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username']))
{

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">      <!-- Connecting to bootstrap -->
</head>

<body style="font-family:arial;">
  <section class="nbar" style="background-color: #eee;">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark justify-content-center">
      
      <a href="Home2.php" class="navbar-brand mr-auto">Error 404</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
      
        <ul class="navbar-nav justify-content-center">
          <li class="nav-item active">
            <a class="nav-link" href="Home2.php">Home<span class="sr-only"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Library.php">Library</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Settings</a>
          </li>
        </ul>

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

      </div>
    </nav>
  </section>
  <h1> Hello World </h1>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    <!-- Getting the bundles of Bootstrap -->

</body>
</html>
<?php

}
else
{
  header("Location: Home.html");
  exit();
}
?>
