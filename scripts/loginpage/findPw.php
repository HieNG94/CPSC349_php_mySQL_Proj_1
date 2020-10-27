<?php
include("../structure/header.php");

$uName = $email = $pW = "";
$uNameErr = $emailErr = "";
$flag1 = $flag2 = False;
$pID = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uName = $_POST["fpuName"];
    $sql = "SELECT username FROM accounts
    WHERE username = '$uName';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0)
        $uNameErr = "Username not found.";
    else {
        $sql = "SELECT personID FROM accounts 
                WHERE username = '$uName'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $pID = $row['personID'];
        $flag1 = True;
    }
    mysqli_free_result($result);

    if ($flag1 == True) {
        $email = $_POST["fpEmail"];
        $sql = "SELECT * FROM person 
        WHERE personID = '$pID'
        AND email = '$email';";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0)
            $emailErr = "Email not found.";
        else
            $flag2 = True;
        mysqli_free_result($result);
    }

    if (isset($_POST["search"])) {
        if ($flag1 == True && $flag2 == True) {
            $sql = "SELECT pw FROM accounts
                    WHERE username = '$uName'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $pW = $row["pw"];
            mysqli_free_result($result);
            $uName = $email = "";
            $uNameErr = $emailErr = "";
            $flag1 = $flag2 = False;
            $pID = "";
            echo "<script> $(document).ready(function(){ $('.modal').modal('show'); });</script>";
        }
    }
}
?>
<!-- main content -->
<div class="container">
    <h1 style="text-align: center; font-size: 30px; padding: 10px">
        <u>Forgot Password</u>
    </h1>
    <form style="padding-bottom: 60px;" method="POST">
        <form>
            <div class="form-group">
                <label for="fbuName">&emsp;<b>Username</b></label>
                <input type="text" class="form-control" name="fpuName" value="<?php echo $uName; ?>" required="required">
            </div>
            <div class="form-group">
                <label for="fpEmail">&emsp;<b>Email</b></label>
                <input type="email" class="form-control" name="fpEmail" value="<?php echo $email; ?>" required="required">
            </div>
            <br>
            <center><button type="submit" name="search" class="btn btn-primary">Search</button></center>
            <span class="error" style="color: red;">&emsp;<?php echo $uNameErr, $emailErr ?></span>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="background-color: rgb(244 212 143); text-align:center;">
                        <div class="modal-header" style="justify-content:center;">
                            <b>SUCCESS</b>
                        </div>
                        <div class="modal-body" style="padding: 20px;">
                            Your passwork is: &emsp;<b><?php echo $pW; ?></b>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <center>New customer? <a class="link" href="../signuppage/layout.php">Sign up</a></center>
    </form>
</div>
<?php include("../structure/footer.php"); ?>