<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username']))
{


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <style>
      .gradient-custom-2 {
        background-color: #3C3C3C;
        text-align:center;
      }

      @media (min-width: 768px) {
        .gradient-form {
          height: 100vh !important;
          text-align:center;
        }
      }
      @media (min-width: 769px) {
        .gradient-custom-2 {
          border-top-right-radius: .3rem;
          border-bottom-right-radius: .3rem;
        }
      }
      .container {
          padding: 5%;
          background-color: white;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  <!-- Connecting to bootstrap -->
  
  </head>       <!-- End of Head -->

  <body style="font-family:arial;">
    <section class="nbar" style="background-color:#eee;">
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
              <a class="nav-link" href="About.html">About</a>
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
    
    <section class="vh-100" style="background-color:#eee; font-size:150%; text-align:center;">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Gallery Library</p>

                    <form action = "objectslist.php" class="mx-1 mx-md-4" method = "post">        <!-- Designing a form that is link with a .php file which will connect the inputs to our database -->

                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" name = "name" id="form3Example1c" class="form-control" placeholder="Enter the image's name" maxlength="40"/>
                          </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" style="text-transform: lowercase" name = "link" id="form3Example4c" class="form-control" placeholder="Enter the image's hyperlink" maxlength="255" />
                          </div>
                        </div>

                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <input class="btn btn-primary btn-lg" type="submit" name="save" value="Add">
                        </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    <!-- Getting the bundles of Bootstrap -->
    
  </body>     <!-- End of Body -->
</html>

<?php

}
else
{
  header("Location: Home.html");
  exit();
}
?>