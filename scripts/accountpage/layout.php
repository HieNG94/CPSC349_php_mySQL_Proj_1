<?php
include("../structure/header.php");
include("account.php");
?>
<!-- main content -->
<div class="container">
    <h1 style="text-align: center; font-size: 30px; padding: 10px">
        <u>Manage Your Account</u>
    </h1>
    <form style="padding-bottom: 60px;" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
                            <label for="firstname">&emsp;<b>First name</b></label>
                            <input class="form-control" name="firstname" value="<?php echo $fName; ?>" required>
                            <span class="error" style="color: red;">&emsp;<?php echo $fNameErr ?></span>
                        </div>
                        <div class="col">
                            <label for="lastname">&emsp;<b>Last name</b></label>
                            <input class="form-control" name="lastname" value="<?php echo $lName; ?>" required>
                            <span class="error" style="color: red;">&emsp;<?php echo $lNameErr ?></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">&emsp;<b>Email</b></label>
                    <input class="form-control" name="email" value="<?php echo $email; ?>" required>
                </div>
            </fieldset>
            <br>
            <center>
                <button type="toggle" id="edit1" class="btn btn-secondary">Edit</button>
                &emsp;
                <button type="submit" id="submit1" class="btn btn-secondary" disabled>Confirm</button>
            </center>
            <hr class="separator">
            <fieldset id="field2" disabled>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="uName">&emsp;<b>Username</b></label>
                            <input type="text" class="form-control" name="uName" aria-describedby="uNameHelp" value="<?php echo $uName; ?>" readonly>
                            <small id="uNameHelp" class="form-text text-muted">
                                &emsp;Enter 4-16 characters. No special character allows.
                            </small>
                        </div>
                        <div class="col">
                            <label for="curPw">&emsp;<b>Current Password</b></label>
                            <input type="password" class="form-control" name="curPw" required>
                            <span class="error" style="color: red;">&emsp;<?php echo $curPwErr ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="pw">&emsp;<b>New Password</b></label>
                            <input type="password" class="form-control" name="pw" aria-describedby="pwHelp" required>
                            <span class="error" style="color: red;">&emsp;<?php echo $pwErr ?></span>
                        </div>
                        <div class="col">
                            <label for="rePw">&emsp;<b>Confirm Password</b></label>
                            <input type="password" class="form-control" name="rePw" required>
                            <span class="error" style="color: red;">&emsp;<?php echo $rePwErr ?></span>
                        </div>
                    </div>
                    <small id="pwHelp" class="form-text text-muted">
                        &emsp;Password must contain 4-16 characters and have at least 1 number and
                        1 capital character.
                    </small>
                </div>
            </fieldset>
            <br>
            <center>
                <button type="toggle" id="edit2" class="btn btn-secondary">Edit</button>
                &emsp;
                <button type="submit" id="submit2" class="btn btn-secondary" disabled>Confirm</button>
            </center>
            <hr class="separator">
            <fieldset id="field3" disabled>
                <div class="form-group">
                    <label for="street">&emsp;<b>Street</b></label>
                    <input type="text" class="form-control" name="street" value="<?php echo $street; ?>" required>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="city">&emsp;<b>City</b></label>
                            <input type="text" class="form-control" name="city" value="<?php echo $city; ?>" required>
                        </div>
                        <div class="col">
                            <label for="st">&emsp;<b>State</b></label>
                            <select class="form-control" id="st" name="st">
                                <option value="" hidden><?php echo $st ?></option>
                                <option value="AK">Alaska</option>
                                <option value="AL">Alabama</option>
                                <option value="AR">Arkansas</option>
                                <option value="AZ">Arizona</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DC">District of Columbia</option>
                                <option value="DE">Delaware</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="IA">Iowa</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MD">Maryland</option>
                                <option value="ME">Maine</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MO">Missouri</option>
                                <option value="MS">Mississippi</option>
                                <option value="MT">Montana</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="NE">Nebraska</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NV">Nevada</option>
                                <option value="NY">New York</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VA">Virginia</option>
                                <option value="VT">Vermont</option>
                                <option value="WA">Washington</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WV">West Virginia</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="zipcode">&emsp;<b>Zipcode</b></label>
                            <input type="number" class="form-control" name="zipcode" value="<?php echo $zip; ?>" required>
                            <span class="error" style="color: red;">&emsp;<?php echo $zipErr ?></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone">&emsp;<b>Phone</b></label>
                    <input type="number" class="form-control" name="phone" value="<?php echo $phone; ?>" required>
                    <span class="error" style="color: red;">&emsp;<?php echo $phoneErr ?></span>
                </div>
            </fieldset>
            <br>
            <center>
                <button type="toggle" id="edit3" class="btn btn-secondary">Edit</button>
                &emsp;
                <button type="submit" id="submit3" class="btn btn-secondary" disabled>Confirm</button>
            </center>
        </form>
    </form>
</div>
<script type="text/javascript">
    $('#edit1').click(function(e) {
        e.preventDefault();
        if ($('#field1').prop('disabled') == false) {
            $('#field1').prop('disabled', true);
            $('#submit1').prop('disabled', true);
        } else {
            $('#field1').prop('disabled', false);
            $('#submit1').prop('disabled', false);
        }
    });
    $('#submit1').click(function(e) {
        <?php include("edit1.php"); ?>
    });
    $('#edit2').click(function(e) {
        e.preventDefault();
        if ($('#field2').prop('disabled') == false) {
            $('#field2').prop('disabled', true);
            $('#submit2').prop('disabled', true);
        } else {
            $('#field2').prop('disabled', false);
            $('#submit2').prop('disabled', false);
        }
    });
    $('#submit2').click(function(e) {
        <?php include("edit2.php"); ?>
    });
    $('#edit3').click(function(e) {
        e.preventDefault();
        if ($('#field3').prop('disabled') == false) {
            $('#field3').prop('disabled', true);
            $('#submit3').prop('disabled', true);
        } else {
            $('#field3').prop('disabled', false);
            $('#submit3').prop('disabled', false);
            <?php include("edit3.php") ?>
        }
    });
</script>
<?php include("../structure/footer.php"); ?>