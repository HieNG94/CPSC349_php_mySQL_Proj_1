<?php
include("../structure/header.php");
include("login.php");
?>
<!-- main content -->
<div class="container">
    <h1 style="text-align: center; font-size: 30px; padding: 10px">
        <u>Sign in to your account</u>
    </h1>
    <form style="padding-bottom: 60px;" method="POST">
        <form>
            <div class="form-group">
                <label for="liUName">&emsp;<b>Username</b></label>
                <input type="text" class="form-control" name="liUName" value="<?php echo $uName; ?>" required="required">
            </div>
            <div class="form-group">
                <label for="liPw">&emsp;<b>Password</b></label>
                <input type="password" class="form-control" name="liPw" required="required">
            </div>
            <a class="link" href="findPw.php" style="display: flex; justify-content:flex-end;">Forgot password?</a>
            <br>
            <center><button type="submit" name="submit" class="btn btn-primary">Log in</button></center>
            <span class="error" style="color: red;">&emsp;<?php echo $uNameErr, $pwErr ?></span>
        </form>
        <center>New customer? <a class="link" href="../signuppage/layout.php">Sign up</a></center>
    </form>
</div>
<?php include("../structure/footer.php"); ?>