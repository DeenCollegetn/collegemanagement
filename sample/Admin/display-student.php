<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	
	if ($_SESSION["LoginAdmin"])
	{
		$roll_no=$_GET['roll_no'] ?? $_SESSION['LoginStudent'];
	}
	else if(!$_SESSION["LoginAdmin"] && $_SESSION['LoginStudent']){
		$roll_no=$_SESSION['LoginStudent'];
	}
	else{ ?>
		<script> alert("Your Are Not Authorize Person For This link");</script>
	<?php
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Student Information</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
	<?php
	$query="select * from student_info where roll_no='$roll_no'";
	$run=mysqli_query($con,$query);
	while ($row=mysqli_fetch_array($run)) {
		?>
		<div class="container  mt-1 border border-secondary mb-1">
			<div class="row text-white bg-primary pt-5">
				<div class="col-md-4">
          <h5>Stdent Name:</h5><?php echo $row['first_name']  ?><br></br>
					<?php  $profile_image= $row["profile_image"] ?>
					<img class="ml-5 mb-5" height='290px' width='250px' src=<?php echo "images/$profile_image"  ?> >
                        </div>
				<div class="col-md-8">
					
					<div class="row">
						<div class="col-md-6">
              <h5>Father Image:</h5>
              <?php  $matric_certificate= $row["matric_certificate"] ?>
              <img class="ml-5 mb-5" height='190px' width='150px' src="<?php echo "images/$matric_certificate"  ?>" >
              <h5>Email:</h5> <?php echo $row['email']  ?><br><br>
							<h5>Contact:</h5> <?php echo $row['mobile_no']  ?><br><br>
						</div>
						<div class="col-md-6">
              <h5>Mother Image:</h5>
              <?php  $fa_certificate= $row["fa_certificate"] ?>
              <img class="ml-5 mb-5" height='190px' width='150px' src="<?php echo "images/$fa_certificate"  ?>" >

              <h5>Roll No:</h5> <?php echo $row['roll_no']  ?><br><br>
                <h5>Register No:</h5> <?php echo $row['middle_name']  ?>
              <br><br>
						</div>		
					</div>
				</div>
				<hr>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Bank Account No:</h5> <?php echo $row['acc_no']  ?></div>
				<div class="col-md-4"><h5>IFSC code:</h5> <?php echo $row['ifsc']  ?></div>
				<div class="col-md-4"><h5>Aadhar No:</h5> <?php echo $row['aadhar']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Nationality:</h5> <?php echo $row['mobile_no']  ?></div>
				<div class="col-md-4"><h5>Religion:</h5> <?php echo $row['blood_group']  ?></div>
				<div class="col-md-4"><h5>community:</h5> <?php echo $row['community']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Gender:</h5> <?php echo $row['gender']  ?></div>
				<div class="col-md-4"><h5>Course:</h5> <?php echo $row['course_name']  ?></div>
				<div class="col-md-4"><h5>Batch:</h5> <?php echo $row['batch']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Date of Birth:</h5> <?php echo $row['dob']  ?></div>
				<div class="col-md-4"><h5>Mother Name:</h5> <?php echo $row['last_name']  ?></div>
				<div class="col-md-4"><h5>Blood Group:</h5> <?php echo $row['blood_group']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Permanent Adress:</h5> <?php echo $row['permanent_address']  ?></div>
				<div class="col-md-4"><h5>Current Address:</h5> <?php echo $row['current_address']  ?></div>
				<div class="col-md-4"><h5>EMIS No:</h5> <?php echo $row['emis']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Father Occupation:</h5> <?php echo $row['father_occupation']  ?></div>
				<div class="col-md-4"><h5>Father Income:</h5> <?php echo $row['father_income']  ?></div>
				<div class="col-md-4"><h5>Father Image:</h5> <?php echo $row['matric_certificate']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Mother occupation:</h5> <?php echo $row['mother_occupation']  ?></div>
				<div class="col-md-4"><h5>Mother income:</h5> <?php echo $row['mother_income']  ?></div>
      <div class="row pt-3">
        <div class="col-md-4">  <h5>10th Certificate:</h5>
        <?php  $sslc_certificate= $row["sslc_certificate"] ?>
        <img class="ml-5 mb-5" height='290px' width='250px' src="<?php echo "images/$sslc_certificate"  ?>" ></div>
                <div class="col-md-4">
               </div> 
        <div class="col-md-4">
          <h5>12th Certificate:</h5>
        <?php  $hslc_certificate= $row["hslc_certificate"] ?>
        <img class="ml-5 mb-5" height='290px' width='250px' src="<?php echo "images/$hslc_certificate"  ?>" ></div>
      </div>
		</div>
	<?php } ?>
</body>
</html>
