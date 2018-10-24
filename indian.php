<?php 
session_start();
?>

<div class="container">
<div class="panel panel-default">
<div class="panel-body">
	<form action="" method="POST">
<div class="form row">
<div class="form group col-md-6">
<label>Destination Country:</label>
<input type="text" name="country"   class="form-control"/></div>
<div class="form group col-md-6">
<label>Visa Type:</label>
<input type="text" name="visa"   value="<?php echo $_SESSION['visa'];?>" class="form-control"/></div></div><br />
<div class="form row">
<div class="form group col-md-6">
<label>Travel Date:</label>
<input type="date" name="tdate" class="form-control"/></div>
<div class="form group col-md-6">
<label>Return Date:</label>
<input type="date" name="rdate" class="form-control"/></div></div><br />
<div class="form row">
<div class="form group col-md-6">
	<label>Name:</label>
<input type="text" name="name" required="" class="form-control"/>
</div>
<div class="form group col-md-6">
<label>Mother's Name:</label>
<input type="text" name="Mother" class="form-control"/></div></div><br />
<div class="form row">
<div class="form group col-md-6">
<label>Father's Name:</label>
<input type="text" name="Father" class="form-control"/></div>
<div class="form group col-md-6">
<label>Spouse's Name:</label>
<input type="text" name="Spouse" class="form-control"/></div></div><br />

<div class="form row">
<div class="form group col-md-6">
<label>Visiting Place:</label>
<input type="text" name="place" class="form-control"/></div>
<div class="form group col-md-6">
	<label>Port:</label>
<input type="text" name="port"  class="form-control"/>
</div></div><br />
<div class="form row">
<div class="form group col-md-6">
<label>Nationality:</label>
<input type="text" name="Nation" required="" class="form-control"/></div>
<div class="form group col-md-6">
<label>Maritial Status</label>
<select name="maritial" class="form-control" required="">
	<option>Single</option>
	<option>Married</option>
</select></div></div><br>
<div class="form row">
<div class="form group col-md-6">
<label>Email:</label>
<input type="email" name="email"  class="form-control"/></div>
<div class="form group col-md-6">
<label>Mobile Number:</label>
<input type="text" name="mobile" required="" class="form-control"/></div></div><br />
<div class="form row">
<div class="form group col-md-6">
<label>UAE ADDRESS:</label>
<input type="text" name="address" required="" class="form-control" placeholder="FLAT/VILLA,BLDG,AREA,CITY" />
</div>
<div class="form group col-md-6">
<label>Home Country Address:</label>
<input type="text" name="homeaddress" required="" class="form-control" placeholder="FLAT/VILLA,BLDG,AREA,CITY" />
</div></div><br/>

<div class="form row">
<div class="form group col-md-6">
<label>Occupation (As per NOC letter):</label>
<input type="text" name="Occupation" required="" class="form-control"/></div>
<?php if($_SESSION['visa']=='Business') { ?>
<div class="form group col-md-6">
<label>Company Name:</label>
<input type="text" name="company"  class="form-control"/></div></div><br />

<div class="form row">
<div class="form group col-md-6">
<label>Company Address:</label>
<input type="text" name="companyaddress"  class="form-control" placeholder="FLAT/VILLA,BLDG,AREA,CITY"/></div>
<div class="form group col-md-6">
<label>Zip Code:</label>
<input type="text" name="pobox"  class="form-control"/></div></div><br />

<div class="form row">
<div class="form group col-md-6">
<label>Telephone Number:</label>
<input type="text" name="Telephone"  class="form-control"/></div> <?php }?>
<div class="form group col-md-6">
<label>Sponsor:</label>
<input type="text" name="pay"  class="form-control"/></div></div><br />
<div class="form group"><label>Enter Your previous <?php echo $_SESSION['type'];?> Visa Details:</label></div>
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
<option>none</option>
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

if (isset($_POST['submit'])) {
	
$hostname='localhost';
$username='firdous';
$password='Farith@1990';

try {
$dbh = new PDO("mysql:host=$hostname;dbname=farith",$username,$password);

if (isset($_POST['country'])) {
$country=htmlspecialchars(strip_tags($_POST['country']));}

if (isset($_POST['visa'])) {
$visa=htmlspecialchars(strip_tags($_POST['visa']));}
$tdate=htmlspecialchars(strip_tags($_POST['tdate']));
$rdate=htmlspecialchars(strip_tags($_POST['rdate']));
$place=htmlspecialchars(strip_tags($_POST['place']));
$name=htmlspecialchars(strip_tags($_POST['name']));
$Nation=htmlspecialchars(strip_tags($_POST['Nation']));
$maritial=htmlspecialchars(strip_tags($_POST['maritial']));
$eid='Null';
$mobile=htmlspecialchars(strip_tags($_POST['mobile']));
$email=htmlspecialchars(strip_tags($_POST['email']));
$address=htmlspecialchars(strip_tags($_POST['address']));
$Occupation=htmlspecialchars(strip_tags($_POST['Occupation']));
$port=htmlspecialchars(strip_tags($_POST['port']));
$homeaddress=htmlspecialchars(strip_tags($_POST['homeaddress']));


$Father='Null';
$Mother='Null';
$Spouse='Null';

if(isset($_POST['company']) && isset($_POST['companyaddress'])){

	$company=htmlspecialchars(strip_tags($_POST["company"]));
	$companyaddress=htmlspecialchars(strip_tags($_POST["companyaddress"]));
     
}else{
     $company='null';
     $companyaddress='null';
}


if(isset($_POST['pobox']) && isset($_POST['Telephone'])){

	$pobox=htmlspecialchars(strip_tags($_POST["pobox"]));
	$Telephone=htmlspecialchars(strip_tags($_POST["Telephone"]));
     
}else{
     
     $pobox='null';
     $Telephone='null';
    
}

 
$pay=htmlspecialchars(strip_tags($_POST['pay']));
$issue=htmlspecialchars(strip_tags($_POST['issue']));
$expiry=htmlspecialchars(strip_tags($_POST['expiry']));
$school=htmlspecialchars(strip_tags($_POST['school']));
$level=htmlspecialchars(strip_tags($_POST['level']));
$schooladdress=htmlspecialchars(strip_tags($_POST['schooladdress']));
$schoolphone=htmlspecialchars(strip_tags($_POST['schoolphone']));

$sql = "INSERT INTO india (country, visa, tdate, rdate, place, name, Nation, maritial, eid, mobile, email, address, Occupation,port, Mother, Father, Spouse, homeaddress,company, companyaddress, pobox, Telephone, pay, issue, expiry, school, level,schooladdress, schoolphone)
VALUES ('$country','$visa','$tdate', '$rdate','$place', '$name','$Nation','$maritial', '$eid','$mobile','$email', '$address','$Occupation', '$port','$Mother','$Father','$Spouse','$homeaddress','$company','$companyaddress', '$pobox', '$Telephone','$pay','$issue','$expiry','$school','$level','$schooladdress','$schoolphone')";

if ($dbh->query($sql)) {
echo "<script type= 'text/javascript'>alert('Your Application Has Been Submitted Successfully!');</script>";
}
else{
echo "<script type= 'text/javascript'>alert('We Aplogize, Your Information has not been inserted.');</script>";
}

$dbh = null;
}
catch(PDOException $e)
{
}

}

?>











