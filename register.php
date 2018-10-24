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
        <h4>Register Here</h4>
          <?php
        include 'config/database.php';

        if(isset($_POST['submit'])){

 if(isset($_POST['Firstname'])){

      $Firstname=$_POST['Firstname'];

 }
  if(isset($_POST['mobile'])){
      $mobile=$_POST['mobile'];
  }

   if(isset($_POST['username'])){
     $username=$_POST['username'];
  }

     if(isset($_POST['password'])){       
               
               $password=$_POST['password'];
     }
        
      
      $query="INSERT INTO user SET Firstname=:Firstname,mobile=:mobile, username=:username, password=:password";

      $stmt=$con->prepare($query);

      $stmt->bindParam(':Firstname', $Firstname);
      $stmt->bindParam(':mobile', $mobile);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':password', $password);

      if($stmt->execute()){

        echo "<script>alert('Account has been created Successfully!');</script>";
      }

      else{
         echo "<script>alert('You Should check the username and password!');</script>";
      }

      

      }

          ?>

                     
          <form action="" method="POST">
  <div class="form-group">
    <label for="name">Name:&nbsp</label><i class="glyphicon glyphicon-king"></i>
    <input type="text" class="form-control"  name="Firstname" placeholder="Enter Your Name">
  </div>
  <div class="form-group">
    <label for="mobile">Mobile:&nbsp</label><i class="glyphicon glyphicon-modal-window"></i>
    <input type="text" class="form-control" name="mobile" placeholder="Enter Your Mobile Number">
  </div>
  <div class="form-group">
    <label for="username">User Name:&nbsp</label><i class="glyphicon glyphicon-user"></i>
    <input type="text" class="form-control"  name="username" placeholder="Enter Your username">
  </div>
  <div class="form-group">
    <label for="pwd">Password:&nbsp</label><i class="glyphicon glyphicon-lock"></i>
    <input type="password" class="form-control" name="password">
  </div>
    <input type="submit" class="btn btn-success col-md-12" name="submit" value="Register"> 
</form>
<br>
<br>
<a href="login.php">registered user? login here</a>

        </div>
      </div>
    </div>
    <div class="col-md-4"></div>
  </div>
</div>
</body>
</html>