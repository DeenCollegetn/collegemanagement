<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
		$_SESSION["LoginStudent"]="";
	?>
<!---------------- Session Ends form here ------------------------>


<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php  
 	if (isset($_POST['btn_save'])) {

		$roll_no= $_POST["roll_no"];

 		$first_name=$_POST["first_name"];

 		$middle_name=$_POST["middle_name"];
 		
 		$last_name=$_POST["last_name"];
 		
 		$father_name=$_POST["father_name"];
 		
 		$email=$_POST["email"];
 		
 		$mobile_no=$_POST["mobile_no"];

 		$course_name=$_POST['course_name'];

 		$batch=$_POST['batch'];
 		
 		$aadhar=$_POST["aadhar"];
 		
 		$acc_no=$_POST["acc_no"];
 		
 		$ifsc=$_POST["ifsc"];
 		
 		$nationality=$_POST["nationality"];
 		
 		$religion=$_POST["religion"];
 		
 		$emis=$_POST["emis"];
 		
 		$dob=$_POST["dob"];
 		 		
 		$gender=$_POST["gender"];
 		
		$permanent_address=$_POST["permanent_address"];
 		
 		$current_address=$_POST["current_address"];
 		
 		$blood_group=$_POST["blood_group"];
 		
 		$father_occupation=$_POST["father_occupation"];
 		
 		$father_income=$_POST["father_income"];
 		
 		$mother_occupation=$_POST["mother_occupation"];
 		
 		$mother_income=$_POST["mother_income"];
 		
 		$community=$_POST["community"];
 		
 		$password=$_POST['password'];

 		$role=$_POST['role'];

 		

// *****************************************Images upload code starts here********************************************************** 
		$profile_image = $_FILES['profile_image']['name'];$tmp_name=$_FILES['profile_image']['tmp_name'];$path = "images/".$profile_image;move_uploaded_file($tmp_name, $path);

		$matric_certificate = $_FILES['matric_certificate']['name'];$tmp_name=$_FILES['matric_certificate']['tmp_name'];$path = "images/".$matric_certificate;move_uploaded_file($tmp_name, $path);

		$fa_certificate = $_FILES['fa_certificate']['name'];$tmp_name=$_FILES['fa_certificate']['tmp_name'];$path = "images/".$fa_certificate;move_uploaded_file($tmp_name, $path);

		$sslc_certificate = $_FILES['sslc_certificate']['name'];$tmp_name=$_FILES['sslc_certificate']['tmp_name'];$path = "images/".$sslc_certificate;move_uploaded_file($tmp_name, $path);

    $hslc_certificate = $_FILES['hslc_certificate']['name'];$tmp_name=$_FILES['hslc_certificate']['tmp_name'];$path = "images/".$hslc_certificate;move_uploaded_file($tmp_name, $path);
// *****************************************Images upload code end here********************************************************** 

 		$query="Insert into student_info(roll_no,first_name,middle_name,last_name,father_name,email,mobile_no,course_name,batch,profile_image,aadhar,acc_no,ifsc,nationality,religion,emis,dob,gender,permanent_address,current_address,blood_group,father_occupation,father_income,matric_certificate,mother_occupation,mother_income,fa_certificate,community,sslc_certificate,hslc_certificate)values('$roll_no','$first_name','$middle_name','$last_name','$father_name','$email','$mobile_no','$course_name','$batch','$profile_image','$aadhar','$acc_no','$ifsc','$nationality','$religion','$emis','$dob','$gender','$permanent_address','$current_address','$blood_group','$father_occupation','$father_income','$matric_certificate','$mother_occupation','$mother_income','$fa_certificate','$community','$sslc_certificate','$hslc_certificate')";
 		$run=mysqli_query($con, $query);
 		if ($run) {
 			echo "Your Data has been submitted";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}
 		$query2="insert into login(user_id,Password,Role)values('$roll_no','$password','$role')";
 		$run2=mysqli_query($con, $query2);
 		if ($run2) {
 			echo "Your Data has been submitted into login";
 		}
 		else {
 			echo "Your Data has not been submitted into login";
 		}
 	}
?>


<?php  
	if (isset($_POST['btn_save2'])) {
		$course_code=$_POST['course_code'];

		$semester=$_POST['semester'];

		$roll_no=$_POST['roll_no'];

		$subject_code=$_POST['subject_code'];

		$date=date("d-m-y");

		$query3="insert into student_courses(course_code,semester,roll_no,subject_code,assign_date)values('$course_code','$semester','$roll_no','$subject_code','$date')";
		$run3=mysqli_query($con,$query3);
		if ($run3) {
 			echo "Your Data has been submitted";
 		}
 		else {
 			echo "Your Data has not been submitted";
 		}


	}
?>
<!--*********************** PHP code end from here for data insertion into database ******************************* -->
 
<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Register Student</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Student Management System </h4>
						<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add Student</button>
					</div>
				</div>
				<div class="col-md-2 pt-3 w-100">
  				    <!-- Large modal -->
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					   <div class="modal-dialog modal-lg">
						    <div class="modal-content">
							    <div class="modal-header bg-info text-white">
							        <h4 class="modal-title text-center">Add New Student</h4>
						        </div>
							    <div class="modal-body">
							        <form action="student.php" method="POST" enctype="multipart/form-data">
										<div class="row mt-3">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">student Name:*</label>
											        <input type="text" name="first_name" class="form-control" required>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Registration Number:</label>
												    <input type="text" name="middle_name" class="form-control" >
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1" required>Mother Name:*</label>
												    <input type="text" name="last_name" class="form-control" required="">
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Father Name:*</label>
											        <input type="text" name="father_name" class="form-control" required="">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Student Roll No:</label>
												    <input type="text" name="roll_no" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Student Email:*</label>
												    <input type="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="">
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Department: </label>
											        <select class="browser-default custom-select" name="course_name" required="">
													    <option >Select Course</option>
													    <?php
															$query="select course_name from courses";
															$run=mysqli_query($con,$query);
															while($row=mysqli_fetch_array($run)) {
															 echo	"<option value=".$row['course_name'].">".$row['course_name']."</option>";
															}
														?>
													</select>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">batch:</label>
                          <input type="text" name="batch" class="form-control" required="">

											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Your Profile Image:</label>
												    <input type="file" name="profile_image" placeholder="Student Age" class="form-control" required="">
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Aadhar Number: </label>
                            <input type="text" name="aadhar" class="form-control" required="">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Bank Account Number:</label>
                          <input type="text" name="acc_no" class="form-control" required="">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">IFSC Code:</label>
												    <input type="text" name="ifsc" class="form-control" required="">
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Nationality: </label>
                            <input type="text" name="nationality" class="form-control" required="">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Religion:</label>
                          <input type="text" name="religion" class="form-control" required="">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">EMIS No:</label>
												    <input type="text" name="emis"  class="form-control">
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Date of Birth: </label>
											        <input type="date" name="dob" class="form-control" required="">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Mobile No:*</label>
												    <input type="number" name="mobile_no" class="form-control" required>
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Gender:</label>
												    <select class="browser-default custom-select" name="gender">
													  <option>Select Gender</option>
													  <option value="Male">Male</option>
													  <option value="Female">Female</option>
													</select>
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Permanent Address: </label>
											        <input type="text" name="permanent_address" class="form-control">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Current Address:</label>
												    <input type="text" name="current_address" class="form-control" required="">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Blood Group:</label>
												    <input type="text" name="blood_group" class="form-control" required="">
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">father occupation: </label>
											        <input type="text" name="father_occupation" class="form-control" required="">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Father income:</label>
												    <input type="text" name="father_income" class="form-control" required="">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">Father image:</label>
												    <input type="file" name="matric_certificate" class="form-control" value="there is no image" required="">
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">Mother occupation: </label>
											        <input type="text" name="mother_occupation" class="form-control" required="">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">mother income:</label>
												    <input type="text" name="mother_income" class="form-control" required="" >
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">mother image:</label>
												    <input type="file" name="fa_certificate" class="form-control" value="there is no image" required="">
											    </div>
											</div>
								  		</div>
								  		<div class="row">
											<div class="col-md-4">
											    <div class="form-group">
											        <label for="exampleInputEmail1">community</label>
											        <input type="text" name="community" class="form-control" required="">
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
                          <label for="exampleInputPassword1">upload 10th certificate:</label>
                          <input type="file" value="C:/xampp/htdocs/Imperial University/Images/no-image-available.jpg" name="sslc_certificate" class="form-control" >
											    </div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
												    <label for="exampleInputPassword1">upload 12th certificate:</label>
												    <input type="file" value="C:/xampp/htdocs/Imperial University/Images/no-image-available.jpg" name="hslc_certificate" class="form-control" >
											    </div>
											</div>
								  		</div>
								  		<!-- _________________________________________________________________________________
								  											Hidden Values are here
								  		_________________________________________________________________________________ -->
								  		<div>
											<input type="hidden" name="password" value="student123*">
											<input type="hidden" name="role" value="Student">
								  		</div>
								  		<!-- _________________________________________________________________________________
								  											Hidden Values are end here
								  		_________________________________________________________________________________ -->
								  		<div class="modal-footer">
						   		            <input type="submit" class="btn btn-primary" name="btn_save">
		      								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									    </div>
									</form>
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
							</div>
              <table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="10">
                <tr class="table-tr-head table-three text-white">
                  <th>Roll.No</th>
                  <th>Student Name</th>
                  <th>Current Address</th>
                  <th>Course Name</th>

                  <th>Profile</th>
                  <th colspan="1">Operations</th>
                </tr>
                <?php 
								$query="select first_name,course_name,current_address,roll_no,profile_image from student_info";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
                <tr>
                  <td>
                    <?php echo $row["roll_no"] ?>
                  </td>
                  <td>
                    <?php echo $row["first_name"] ?>
                  </td>
                  <td>
                    <?php echo $row["current_address"] ?>
                  </td>

                  <td>
                    <?php echo $row["course_name"] ?>
                  </td>
                  <!-- date_format($date,"Y/m/d H:i:s"); -->

                  <td>
                    <?php  $profile_image= $row["profile_image"] ?>
                    <img height='50px' width='50px' src='<?php echo "images/$profile_image"  ?>' >
                  </td>
                  <td width='170'>
                    <?php 
												echo "<a class='btn btn-primary' href=display-student.php?roll_no=".$row['roll_no'].">Profile</a> 
												<a class='btn btn-danger' href=delete-function.php?roll_no=".$row['roll_no'].">Delete</a> "
											?>
                  </td>
                </tr>
                <?php }
								?>
              </table>
            </section>
					</div>
				</div>	 
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>