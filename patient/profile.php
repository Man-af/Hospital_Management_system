<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

	<?php 

	include ("../include/header.php");
	include ("../include/connection.php");


	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">

				<div class="col-md-2" style="margin-left: -30px;">
					<?php

					include("sidenav.php");

					$patient = $_SESSION['patient'];
					$query = "SELECT * FROM patient WHERE username = '$patient'";
					$res = mysqli_query($connect,$query);
					$row = mysqli_fetch_array($res);


					?>

				</div>

				<div class="col-md-10">
					<div class="col-md-12">
						<div class="row">

							<div class="col-md-6">
								<h5>My Profile</h5>


								<div class="col-md-8">

					<table class="table table-bordered">
						<tr>
						<th colspan="2" class="text-center">MY Details</th>
					</tr>

					<tr>
						<td>Firstname</td>
						<td><?php echo $row['firstname']; ?></td>
					</tr>

					<tr>
						<td>Surname</td>
						<td><?php echo $row['surname']; ?></td>
					</tr>

					
					<tr>
						<td>Username</td>
						<td><?php echo $row['username']; ?></td>
					</tr>

					<tr>
						<td>Email</td>
						<td><?php echo $row['email']; ?></td>
					</tr>

					<tr>
						<td>Phone number</td>
						<td><?php echo $row['phone']; ?></td>
					</tr>

					<tr>
						<td>Gender</td>
						<td><?php echo $row['gender']; ?></td>
					</tr>

					<tr>
						<td>Country</td>
						<td><?php echo $row['country']; ?></td>
					</tr>

					

					</table>
					
				</div>
							</div>

							<div class="col-md-6">

						<h5 class="text-center">Change Username</h5>

						<?php 

					 if (isset($_POST['update'])){
					 $uname = $_POST['uname'];
					 if (empty($uname)){

					}else{
					$query = "UPDATE patient SET username ='$uname' WHERE username='$patient'";
					$res = mysqli_query($connect,$query);

					if ($res){
					$_SESSION['patient'] = $uname;
				}
				}
					}

					?>


								<form method="POST">
									<label>Enter Username</label>
						<input type="text" name="uname" class="form-control"><br>
						<input type="submit" name="update" value="Update Username" class="btn btn-info">
					</form>




							<?php

					if (isset($_POST['change'])) {

					 $old = $_POST['old_pass'];
					 $new = $_POST['new_pass'];
					 $con = $_POST['con_pass'];

					 $error = array();

					 $ols = mysqli_query($connect, "SELECT * from patient WHERE username ='$patient'");
					 $row = mysqli_fetch_array($ols);
					 $pass = $row['password'];

					 if (empty($old)){

					 $error['p'] = "Enter old password";


					}else if(empty($new)){

					 $error['p'] = "Enter new password";

				}else if (empty($con)){

					 $error['p'] = "Confirm password";

			}else if ($old !=$pass){

					 $error['p'] = "Invalid old password";

			}else if ($new !=$con){

					$error['p'] = "Password does not match";

			}

			if (count($error)==0){
			$query ="UPDATE patient SET password ='$new' WHERE username = '$patient'";

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
					<form method="POST">
						<h5 class="text-center">Change Password</h5>
						<div>
							<?php

							echo $show;
							?>
						</div>
						<label>Old Password</label>
						<input type="password" name="old_pass" class="form-control" autocomplete="off">

						<label>New Password</label>
						<input type="password" name="new_pass" class="form-control" autocomplete="off">

						<label>Conirm Password</label>
						<input type="password" name="con_pass" class="form-control" autocomplete="off">

						<input type="submit" name="change" class="btn btn-info my-2" value="Change Password">

					</form>
								
							</div>

						</div>
					</div>
					
				</div>

				
			</div>
		</div>
	</div>
	


</body>
</html>