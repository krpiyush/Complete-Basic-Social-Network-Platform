<?php 
	include("includes/db.php"); 
	$query = "SELECT * FROM chat ORDER BY id"; 
	$run = $con->query($query); 
	while($row = $run->fetch_array()) : 
?> 
<div id="chat_data" style="width: 100%;"> 
	<span style="color:green; float: left;"><?php echo $row['Name']; ?> : </span> 

	<span style="color:brown;"><?php echo $row['Message']; ?></span>

	<span style="float:right;"><?php echo $row['Date']; ?></span> 
</div> 


<?php 
	endwhile; 
?>
