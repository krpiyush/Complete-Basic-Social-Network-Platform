<?php
		global $con;

				$select = "select * from users where user_name='$user_name'";

				$run = mysqli_query($con,$select);
				$row = mysqli_fetch_array($run);
				$id = $row['user_id'];
				$image = $row['user_image'];
				$name = $row['user_name'];
				$f_name = $row['f_name'];
				$l_name  = $row['l_name'];
				$describe_user = $row['describe_user'];
				$country = $row['user_country'];
				$gender = $row['user_gender'];
				$register_date = $row['user_reg_date'];
				$user_cover = $row['user_cover'];

				echo "
				<div class='row'>
					<div class='col-sm-2'>
					</div>
					<center>
						<div style='background-color: #FF5733; border-radius:10px;' class='col-sm-10'>
							<h2> <strong style='color: white;'>Your Information</strong> </h2>
							<img src='users/$image' class='img-circle' height='150px' width='150px'><br><br>
							<ul class='list-group'>
								<li class='list-group-item' title='username'>
									<strong>Name:</strong> $f_name $l_name
								</li>
								<li class='list-group-item' title='user status'>
									<strong>Status:</strong><strong style='color: grey;'> $describe_user</strong>
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
							</ul>
							<div style='background-color: white; border-radius:10px;'> <br><h4>People You may Know</h4><hr>";
echo home_user();
						echo "	</div>
						</div>
					</center>
				</div>		<br>	
				";
				
				
				?>

				<?php
	function home_user(){
		global $con;

		if(isset($_GET['search_user_btn'])){
			$search_query = htmlentities($_GET['search_user']);

			$get_user = "select * from users where f_name like '%$search_query%' OR l_name like '%$search_query%' OR user_name like '%$search_query'";


		}
		else{
			$get_user = "select * from users ORDER BY user_id DESC";
		}

		$run_user = mysqli_query($con, $get_user);

		while($row_user = mysqli_fetch_array($run_user)){
			$user_id = $row_user['user_id'];
			$f_name = $row_user['f_name'];
			$l_name = $row_user['l_name'];
			$username = $row_user['user_name'];
			$user_image = $row_user['user_image'];

			echo "
				<div class='row'>
					<div class='col-sm-12'>
						<div class='row' id=''>
						<div class='col-sm-1'>
							</div>
							<div class='col-sm-2'>
								<a href='user_profile.php?u_id=$user_id'>
									<img src='users/$user_image' class='img-circle' width='60px' height='60px' title='$username' style='float:left; margin: 1px;'/>
								</a>
							</div>
							<div class='col-sm-1'>
							</div>
							<div class='col-sm-8'>
								<a style='text-decoration:none; cursor:pointer; color: #3897f0;' href='user_profile.php?u_id=$user_id'>
								<strong> $f_name $l_name</strong>
									
								</a>
							</div>
							
						</div>
					</div>

				</div>
				<hr>
			";
		}
	}
?> 