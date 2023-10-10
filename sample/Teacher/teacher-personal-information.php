<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginTeacher"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
	?>
<!---------------- Session Ends form here ------------------------>


<?php 
 
	$teacher_id=$_SESSION['LoginTeacher'];
	$query1="select * from teacher_info where email='$teacher_id'";
	$run1=mysqli_query($con,$query1);
	while ($row=mysqli_fetch_array($run1)){
		$teacher_id=$row['teacher_id'];
	}


	if (isset($_POST['sub'])) {

		$first_name=$_POST['first_name'];

		$middle_name=$_POST['middle_name'];

		$last_name=$_POST['last_name'];

		$cnic=$_POST['cnic'];

		$phone_no=$_POST['phone_no'];
		
		$last_qualification=$_POST['last_qualification'];

		$current_address=$_POST['current_address'];

		$permanent_address=$_POST['permanent_address'];

		

		$query="update teacher_info set first_name='$first_name',middle_name='$middle_name',last_name='$last_name',cnic='$cnic',phone_no='$phone_no',current_address='$current_address',permanent_address='$permanent_address',last_qualification='$last_qualification' where teacher_id='$teacher_id'";
		$run=mysqli_query($con,$query);
		if ($run) {  ?>
 			<script type="text/javascript">
 				alert("Teacher data has been updated");
 			</script>
 		<?php }
 		else { ?>
 			<script type="text/javascript">
 				alert("Teacher data has not been updated paid due to some errors");
 			</script>
 		<?php }
	}
?>


<!doctype html>
<html lang="en">
	<head>
		<title>Teacher Personal Information</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/teacher-sidebar.php') ?>  

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 main-background mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-4 text-white admin-dashboard pl-3">
					<h4 class="">Update Your Personal Infromation</h4>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<form action="teacher-personal-information.php" method="post">
							<?php $teacher_id=$_SESSION['LoginTeacher'];
								$query="select * from teacher_info where email='$teacher_id'";
								$run=mysqli_query($con,$query);
								while ($row=mysqli_fetch_array($run)) {?>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">First Name:*</label>
										<input type="text" class="form-control" name="first_name" value=<?php echo $row['first_name'] ?>>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Father Name:*</label>
										<input type="text" class="form-control" name="middle_name"value=<?php echo $row['middle_name'] ?>>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">mother Name:*</label>
										<input type="text" class="form-control" name="last_name"value=<?php echo $row['last_name'] ?>>
									</div>
								</div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Permanent Address:*</label>
                    <input type="text" class="form-control" name=" permanent_address"  value=<?php echo $row['permanent_address'] ?>>
                  </div>
                </div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Aadhar:*</label>
										<input type="text" class="form-control" name="cnic" value=<?php echo $row['cnic'] ?>>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputPassword1">Mobile:*</label>
										<input type="text" class="form-control" name="phone_no"  value=<?php echo $row['phone_no'] ?>>
									</div>
								</div>
							</div>
							<div class="row">
								
								
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Current Address:*</label>
                    <input type="text" class="form-control" name="current_address" value=<?php echo $row['current_address'] ?>>
                  </div>
                </div>
							</div>
							<div class="row">
								
							
							</div>
							
							
						<?php } ?>
							<div class="row">
								<div class="col-md-4 offset-5 mt-3">
									<button type="submit" name="sub" class="btn btn-primary">Update Information</button>
								</div>
							</div>
						</form>
					</div>
				</div>	
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>