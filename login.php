<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mess Bill System</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <br><br><br><br><br><br>
  <div class="container">
    <div class="row">
    <div class="col-md-4">
    	
    </div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-body">
        <h4>MESS Bill System</h4>
          <?php

          include'config/database.php';

          if(isset($_POST['username']) && isset($_POST['password'])){
          $username=$_POST['username'];
          $password=$_POST['password'];
          $stmt=$con->prepare("SELECT * from user WHERE username=? AND password=?");
            $stmt->bindParam(1,$username);
            $stmt->bindParam(2,$password);
             $stmt->execute();

             $row=$stmt->fetch();
             $user=$row['username'];
             $pass=$row['password'];
             $id=$row['id'];
             $fname=$row['Firstname'];

             
             if($username==$user && $pass==$password){
              session_start();

              $_SESSION['username']=$user;
              $_SESSION['id']=$id;
              $_SESSION['name']=$fname;
             ?>
            <script>window.location.href='index.php'</script>
            <?php
             }  else{
             ?>
              <div class="alert alert-danger" role="alert">
              <strong>Sorry!</strong> You should check the Username and password.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                  </div>

             <?php


             }
            } 

          ?>
          <form action="" method="POST">
  <div class="form-group">
    <label for="username">User Name:&nbsp</label><i class="glyphicon glyphicon-user"></i>
    <input type="text" class="form-control"  name="username">
  </div>
  <div class="form-group">
    <label for="pwd">Password:&nbsp</label><i class="glyphicon glyphicon-lock"></i>
    <input type="password" class="form-control" name="password" >
  </div>
    <input type="submit"  class="btn btn-success col-md-12" name="submit"> 
</form><br><br>
<a href="register.php">New User ? Register Here....</a>
        </div>
      </div>
    </div>
    <div class="col-md-4"></div>
  </div>
</div>
</body>
</html>