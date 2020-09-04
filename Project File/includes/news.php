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
	</head>
	<body>
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
			<label>Choose your interest.</label>
			<select id="news" name="cat">
 				 <option value="Technology" name="cat">Technology</option>
 				 <option value="Startups" name="cat">Startups</option>
 				 <option value="Business" name="cat">Business</option>
 				 <option value="Internet" name="cat">Internet</option>
 				 <option value="Mobile" name="cat">Mobile</option>
 				 <option value="People" name="cat">People</option>
			</select> <input type="submit" name="submit" value="submit">
		</form>
		<?php 
			
			$tech = "<iframe width='860' height='315' src='https://tech.economictimes.indiatimes.com/widget/technology' frameborder='0'></iframe>";
			$start = "<iframe width='560' height='315' src='https://tech.economictimes.indiatimes.com/widget/startups' frameborder='0'></iframe>";
			$cor = "<iframe width='560' height='315' src='https://tech.economictimes.indiatimes.com/widget/corporate' frameborder='0'></iframe>";
			$int = "<iframe width='560' height='315' src='https://tech.economictimes.indiatimes.com/widget/internet' frameborder='0'></iframe>";
			$mob = "<iframe width='560' height='315' src='https://tech.economictimes.indiatimes.com/widget/mobile' frameborder='0'></iframe>";
			$peo = "<iframe width='560' height='315' src='https://tech.economictimes.indiatimes.com/widget/people' frameborder='0'></iframe>";
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


	</body>
</html>