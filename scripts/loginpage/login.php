<?php
$uName = "";
$uNameErr = $pwErr = "";
$flag1 = $flag2 = False;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uName = $_POST["liUName"];
    $sql = "SELECT username FROM accounts
    WHERE username = '$uName';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0)
        $uNameErr = "Username not found.";
    else
        $flag1 = True;
    mysqli_free_result($result);

    if ($flag1 == True) {
        $sql = "SELECT pw FROM accounts 
        WHERE username = '$uName'
        AND pw = '" . $_POST["liPw"] . "';";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0)
            $pwErr = "Inccorect password.";
        else
            $flag2 = True;
        mysqli_free_result($result);
    }

    if (isset($_POST["submit"])) {
        if ($flag1 == True && $flag2 == True) {
            $sql = "SELECT pos, personID FROM accounts
            WHERE username = '$uName';";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $_SESSION['state'] = $row['pos'];
            $_SESSION['personID'] = $row['personID'];
            mysqli_free_result($result);
            header("location:../homepage/index.php");
        }
    }
}
