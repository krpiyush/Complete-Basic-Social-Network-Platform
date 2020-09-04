<?php 
	include("header.php");

	$useriid = $_POST['userid'];
	echo $useriid;

	$sel = "DELETE FROM admin WHERE id='$useriid'";
	//$sel = "UPDATE users SET  status = 'Banned' WHERE user_id = '$useriid'"; 
	//$query= mysqli_query($con, $sel);

	echo $sel;

	if ($con->query($sel) === TRUE) {
	  echo "<script type='text/javascript'> alert('Admin Banned...!');</script>";
	  echo "<script>window.open('admin.php', '_self')</script>";
	} else {
	  echo "Error banning user: " . $con->error;
	}


?>
