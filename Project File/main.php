<!DOCTYPE html>
<html>
<head>
	<title>Social Network</title>

	<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


</head>
<style type="text/css">
	body{overflow-x: hidden;}

	#centered1{
		position: absolute;
		font-size: 10vw;
		top: 30%;
		left: 50%;
		transform: translate(-50%, -50%);
	}

	#centered2{
		position: absolute;
		font-size: 10vw;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
	}

	#centered3{
		position: absolute;
		font-size: 10vw;
		top: 70%;
		left: 50%;
		transform: translate(-50%, -50%);
	}

	#signup{
		width: 60%;
		border-radius: 30px;
		background-color: #FF5733;

	}

	#login{
		width: 60%;
		background-color: #white;
		border: 1px solid #FF5733;
		color: #FF5733;
		border-radius: 30px;
	}

	#login:hover{
		width: 60%;
		background-color: #FF5733;
		color: white;
		border: 2px solid #FF5733;
		border-radius: 30px;

	}

	.container{
		background-color: #FF5733;
		width: 100%;
	}

	#img1 {
  -webkit-filter: blur(5px);
  filter: blur(2px);
}


</style>
<body>
	<div class="row">
		<div class="col-sm-12">
			<div class="container">
				<center><h1 style="color: white;">Social Network</h1></center>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<div class="row">
		
		<div class="col-sm-6" style="left:0.5%;"><br><br>
			<img src="images/home1.png" id="img1" class="img-rounded" title="Social Network" style="width: 100%;">
			<div id="centered1" class="centered" style="color: #FF5733;"><h3><span class="glyphicon glyphicon-search"></span> &nbsp &nbsp <strong>Follow Your Interests...</strong></h3>
			</div>
			<div id="centered2" class="centered" style="color: #FF5733;"><h3>&nbsp &nbsp<span class="glyphicon glyphicon-search"></span> &nbsp &nbsp <strong>Hear What People Are Talking About.</strong></h3>
			</div>
			<div id="centered3" class="centered" style="color: #FF5733;"><h3><span class="glyphicon glyphicon-search"></span> &nbsp &nbsp <strong>Join The Conversation.</strong></h3>
			</div>
		</div>
		<div class="col-sm-6" style="left: 5%;">
			<img src="images/social_network.png" width="50%">
			<h2><strong>See What's Happening In. </strong></h2>

			<h4>Join Social Network Today.</h4>

			<form method="post" action="">

				<button id="signup" class="btn btn-lg" name="sign_up"> <strong style="color: white;">Sign up 
				</strong> </button> <br><br>

				<?php 

					if(isset($_POST['sign_up'])){
						echo "<script> window.open('signup.php','_self')</script>";
					}

					?>

				<br>

				<button id="login" class="btn btn-lg" name="log_in"><strong>Login</strong> </button><br><br>
				<?php 

				if(isset($_POST['log_in'])){
						echo "<script> window.open('signin.php','_self')</script>";
					}
				 ?>
				
			</form>
			
		</div>
		
	</div>
</body>
</html>