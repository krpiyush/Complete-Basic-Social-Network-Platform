<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Your Post</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style type="text/css">

	.pb-cmnt-container{
	font-family: Lato;
	margin-top: 1px;


}

.pb-cmnt-textarea{
	resize: none;
	padding: 10px;
	height: 80px;
	width: 100%;
	border: 1px solid #F2F2F2;
}

.bt{
	padding-top: -30px;
}

#posts{
	border: 5px solid #e6e6e6;
	padding: 40px 50px;
}
</style>
<body>
	<div class="row">
		<div class="col-sm-12">
			<center>
				<h2>Comments</h2><br>
				
			</center>
			<?php single_post(); ?>
			
		</div>
		
	</div>
</body>
</html>