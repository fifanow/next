<?php include 'include/header.php';?>


<div class="container">
<div class="col-md-12">
<h1>Enter Your detail:</h1>
</div></div>
<hr/>
<div class="container">
<div class="panel panel-default">
<div class="panel-body">
<form action="" method="post">
<div class="form group col-md-12">

<select name="type" onchange="this.form.submit()" class="form-control">
<option value="">Select Country</option>
<option value="germany">Germany</option>
<option value="italy">Italy</option>
    

</select></div>
<?php 
if(isset($_POST['type'])){

switch ($_POST['type']) {
    case germany:
       header("Location: add.php");
        break;
    
    case italy:
 header("Location: add.php");       
  break;
}
}

echo $_post['type'];
?>
<div class="form group ">
<label>Customer Name </label>
<input type="text" name="name" id="name"   class="form-control" required="" placeholder="Please Enter Name"/></div><br />
<div class="form row">
<div class="form group col-md-4"><label>Phone </label>
<input type="text" name="phone" id="name" class="form-control" placeholder="Phone Number"/></div>
<div class="form group col-md-4">
<label>Mobile</label>
<input type="text" name="mobile" id="name" class="form-control" required="" placeholder="Mobile Number"/></div><div class="form group col-md-4">
<label>Alternate Mobile</label>
<input type="text" name="alter" id="name" class="form-control" placeholder="Alternate Number"/><br /><br /></div></div>
<div class="form row">
<div class="form group col-md-4"><label>Email</label>
<input type="email" name="email" id="name" class="form-control"  placeholder="Email address"/><br /><br /></div>
<div class="form group col-md-8"><label>Address </label>
<input type="text" name="add2" id="name" class="form-control"  placeholder="address"/><br /><br /></div></div>
<div class="form row">
<div class="form group col-md-4"><label>City</label>
<input type="text" name="city" id="name" class="form-control" placeholder="City Name"/><br /><br /></div>
<div class="form group col-md-4"><label>State</label>
<input type="text" name="state" id="name" class="form-control" placeholder="State Name"/><br /><br /></div>
<div class="form group col-md-4">
<label>Product Name</label>
<select class="form-control" name="pname" required="">
    <?php include 'config/database.php';?>
    <?php 
    foreach($con->query("SELECT * FROM products ;")as $row){ ?>
    <option><?php echo $row['p_name'];?>
        
    </option>
    <?php }?> 

</select><br /><br /></div></div>
<div class="form row">
<div class="form group col-md-6"><label>Additional Product Name(Description)</label>
<input type="text" name="pmodel" class="form-control"> 
<br /><br /></div>
<div class="form group col-md-6"><label>Purchase Date</label>
<input type="date" name="pdate" id="name" class="form-control"  placeholder="Purchase Date"/><br /><br /></div>
</div>
<div class="form row">
<div class="form group col-md-6"><label>Sales Person</label>
<select class="form-control" name="salesp" required="">
    <?php include 'config/database.php';?>
    <?php 
    foreach($con->query("SELECT * FROM employee;")as $row){ ?>
    <option><?php echo $row['e_fname'];?>
        
    </option>
    <?php }?> 

</select>
<br /><br /></div>
<div class="form group col-md-6"><label>Status</label>
<select name="status" class="form-control" required=""> 
<option>Under Guarantee</option>
<option>No Guarantee</option>
<option>Guarantee Expired</option>
<option>AMC</option>
</select> <br/><br /></div>

</div>
<input type="submit" value=" Submit" class="col-md-12 col-sm-12 btn btn-danger " name="submit"/><br />
</form>
</div></div>
<!-- Right side div -->
</div>

</div>
<?php
if(isset($_POST["submit"])){
$hostname='localhost';
$username='mbnehase_firdous';
$password='Farith@1990';

try {
$dbh = new PDO("mysql:host=$hostname;dbname=mbnehase_MB NEHA",$username,$password);

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
$sql = "INSERT INTO customer (c_name, c_phone, c_mobile, c_alter, c_email, c_addr2, c_street, c_city, c_p_name, c_p_cost, c_p_date, c_usedat, c_salesperson, c_custstatus, c_amc_from, c_amc_to)
VALUES ('".$_POST["name"]."','".$_POST["phone"]."','".$_POST["mobile"]."', '".$_POST["alter"]."','".$_POST["email"]."', '".$_POST["add2"]."','".$_POST["state"]."','".$_POST["city"]."', '".$_POST["pname"]."','".$_POST["pmodel"]."','".$_POST["pdate"]."', '".$_POST["purpose"]."','".$_POST["salesp"]."', '".$_POST["status"]."','".$_POST["amcfrom"]."', '".$_POST["amcto"]."')";
if ($dbh->query($sql)) {
echo "<script type= 'text/javascript'>alert('Customer Record Has Been Inserted Successfully!');</script>";
}
else{
echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
}

$dbh = null;
}
catch(PDOException $e)
{
echo $e->getMessage();
}

}
?></body>
</html>