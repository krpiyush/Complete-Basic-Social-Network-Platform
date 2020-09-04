<?php
	include("db.php");
	$u_name = $_SESSION['uname'];
	$sel = "select * from admin where username='$u_name'";

	$runn = mysqli_query($con,$sel);
	$row = mysqli_fetch_array($runn);
	$id = $row['id'];
	$u_name = $row['username'];
	$access = $row['access'];
	$name = $row['name'];

?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Admin Panel</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="welcome.php">Home<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="alluser.php">All user</a></li>
        <li class="active"><a href="admin.php">All Admin</a></li>
        <li class="active"><a href="post.php">All Posts</a></li>
        <li class="active"><a href="payment_req.php">Payment Requests</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li><a style="color: white;">Hi <?php echo $name; ?></a></li>
        <li><a href="logout.php" active>Logout</a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>