<?php
$dataFile=$_FILES['dataFile'] ['name'];
  $filesize=$_FILES['dataFile'] ['size'];
  $explode_values=explode('.', $dataFile);
  $name=$explode_values[0];
  $fname= str_replace(' ', '', $name);
  $finalname= strtolower($fname.time());
  $extention=$explode_values[1];
  $finalfile= $finalname.".".$extention;
 ?>
