<?php

require('../connection/config.php');
$id=$_GET['id'];
$currentDateTime = date('Y-m-d H:i:s');
$query="UPDATE tbl_tasks SET deleted_at='$currentDateTime' WHERE id=$id";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
if($result) {
 	/*while updating and just showing same page
 	reloading same page
 	echo "<meta http-equiv='refresh' content='0'>";*/
 echo header("Location: ../donetask.php?msg=dsuccess");
 }
 else
 {
echo header("Location: ../donetask.php?msg=derror");
 }
 ?>
