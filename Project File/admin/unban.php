<?php 
	include("header.php");

	$useriid = $_POST['userid'];

	echo $useriid;

	$sel = "UPDATE users SET  status = 'verified' WHERE user_id = '$useriid'"; 
	//$query= mysqli_query($con, $sel);

	if ($con->query($sel) === TRUE) {
	  echo "<script type='text/javascript'> alert('User Unbanned...!');</script>";
	  echo "<script>window.open('alluser.php', '_self')</script>";
	} else {
	  echo "Error banning user: " . $con->error;
	}


?>
