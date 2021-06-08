<?php

if (!isset($_SESSION['email'])) {
	echo header("Location: index.php?msg=denied");
}
 ?>
