<?php include 'include/mainheader.php';?>
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header"><br><h1>Total Individual Expense</h1></div>
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
<div class="panel panel-default">
<div class="panel-body">
	<div class="form-group">
		<label>Select  the Starting Date</label>
<input type='date' class='form-control'name='startDate' value="<?php echo isset($_POST['startDate']) ? ($_POST['startDate']) :'' ?>"></input></div>
<label>Select  the Starting Date</label>
<input type='date' name='endDate' class='form-control' value="<?php echo isset($_POST['endDate']) ? ($_POST['endDate']) :''   ?>"></input></div>
<input type='submit' class='btn btn-success'name='search' value='Submit'></input>
</p>
</div>
</div>
</form>
<?php
include'config/database.php';
if(isset($_POST['search'])){
$startDate=$_POST['startDate'];
$endDate=$_POST['endDate'];

 echo"<table class='table table-bordered table-hover table-responsive table-condensed table-dark'>";
echo"<tr>";
echo"<th>Name</th>";
echo"<th>Price</th>";
echo"</tr>";
foreach ($con->query("SELECT name,SUM(price) FROM data WHERE username='{$_SESSION["username"]}'AND created between '$startDate' AND '$endDate' GROUP BY name")as $row) {

	echo"<tr>";
	echo"<td>".$row['name']."</td>";
	echo"<td>".$row['SUM(price)']."</td>";
	echo"</tr>";
}


echo"</table>";
foreach ($con->query("SELECT SUM(price) FROM data WHERE username='{$_SESSION["username"]}' AND created between '$startDate' AND '$endDate'")as $total) {
echo "<table class='table table-bordered table-hover table-responsive table-condensed'>";
echo "<tr>";
echo "<td><h3>Total Mess Purchase Amount:</td>";
	echo "<td>".$total['SUM(price)']."</td>";
	echo "</tr>";
	echo "</table>";

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





