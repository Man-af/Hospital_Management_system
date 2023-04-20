<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Profile</title>
</head>
<body>
	<?php

	include ("../include/header.php");
	include ("../include/connection.php");

	$ad = $_SESSION['admin'];
	$query = "SELECT * FROM admin WHERE username='$ad'";
	$res = mysqli_query($connect,$query);

	while ($row = mysqli_fetch_array($res)){
	$username = $row['username'];
}

	  ?>
	</body>
	</html>
	<div class="container">
		<div class="col-md-12">
			<div class ="row">
				<div class="col-md-2" style="margin-left: -420px;">
					<?php

					include("sidenav.php");


					?>

					
				</div>
				<div class="col-md-10">
					<h4 class="text-center"><?php echo $username; ?></h4>

					<?php 

					 if (isset($_POST['change'])){
					 $uname = $_POST['uname'];
					 if (empty($uname)){

					}else{
					$query = "UPDATE admin SET username ='$uname' WHERE username='$ad'";
					$res = mysqli_query($connect,$query);

					if ($res){
					$_SESSION['admin'] = $uname;
				}
				}
					}

					?>


					<form method="POST"><br>
						<h5 class="text-center">Change Username</h5>
						<input type="text" name="uname" class="form-control"><br>
						<input type="submit" name="change" value="Change" class="btn btn-success">
					</form>

					<br>

					<?php

					if (isset($_POST['update_pass'])) {

					 $old_pass = $_POST['old_pass'];
					 $new_pass = $_POST['new_pass'];
					 $con_pass = $_POST['con_pass'];

					 $error = array();

					 $old = mysqli_query($connect, "SELECT * from admin WHERE username ='$ad'");
					 $row = mysqli_fetch_array($old);
					 $pass = $row['password'];

					 if (empty($old_pass)){

					 $error['p'] = "Enter old password";


					}else if(empty($new_pass)){

					 $error['p'] = "Enter new password";

				}else if (empty($con_pass)){

					 $error['p'] = "Confirm password";

			}else if ($old_pass !=$pass){

					 $error['p'] = "Invalid old password";

			}else if ($new_pass !=$con_pass){

					$error['p'] = "Password does not match";

			}

			if (count($error)==0){
			$query ="UPDATE admin SET password ='$new_pass' WHERE username = '$ad'";

			mysqli_query($connect,$query);
		}
				}

				if(isset($error['p'])) {

				$e =$error['p'];
				$show = "<h5 class ='text-center alert alert-danger'>$e</h5>";
			}else{

			$show = "";
		}

		?>





					     <form method ="post"><br>                                                                                                  
						<h5 class="text-center">Change Password</h5>
						<div>
							<?php

							echo $show;
							?>
						</div>
						<div class ="form-group">
							<label>Old Password</label>
							<input type="password" name="old_pass" class="form-control">

						</div>
						<div class ="form-group">
							<label>New Password</label>
							<input type="password" name="new_pass" class="form-control">
						
						</div>
						<div class ="form-group">
							<label>Confirm Password</label>
							<input type="password" name="con_pass" class="form-control">
						
						</div>
						<input type="submit" name="update_pass" value="Update Password" class="btn btn-info">
						
					</form>


					
				</div>
			</div>
		</div>
	</div>
