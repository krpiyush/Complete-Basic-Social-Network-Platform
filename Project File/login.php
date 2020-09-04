<?php
session_start();

include("includes/db.php");

	if (isset($_POST['login'])) {

		$email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
		$pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));

		$select_user = "select * from users where user_email='$email' AND user_pass='$pass' AND status='verified'";
		$query= mysqli_query($con, $select_user);
		$check_user = mysqli_num_rows($query);

		if($check_user == 1){
			$_SESSION['user_email'] = $email;

			echo "<script>window.open('home.php', '_self')</script>";
		}else{
			echo"<script>alert('Your Email or Password is incorrect or You are Ban')</script>";
		}

		$queryy = "SELECT * FROM users WHERE user_email='$email' AND user_pass='$pass'";
    	$result = mysql_query($queryy) or die ("Verification error");
    	$arrayy = mysql_fetch_array($result);
    
    	if ($arrayy['user_email'] == $email){
        $_SESSION['username'] = $arrayy['user_name'];
        $_SESSION['fname'] = $arrayy['f_name'];
        $_SESSION['lname'] = $arrayy['l_name'];
        $_SESSION['user_Id'] = $arrayy['user_id'];
       // header("Location: home.php");
   		 }
	}	
?>