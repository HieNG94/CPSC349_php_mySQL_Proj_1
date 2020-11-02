<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="img/png" href="../../style/img/pageicon.png" />
    <link rel="stylesheet" href="../../style/bootstrap.min.css">
    <link rel="stylesheet" href="../../style/style.css">
    <title>ALN pet center</title>
</head>

<body>
    <!-- scripts -->
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../bootstrap/bootstrap.min.js"></script>

    <div class="header">
        <!-- header -->
        <div class="title">ALN Pet Care Center</div>

        <!-- Navigation bar -->
        <?php
        include("../connectiondata.php");
        session_set_cookie_params(0);
        session_start();
        // check the state table for current user
        if (!isset($_SESSION['state'])) {
            $state = 'neutral';
        } else {
            $state = $_SESSION['state'];
        }
        // get the corresponding navigation bars for each user 
        if ($state == "customer")
            include("../../scripts/nav/customer.php");
        elseif ($state == "staff")
            include("../../scripts/nav/staff.php");
        else
            include("../../scripts/nav/neutral.php");
        ?>
    </div>