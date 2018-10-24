<?php
include 'config/database.php';
$id=isset($_GET['id']) ? $_GET['id']:die('ERROR:No Record Found');
$query=("DELETE FROM name WHERE id='$id'");
$stmt=$con->prepare($query);
$stmt->execute();
header('location: profile.php');
?>