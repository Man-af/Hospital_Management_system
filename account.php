<?php

include("include/connection.php");

if (isset($_POST['create'])){

	$firstname = $_POST['fname'];
	$surname = $_POST['sname'];
	$username = $_POST['uname'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$country= $_POST['country'];
	$password = $_POST['pass'];
	$confirm_password = $_POST['con_pass'];


	$error = array();

	if (empty($firstname)){

		$error['ac'] ="Enter Firstname";
	}else if (empty($surname)){
		$error['ac'] ="Enter Surname";
	}else if (empty($username)){
		$error['ac'] ="Enter Username";
	}else if (empty($email)){
		$error['ac'] ="Enter Email Address";
	}else if ($gender ==""){
		$error['ac'] ="Select Your Gender";
	
	}else if (empty($phone)){
		$error['ac'] ="Enter Phone number";
	
	}else if ($country ==""){
		$error['ac'] ="Select Your Country";
	}else if (empty($password)){
		$error['ac'] ="Enter Password";
	}else if ($confirm_password != $password){
		$error['ac'] ="Password do not Match";
	}

	if (count($error) == 0){

		$query = "INSERT INTO patient(firstname,surname,username,email,gender,phone,country,password,date_reg) VALUES ('$firstname','$surname','$username','$email','$gender','$phone','$country','$password',NOW())";

		$res = mysqli_query($connect,$query);

		if ($res) {

			echo "<script>alert('You Have Successfully Applied')</script>";

			header("Location: patientlogin.php");
		}else{

			echo "<script>alert('Failed')</script>";


		}

	}
}

if (isset($error['ac'])){

	$s = $error['ac'];

	$show = "<h5 class='text-center alert alert-danger'>$s</h5>";
}else{
	$show ="";
}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-image: url(img/hospital.jpg); background-repeat:no-repeat;background-size:cover">

	<?php

	include("include/header.php");


	?>

	<div class ="container-fluid">
		<div class ="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 my-3 jumbotron">
					<h5 class="text-center my-2">Create Account</h5>
					<div>
						
						<?php echo $show; ?>

					</div>
					<form method="post">
						<div class="form-group">
	 					<label>Firstname</label>
	 					<input type="text" name="fname" class="form-control" placeholder="Firstname" value="<?php if(isset($POST['fname'])) echo $_POST['fname']; ?>">

	 				</div>
	 				<div class="form-group">
	 					<label>Surname</label>
	 					<input type="text" name="sname" class="form-control" placeholder="Surname" value="<?php if(isset($POST['sname'])) echo $_POST['sname']; ?>">

	 				</div>
	 				<div class="form-group">
	 					<label>Username</label>
	 					<input type="text" name="uname" class="form-control" placeholder="Username" value="<?php if(isset($POST['uname'])) echo $_POST['uname']; ?>">

	 				</div>
	 				<div class="form-group">
	 					<label>Email</label>
	 					<input type="email" name="email" class="form-control" placeholder="stanlee@gmail.com" value="<?php if(isset($POST['email'])) echo $_POST['email']; ?>">

	 				</div>
	 				<div class="form-group">
	 					<label>Select Country</label>
	 					<select name="country" class="form-control">
	 						<option value ="">Select Country</option>
	 						<option value ="India">India</option>
	 						<option value ="USA">USA</option>
	 						<option value ="Germany">Germany</option>
	 					</select>
	 				</div>
	 				<div class="form-group">
	 					<label>Phone Number</label>
	 					<input type="number" name="phone" class="form-control" placeholder="9456787" value="<?php if(isset($POST['phone'])) echo $_POST['phone']; ?>">

	 				</div>
	 				<div class="form-group">
	 					<label>Select Gender</label>
	 					<select name="gender" class="form-control">
	 						<option value ="">Select Gender</option>
	 						<option value ="Male">Male</option>
	 						<option value ="Female">Female</option>
	 					</select>
	 				</div>
	 				<div class="form-group">
	 					<label>Password</label>
	 					<input type="password" name="pass" class="form-control" placeholder="****">

	 				</div>
	 				<div class="form-group">
	 					<label>Confirm Password</label>
	 					<input type="password" name="con_pass" class="form-control" placeholder="****">

	 				</div>
	 				<input type="submit" name="create" class="btn btn-info" value="Create Account">
	 				<p>Already have an Account <a href="patientlogin.php">Click Here</a></p>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>

</body>
</html>