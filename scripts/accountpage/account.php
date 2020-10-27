<?php
$personID = $_SESSION['personID'];
$ln = $fn = $email = $street = $city = $st = $zip = $phone = "";

$uName = "";
$uNameErr = $pwErr = "";
$flag1 = $flag2 = False;

$sql = "SELECT * FROM person WHERE personID = '$personID';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$ln = $row['lastName'];
$fn = $row['firstName'];
$email = $row['email'];
$street = $row['street'];
$city = $row['city'];
$st = $row['state'];
$zip = $row['zipcode'];
$phone = $row['phone'];




