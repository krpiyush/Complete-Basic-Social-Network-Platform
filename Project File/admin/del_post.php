<?php 
	include("header.php");

	$useriid = $_POST['userid'];
	echo $useriid;

	$sel = "DELETE FROM posts WHERE post_id='$useriid'";
	//$sel = "UPDATE users SET  status = 'Banned' WHERE user_id = '$useriid'"; 
	//$query= mysqli_query($con, $sel);

	echo $sel;

	if ($con->query($sel) === TRUE) {
	  echo "<script type='text/javascript'> alert('Post Deleted...!');</script>";
	  echo "<script>window.open('post.php', '_self')</script>";
	} else {
	  echo "Error banning user: " . $con->error;
	}


?>
