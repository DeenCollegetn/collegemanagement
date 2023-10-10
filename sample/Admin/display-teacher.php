<!---------------- Session starts form here ----------------------->
<?php  
	session_start();

	if ($_SESSION["LoginAdmin"] && !$_SESSION['LoginTeacher'])
	{
		$teacher_id=$_GET['teacher_id'];
	}
	else if(!$_SESSION["LoginAdmin"] && $_SESSION['LoginTeacher']){
		$teacher_email=$_SESSION['LoginTeacher'];
		$teacher_id="";
	}
	else{ ?>
		<script> alert("Your Are Not Autorize Person For This link");</script>
	<?php
		header('location:../login/login.php');
	}
	require_once "../connection/connection.php";
?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Teacher Information</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
	<?php
		if($teacher_id){
			$query="select * from teacher_info where teacher_id='$teacher_id'";
		}
		else{
			$query="select * from teacher_info where email='$teacher_email'";
		}
		
		$run=mysqli_query($con,$query);
		while ($row=mysqli_fetch_array($run)) {
	?>
		<div class="container  mt-1 border border-secondary mb-1">
			<div class="row text-white bg-primary pt-5">
				<div class="col-md-4">
					<?php  $profile_image= $row["profile_image"] ?>
					<img class="ml-5 mb-5" height='270px' width='250px' src=<?php echo "images/$profile_image"  ?> >
				</div>
				<div class="col-md-8">
					<h3 class="ml-5"><?php echo $row['first_name'] ?></h3><br>
					<div class="row">
						<div class="col-md-6">
							<h5>Father Name:</h5> <?php echo $row['middle_name']  ?><br><br>
							<h5>Email:</h5> <?php echo $row['email']  ?><br><br>
							<h5>Contact:</h5> <?php echo $row['phone_no']  ?><br><br>
						</div>
						<div class="col-md-6">
							<h5>Address:</h5> <?php echo $row['permanent_address']  ?><br><br>
							<h5>Mother Name:</h5> <?php echo $row['last_name']  ?><br><br>
							<h5>Teacher I'd:</h5> <?php echo $row['teacher_id']  ?><br><br>
						</div>		
					</div>
				</div>
				<hr>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Status:</h5> <?php echo $row['teacher_status']  ?></div>
				<div class="col-md-4"><h5>Gender:</h5> <?php echo $row['gender']  ?></div>
				<div class="col-md-4"><h5>Date of Birth:</h5> <?php echo $row['dob']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Phone No:</h5> <?php echo $row['other_phone']  ?></div>
				<div class="col-md-4"><h5>Mail Id:</h5> <?php echo $row['email']  ?></div>
				<div class="col-md-4"><h5>Aadhar No:</h5> <?php echo $row['cnic']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Permanent Adress:</h5> <?php echo $row['permanent_address']  ?></div>
				<div class="col-md-4"><h5>Current Address:</h5> <?php echo $row['current_address']  ?></div>
				<div class="col-md-4"><h5>Blood Group:</h5> <?php echo $row['place_of_birth']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>M,Phil Complition Date:</h5> <?php echo $row['matric_complition_date']  ?></div>
				<div class="col-md-4"><h5>M.Phil Awarded Date:</h5> <?php echo $row['matric_awarded_date']  ?></div>
				<div class="col-md-4"><h5>M.phil Certificate:</h5>
        <?php  $ba_certificate= $row["ba_certificate"] ?>
        <img class="ml-5 mb-5" height='100px' width='100px' src=<?php echo "images/$ba_certificate"  ?> >
    </div>
			</div>
      <div class="row pt-3">
        <div class="col-md-4">
          <h5>PG Complition Date:</h5>
          <?php echo $row['fa_complition_date']  ?>
        </div>
        <div class="col-md-4">
          <h5>PG Awarded Date:</h5>
          <?php echo $row['fa_awarded_date']  ?>
        </div>
        <div class="col-md-4">
          <h5>PG Certificate:</h5>
          <?php  $fa_certificate= $row["fa_certificate"] ?>
          <img class="ml-5 mb-5" height='100px' width='100px' src=<?php echo "images/$fa_certificate"  ?> >
        </div>
      </div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>M.Phil Complition Date:</h5> <?php echo $row['ba_complition_date']  ?></div>
				<div class="col-md-4"><h5>M.Phil Awarded Date:</h5> <?php echo $row['ba_awarded_date']  ?></div>
				<div class="col-md-4">
          <h5>M.phil Certificate:</h5>
          <?php  $ba_certificate= $row["ba_certificate"] ?>
          <img class="ml-5 mb-5" height='100px' width='100px' src=<?php echo "images/$ba_certificate"  ?> >
        </div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Ph.d Complition Date:</h5> <?php echo $row['ma_complition_date']  ?></div>
				<div class="col-md-4"><h5>p.hd Awarded Date:</h5> <?php echo $row['ma_awarded_date']  ?></div>
				<div class="col-md-4">
          <h5>Ph.d Certificate:</h5>
          <?php  $ma_certificate= $row["ma_certificate"] ?>
          <img class="ml-5 mb-5" height='100px' width='100px' src=<?php echo "images/$ma_certificate"  ?> >
        </div>
			</div>
		</div>
	<?php } ?>
</body>
</html>
