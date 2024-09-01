<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"lms");
	$query = "delete from eresources where e_id= $_GET[en]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("eresources Deleted successfully...");
	window.location.href = "manage.php";
</script>