<?php

require('../connection/config.php');
$id=$_GET['id'];
$query="DELETE FROM tbl_user_verifications WHERE id=$id";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
if($result) {
 	/*while updating and just showing same page
 	reloading same page
 	echo "<meta http-equiv='refresh' content='0'>";*/
 echo header("Location: ../verifications_code.php?msg=dsuccess");
 }
 else
 {
echo header("Location: ../verifications_code.php?msg=derror");
 }
 ?>
