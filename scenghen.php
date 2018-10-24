<?php 
session_start();
?>
<!--<?php if($_SESSIONvisabusiness) { ?> <?php }?>-->
<?php include'include/header.php';?>

<div class="container">
<div class="panel panel-default">
<div class="panel-body">
	<form action="" method="POST">
<div class="form row">
<div class="form group col-md-6">
<label>Destination Country:</label>
<input type="text" name="country" value="<?php echo $_SESSION['type'];?>" class="form-control"/></div>
<div class="form group col-md-6">
<label>Visa Type:</label>
<input type="text" name="visa" value="<?php echo $_SESSION['visa'];?>" class="form-control"/></div></div><br />
<div class="form row">
<div class="form group col-md-6">
<label>Travel Date:</label>
<input type="date" name="tdate" class="form-control"/></div>
<div class="form group col-md-6">
<label>Return Date:</label>
<input type="date" name="rdate" class="form-control"/></div></div><br />
<div class="form row">
<div class="form group col-md-6">
<label>Visiting Place:</label>
<input type="text" name="place" class="form-control"/></div>
<div class="form group col-md-6">
<label>Name:</label>
<input type="text" name="name" required="" class="form-control"/></div></div><br />
<div class="form row">
<div class="form group col-md-6">
<label>Nationality:</label>
<input type="text" name="Nation" class="form-control"/></div>
<div class="form group col-md-6">
<label>Maritial Status</label>
<select name="maritial" class="form-control" required="">
<option></option>
<option>Married</option>
<option>Single</option>	

</select></div></div><br />
<div class="form row">
<div class="form group col-md-6">
<label>Emirates ID Number(optional):</label>
<input type="text" name="eid"  class="form-control"/></div>
<div class="form group col-md-6">
<label>Mobile Number:</label>
<input type="text" name="mobile"  class="form-control"/></div></div><br />
<div class="form row">
<div class="form group col-md-6">
<label>Email ID:</label>
<input type="email" name="email"  class="form-control"/></div>
<div class="form group col-md-6">
<label>UAE Address:</label>
<input type="text" name="address"  class="form-control" placeholder="FLAT/VILLA,BLDG,AREA,CITY" /></div></div><br/>

<div class="form row">
<div class="form group col-md-6">
<label>Occupation (As per NOC letter):</label>
<input type="text" name="Occupation"  class="form-control"/></div>
<?php if($_SESSION['visa']=='business') { ?>
<div class="form group col-md-6">
<label>Company Name:</label>
<input type="text" name="company"  class="form-control"/></div></div><br />

<div class="form row">
<div class="form group col-md-6">
<label>Company Address:</label>
<input type="text" name="companyaddress"  class="form-control" placeholder="FLAT/VILLA,BLDG,AREA,CITY"/></div>
<div class="form group col-md-6">
<label>PO box:</label>
<input type="text" name="pobox"  class="form-control"/></div></div><br />

<div class="form row">
<div class="form group col-md-6">
<label>Telephone Number:</label>
<input type="text" name="Telephone"  class="form-control"/></div> <?php }?>
<div class="form group col-md-6">
<label>Who Will Pay for Your Trip:</label>
<input type="text" name="pay"  class="form-control"/></div></div><br />
<div class="form group"><label>Enter Your previous Schengen Visa Details:</label></div>
<div class="form row">
<div class="form group col-md-6">
<label>Issued Date:</label>
<input type="date" name="issue"  class="form-control"/></div>
<div class="form group col-md-6">
<label>Expiry Date:</label>
<input type="date" name="expiry"  class="form-control"/></div></div><br />
<div class="form group"><label>School Details (If Student):</label></div>
<div class="form row">
<div class="form group col-md-3">
<label>School Name:</label>
<input type="text" name="school"  class="form-control"/></div>
	
<div class="form group col-md-3">
<label>Level Of Study:</label>
<select name="level" class="form-control">
<option>Level 1</option>
<option>Level 2</option>
<option>Level 3</option>
<option>Level 4</option>
<option>Level 5</option>
<option>Level 6</option>
<option>Level 7</option>
<option>Level 8</option>
<option>Level 9</option>
<option>Level 10</option>
<option>Level 11</option>
<option>Level 12</option>
<option>Level 13</option>	
</select></div>
<div class="form group col-md-3">
<label>School Address:</label>
<input type="text" name="schooladdress"  class="form-control"/></div>
<div class="form group col-md-3">
<label>School Phone Number:</label>
<input type="text" name="schoolphone"  class="form-control"/></div></div><br />
<input type="file" value="upload passport" class="form-control" name="passport"/><br />
<input type="submit" value="Submit" class="col-md-12 col-sm-12 btn btn-danger" name="submit"/><br />
</form>
</div></div>
<!-- Right side div -->
</div>

</div>

<?php

include 'config/database.php';

if (isset($_POST['submit'])) {
	

$country=$_POST['country'];
$visa=$_POST['visa'];
$tdate=$_POST['tdate'];
$rdate=$_POST['rdate'];
$place=$_POST['place'];
$name=$_POST['name'];
$Nation=$_POST['Nation'];
$maritial=$_POST['maritial'];
$eid=$_POST['eid'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$address=$_POST['address'];
$Occupation=$_POST['Occupation'];
$company=$_POST['company'];
$companyaddress=$_POST['companyaddress'];
$pobox=$_POST['pobox'];
$Telephone=$_POST['Telephone'];
$pay=$_POST['pay'];
$issue=$_POST['issue'];
$expiry=$_POST['expiry'];
$school=$_POST['school'];
$level=$_POST['level'];
$schooladdress=$_POST['schooladdress'];
$schoolphone=$_POST['schoolphone'];

$query="INSERT INTO visa(country, visa, tdate, rdate, place, name, Nation, maritial, eid, mobile, email, address, Occupation, company, companyaddress, pobox, Telephone, pay, issue, expiry, school, level,schooladdress, schoolphone) VALUES (:country,:visa,:tdate,:rdate,:place,:name,:Nation,:maritial,:eid,:mobile,:email,:address,:Occupation,:company,:companyaddress,:pobox,:Telephone,:pay,:issue,:expiry,:school,:level,:schooladdress,:schoolphone";

$stmt=$con->prepare($query);

$row=$stmt->execute(array(":country"=>$country,":visa"=>$visa,":tdate"=>$tdate,":place"=>$place, ":name"=>$name, ":Nation"=>$Nation, ":maritial"=>$maritial, ":eid"=>$eid, ":mobile"=>$mobile, ":email"=>$email, ":address"=>$address, ":Occupation"=>$Occupation, ":company"=>$company, ":companyaddress"=>$companyaddress, ":pobox"=>$pobox, ":Telephone"=>$Telephone, ":pay"=>$pay, ":issue"=>$issue, ":expiry"=>$expiry, ":school"=>$school, ":level"=>$level, ":schooladdress"=>$schooladdress, ":schoolphone"=>$schoolphone));



if($row){

  echo "<script type= 'text/javascript'>alert('Service Status Has Successfully changed');</script>";
} else{

  echo "<script type= 'text/javascript'>alert('not updated!');</script>";
}





}
?>