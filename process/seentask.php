<?php

require('../connection/config.php');
$id=$_GET['id'];
$query="UPDATE tbl_tasks SET t_status='seen' WHERE id=$id";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
if($result) {
 	/*while updating and just showing same page
 	reloading same page
 	echo "<meta http-equiv='refresh' content='0'>";*/
 echo header("Location: ../seentask.php?msg=ssuccess");
 }
 else
 {
echo header("Location: ../tasks.php?msg=serror");
 }
 ?>
