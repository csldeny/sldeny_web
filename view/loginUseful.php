<?php
require_once('../controller/DAOUser.php');
require_once('../model/user.php');

$user = new User();
$valPassword = $valEmail  = "";

if (count($_POST) > 1) {
    $valPassword = $valEmail  = "";
    $valid = true;

    if (isset($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $valEmail = "is-valid";
    } else {
        $valid = false;
    }

    if (isset($_POST["passworduser"])) {
        $valPassword = "is-valid";
    } else {
        $valid = false;
    }
}
