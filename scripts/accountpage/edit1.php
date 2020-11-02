<?php
$lNameErr = $fNameErr =  $emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['lastname'])) {
        // Last name
        $lName = test_input($_POST["lastname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $lName)) {
            $lNameErr = "Only letters and white space allowed";
        } else {
            $sql = "UPDATE person SET lastName = '" . $_POST["lastname"] . "' WHERE personID = '$personID';";
            mysqli_query($conn, $sql);
            include("init.php");
        }
    }
    if (isset($_POST['firstname'])) {
        // First name
        $fName = test_input($_POST["firstname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $fName)) {
            $fNameErr = "Only letters and white space allowed";
        } else {
            $sql = "UPDATE person SET firstName = '" . $_POST["firstname"] . "' WHERE personID = '$personID';";
            mysqli_query($conn, $sql);
            include("init.php");
        }
    }
    if (isset($_POST['email'])) {
        $email = test_input($_POST['email']);
        $sql = "SELECT email FROM person
        WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) != 0) {
            $emailErr = "Already used.";
        } else {
            $sql = "UPDATE person SET email = '" . $_POST["email"] . "' WHERE personID = '$personID';";
            mysqli_query($conn, $sql);
            include("init.php");
        }
        mysqli_free_result($result);
    }
}
