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

	<title>Home</title>
	<style>
		table {
			overflow-y: scroll;
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
			background-color: black;
			color: white;
		}
		html, body 
		{
			overflow-y: visible;
		}
		input.larger 
		{
			width: 30px;
			height: 30px;
		}
		img
		{
			width: 125px;
			height: 125px;
			margin: 2%;
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
					<?php if(isset($_SESSION['username']) && $_SESSION['Type'] == 'Admin') { ?>
							<li class="nav-item"> <a class="nav-link" href="Library.php">Library</a> </li>
						<?php } ?>
					<li class="nav-item">
						<a class="nav-link" href="demo.php">Presentation</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="setEditor.php">Editor</a>
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

	<?php
	$imageSet = mysqli_query($conn, "Select * from setentries");
    while ($row = mysqli_fetch_assoc($imageSet))
    {
		echo '<div class="container" style="border: solid black; background-color: #e6e6fa;">';
        	echo '<lable style="font-size: 50px">'.$row['Name'].'</lable><br>';
		echo '<div class="container"';

			echo '<img src="'.$row['link1'].'">';
			echo '<img src="'.$row['link2'].'">';
			echo '<img src="'.$row['link3'].'">';
			echo '<img src="'.$row['link4'].'">';

			echo '<img src="'.$row['link5'].'">';
			echo '<img src="'.$row['link6'].'">';
			echo '<img src="'.$row['link7'].'">';
			echo '<img src="'.$row['link8'].'">';

			echo '<img src="'.$row['link9'].'">';
			echo '<img src="'.$row['link10'].'">';
			echo '<img src="'.$row['link11'].'">';
			echo '<img src="'.$row['link12'].'">';
		echo '</div>';
		echo '</div>';
    }
	?>




	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>


</html>