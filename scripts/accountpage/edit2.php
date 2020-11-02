<?php
$curPwErr = $pwErr  = $rePwErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['curPw'])) {
        $sql = "SELECT pw FROM accounts 
        WHERE username = '$uName'
        AND pw = '" . $_POST["curPw"] . "';";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0)
            $curPwErr = "Inccorect password.";
        else {
            $pw = test_input($_POST["pw"]);
            if (strlen($pw) < 4 || strlen($pw) > 16) {
                $pwErr = "Password must contain 4 to 16 characters.";
            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $pw)) {
                $pwErr = "No special character allowed.";
            } elseif (preg_match("/^[a-z0-9]*$/", $pw)) {
                $pwErr = "Please include at least one capital letter.";
            } elseif (preg_match("/^[a-zA-Z]*$/", $pw)) {
                $pwErr = "Please include at least one number.";
            } else {
                // Re-enter password
                $rePw = test_input($_POST["rePw"]);
                if (strcmp($pw, $rePw)) {
                    $rePwErr = "Password does not match.";
                } else {
                    $sql = "UPDATE accounts SET pw = '$pw' WHERE personID = '$personID';";
                    mysqli_query($conn, $sql);
                    include("init.php");
                }
            }
        }
        mysqli_free_result($result);
    }
}
