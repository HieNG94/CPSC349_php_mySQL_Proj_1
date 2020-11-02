<?php
$zipErr = $phoneErr = "";

// Address
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['street'])) {
        $street = test_input($_POST["street"]);
        $sql = "UPDATE person SET street = '$street' WHERE personID = '$personID';";
        mysqli_query($conn, $sql);
        include("init.php");
    }
    if (isset($_POST['city'])) {
        $city = test_input($_POST["city"]);
        $sql = "UPDATE person SET city = '$city' WHERE personID = '$personID';";
        mysqli_query($conn, $sql);
        include("init.php");
    }
    if (isset($_POST['st'])) {
        $st = test_input($_POST["st"]);
        $sql = "UPDATE person SET state = '$st' WHERE personID = '$personID';";
        mysqli_query($conn, $sql);
        include("init.php");
    }
    // Zipcode
    if (isset($_POST['zipcode'])) {
        $zip = test_input($_POST["zipcode"]);
        if (strlen($zip) != 5) {
            $zipErr = "5 digits only.";
        } else {
            $sql = "UPDATE person SET zipcode = '$zip' WHERE personID = '$personID';";
            mysqli_query($conn, $sql);
            include("init.php");
        }
    }
    // Phone
    if (isset($_POST['phone'])) {
        $phone = test_input($_POST["phone"]);
        if (strlen($phone) != 10) {
            $phoneErr = "10 digits only.";
        } else {
            $sql = "UPDATE person SET phone = '$phone' WHERE personID = '$personID';";
            mysqli_query($conn, $sql);
            include("init.php");
        }
    }
}
