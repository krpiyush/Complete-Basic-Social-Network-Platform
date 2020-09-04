<?php
	include("includes/db.php");

	$user_id = $_POST['userid'];

				$no_comment = "SELECT * FROM comments where user_id='$user_id'";
				$run_comment = mysqli_query($con,$no_comment);
				$no_of_comment = mysqli_num_rows($run_comment);

				// no of msg

				$no_msg = "SELECT * FROM user_messages where user_from='$user_id'";
				$run_msg = mysqli_query($con,$no_msg);
				$no_of_msg = mysqli_num_rows($run_msg);
				

				//no of posts

				$no_post = "SELECT * FROM posts where user_id='$user_id'";
				$run_post = mysqli_query($con,$no_post);
				$no_of_post = mysqli_num_rows($run_post);
				$total_points= $no_of_post + $no_of_msg + $no_of_comment;

	$sl = "SELECT * FROM wallet WHERE user_id ='$user_id' ";
	$r = mysqli_query($con,$sl);
	$no = mysqli_num_rows($r);
	
	if ($no>0) {
				$sel = "UPDATE wallet SET  t_msg = '$no_of_msg' , t_comment	='$no_of_comment', t_post = '$no_of_post', user_id	= '$user_id', t_point = '$total_points' WHERE user_id = '$user_id'";
				if ($con->query($sel) === TRUE) {
					  echo "<script type='text/javascript'> alert('Updated...!');</script>";
					  echo "<script>window.open('wallet.php?u_id=$user_id', '_self')</script>";
					}
			}else{
				$sq = "INSERT into wallet (t_msg,t_comment,t_post,user_id,t_point) VALUES('$no_of_msg','$no_of_comment','$no_of_post','$user_id','$total_points')";
				  if ($con->query($sq) === TRUE) {
				  	echo "<script type='text/javascript'> alert('Inserted...!');</script>";
				  	echo "<script>window.open('wallet.php?u_id=$user_id', '_self')</script>";
				  	}
			}		


?>