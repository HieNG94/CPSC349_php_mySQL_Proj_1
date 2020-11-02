<?php
$personID = $_SESSION['personID'];
include("init.php");
include("edit1.php");
include("edit2.php");
include("edit3.php");

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
