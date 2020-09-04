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
	<title><?php echo "$user_name"; ?></title>
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

	#own_post{
		border: 2px solid #e6e6e6;
		border-radius: 5px;
		padding: 40px 50px;
		width: 90%;

	}

	#posts_img{
		height: 300px;
		width: 100%;
		}

</style>

<style>
	#cover-img{
		height: 400px;
		width: 100%;
	}
	#profile-img{
		position: absolute;
		top: 180px;
		left: 60px;
	}
	#cover{
		margin-left: auto;
  		margin-right: auto;
	}

	#update_profile{
		position: relative;
		top: -33px;
		cursor: pointer;
		left: 93px;
		border-radius: 4px;
		background-color: rgba(0,0,0,0.1);
		transform: translate(-50%, -50%);
	}

	#button_profile{
		position: absolute;
		top: 82%;
		left: 50%;
		cursor: pointer;
		transform: translate(-50%, -50%);
	}

	

	input[type="file"] {
    display: none;
	}

	#own_post{
		border: 2px solid #e6e6e6;
		padding: 40px 50px;
		border-radius: 5px;
	}

	#post_img{
		height: 300px;
		width: 100%;
	}

</style>
<body>
<div class="row">
	<?php
		if (isset($_GET['u_id'])) {
			$u_id = $_GET['u_id'];
			# code...
		}
		if ($u_id < 0 || $u_id == "") {
			echo "<script>window.open('home.php','_self')</script>";
			# code...
		}else{
	?>
	<div class="col-sm-12">
		<?php

			if (isset($_GET['u_id'])) {
				global $con;
				$user_id = $_GET['u_id'];
				$select = "select * from users where user_id='$user_id'";
				$run = mysqli_query($con, $select);
				$row = mysqli_fetch_array($run);
				$name = $row['user_name'];
			}
		?>

		<?php
			if (isset($_GET['u_id'])) {
				global $con;
				$user_id = $_GET['u_id'];

				$select = "select * from users where user_id='$user_id'";

				$run = mysqli_query($con,$select);
				$row = mysqli_fetch_array($run);
				$id = $row['user_id'];
				$image = $row['user_image'];
				$name = $row['user_name'];
				$email = $row['user_email'];
				$f_name = $row['f_name'];
				$l_name  = $row['l_name'];
				$describe_user = $row['describe_user'];
				$country = $row['user_country'];
				$gender = $row['user_gender'];
				$register_date = $row['user_reg_date'];
				$user_cover = $row['user_cover'];
				$u_music = $row['u_music'];
				$veri = $row['status'];


				echo "<div class='row' > <div class='col-sm-1' id='cover'></div>
				<div class='col-sm-10' id='cover'>";


			echo"
			<div>
				<div><img id='cover-img' class='img-rounded' src='cover/$user_cover' alt='cover'></div>
				
			</div>
			<div id='profile-img'>
				<img src='users/$image' alt='Profile image' class='img-rounded' width='180px' height='185px'>
			</div><br>
			";
		
			echo "</div></center></div>";

				echo "
				<div class='row'>

					<div class='col-sm-1'>
					</div>
					<center>
						<div style='background-color: #FF5733; border-radius:5px;' class='col-sm-3'>
						<br>
							<h2  style='color:white;'>Information About</h2><br>
							<ul class='list-group'>
								<li class='list-group-item' title='username'>
									<strong>Name:</strong> $f_name $l_name
								</li>
								<li class='list-group-item' title='username'>
									<strong>Action:</strong> $veri
								</li>
								<li class='list-group-item' title='user status'>
									<strong>Status:</strong><strong style='color: grey;'> $describe_user</strong>
								</li>
								<li class='list-group-item' title='email'>
									<strong>Email-Id:</strong> $email
								</li>
								<li class='list-group-item' title='Gender'>
									<strong>Gender:</strong> $gender
								</li>
								<li class='list-group-item' title='Country'>
									<strong>Country:</strong> $user_country
								</li>
								<li class='list-group-item' title='User Registration Date'>
									<strong>Registered on:</strong> $register_date
								</li>
								<li>
									<audio autoplay>
										<source src='users/$u_music' type='audio/mpeg'>
									</audio>
								</li>
							</ul>
				";

				$user = $_SESSION['user_email'];
				$get_user = "select * from users where user_email='$user'";
				$run_user = mysqli_query($con, $get_user);
				$row= mysqli_fetch_array($run_user);

				$userown_id = $row['user_id'];
				if ($user_id == $userown_id) {
					echo "<a hre='edit_profile.php?u_id=$userown_id' class='btn btn-success'>Edit Profile</a><br><br>";
				}

				echo "</div> </center>";

			}
		?>
		<div class="col-sm-8">
			<div class="col-sm-1"></div>
			<center><h1><strong><?php echo "$f_name $l_name"; ?></strong> Posts</h1></center>
			<?php 
				global $con;
				if (isset($_GET['u_id'])) {
					$u_id = $_GET['u_id'];
					# code...
				}

				$get_posts = "select * from posts where user_id='$u_id' ORDER by 1 DESC";

				$run_posts = mysqli_query($con, $get_posts);

				while ($row_posts = mysqli_fetch_array($run_posts)) {
					$post_id = $row_posts['post_id'];
					$user_id = $row_posts['user_id'];
					$content = $row_posts['post_content'];
					$upload_image = $row_posts['upload_image'];

					$post_date = $row_posts['post_date'];

					$user = "select * from users where user_id='$user_id' AND posts='yes'";

					$run_user = mysqli_query($con, $user);
					$row_user = mysqli_fetch_array($run_user);

					$user_name = $row_user['user_name'];
					$f_name = $row_user['f_name'];
					$l_name = $row_user['l_name'];

					$user_image = $row_user['user_image'];

					if ($content == "NO" && strlen($upload_image)>=1) {
					echo "
						<div id='own_post'>
							<div class='row'>
								<div class='col-sm-2'>
									<p>
										<img src='users/$user_image' class='image-circle' width='100px' height='100px'
									</p>
								</div>
								<div class='col-sm-6'>
								<h3> <a style='text-decoration: none; cursor:pointer; color: #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a>
								</h3>
								<h4>
									<small style='color: black;'>Updated a post on <strong> $post_date</strong></small>
								</h4>
								</div>
								<div class='col-sm-4'>

								</div>
							</div>
							<div class='row'>
								<div class='col-sm-12'>
									<img id='posts-img' src='imagepost/$upload_imageload' style='height: 350px'>
								</div>
							</div><br>
							<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>View</button></a>
							<a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>

						</div><br><br>
					";	
					}

					else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
				echo"
				<div id='own_post'>
					<div class='row'>
						<div class='col-sm-2' style='left: -15px'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px' ></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>	
						</div>
						<div class='col-sm-4'>
						</div>
						<div class='row'>
							<div class='col-sm-12'>
								<p>$content</p>
								<img id='posts-img' src='imagepost/$upload_image' style='height:250px;'>
							</div>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-success'>View</button></a>
					<a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
				</div><br><br>
				";
			}
			else {
				echo"
				<div id='own_post'>
					<div class='row'>
						<div class='col-sm-2' style='left: -15px'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
							
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>	
						</div>
						<div class='row'>
							<div class='col-sm-12'>
								<h3><p>$content</p> </h3> 
							</div>
						</div><br>
						<a href='single.php?post_id='$post_id'' style='float:right;'>
						<button class='btn btn-info'>Comment
						</button>
						</a>
					</div>
				</div>	
				";
				}
			}
			?>
		</div>
	</div>
</div>
<?php
	}
?>
</body>
</html>