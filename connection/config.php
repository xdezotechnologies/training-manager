<?php
$servername='localhost';
$username='root';
$password='';
$dbname='tms_db';
$conn=new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
	echo "error in connecting database";
}
 ?>
