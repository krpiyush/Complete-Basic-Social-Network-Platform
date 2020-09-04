<?php

include "includes/db.php";
$phone = $_POST['phone'];
$id = $_POST['userid'];
$u_name = $_POST['username'];
$amount = $_POST['amount']/10;

echo $phone;
echo $id;
echo $u_name;
echo $amount;

$sql = "INSERT INTO pay_req (user_id,username,amount,Phone_no) VALUES ('$id','$u_name','$amount','$phone')";
$res = mysql_query($sql);

if ($con->query($sql) === TRUE) {
	$sel = "UPDATE wallet SET  t_msg = 0 , t_comment=0, t_post = 0, t_point = 0 WHERE user_id = '$id'";
	$r = mysql_query($sel);
	if ($con->query($sel) === TRUE) {
		echo "<script type='text/javascript'> alert('DB updated Successfully...!');</script>";
	}
	  echo "<script type='text/javascript'> alert('Reedem Successfully...!');</script>";
	  echo "<script>window.open('wallet.php?u_id=$id', '_self')</script>";
	} else {
	  echo "Error banning user: " . $con->error;
	}

/*if($res==true){
		echo '<script language="javascript">';
		echo 'alert("Reedem Successfully")';
		echo '</script>';
		echo '<meta http-equiv="refresh" content="0;url=wallet.php" />';
	} else{
		echo "Failed...";
	}
*/

?>