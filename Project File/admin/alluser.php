<?php
	session_start();
	include("header.php");
	
	if(!isset($_SESSION['uname'])){
	header("location: index.php");


}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Users Details</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
	<div class="col-sm-1"></div>

<div class="col-sm-10">
	<center><h1>All User Details</h1></center>

<?php 
	$sql = "SELECT * FROM users";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-striped'>";
            echo "<tr>";
                echo "<th>User id</th>";
                echo "<th>First name</th>";
                echo "<th>Last name</th>";
                echo "<th>Gender</th>";
                echo "<th>Email</th>";
                echo "<th>Country</th>";
                echo "<th>Status</th>";
                echo "<th>Action</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            	$userid = $row['user_id'];
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row['f_name'] . "</td>";
                echo "<td>" . $row['l_name'] . "</td>";
                echo "<td>" . $row['user_gender'] . "</td>";
                echo "<td>" . $row['user_email'] . "</td>";
                echo "<td>" . $row['user_country'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                ?>
                <td>
                	<?php 
                	$st = $row['status'];
                		if($st == 'verified'){
                	?>
					<form action="ban.php" method="post">
					    <input type="hidden" name="userid" value="<?php echo $userid; ?>" />
					    <input id="tea-submit" type="submit" class="btn btn-danger" name="submit" value="Ban user">
					</form>
					<?php 
						}else {

					?>
					<form action="unban.php" method="post">
					    <input type="hidden" name="userid" value="<?php echo $userid; ?>" />
					    <input id="tea-submit" type="submit" class="btn btn-success" name="submit" value="Unban user">
					</form>
					<?php
					} 
					?>
                </td>
                <?php 
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
// Close connection
mysqli_close($con);
?>
</div>
<div class="col-sm-1"></div>

</body>
</html>