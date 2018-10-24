<?php
// used to connect to the database
$host = "localhost";
$db_name = "fifanowc_farith";
$username = "fifanowc_firdous";
$password = "Farith@1990";
  
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
  
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>