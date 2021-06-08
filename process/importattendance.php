<?php
require('../connection/config.php');
if(isset($_POST["Import"])){


		echo $filename=$_FILES["file"]["tmp_name"];


		 if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 100000, ",")) !== FALSE)
	         {

	          //It wiil insert a row to our subject table from our csv file`
	         	$query="INSERT INTO tbl_attendance (name,mobile,course,a_date,sign_mark,status) VALUES ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]')";
	          $result=mysqli_query($conn,$query);
            $query1="DELETE FROM tbl_attendance WHERE info='h'";
            $result1=mysqli_query($conn,$query1);
            if($result) {
              header("Location: ../attendance.php?success_import");
            }
            else {
              header("Location: ../addattendance.php?msg=error_import");
            }
	         }
           fclose($file);

           mysqli_close($conn);
           }
}
?>
