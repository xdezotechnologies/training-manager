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
	         	$query="INSERT INTO tbl_trainees (name,name_clientorg,position,workplace,mobile,email,training_title,no_td,duration,venue,pretest,posttest) VALUES ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]','$emapData[9]','$emapData[10]','$emapData[11]')";
	          $result=mysqli_query($conn,$query);
            if($result) {
              header("Location: ../trainees.php?success_import");
            }
            else {
              header("Location: ../addtrainee.php?msg=error_import");
            }
	         }
           fclose($file);

           mysqli_close($conn);
           }
}
?>
