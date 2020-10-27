<?php
include("../structure/header.php");
include("account.php");
?>
<!-- main content -->
<div class="container">
    <h1 style="text-align: center; font-size: 30px; padding: 10px">
        <u>Manage Your Account</u>
    </h1>
    <form style="padding-bottom: 60px;" method="POST">
        <form>
            <div class="form-group">
                <div class="row" style="text-align: center;">
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col">
                        <label for="custID">&emsp;<b>Customer Number:</b></label>
                        <input type="number" class="form-control" name="custID" value="<?php echo $personID; ?>" readonly style="text-align: center;">
                    </div>
                </div>
            </div>
            <hr class="separator">
            <fieldset id="field1" disabled>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="fName">&emsp;<b>First name</b></label>
                            <input class="form-control" id="firstname" value="<?php echo $fn; ?>">
                        </div>
                        <div class="col">
                            <label for="lName">&emsp;<b>Last name</b></label>
                            <input class="form-control" id="lastname" value="<?php echo $ln; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">&emsp;<b>Email</b></label>
                    <input class="form-control" id="email" value="<?php echo $email; ?>">
                </div>
            </fieldset>
            <br>
            <center>
                <button type="toggle" id="edit1" class="btn btn-secondary">Edit</button>
                &emsp;
                <button type="submit" name="submit1" class="btn btn-secondary">Confirm</button>
            </center>
            <span class="error" style="color: red;">&emsp;<?php echo $uNameErr, $pwErr ?></span>
            <hr class="separator">
        </form>
    </form>
</div>
<script type="text/javascript">
    $('#edit1').click(function() {
    if ($('#field1').prop('disabled') == false)
        $('#field1').prop('disabled', true);
    else
        $('#field1').prop('disabled', false);
});
</script>
<?php include("../structure/footer.php"); ?>