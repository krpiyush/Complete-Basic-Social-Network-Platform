<?php
include "db.php";
session_start();
if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from admin where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: welcome.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
        <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div style="width: 30%; margin-left: 35%; margin-top: 10%;">

    <div class="card bg-dark text-white border-success">
        <div class="card-header border-success">
          <h2>Admin Login</h2>
          <p>Enter your login credentials.</p>
        </div>
      <div class="card-body border-success">
        <form method="post" action="">
            <div id="div_login">
                <div>
                    <label>Your username:</label>
                    <input type="text" class="form-control" id="txt_uname" name="txt_uname" placeholder="Username" />
                </div>
                <div>
                    <label>Your Password:</label>
                    <input type="password" class="form-control" id="txt_uname" name="txt_pwd" placeholder="Password"/>
                </div>
      </div>
        </div>
      <div class="card-footer border-success">
            <div>
                    <input type="submit" class="btn btn-primary" value="Login" name="but_submit" id="but_submit" />
                </div>
            </div>
        </form>
      </div>
    
    </div>
</body>
</html>