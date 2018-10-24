<?php include 'include/mainheader.php';?>
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header"><br><h1>Hi, <?php echo $_SESSION['name'];?></h1><br>
<h3>Please add names for the Mess System</h3></div>
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
<div class="panel panel-default">
<div class="panel-body">
	<div class="form-group">
		<label>Name</label>
<input type='text' class='form-control' name='name' placeholder="Please Enter The Name" value="<?php echo isset($_POST['name']) ? ($_POST['name']) :'' ?>"></input></div>
<input type='submit' class='btn btn-success' name='add' value='Submit'></input>
</p>
</div>
</div>
</form>
<?php
include'config/database.php';
if(isset($_POST['add'])){
$name=$_POST['name'];


 try{

    // insert query
$query = "INSERT INTO name
            SET name=:name, username='".$_SESSION['username']."'";

// prepare query for execution
$stmt = $con->prepare($query);

$name=htmlspecialchars(strip_tags($_POST['name']));
$username=$_SESSION['username'];


// bind the parameters
$stmt->bindParam(':name', $name);


        // Execute the query
        if($stmt->execute()){
            echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <strong>Hey !</strong> Name has been added to your database .
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
// now, if image is not empty, try to upload the image

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
</table>

</div>
</div>
</div>
<script>
$("input").on("change", function() {
    this.setAttribute(
        "data-date",
        moment(this.value, "MM-DD-YYYY")
        .format( this.getAttribute("data-date-format") )
    )
}).trigger("change")
</script>





