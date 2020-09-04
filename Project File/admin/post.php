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
	<center><h1>All Post Details</h1></center>

<?php 
	$sql = "SELECT * FROM posts";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-striped'>";
            echo "<tr>";
                echo "<th>Post id</th>";
                echo "<th>Posted By<br> (user id)</th>";
                echo "<th>Post text</th>";
                echo "<th>Posted on</th>";
                echo "<th>Image</th>";
                echo "<th>Action</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            	$userid = $row['post_id'];
                echo "<td>" . $row['post_id'] . "</td>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row['post_content'] . "</td>";
                echo "<td>" . $row['post_date'] . "</td>";
                echo "<td>" . $row['upload_image'] . "</td>";
                ?>
                <td>
					<form action="del_post.php" method="post">
					    <input type="hidden" name="userid" value="<?php echo $userid; ?>" />
					    <input id="tea-submit" type="submit" class="btn btn-danger" name="submit" value="Delete">
					</form>
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