<?php include 'include/mainheader.php';?>
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header"><br><h1>Total Individual Expense</h1></div>
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
<table class="table table-bordered table-responsive"><tr>
<td>
<p>Select the name:</p>
</td>
<td>
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

        </select></td>
        </tr>
<tr><td>
<p>Please Select the Date:</p>
</td>
<td>
<input type='date' name='startDate' value="<?php echo isset($_POST['startDate']) ? $_POST['startDate']: ''?>"></input>
<input type='date' name='endDate' value="<?php echo isset($_POST['endDate']) ? $_POST['endDate']: ''?>"></input>
<p>
</td>
</tr>
<tr>
<td></td>
<td>
<input type='submit' class='btn btn-success'name='sname' value='Submit'></input>
</p>
</td>
</tr>
</table>
</form>
<?php

if(isset($_POST['sname'])){

include'config/database.php';
if(isset($_POST['name'])){

$iname=$_POST['name'];
}

$startDate=$_POST['startDate'];
$endDate=$_POST['endDate'];


 echo"<table class='table table-bordered table-hover table-responsive table-condensed table-dark'>";
echo"<tr>";
echo"<th>Date</th>";
echo"<th>Name</th>";
echo"<th>Price</th>";
echo"</tr>";
//foreach ($con->query("SELECT created,name,price FROM products WHERE name='$iname' AND ")as $row)
foreach ($con->query("SELECT created,name,price FROM data WHERE name='$iname' AND username='{$_SESSION[ "username" ]}' AND created between '$startDate' AND '$endDate'")as $row)  {

	echo"<tr>";
	echo"<td>".$row['created']."</td>";
	echo"<td>".$row['name']."</td>";
	echo"<td>".$row['price']."</td>";
	echo"</tr>";
}


echo"</table>";
//foreach ($con->query("SELECT SUM(price) FROM products WHERE created between '$startDate' AND '$endDate'")as $total) {

//	echo "<h3>Total Mess Purchase Amount : </h3>".$total['SUM(price)'];

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





