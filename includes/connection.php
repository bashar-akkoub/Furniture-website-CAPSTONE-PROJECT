<?php
	include("conf.php");
	$conn=mysqli_connect(DBSERVER,DBUSER,DBPASSWORD,DBNAME);
	if (!$conn){
		die("Cannot connect to Server");
	}

?>