<?php
include('../includes/connection.php'); 

$query  = "SELECT * FROM category WHERE cat_id= {$_GET['cat_id']}";
$result = mysqli_query($conn, $query);
$row    = mysqli_fetch_assoc($result);

unlink("upload/{$row['cat_image']}");

$query  = "DELETE FROM category WHERE cat_id = {$_GET['cat_id']} ";
$result = mysqli_query($conn, $query);

header("Location: manage_category.php"); /* back to manage admin page */
