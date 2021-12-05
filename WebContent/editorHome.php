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

	<title>Set Menu</title>
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
		.collapsible 
		{
			background-color: #01a1ec;
			cursor: pointer;
			padding: 18px;
			width: 100%;
			border: none;
			text-align: left;
			outline: none;
			font-size: 20px;
			
		}
		.collapsible:hover
		{
			background-color: #c6e2ff;
  			color: black;
		}
		.content 
		{
			padding: 0 18px;
			display: none;
			overflow: hidden;
			background-color: #f1f1f1;
		}
		button
		{
			border-radius: 4px;
			font-size: 24px;
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
						<a class="nav-link" href="editorHome.php">Editor</a>
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
						<?php if(isset($_SESSION['username']) && $_SESSION['Type'] == 'Admin') { ?>
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

	<br>

	<h1 style="text-align: center; font-size: 48px; text-decoration: underline;"><b>Set Menu</b></h1>
	<br>

	<?php
	$imageSet = mysqli_query($conn, "Select * from sets_list where ID > 0");
    while ($row = mysqli_fetch_assoc($imageSet))
    {
		echo '<div class="container">';
		echo '<button type="button" class="collapsible" style="font-size: 32px">';
		echo $row['setName'];
		echo '</button>';

		echo '<div class="content">';
		echo '<br>';
		echo "<a style='text-decoration:none; margin-right: 1%;' href='editor.php?id=".$row['ID']."'><button style='background-color: #ffe599;'>Edit Set</button></a>";
		echo "<a style='text-decoration:none' href='presentation.php?id=".$row['ID']."'><button style='background-color: #b6d7a8;'>Present Set</button></a>";
		echo '<br>';

		if (!(empty($row['link1'])))
			echo '<img src="'.$row['link1'].'">';
		if (!(empty($row['link2'])))
			echo '<img src="'.$row['link2'].'">';
		if (!(empty($row['link3'])))
			echo '<img src="'.$row['link3'].'">';
		if (!(empty($row['link4'])))
			echo '<img src="'.$row['link4'].'">';
		if (!(empty($row['link5'])))
			echo '<img src="'.$row['link5'].'">';
		if (!(empty($row['link6'])))
			echo '<img src="'.$row['link6'].'">';
		if (!(empty($row['link7'])))
			echo '<img src="'.$row['link7'].'">';
		if (!(empty($row['link8'])))
			echo '<img src="'.$row['link8'].'">';
		if (!(empty($row['link9'])))
			echo '<img src="'.$row['link9'].'">';
		if (!(empty($row['link10'])))
			echo '<img src="'.$row['link10'].'">';
		if (!(empty($row['link11'])))
			echo '<img src="'.$row['link11'].'">';
		if (!(empty($row['link12'])))
			echo '<img src="'.$row['link12'].'">';

		echo '</div>';
		echo '</div>';
		echo '<br>';
    }
	?>

	<script>
	var coll = document.getElementsByClassName("collapsible");
	var i;

	for (i = 0; i < coll.length; i++) {
	coll[i].addEventListener("click", function() {
		this.classList.toggle("active");
		var content = this.nextElementSibling;
		if (content.style.display === "block") {
		content.style.display = "none";
		} else {
		content.style.display = "block";
		}
	});
	}
	</script>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>


</html>