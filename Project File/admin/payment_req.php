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
	<center><h1>All Payment Requests</h1></center>

<?php 
	$sql = "SELECT * FROM pay_req";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-striped'>";
            echo "<tr>";
                echo "<th>Request Id</th>";
                echo "<th>Requested By</th>";
                echo "<th>Username</th>";
                echo "<th>Amount</th>";
                echo "<th>Paytm Number</th>";
                echo "<th>Status</th>";
                echo "<th>Time</th>";
                echo "<th>Action</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            	$userid = $row['id'];
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "<td>" . $row['Phone_no'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['req_date'] . "</td>";
                ?>
                <?php 
                if ($row['status'] == 'Success') {

                ?>
                <td>
                    <button class="btn btn-light" disabled>Updated</button>
                </td>
                <?php
                    }else{
                ?>
                <td>
					<form action="update_status.php" method="post">
					    <input type="hidden" name="userid" value="<?php echo $userid; ?>" />
					    <input id="tea-submit" type="submit" class="btn btn-success" name="submit" value="Update Status">
					</form>
                </td>
                <?php 
            }
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