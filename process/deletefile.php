<?php
require('../connection/config.php');
$id=$_GET['id'];

$q="SELECT filelink FROM tbl_filemanager WHERE id=$id";
$r=mysqli_query($conn,$q) or die(mysqli_error($conn));
$row=$r->fetch_assoc();
$filename=$row["filelink"];
$filedel="../filemanager/".$filename;
unlink($filedel);



$query="DELETE FROM tbl_filemanager WHERE id=$id";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
if($result) {
 	/*while updating and just showing same page
 	reloading same page
 	echo "<meta http-equiv='refresh' content='0'>";*/
 echo header("Location: ../managefile.php?msg=dsuccess&data-show=trashed");
 }
 else
 {
echo header("Location: ../managefile.php?msg=derror");
 }

 ?>
