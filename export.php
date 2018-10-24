<?php

session_start();

?>

<?php

include('config/database.php');

$id=isset($_GET['id']) ? $_GET['id']:die('ERROR:No Record Found');

$stmt=$con->prepare("SELECT * FROM visa WHERE id='$id' ");



$stmt->execute();
 
 
$columnHeader ='';

 


$setData='';
 
while($row =$stmt->FETCH(PDO::FETCH_ASSOC))
{
  extract($row);


$columnHeader = "Destination Country          "."\t".$country."\n"."Visa Type         "."\t".$visa."\n"."Travel Date           "."\t".$tdate."\n"."Return Date     "."\t".$rdate."\n"."Place To Visit      "."\t".$place."\n"."Customer Name      "."\t".$name."\n"."Nationality      "."\t".$Nation."\n"."Maritial Status      "."\t".$maritial."\n"."Emirates Number      "."\t".$eid."\n"."Mobile      "."\t".$mobile."\n"."Email       "."\t".$email."\n"."Address      "."\t".$address."\n"."Occupation      "."\t".$Occupation."\n"."Company Name      "."\t".$company."\n"."Company Address      "."\t".$companyaddress."\n"."PO BOX No      "."\t".$pobox."\n"."Telephone      "."\t".$Telephone."\n"."Sponsor      "."\t".$pay."\n"."Previous Visa Issued      "."\t".$issue."\n"."Expired Date      "."\t".$expiry."\n"."School Name      "."\t".$school."\n"."Level      "."\t".$level."\n"."School Address      "."\t".$schooladdress."\n"."School Phone      "."\t".$schoolphone."\n";


 
 
header("Content-type: application/msword");
header("Content-Disposition: attachment; filename=Application.doc");
header("Pragma: no-cache");
header("Expires: 0");
 
echo ucwords($columnHeader)."\n";

}
 ?>