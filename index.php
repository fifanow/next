<?php include 'include/mainheader.php';?>
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header"><br><h1>Bill Summary</h1></div>
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
<div class="panel panel-default panel-success">
<div class="panel-body">
<div class="form-group">
<label>Select Starting Date</label>
<input type='date' name='start' class="form-control" value="<?php echo isset($_POST['start']) ? $_POST['start']: ''?>"></input>
</div>
<div class="form-group">
<label>Select Ending Date</label>
<input type='date' name='end' class="form-control" value="<?php echo isset($_POST['end']) ? $_POST['end']: ''?>"></input>
</div>
<input type='Submit' class="form-control btn btn-success"  name='submit' value="Submit" ></input>
</div>
</div>
</form>

<form action='export.php' method='POST'>
<div class="form-group">
<input type='Submit'  class="btn btn-success" value="Download As Excel" ></input>
<input type='hidden' name='start' class="btn btn-success" value="<?php echo isset($_POST['start']) ? $_POST['start']: ''?>">
<input type='hidden' name='end' class="btn btn-success" value="<?php echo isset($_POST['end']) ? $_POST['end']: ''?>"></input></div>
</div>
</form>
<?php
include'config/database.php';

$page = isset($_GET['page']) ? $_GET['page'] : 1;
 
// set records or rows of data per page
$records_per_page = 5;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

$action = isset($_GET['action']) ? $_GET['action'] : "";



if(isset($_POST['submit'])){
if(isset($_POST['start'])){
$start=$_POST['start'];
}

if(isset($_POST['end'])){
$end=$_POST['end'];
}



foreach ($con->query("SELECT SUM(price) FROM data WHERE username='{$_SESSION[ "username" ]}' AND created between '$start' AND '$end'")as $total) {
echo "<table class='table table-bordered table-hover table-responsive table-condensed'>";
echo "<tr>";
echo "<td><h3>Total Mess Purchase Amount:</td>";
  echo "<td>".$total['SUM(price)']."</td>";
  echo "</tr>";
  echo "</table>";

}

 echo"<table class='table table-bordered table-hover table-responsive table-condensed table-dark'>";
echo"<tr>";
echo"<th>ID</th>";
echo"<th>Date</th>";
echo"<th>Name</th>";
echo"<th>payment Info</th>";
echo"<th>Description</th>";
echo"<th>Price</th>";
echo"<th>Action</th>";
echo"</tr>";
//foreach ($con->query("SELECT created,name,price FROM products WHERE name='$iname' AND ")as $row)
foreach ($con->query("SELECT id,created,name,paymentinfo, description, price FROM data WHERE username='{$_SESSION[ "username" ]}' AND created between '$start' AND '$end' ORDER BY id desc")as $row)  {

  echo"<tr>";
  echo"<td>".$row['id']."</td>";
  echo"<td>".$row['created']."</td>";
  echo"<td>".$row['name']."</td>";
  echo"<td>".$row['paymentinfo']."</td>";
  echo"<td>".$row['description']."</td>";
  echo"<td>".$row['price']."</td>";
  echo "<td>";

//update info into the existing data
echo"<a href='update.php?id=$row[id]' class='btn btn-primary m-r-1em'>Update</a>";
// delete info
echo"<a href='export.php?id=$row[id]' class='btn btn-danger m-r-1em' >download</a>";
echo "</td>";
echo"</tr>";}
echo"</table>";
//foreach ($con->query("SELECT SUM(price) FROM products WHERE created between '$startDate' AND '$endDate'")as $total) {

//  echo "<h3>Total Mess Purchase Amount : </h3>".$total['SUM(price)'];

//}
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





