<?php

include 'config/database.php';
session_start();
if(!isset($_SESSION['username'])){

  header ('location: login.php');
}

?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width initial-scale=1.0">
<title>MESS BILL SYSTEM</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
     <!--Brand and toggle get grouped for better mobile display--> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">fifanow.in</a>
    </div>

     <!--Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="index.php">Bill Summary <span class="sr-only">(current)</span></a></li>
        <li><a href="insert1.php">Insert Bill Info</a></li>
        <li class="active"><a href="calc.php">Individual Amount</a></li>
        <li><a href="name2.php">Expense Tracking</a></li>
        <li><a href="addnames.php">Add Names</a></li>
        <li><a href="profile.php">Add Names</a></li>
        <li><a href="logout.php">logout</a></li>

        
      </ul>
    
          </div>
  </div>
</nav>