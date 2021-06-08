<?php

require('../connection/config.php');
$id=$_GET['id'];
$query="DELETE FROM tbl_attendance WHERE id=$id";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
if($result) {
 	/*while updating and just showing same page
 	reloading same page
 	echo "<meta http-equiv='refresh' content='0'>";*/
 echo header("Location: ../attendance.php?msg=dsuccess&data-show=trashed");
 }
 else
 {
echo header("Location: ../attendance.php?msg=derror&data-show=trashed");
 }
 ?>
