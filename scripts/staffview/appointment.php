<?php
include("../structure/header.php");
$petName = $vID =  $petID = $date = $time = $staff = $note = "";
$personID = $_SESSION['personID'];
$err = "";
$_SESSION['flag'] = false;
?>
<div class="container">
    <div class="row" style="padding-top: 20px;">
        <div class="col-8">
            <h2 style="color: grey">&emsp;<u>Appointment:</u></h2>
        </div>
        <div class="col-4" style="text-align:right; justify-content: space-around;">
            <button type="button" class="btn btn-info" onclick="window.location.href='add.php'">New</button>
        </div>
    </div>
    <hr class="seperator" style="border-top: 2px solid gray; border-radius: 1px;">
    <br>
    <div id="contentPanel">

    </div>
</div>
<script type="text/javascript">
    $value = "";
    var addCard = function(name, vID, pID, type, breed, date, time, staff, note) {
        var myPanel = $(`
            <div class="card" id="` + vID + `">
                <div class="card-header" style="background-color: rgb(229,174,106);">
                    <div class="row">
                        <div class="col-8">
                            <h3 style="font-family: 'Dancing Script';"><b>` + name + `</b></h3>
                        </div>
                        <div class="col-4" style="text-align: right;">
                            <button type="button" class="close" data-target="#` + vID + `" data-dismiss="modal">x</button>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="padding:10px; background-color: rgb(247,220,151);">
                    <form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <span><b><u>Visit ID:</u></b> #` + vID + `</span>
                                </div>
                                <div class="col">
                                    <span><b><u>Pet's ID:</u></b> ` + pID + `</span>
                                    <br>
                                    <span><b><u>Type: </u></b> ` + type + `</span>
                                    <br>
                                    <span><b><u>Breed: </u></b> ` + breed + `</span>
                                </div>
                                <div class="col">
                                    <span><b><u>Date:</u></b> ` + date + `</span>
                                    <br>
                                    <span><b><u>Time:</u></b> ` + time + `</span>
                                </div>
                                <div class="col">
                                    <span><b><u>Staff:</u></b> ` + staff + `</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group>
                            <label for="note"><b><u>Note:</u></b></label>
                            <br>
                            <textarea class="form-control" row="3" style="resize:none; background-color: rgb(246,244,231);" readonly>` + note + `</textarea>
                        </div>
                    </form>
                </div>
            </div><br>`);
        myPanel.appendTo('#contentPanel');

        $('.close').on('click', function(e) {
            e.stopPropagation();
            var $target = $(this).parents('.card');
            $('.modal').modal({
                backdrop: 'static',
                keyboard: false
            });
        });
    };
</script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['confirm'])) {
        $rID = $_POST['rID'];
        $sql = "SELECT * FROM visit WHERE visitID = '$rID';";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0)
            $err = "Appointmen not found.";
        else {
            $sql = "DELETE FROM visit WHERE visitID = '$rID';";
            mysqli_query($conn, $sql);
            $err = "";
        }
        mysqli_free_result($result);
    }
}
$sql = "SELECT * FROM visitView;";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $petName = strtoupper($row['petName']);
    $petID = $row['petID'];
    $vID = $row['visitID'];
    $date = $row['date'];
    $time = $row['time'];
    $staff = $row['staff'];
    $note = $row['note'];
    $type = $row['type'];
    $breed = $row['breed'];
    echo "<script> addCard('$petName','$vID', '$petID', '$type', '$breed', '$date', '$time', '$staff', '$note'); </script>";
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: rgb(244 212 143); justify-content:center;">
            <center>
                <div class="modal-header">
                    <span>
                        <svg width="20%" height="30%" viewBox="0 0 16 16" class="bi bi-exclamation-octagon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1L1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z" />
                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                        </svg>
                        <b>&emsp;WARNING!!!</b>
                    </span>
                </div>
                <div class="modal-body" style="padding: 20px;">
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" id="rID" name="rID" style="text-align: center;" placeholder="Re-enter the appointment's ID to remove from record">
                            <span class="error" style="color: red;"><?php echo $err ?></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger" name="confirm" id="confirm">Confirm</button>
                            <button type="button" class="btn btn-success" id="cancel">Cancel</button>
                        </div>
                    </form>
                </div>
            </center>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#confirm').prop('disabled', true);
        $('#rID').keyup(function() {
            $('#confirm').prop('disabled', this.value == "" ? true : false);
        })
    });

    $('#cancel').click(function(e) {
        e.stopPropagation();
        $('.modal').modal('hide');
    });
</script>
<?php include("../structure/footer.php"); ?>