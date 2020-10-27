<?php
// connect to database
include("../connectiondata.php");
session_set_cookie_params(0);
session_start();

unset($_SESSION['state']);

// go back to homepage
header("location:../homepage/index.php");
