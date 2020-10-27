<?php
define('MAX_PERSON', '1000000000');
include("ini.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Last name
    $lName = test_input($_POST["lName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $lName)) {
        $lNameErr = "Only letters and white space allowed";
    } else
        $flag1 = True;
    // First name
    $fName = test_input($_POST["fName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/", $fName)) {
        $fNameErr = "Only letters and white space allowed";
    } else
        $flag2 = True;
    // Username
    $uName = test_input($_POST["uName"]);
    if (!preg_match("/^[a-zA-Z0-9]*$/", $uName)) {
        $uNameErr = "No special characters allowed";
    } elseif (strlen($uName) < 4 || strlen($uName) > 16) {
        $uNameErr = "Username must contain 4 to 16 characters.";
    } else
        $flag3 = True;
    // Email
    $email = test_input($_POST["email"]);
    $sql = "SELECT email FROM person
        WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $emailErr = "Already used.";
    } else
        $flag4 = True;
    mysqli_free_result($result);
    // Password
    $pw = test_input($_POST["password"]);
    if (strlen($pw) < 4 || strlen($pw) > 16) {
        $pwErr = "Password must contain 4 to 16 characters.";
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $pw)) {
        $pwErr = "No special character allowed.";
    } elseif (preg_match("/^[a-z0-9]*$/", $pw)) {
        $pwErr = "Please include at least one capital letter.";
    } elseif (preg_match("/^[a-zA-Z]*$/", $pw)) {
        $pwErr = "Please include at least one number.";
    } else
        $flag5 = True;
    // Re-enter password
    $rePw = test_input($_POST["rePw"]);
    if (strcmp($pw, $rePw)) {
        $rePwErr = "Password does not match.";
    } else
        $flag6 = True;
    // Address
    $street = test_input($_POST["street"]);
    $city = test_input($_POST["city"]);
    $st = test_input($_POST["st"]);
    // Zipcode
    $zip = test_input($_POST["zipcode"]);
    if (strlen($zip) != 5) {
        $zipErr = "5 digits only.";
    } else
        $flag7 = True;
    // Phone
    $phone = test_input($_POST["phone"]);
    if (strlen($phone) != 10) {
        $phoneErr = "10 digits only.";
    } else
        $flag8 = True;
    // Position
    $pos = test_input($_POST["pos"]);
    if ($pos == "staff") {
        // SSN
        $ssn = test_input($_POST["ssn"]);
        if (strlen($ssn) != 10) {
            $ssnErr = "10 digits only.";
        } else {
            $sql = "SELECT ssn FROM person
            WHERE ssn = '" . $_POST["ssn"] . "'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $ssnErr = "Already used.";
            } else
                $flag9 = True;
            mysqli_free_result($result);
        }
        // Invitation code
        $inviCode = test_input($_POST["inviCode"]);
        $spec = test_input($_POST["spec"]);
        $sql = "SELECT personID FROM accounts
        WHERE pos = 'staff' AND personID = '" . $_POST["inviCode"] . "'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            $inviCodeErr = "Invalid invitation code.";
        } else
            $flag10 = True;
        mysqli_free_result($result);
    }
    // Submit
    if (isset($_POST["submit"])) {
        if (
            $flag1 == True && $flag2 == True && $flag3 == True && $flag4 == True
            && $flag5 == True && $flag6 == True && $flag7 == True && $flag8 == True
        ) {
            if ($flag9 == True && $flag10 == True) {
                $sql = "SELECT personID FROM accounts WHERE pos = 'staff';";
                $result = mysqli_query($conn, $sql);
                $personID = MAX_PERSON - mysqli_num_rows($result);
                mysqli_free_result($result);
                mysqli_query($conn, "INSERT INTO person VALUE('$personID', '$lName', '$fName', 
                '$email', '$street', '$city', '$st', '$zip', '$phone', '$ssn');");
                mysqli_query($conn, "INSERT INTO employee VALUE('$personID', '$spec');");
                mysqli_query($conn, "INSERT INTO accounts VALUE('$personID', '$uName', '$pw', '$pos');");
                include("message.php");
                include("ini.php");
            } else {
                $sql = "SELECT personID FROM accounts WHERE pos = 'customer';";
                $result = mysqli_query($conn, $sql);
                $personID = 1 + mysqli_num_rows($result);
                mysqli_free_result($result);
                mysqli_query($conn, "INSERT INTO person VALUE('$personID', '$lName', '$fName',
                 '$email', '$street', '$city', '$st', '$zip', '$phone', 'NULL');");
                mysqli_query($conn, "INSERT INTO accounts VALUE('$personID', '$uName', '$pw', '$pos');");
                include("message.php");
                include("ini.php");
            }
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
