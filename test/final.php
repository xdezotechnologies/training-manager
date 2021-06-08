<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
?>
<div class="main">
<h1>You are done!</h1>

<div class="starttest">
	<p>Congrats! You have just competed the test. <?php echo $_SESSION['email']; ?></p>

	<p>Final Score:

		<?php
		if (isset($_SESSION['score'])) {
			echo $_SESSION['score'];
		}
		 ?>

	</p>
	<?php 	
	if($_SESSION['email']) {
			$email=$_SESSION['email'];
			$score=$_SESSION['score'];
		$storemarks_query="INSERT INTO tbl_testtaken (user_id,questionset_id,email,marks,status) VALUES('','','$email','$score','')";
		$servername='localhost';
		$username='root';
		$password='';
		$dbname='tms_db';
		$conn=new mysqli($servername,$username,$password,$dbname);
		$storemarks_result=mysqli_query($conn,$storemarks_query	);


	}
	 ?>
	<a href="viewans.php">View Ans</a>
	<a href="starttest.php">Start Again</a>
</div>

  </div>
<?php include 'inc/footer.php'; ?>
