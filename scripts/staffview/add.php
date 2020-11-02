<?php
include("../structure/header.php");
$pID = $date = $time = $staff = $note = "";
$vIDErr = "";
$personID = "";
$flag = false;

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<div class="container">
    <h1 style="text-align: center; font-size: 30px; padding: 10px">
        <u>Make Appointment:</u>
    </h1>
    <hr class="seperator">
    <form style="padding-bottom: 20px;" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="cusID"><b><u>Customer ID</u></b></label>
            <select class="form-control" name="cusID" id="cusID" style="background-color: rgb(246,244,231); padding: 5px;" required>
                <option value="" hidden>Select...</option>
            </select>
            <div class="row">
                <div class="col-8">
                    <small class="form-text text-muted">Select customer and check to make appointment</small>
                </div>
                <div class="col-4" style="text-align: right;">
                    <button type="submit" class="btn btn-outline-success" name="check" id="check" disabled>Check</button>
                </div>
            </div>
        </div>
        <fieldset id="field" disabled>
            <div class="form-group">
                <label for="petID"><b><u>Pet's ID':</u></b></label>
                <select class="form-control" name="petID" id="petID" style="background-color: rgb(246,244,231); padding: 5px;" required>
                    <option value="" hidden>Select...</option>
                </select>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="date"><b><u>Date:</u></b>&emsp;</label>
                        <input type="date" class="form-control" name="date" placeholder="yyyy/mm/dd" min="2020-01-01" max="2030-12-31" style="background-color: rgb(246,244,231);" required>
                    </div>
                    <div class="col">
                        <label for="time"><b><u>Time:</u></b></label>
                        <input type="time" class="form-control" name="time" min="8:00" max="16:00" aria-describedby="officeHour" style="background-color: rgb(246,244,231);" required />
                        <small id="officeHour" class="form-text text-muted">Office hours: 8:00 - 16:00</small>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="staff"><b><u>Staff:</u></b></label>
                <select class="form-control" name="staff" id="staff" style="background-color: rgb(246,244,231); padding: 5px;" required>
                    <option value="" hidden>Select...</option>

                </select>
            </div>
            <div class="form-group">
                <label for=" note"><b><u>Note:</u></b></label>
                <br>
                <textarea class="form-control" name="note" value="<?php echo $note ?>" rows="5" style="resize: none; background-color: rgb(246,244,231);"></textarea>
            </div>
        </fieldset>
        <center>
            <button type="submit" class="btn btn-success" id="add" name="add" style="width: 20%;">Add</button>
            <button type="button" class="btn btn-light" id="back" style="width: 20%;" onclick="window.location.href='appointment.php';">Back</button>
        </center>
        <br>
        <span class="error" style="color: red;"><?php echo "$vIDErr"; ?></span>
        <br>
    </form>
</div>
<script>
    $('#cusID').change(function() {
        $('#check').prop("disabled", false);
    });
    $('#check').click(function(e) {
        e.preventDefault();
        console.log("s")
        $('#field').prop("disabled", false);
        $('#check').prop("disabled", true);
    });
    var selectCus = function(cusID, cusName) {
        let myPanel = $(`<option value="` + cusID + `">` + cusName + ` (` + cusID + `)</option>`);
        myPanel.appendTo('#cusID');
    };

    var selectPet = function(petID, petName) {
        let myPanel = $(`<option value="` + petID + `">` + petName + ` (` + petID + `)</option>`);
        myPanel.appendTo('#petID');
    };

    var selectStaff = function(staffID, staff) {
        let myPanel = $(`<option value="` + staffID + `">` + staff + ` (` + staffID + `)</option>`);
        myPanel.appendTo('#staff');
    };
</script>
<?php
$sql = "SELECT person.personID, person.lastName, person.firstName
    FROM person, accounts
    WHERE person.personID = accounts.personID
    AND accounts.pos = 'customer';";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $cusName = $row['firstName'] . ", " . $row['lastName'];
    $cusID = $row['personID'];
    echo "<script> selectCus('$cusID', '$cusName'); </script>";
}
mysqli_free_result($result);

$sql = "SELECT person.personID, person.lastName, person.firstName
        FROM person, accounts
        WHERE person.personID = accounts.personID
        AND accounts.pos = 'staff';";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $staffName = $row['firstName'] . ", " . $row['lastName'];
    $staffID = $row['personID'];
    echo "<script> selectStaff('$staffID', '$staffName'); </script>";
}

if ($_SERVER["REQUEST_METHOD"] = "POST") {
    if (isset($_POST['check'])) {
        $personID = test_input($_POST['cusID']);
        $sql = "SELECT petID, petName FROM pet
        WHERE personID = '$personID';";
        echo "<script>console.log('$personID')</script>";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $petID = $row['petID'];
            $petName = $row['petName'];
            echo "<script> selectPet('$petID', '$petName'); </script>";
        }
    }
    if (isset($_POST['petID']))
        $pID = test_input($_POST['petID']);
    if (isset($_POST['date']))
        $date = test_input($_POST['date']);
    if (isset($_POST['time']))
        $time = test_input($_POST['time']);
    if (isset($_POST['staff']))
        $staff = test_input($_POST['staff']);
    if (isset($_POST['note']))
        $note = test_input($_POST['note']);
    if (isset($_POST['petID']) && isset($_POST['date']) && isset($_POST['time'])) {
        $vID = $petID . substr(str_replace("-", "", $date), 2, 6) . substr(str_replace(":", "", $time), 0, 2);
        $sql = "SELECT * FROM visit WHERE visitID = '$vID'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) != 0)
            $vIDErr = "Your pet already had appointment at the time.";
        else
            $flag  = true;
    }
    if (isset($_POST['add'])) {
        if ($flag == true) {
            $sql = "INSERT INTO visit VALUE('$vID', '$petID', '$date', '$time', '$staff', '$note');";
            mysqli_query($conn, $sql);
            include("message.php");
        }
    }
    mysqli_free_result($result);
}
?>
<?php include("../structure/footer.php"); ?>