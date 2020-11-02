<?php
$lName = $fName = $email = $uName = $street = $city = $st = $zip = $phone = "";

$sql = "SELECT * FROM person WHERE personID = '$personID';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$lName = $row['lastName'];
$fName = $row['firstName'];
$email = $row['email'];
$street = $row['street'];
$city = $row['city'];
$st = $row['state'];
$zip = $row['zipcode'];
$phone = $row['phone'];

$sql = "SELECT * FROM accounts WHERE personID = '$personID';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$uName = $row['username'];

mysqli_free_result($result);
