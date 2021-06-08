<?php
require('../connection/config.php');

if(isset($_POST['submit'])) {
$email=$_POST['email'];
$password=md5($_POST['password']);
//echo $email.$password;
// checking value coming or not
$query="SELECT * FROM tbl_users WHERE email='$email' AND password='$password' ";
$result=mysqli_query($conn,$query)
or die(mysqli_error($conn));
$count=mysqli_num_rows($result);
if($count==1){
	session_start();
	$row=mysqli_fetch_assoc($result);
	$_SESSION['email']= $row['email'];
	$_SESSION['name']= $row['name'];
	$_SESSION['user_id']= $row['admin_id'];
	header('Location: ../dashboard.php');
}
else{
	echo header("Location: ../index.php?msg=error");
}
}
 ?>
