<?php include 'include/mainheader.php';?>
<body>

    <!-- container -->
    <div class="container">
      <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="page-header">
        <br>    <h1>Create Product</h1>
        </div>

    <!-- html form to create product will be here -->

<!-- html form here where the product information will be entered -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" encodedtype="multipart/form-data">
    <table class='table table-hover table-responsive table-bordered'>
        <tr><td>Name</td><td>
        <select name="name">
            <?php 
            include 'config/database.php';?>
            <?php
            foreach ($con->query("SELECT * FROM name WHERE username='{$_SESSION["username"]}';")as $row) {
                
          ?>

<option>
    
<?php echo $row['name'];?>
</option>
<?php
  };?>

        </select>
            </td>
        </tr>
        <tr>
<td>Payment Info</td>
<td><input type='text' name='paymentinfo'></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><select name='description' required>
            <option></option>
            <option>Grocery</option>
            <option>Mill</option>
            <option>Others</option>
            </select></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type='text' name='price' class='form-control' required='Please enter the price amount'/></td>
        </tr>
        <tr>
        <td>
        Date
        </td><td>
        <input type='date' name='created' required="">
        </td>
        </tr>
<tr>
    <td>Photo</td>
    <td><input type="file" name="image" /></td>
</tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='index.php' class='btn btn-danger'>Back to Bill Summary</a>
            </td>
        </tr>
    </table>
</form>

<?php
if($_POST){

    // include database connection
    include 'config/database.php';

    try{

    // insert query
$query = "INSERT INTO data
            SET name=:name, paymentinfo=:paymentinfo, description=:description,
                price=:price, image=:image, created=:created, username='".$_SESSION['username']."'";

// prepare query for execution
$stmt = $con->prepare($query);

if(isset($_POST['paymentinfo'])){

	$paymentinfo=$_POST['paymentinfo'];
}

$name=htmlspecialchars(strip_tags($_POST['name']));
$description=htmlspecialchars(strip_tags($_POST['description']));
$price=htmlspecialchars(strip_tags($_POST['price']));
$created=htmlspecialchars(strip_tags($_POST['created']));

// new 'image' field
$image=!empty($_FILES["image"]["name"])
        ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"])
        : "";
$image=htmlspecialchars(strip_tags($image));

// bind the parameters
$stmt->bindParam(':name', $name);
$stmt->bindParam(':paymentinfo', $paymentinfo);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':image', $image);

// specify when this record was inserted to the database
//$created=date('Y-m-d H:i:s');
$stmt->bindParam(':created', $created);

        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was saved.</div>";
// now, if image is not empty, try to upload the image
if($image){

    // sha1_file() function is used to make a unique file name
    $target_directory = "uploads/";
    $target_file = $target_directory . $image;
    $file_type = pathinfo($target_file, PATHINFO_EXTENSION);

    // error message is empty
    $file_upload_error_messages="";

}
// make sure that file is a real image
$check = getimagesize($_FILES["image"]["tmp_name"]);
if($check!==false){
    // submitted file is an image
}else{
    $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
}
// make sure certain file types are allowed
$allowed_file_types=array("jpg", "jpeg", "png", "gif");
if(!in_array($file_type, $allowed_file_types)){
    $file_upload_error_messages.="<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
}

// make sure file does not exist
if(file_exists($target_file)){
    $file_upload_error_messages.="<div>Image already exists. Try to change file name.</div>";
}

// make sure submitted file is not too large, can't be larger than 1 MB
if($_FILES['image']['size'] > (1024000)){
    $file_upload_error_messages.="<div>Image must be less than 1 MB in size.</div>";
}

// make sure the 'uploads' folder exists
// if not, create it
if(!is_dir($target_directory)){
    mkdir($target_directory, 0777, true);
}

// if $file_upload_error_messages is still empty
if(empty($file_upload_error_messages)){
    // it means there are no errors, so try to upload the file
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
        // it means photo was uploaded
    }else{
        echo "<div class='alert alert-danger'>";
            echo "<div>Unable to upload photo.</div>";
            echo "<div>Update the record to upload photo.</div>";
        echo "</div>";
    }
}

}

        else{
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        }

    }

    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
          </div>
          </div>
    </div> <!-- end .container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


</body>
</html>