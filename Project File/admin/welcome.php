<!DOCTYPE html>
<?php 
	session_start();
	
	if(!isset($_SESSION['uname'])){
	header("location: index.php");
}
 $u_name = $_SESSION['uname'];
 include("header.php");

 $sel = "select * from admin where username='$u_name'";

	$runn = mysqli_query($con,$sel);
	$row = mysqli_fetch_array($runn);
	$id = $row['id'];
	$u_name = $row['username'];
	$access = $row['access'];
	$name = $row['name'];

?>
<html>
<head>
	<title>Welcome <?php echo $u_name; ?></title>
	
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
	<br>
<center><h2>Website Stats</h2></center>
	<br>
<div class="col-sm-3" >
	<div class="col-sm-1"></div>
	<div class="col-sm-10" style="background-color: black; color: white; border-radius: 5px;">
		<center>
		<h2>Welcome</h2>
		<h3><?php echo strtoupper($name); ?></h3>
		<br>
		<hr>
		<br>
		<h4>Access Type: <?php echo strtoupper($access); ?></h4>
		<br>
		</center>
	</div>
	<div class="col-sm-1"></div>
</div>
<div class="col-sm-8">
	<?php
				global $con;
				//no of comments

				$no_comment = "SELECT * FROM comments";
				$run_comment = mysqli_query($con,$no_comment);
				$no_of_comment = mysqli_num_rows($run_comment);

				// no of msg

				$no_msg = "SELECT * FROM user_messages";
				$run_msg = mysqli_query($con,$no_msg);
				$no_of_msg = mysqli_num_rows($run_msg);
				

				//no of posts

				$no_post = "SELECT * FROM posts";
				$run_post = mysqli_query($con,$no_post);
				$no_of_post = mysqli_num_rows($run_post);
				

				echo "
					<div class='col-sm-4'>
						<div class='panel panel-primary'>
						<div class='panel-heading'><h3>Total Comments</h3></div>
						  <div class='panel-body' style='background-color: #2471A3;'>
			<strong style='color: white; font-size: 60px;'>$no_of_comment</strong><font style=' color: white;font-size:30px;'> Comments</font>
						  </div>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='panel panel-primary'>
						<div class='panel-heading'><h3>Total Messages</h3></div>
						  <div class='panel-body' style='background-color: #2471A3;'>
						    <strong style='color: white; font-size: 60px;'>$no_of_msg</strong><font style=' color: white;font-size:30px;'> Messages</font>
						  </div>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='panel panel-primary'>
						<div class='panel-heading'><h3>Total Posts</h3></div>
						  <div class='panel-body' style='background-color: #2471A3;'>
						    <strong style='color: white; font-size: 60px;'>$no_of_post</strong><font style=' color: white;font-size:30px;'> Posts</font>
						  </div>
						</div>
					</div>
					<br>
					<br>
				";

				$no_user = "SELECT * FROM users";
				$run_user = mysqli_query($con,$no_user);
				$no_of_user = mysqli_num_rows($run_post);

				$no_fpost = "SELECT * FROM tblpost";
				$run_fpost = mysqli_query($con,$no_fpost);
				$no_of_fpost = mysqli_num_rows($run_fpost);


				$no_admin = "SELECT * FROM admin";
				$run_admin = mysqli_query($con,$no_admin);
				$no_of_admin = mysqli_num_rows($run_admin);

				echo "
					<div class='col-sm-4'>
						<div class='panel'>
						<div class='panel-heading' style='background-color: #7D3C98;'><h3 style='color: white;'>Total Users</h3></div>
						  <div class='panel-body' style='background-color: #6C3483;'>
						    <strong style='color: white; font-size: 40px;'>$no_of_user</strong><font style=' color: white;font-size:30px;'> Users</font>
						  </div>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='panel'>
						<div class='panel-heading' style='background-color: #7D3C98;'><h3 style='color: white;'>Total Forum Posts</h3></div>
						  <div class='panel-body' style='background-color: #6C3483;'>
						    <strong style='color: white; font-size: 40px;'>$no_of_fpost</strong><font style=' color: white;font-size:30px;'> Posts</font>
						  </div>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='panel'>
						<div class='panel-heading' style='background-color: #7D3C98;'><h3 style='color: white;'>Total Admins</h3></div>
						  <div class='panel-body' style='background-color: #6C3483;'>
						    <strong style='color: white; font-size: 40px;'>$no_of_admin</strong><font style=' color: white;font-size:30px;'> Admins</font>
						  </div>
						</div>
					</div>
				";
	?>
</div>
<div class="col-sm-1"></div>
</body>
</html>