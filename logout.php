<?php
	session_unset();
	session_destroy();
	header("Location:ask_M_or_U.php");
?>