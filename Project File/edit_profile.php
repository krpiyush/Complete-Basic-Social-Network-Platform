<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<html>
<head>
	<?php
		$user = $_SESSION['user_email'];
		$get_user = "select * from users where user_email='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);

		$user_name = $row['user_name'];
	?>
	<title>Edit Your Account Details</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles/home_style2.css">
</head>
<style type="text/css">

	input[type="file"] {
    display: none;
	}

</style>
<body>
<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-8">
		<form action="" method="post" enctype="multipart/form-data">
			<table class="table table-bordered table-hover">
				<tr align="center">
					<td colspan="6" class="active"><h2>Edit Your Profile</h2></td>
				</tr>
				<tr>
					<td style="font-weight: bold;">First Name:</td>

					<td>
						<input class="form-control"
						type="text" name="f_name" required value="<?php echo $first_name; ?>">

					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Last Name:</td>

					<td>
						<input class="form-control" type="text" name="l_name" required value="<?php echo $last_name; ?>">

					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Username:</td>
					<td>
						<input class="form-control" type="text" name="u_name" required value="<?php echo $user_name; ?>">
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Description:</td>
					<td>
						<input class="form-control" type="text" name="describe_user" required value="<?php echo $describe_user; ?>">
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Relationship Status:</td>
					<td>
						<select class="form-control" name="relationship">
							<option><?php echo $Relationship_status ?></option>
							<option>Single</option>
							<option>Engaged</option>
							<option>Married</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">password:</td>
					<td>
						<input class="form-control" type="password" name="user_pass" id="mypass" required value="<?php echo $user_pass; ?>">
						<input type="checkbox" onclick="show_password()"><strong>Show Password</strong>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Email:</td>
					<td>
						<input class="form-control" type="email" name="u_email" required value="<?php echo $user_email; ?>">
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Country:</td>
					<td>
						<select class="form-control" name="u_country">
							<option><?php echo $user_country; ?></option>
							<option>India</option>
							<option>USA</option>
							<option>Japan</option>
							<option>China</option>
							<option>Pakistan</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Gender:</td>
					<td>
						<select class="form-control" name="u_gender">
							<option><?php echo $user_gender; ?></option>
							<option>Male</option>
							<option>Female</option>
							<option>others</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Birthdate:</td>
					<td>
						<input class="form-control input-md" type="date" name="u_birthday" required value="<?php echo $user_birthday; ?>">
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold;">Profile Music:</td>
					<td>
						<select class="form-control" name="u_music">
							<option>Currently set to <?php echo $music; ?></option>
							<option>Default</option>
							<option>Music 1</option>
							<option>Music 2</option>
							<option>Music 3</option>
						</select>
					</td>
				</tr>

				<!--recover password-->
				<tr>
					<td style="font-weight: bold;">Forgotten password</td>
					<td>
						<button type="button" class="btn btn-dafault" data-toggle="modal" data-target="#myModal">Turn on</button>
						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">

										<button class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"> Modal Header</h4>
										
									</div>
									<div class="modal-body">
										<form action="recovery.php?id=<?php echo $user_id; ?>" method="post" id="f">
											<strong>What is your school best friend name?</strong>
											<textarea class="form-control" cols="83" rows="4" name="content" placeholder="someone"></textarea><br>
											<input class="btn btn-dafault" type="submit" name="sub" value="submit" style="width:100px;"><br><br>
											<pre> Security Question...</pre>
											
										</form>
										<?php
											if(isset($_POST['sub'])){
												$bfn = htmlentities($_POST['content']);
												if ($bfn == '') {
													echo "<script>alert('Please Enter Something')</script>";
													echo "<script>window.open('edit_profile.php?u_id=$user_id','_self')</script>";
													# code...
													exit();
												}
												else{
													$update = "update users set recovery_account='$bfn' where user_id=$user_id";
													$run = mysqli_query($con, $update);
													if($run){
														echo "<script>alert('Updated...')</script>";
														echo "<script>window.open('edit_profile.php?u_id=$user_id','_self')</script>";
													}else{
														echo "<script>alert('working...')</script>";
														echo "<script>window.open('edit_profile.php?u_id=$user_id','_self')</script>";

													}
												}
											}
										?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-dafault" data-dismiss="modal">Close</button>
									</div>
									
								</div>
								
							</div>
							
						</div>
					</td>
				</tr>
				<tr align="center">
					<td colspan="6">
						<input type="submit" class="btn btn-info" name="update" style="width: 250px; " value="Update">
					</td>
					
				</tr>

			</table>
		</form>

	</div>
	<div class="col-sm-2">
		
	</div>
</div>
</body>
</html>
<?php
	if (isset($_POST['update'])) {
		$f_name = htmlentities($_POST['f_name']);
		$l_name = htmlentities($_POST['l_name']);
		$u_name = htmlentities($_POST['u_name']);
		$describe_user = htmlentities($_POST['describe_user']);
		$Relationship_status = htmlentities($_POST['relationship']);
		$pass = htmlentities($_POST['user_pass']);
		$u_email = htmlentities($_POST['u_email']);
		$u_country = htmlentities($_POST['u_country']);
		$u_gender = htmlentities($_POST['u_gender']);
		$u_birthday = htmlentities($_POST['u_birthday']);
		$u_music = htmlentities($_POST['u_music']);

	$update ="update users set f_name='$f_name', l_name='$l_name', user_name='$u_name', describe_user='$describe_user', relationship='$Relationship_status', user_pass = '$pass', user_email='$u_email', user_country='$u_country', user_gender='$u_gender', user_birthday='$u_birthday', u_music='$u_music' where user_id='$user_id'";

		$run = mysqli_query($con, $update);
		if($run){
			echo "<script>alert('Your profile is updated...')</script>";
			echo "<script>window.open('edit_profile.php?u_id=$user_id','_self')</script>";
			
			}






		# code...
	}
?>