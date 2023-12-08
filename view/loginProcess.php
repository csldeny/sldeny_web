<?php
require_once('../controller/DAOUser.php');
$dao = new DAOUser();
$userNotFound = true;
$valPassword = $valEmail  = "";

if (count($_POST) > 1) {
    $valPassword = $valEmail  = "is-invalid";
    $valid = true;

    if (isset($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $valEmail = "is-valid";
    } else {
        $valid = false;
    }

    if (
        isset($_POST["passworduser"]) &&
        (strlen(trim($_POST["passworduser"])) >= 8 && strlen(trim($_POST["passworduser"])) < 30)
    ) {
        $valPassword = "is-valid";
    } else {
        $valid = false;
    }



    if ($valid) {
        $dao = new DAOUser();
        $user = $dao->autenticate($_POST["email"], $_POST["passworduser"]);

        if ($user) {

            session_start();
            $_SESSION["id"] = $user->id;
            $_SESSION["typeOfUser"] = $user->typeOfUser;
            $_SESSION["firstName"] = $user->firstName;
            if ($_SESSION["typeOfUser"] === 1) {
                header("Location: homeAdminService.php");
            }
            if ($_SESSION["typeOfUser"] === 2) {
                header("Location: homeAuxiliaryService.php");
            }
            if ($_SESSION["typeOfUser"] === 3) {
                header("Location: regAccessGeneralRoom.php");
            }
        } else {
            $valPassword = $valEmail  = "is-invalid";
            $userNotFound = false;
        }
    }
}
