<?php 
	include("header.php");

	$useriid = $_POST['userid'];

	echo $useriid;

	$sel = "UPDATE pay_req SET  status = 'Success' WHERE id = '$useriid'"; 
	//$query= mysqli_query($con, $sel);

	if ($con->query($sel) === TRUE) {
	  echo "<script type='text/javascript'> alert('Updated...!');</script>";
	  echo "<script>window.open('payment_req.php', '_self')</script>";
	} else {
	  echo "Error banning user: " . $con->error;
	}


?>
