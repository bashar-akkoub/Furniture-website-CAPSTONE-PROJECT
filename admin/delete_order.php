<?php
include('../includes/connection.php'); 


$query  = "DELETE  FROM orders WHERE order_id= {$_GET['order_id']}";
$result = mysqli_query($conn, $query);
$row    = mysqli_fetch_assoc($result);


header("Location: Orders.php"); ?>