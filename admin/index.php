<?php
session_start();
  ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php

	include("../include/header.php");
	include("../include/connection.php");

	  ?>

	  <div class="container-fluid">
	  	<div class="col-md-12">
	  		<div class="row">
	  			<div class="col-md-2" style="margin-left: -30px;">
                    
	  				<?php 

	  				include("sidenav.php");


	  				 ?>
	  				


	  			</div>
	  			<div class="col-md-10">

	  				<h4 class="my-2">Admin Dashboard</h4>

	  				<div class="col-md-10 my-1">
	  					<div class="row">
	  						<div class="col-md-3 bg-success mx-2" style="height: 120px;">
	  							<div class="col-md-10">
	  								<div class="row">
	  									<div class="col-md-7">

	  										<?php
	  										$ad = mysqli_query($connect, "SELECT * FROM admin");
	  										$num = mysqli_num_rows($ad);
	  										  ?>

	  										<h5 class="text-white">Total</h5>
	  										<h5 class="text-white">Admins</h5>
	  										<h5 class="text-white" style="font-size:30px;">  <?php echo $num;  ?></h5>
	  										
	  									</div>
	  									<div class="col-md-3" style="margin-left:30px;">
	  										<a href="admin.php"><i class="fa fa-user-md fa-3x" style="color: black;"></i></a>
	  									</div>
	  									
	  								</div>
	  								
	  							</div>
	  							
	  						</div>

	  						<div class="col-md-3 bg-info  mx-2" style="height: 120px;">

	  							<div class="col-md-10">
	  								<div class="row">
	  									<div class="col-md-7">
	  										<?php
                                            
                                            $doctor = mysqli_query($connect,"SELECT * FROM doctors WHERE status='Approved'");

                                            $num2 = mysqli_num_rows($doctor);

	  										?>
	  										<h5 class="text-white">Total</h5>
	  										<h5 class="text-white">Doctors</h5>
	  										<h5 class="text-white" style="font-size:30px;"><?php echo $num2; ?></h5>
	  										
	  									</div>
	  									<div class="col-md-3" style="margin-left:30px;">
	  										<a href="doctor.php"><i class="fa fa-user-md fa-3x" style="color: black;"></i></a>
	  									</div>
	  									
	  								</div>
	  								
	  							</div>
	  							
	  						</div>

	  						<div class="col-md-3 bg-warning  mx-2" style="height: 120px;">

	  							<div class="col-md-10">
	  								<div class="row">
	  									<div class="col-md-7">
	  										<?php
                                            
                                            $p = mysqli_query($connect,"SELECT * FROM patient");

                                            $pp= mysqli_num_rows($p);

	  										?>
	  										<h5 class="text-white">Total</h5>
	  										<h5 class="text-white">Patients</h5>
	  										<h5 class="text-white" style="font-size:30px;"><?php echo $pp; ?></h5>
	  										
	  									</div>
	  									<div class="col-md-3" style="margin-left:30px;">
	  										<a href="patient.php"><i class="fa fa-user-injured fa-3x" style="color: black;"></i></a>
	  									</div>
	  									
	  								</div>
	  								
	  							</div>
	  							
	  						</div>

	  						<div class="col-md-3 bg-danger  mx-2 my-2" style="height: 120px;">

	  							<div class="col-md-10">
	  								<div class="row">
	  									<div class="col-md-7">
	  											<?php
                                            
                                            $re = mysqli_query($connect,"SELECT * FROM report");

                                            $rep= mysqli_num_rows($re);

	  										?>
	  										<h5 class="text-white">Total</h5>
	  										<h5 class="text-white">Reports</h5>
	  										<h5 class="text-white" style="font-size:30px;"><?php echo $rep; ?></h5>
	  										
	  									</div>
	  									<div class="col-md-3" style="margin-left:30px;">
	  										<a href="report.php"><i class="fa fa-flag fa-3x" style="color: black;"></i></a>
	  									</div>
	  									
	  								</div>
	  								
	  							</div>
	  							
	  							
	  						</div>

	  						<div class="col-md-3 bg-warning  mx-2 my-2" style="height: 120px;">

	  							<div class="col-md-10">
	  								<div class="row">
	  									<div class="col-md-7">
	  										<?php
	  										$job = mysqli_query($connect,"SELECT * FROM doctors WHERE status = 'Pendding'");
	  										$num1 = mysqli_num_rows($job);
	  										?>
	  										<h5 class="text-white">Total</h5>
	  										<h5 class="text-white">Job Requests</h5>
	  										<h5 class="text-white" style="font-size:30px;"><?php echo $num1; ?></h5>
	  										
	  									</div>
	  									<div class="col-md-3" style="margin-left:30px;">
	  										<a href="job_request.php"><i class="fa fa-book-reader fa-3x" style="color: black;"></i></a>
	  									</div>
	  									
	  								</div>
	  								
	  							</div>
	  							
	  						</div>

	  						<div class="col-md-3 bg-success  mx-2 my-2" style="height: 120px;">

	  							<div class="col-md-10">
	  								<div class="row">
	  									<div class="col-md-7">

	  										<?php
	  										$in = mysqli_query($connect,"SELECT sum(amount_paid) as profit FROM income");
	  										$row = mysqli_fetch_array($in);
	  										$inc = $row['profit'];
	  										?>

	  										<h5 class="text-white">Total</h5>
	  										<h5 class="text-white">Income</h5>
	  										<h5 class="text-white" style="font-size:30px;"><?php echo "$$inc" ?></h5>
	  										
	  									</div>
	  									<div class="col-md-3" style="margin-left:30px;">
	  										<a href="income.php"><i class="fa fa-coins fa-3x" style="color: black;"></i></a>
	  									</div>
	  									
	  								</div>
	  								
	  							</div>
	  							
	  						</div>
	  						
	  					</div>
	  					
	  				</div>
	  				


	  			</div>
	  		</div>
	  		
	  	</div>
	  	
	  </div>

</body>
</html>