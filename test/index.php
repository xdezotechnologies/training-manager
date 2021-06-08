<?php include 'inc/header.php';
if(!$_SESSION['email']) {
	header("Location: ../index.php");
}
Session::checkLogin();
?>
<div class="main">
<h1>Online Test System - Take Your Test Right Now. </h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/body_bg.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
		<table class="tbl">
			 <tr>
			   <td>Email</td>
			   <td><input name="email" type="text" id="email"></td>
			 </tr>
			 <tr>
			   <td>Password </td>
			   <td><input name="password" type="password" id="password"></td>
			 </tr>

			  <tr>
			  <td></td>
			   <td><input type="submit" id="loginsubmit" value="Login">
			   </td>
			 </tr>
       </table>
	   </form>
	   <p style="color:blue;padding: 5px;margin:5px;background:#b0aef0;">You Must Validate While Taking Test.</p>
	   <span class="empty" style="display: none;">Field must not be empty !</span>
	   <span class="error" style="display: none;">Email or Password not matched !</span>
	   <span class="disable" style="display: none;">User Id disabled !</span>
	</div>



</div>
<?php include 'inc/footer.php'; ?>
