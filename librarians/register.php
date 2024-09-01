<?php

	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");

	$filename=$_FILES["uploadfile"]["name"];
	$tempname=$_FILES["uploadfile"]["tmp_name"];
	$folder="image/".$filename;
	
	move_uploaded_file($tempname,$folder);
	$name=$_POST['name'];
	$email=$_POST['email'];
	$branch_id=$_POST['branch_id'];
	$job_role=$_POST['job_role'];
	$password=$_POST['password'];
	$mobile=$_POST['mobile'];
	$branch_id=$_POST['branch_id'];


	$query = "INSERT INTO `librarians`(`id`,`lib_image`,`name`,`email`,`job_role`,`password`,`mobile`,`branch_id`) VALUES ('','$folder','$name','$email','$job_role','$password','$mobile','$branch_id')";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Registration successfull...You may Login now !!");
	window.location.href = "index.php";
</script>