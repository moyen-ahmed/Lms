<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");

	$filename=$_FILES["uploadfile"]["name"];
	$tempname=$_FILES["uploadfile"]["tmp_name"];
	$folder="image/".$filename;
	
	move_uploaded_file($tempname,$folder);
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$mobile=$_POST['mobile'];
	$address=$_POST['address'];


	$query = "INSERT INTO `users`(`std_image`, `name`, `email`, `password`, `mobile`, `address`) VALUES ('$folder','$name','$email','$password','$mobile','$address')";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Registration successfull...You may Login now !!");
	window.location.href = "index.php";
</script>