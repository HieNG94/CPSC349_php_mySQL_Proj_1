<?php
include("../structure/header.php");
$name = $type = $pID = $birthday = $breed = $gender = $chip = $note = "";
$chipErr = "";
$flag = false;
$personID = $_SESSION['personID'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']))
        $name = test_input($_POST['name']);
    if (isset($_POST['type']))
        $type = test_input($_POST['type']);
    if (isset($_POST['birthday']))
        $birthday = test_input($_POST['birthday']);
    if (isset($_POST['breed']))
        $breed = test_input($_POST['breed']);
    if (isset($_POST['gender']))
        $gender = test_input($_POST['gender']);
    if (isset($_POST['chip'])) {
        $chip = test_input($_POST['chip']);
        $sql = "SELECT * FROM pet 
                WHERE microchip = '$chip'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) != 0)
            $chipErr = "Your pet already registered.";
        else
            $flag = true;
        mysqli_free_result($result);
    }
    if (isset($_POST['note'])) {
        $note = test_input($_POST['note']);
    }

    if (isset($_POST['add'])) {
        if ($flag == true) {
            $sql = "SELECT * FROM pet;";
            $result = mysqli_query($conn, $sql);
            $pID = 'P' . (mysqli_num_rows($result) + 1);
            $sql = "INSERT INTO pet VALUES ('$pID', '$name', '$type', 
            '$birthday', '$gender', '$breed', '$chip', '$personID', '$note');";
            mysqli_query($conn, $sql);
            mysqli_free_result($result);
            include("addmess.php");
            $name = $type = $pID = $birthday = $breed = $gender = $chip = $note = "";
            $chipErr = "";
            $flag = false;
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
?>

<div class="container">
    <h1 style="text-align: center; font-size: 30px; padding: 10px">
        <u>Add new pet:</u>
    </h1>
    <hr class="seperator">
    <form style="padding-bottom: 20px;" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="name"><b><u>Pet name:</u></b></label>
                    <input type="text" class="form-control" name="name" value="<?php echo $name ?>" style="background-color: rgb(246,244,231);" required />
                    <br>
                </div>
                <div class="col">
                    <label for="type"><b><u>Pet type:</u></b></label>
                    <input type="text" class="form-control" name="type" value="<?php echo $type ?>" aria-describedby="typeHelp" style="background-color: rgb(246,244,231);" required />
                    <small id="typeHelp" class="form-text text-muted">Ex: dog, cat, rabbit,...</small>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="birthday"><b><u>Birthday:</u></b>&emsp;</label>
                        <input type="date" class="form-control" name="birthday" placeholder="yyyy/mm/dd" min="2020-01-01" max="2030-12-31" style="background-color: rgb(246,244,231);" required>
                    </div>
                    <div class="col">
                        <label for="breed"><b><u>Breed:</u></b></label>
                        <input type="text" class="form-control" name="breed" value="<?php echo $breed ?>" aria-describedby="breedHelp" value="" style="background-color: rgb(246,244,231);" required />
                        <small id="breedHelp" class="form-text text-muted">Ex: dog breeds: Bulldog, Poodle,...</small>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="gender"><b><u>Gender:</u></b></label>
                        <select class="form-control" name="gender" style="background-color: rgb(246,244,231);" required>
                            <option hidden>Select...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="chip"><b><u>Microchip:</u></b></label>
                        <input type="number" class="form-control" name="chip" value="<?php echo $chip ?>" style="background-color: rgb(246,244,231);" required />
                        <span class="error" style="color: red;"><?php echo $chipErr ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for=" note"><b><u>Note:</u></b></label>
            <br>
            <textarea class="form-control" name="note" value="<?php echo $note ?>" rows="5" style="resize: none; background-color: rgb(246,244,231);"></textarea>
        </div>
        <center>
            <button type="submit" class="btn btn-success" id="add" name="add" style="width: 20%;">Add</button>
            <button type="button" class="btn btn-light" id="back" style="width: 20%;" onclick="window.location.href='info.php';">Back</button>
        </center>
        <br>
    </form>
</div>

<?php include("../structure/footer.php"); ?>