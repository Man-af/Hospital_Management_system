<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://kit.fontawesome.com/47b49700ad.js" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.js" type="text/javascript" charset="utf-8" async defer></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-info  bg-info">
		<h5 class="text-white">Hopspital Management System</h5>
		<div class="mr-auto"></div>
		<ul class="navbar-nav">
			<?php 
			if (isset($_SESSION['admin'])) {
				$user = $_SESSION['admin'];
				echo'<li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">'.$user.'</a></li>
		
			<li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>';

			}
			else if(isset($_SESSION['doctor'])){
				$user = $_SESSION['doctor'];
				echo'<li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white">'.$user.'</a></li>
		
			<li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>'; 

			}else if (isset($_SESSION['patient'])){
              $user = $_SESSION['patient'];
				echo'<li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white">'.$user.'</a></li>
		
			<li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>'; 
			}else
			{
				echo'<li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
				<li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">Admin</a></li>
			<li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white">Doctor</a></li>
			<li class="nav-item"><a href="patientlogin.php" class="nav-link text-white">Patient</a></li>';
			}



			 ?>
		</ul>
	</nav>
	
</body>
</html>