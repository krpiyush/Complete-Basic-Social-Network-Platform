<!DOCTYPE html>
<html>
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
	<head>
	<title>Social Media -  News Updates</title>		
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		.mainselection {
		    overflow:hidden;
		    width:350px;
		    background: url("images/dropdown1.png") no-repeat #fff 319px 2px;
			}
		select {
		    border:0;
		    background:transparent;
		    height:32px;
		    border:1px solid #d8d8d8;
		    width:300px;
		    -webkit-appearance: none;
		}	
		#button1{
			width: 100%;
		}
		::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
	</style>
	<link rel="stylesheet" href="styles/chat-style.css" media="all" /> 
	<script> 
		function chat_ajax(){ 
			var req = new XMLHttpRequest(); 
			req.onreadystatechange = function() { 
				if(req.readyState == 4 && req.status == 200){ 
					document.getElementById('chat_data').innerHTML = req.responseText; 
				} 
			} 
			req.open('GET', 'chat.php', true); req.send(); 
		} 
		setInterval(function(){chat_ajax()}, 1000)
	</script>
	
	</head>
	<body style="background-color: #D0D3D4;">
		<div class="col-sm-3">
			
			<?php 
				include("home_left_side.php");
			?>
			
		</div>

		<div class="col-sm-6">
			<div style="position: sticky; top: 0; position: -webkit-sticky;">
		<?php 
			$category = "";
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$category = test_input($_POST["cat"]);
			}

			function test_input($data) {
  			$data = trim($data);
 		    $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;	
        	}

		?>

		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<label><h4>Choose your interest.</h4></label>
			<select id="news" name="cat" class="mainselection">
				<option>---Select Category---</option>
 				 <option value="Technology" name="cat">Technology</option>
 				 <option value="Startups" name="cat">Startups</option>
 				 <option value="Business" name="cat">Business</option>
 				 <option value="Internet" name="cat">Internet</option>
 				 <option value="Mobile" name="cat">Mobile</option>
 				 <option value="People" name="cat">People</option>
			</select><input type="submit" name="submit" value="GO" class=" btn btn-danger btn-md">
		</form>
		<?php 
			
			$tech = "<iframe width='650' height='1050' src='https://tech.economictimes.indiatimes.com/widget/technology' frameborder='0'></iframe>";
			$start = "<iframe width='650' height='1050' src='https://tech.economictimes.indiatimes.com/widget/startups' frameborder='0'></iframe>";
			$cor = "<iframe width='650' height='1050' src='https://tech.economictimes.indiatimes.com/widget/corporate' frameborder='0'></iframe>";
			$int = "<iframe width='650' height='1050' src='https://tech.economictimes.indiatimes.com/widget/internet' frameborder='0'></iframe>";
			$mob = "<iframe width='650' height='1050' src='https://tech.economictimes.indiatimes.com/widget/mobile' frameborder='0'></iframe>";
			$peo = "<iframe width='650' height='1050' src='https://tech.economictimes.indiatimes.com/widget/people' frameborder='0'></iframe>";
			if ($category == "Technology") {
				echo $tech;
			} elseif ($category == "Startups") {
				echo $start;
			} elseif ($category == "Business") {
				echo $cor;
			} elseif ($category == "Internet") {
				echo $int;
			} elseif ($category == "Mobile") {
				echo $mob;
			} elseif ($category == "People") {
				echo $peo;
			}
		?>
			</div>
		</div>
		<div class="col-sm-3" style='background-color: #FF5733; border-radius:10px;'>
			<div class="col-sm-1">
			
			</div> 
			<div class="col-sm-10" style="background-color: #FF5733; width: 100%; max-height: 100%; border-radius:10px; text-align: center;">
				<br>
				<a href="http://localhost/social_network/news.php">
					<button class="btn btn-lg btn-fluid btn-success" id="button1">Latest News</button>
				</a>
				<br>
				<br>
				<a href="../social_network/forum/pages/home.php">
				<button class="btn btn-lg btn-danger" style="padding-top: 10px;" id="button1">Forum</button>
				</a>
				<br>
				<hr>
				<h3>----World Chat----</h3>
				<div style="background-color: white; border-radius: 10px; ">
				<div id="chat_box"> 

				<div id="chat_data" style="max-height: 400px; width: 100%; overflow-y: scroll;"> 
					<span style="color:green; float: left;"><?php echo $f_name;?> </span> 
					<span style="color:brown;">Hey, How are you?</span> 
					<span style="float:right;"><?php echo date("h:i");?></span>
					<hr>

					<?php 
						$query = "SELECT * FROM chat ORDER BY id"; 
						$run = $con->query($query); 
						while($row = $run->fetch_array()) : 
					?>
					<div id="chat_data">
						<span style="color:green; float: left;"><?php echo $row['Name']; ?> : </span>
						<span style="color:brown; "><?php echo $row['Message']; ?></span>
						<span style="float:right;"><?php echo $row['Date']; ?></span> 
					</div> 
					<?php 
						endwhile; 
					?>
					
				</div> 
			</div> 
				<form method="post" action="home.php"> 
					<textarea name="enter_message" placeholder="Enter Message"></textarea> 
					<input class="btn btn-danger btn-lg" type="submit" name="submit" value="Send!" /> 
				</form> 
				<?php if(isset($_POST['submit'])){ 
					$name = $f_name;
					$msg = $_POST['enter_message']; 
					$d = date("h:i");
					$query = "INSERT INTO chat (Name,Message,Date) VALUES ('$name','$msg','$d')"; 
					$run = $con->query($query); 
				} 
				?>
				</div>
				<br><br>


			</div>
		</div>
	</body>
</html>