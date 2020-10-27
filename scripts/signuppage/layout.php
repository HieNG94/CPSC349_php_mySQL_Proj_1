<?php
include("../structure/header.php");
include("signup.php");
?>
<!-- main content -->
<div class="container">
    <h1 style="text-align:center; font-size: 30px; padding: 10px;">
        <u>Create a New Account</u>
    </h1>
    <p style="text-align: center;">
        Welcome to ALN pet care center. Let's set up your account. Already have one?
        <a class="link" href="../loginpage/layout.php">Log in</a>
    </p>
    <form style="padding-bottom: 60px;" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <!-- Name -->
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="fName">&emsp;<b>First Name</b></label>
                    <input type="text" class="form-control" name="fName" value="<?php echo $fName; ?>" required="required">
                    <span class="error" style="color: red;">&emsp;<?php echo $fNameErr ?></span>
                </div>
                <div class="col">
                    <label for="lName">&emsp;<b>Last Name</b></label>
                    <input type="text" class="form-control" name="lName" value="<?php echo $lName; ?>" required="required">
                    <span class="error" style="color: red;">&emsp;<?php echo $lNameErr ?></span>
                </div>
            </div>
        </div>
        <!-- Username -->
        <div class="form-group">
            <label for="uName">&emsp;<b>Username</b></label>
            <input type="text" class="form-control" name="uName" aria-describedby="uNameHelp" value="<?php echo $uName; ?>" required="required">
            <small id="uNameHelp" class="form-text text-muted">
                &emsp;Enter 4-16 characters. No special character allows.
            </small>
            <span class="error" style="color: red;">&emsp;<?php echo $uNameErr ?></span>

        </div>
        <!-- Email -->
        <div class="form-group">
            <label for="email">&emsp;<b>Email</b></label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="<?php echo $email; ?>" required="required">
            <small id="emailHelp" class="form-text text-muted">&emsp;name@email.com</small>
            <span class="error" style="color: red;">&emsp;<?php echo $emailErr ?></span>
        </div>
        <!-- Password -->
        <div class="form-group">
            <label for="password">&emsp;<b>Password</b></label>
            <input type="password" class="form-control" name="password" aria-describedby="pwHelp" required="required">
            <small id="pwHelp" class="form-text text-muted">
                &emsp;Password must contain 4-16 characters and have at least 1 number and
                1 capital character.
            </small>
            <span class="error" style="color: red;">&emsp;<?php echo $pwErr ?></span>
        </div>
        <div class="form-group">
            <label for="rePw">&emsp;<b>Confirm Password</b></label>
            <input type="password" class="form-control" name="rePw" required="required">
            <span class="error" style="color: red;">&emsp;<?php echo $rePwErr ?></span>
        </div>
        <!-- Address -->
        <div class="form-group">
            <label for="street">&emsp;<b>Street</b></label>
            <input type="text" class="form-control" name="street" value="<?php echo $street; ?>" aria-describedby="streetHelp" required="required">
            <small id="streetHelp" class="form-text text-muted">&emsp;12345 street st</small>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="city">&emsp;<b>City</b></label>
                    <input type="text" class="form-control" name="city" value="<?php echo $city; ?>" required="required">
                </div>
                <div class="col">
                    <label for="st">&emsp;<b>State</b></label>
                    <select class="form-control" id="st" name="st" required="required">
                        <option hidden value="">Select...</option>
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
                    <input type="number" class="form-control" name="zipcode" value="<?php echo $zip; ?>" required="required">
                    <span class="error" style="color: red;">&emsp;<?php echo $zipErr ?></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="phone">&emsp;<b>Phone</b></label>
            <input type="number" class="form-control" name="phone" value="<?php echo $phone; ?>" required="required">
            <span class="error" style="color: red;">&emsp;<?php echo $phoneErr ?></span>
        </div>
        <div class="form-group">
            <label for="pos">&emsp;<b>Sign up as</b></label>
            <select class="form-control" id="pos" name="pos" required="required">
                <option hidden value="">Select...</option>
                <option value="customer">Customer</option>
                <option value="staff">Staff</option>
            </select>
        </div>
        <div id="req" style="visibility: hidden;">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="inviCode">&emsp;<b>Invitation code</b></label>
                        <input type="number" class="form-control" id="inviCode" name="inviCode" aria-describedby="ivHelp" value="<?php echo $inviCode; ?>" required="required">
                        <small id="ivHelp" class="form-text text-muted">
                            &emsp;Enter 10-digits code.
                        </small>
                    </div>
                    <div class="col">
                        <label for="spec">&emsp;<b>Speciality</b></label>
                        <select class="form-control" id="spec" name="spec" required="required">
                            <option hidden value="">Select...</option>
                            <option value="animal caretaker">Animal Caretaker</option>
                            <option value="nutrition">Nutrition</option>
                            <option value="surgery">Surgery</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="ssn">&emsp;<b>SSN</b></label>
                        <input type="number" class="form-control" id="ssn" name="ssn" required="required">
                        <span class="error" style="color: red;">&emsp;<?php echo $ssnErr ?></span>
                    </div>
                </div>
            </div>
            <script>
                $(function() {
                    $('select').on('change', function(e) {
                        if (document.getElementById('pos').value == 'staff') {
                            document.getElementById('req').style.visibility = 'visible';
                            document.getElementById('inviCode').setAttribute('required', 'required');
                            document.getElementById('spec').setAttribute('required', 'required');
                            document.getElementById('ssn').setAttribute('required', 'required');
                        } else {
                            document.getElementById('req').style.visibility = 'hidden';
                            document.getElementById('inviCode').removeAttribute('required');
                            document.getElementById('spec').removeAttribute('required');
                            document.getElementById('ssn').removeAttribute('required');
                        }
                    });
                });
            </script>
        </div>
        <span class="error" style="color: red;">&emsp;<?php echo $inviCodeErr ?></span>
        <center><button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button></center>
    </form>
</div>
<?php include("../structure/footer.php"); ?>