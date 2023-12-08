<?php
require_once('../model/loans.php');
$loans = new Loan();
$valid = false;

$id = $noAccount = $startDate = $endDate = $men = $women =  "";

/* ---------------------------------------- */
function validateTime($time, $format = 'H:i:s')
{
    $t = DateTime::createFromFormat($format, $time);
    return $t && $t->format($format) == $time;
}

/* Editar */
if (count($_POST) == 1 && isset($_POST["id"]) && is_numeric($_POST["id"])) {
    $dao = new DAOLoans();
    $audiovisual = $dao->getOne($_POST["id"]);
    $userKey = $_POST['id'];

    /* Agregar */
} elseif (count($_POST) > 1) {
    $noAccount = $startDate = $endDate = $men = $women = "is-invalid";
    $valid = true;
    $userKey = $_POST["id"];

    /* Validaciones */
    if (
        isset($_POST["noAccount"]) &&
        (strlen(trim($_POST["noAccount"])) > 0 && strlen(trim($_POST["noAccount"])) < 10) &&
        preg_match("/^s\d{8}$/", $_POST["noAccount"])
    ) {
        $noAccount = "is-valid";
    } else {
        $valid = false;
    }
    if (
        isset($_POST["men"]) &&
        (strlen(trim($_POST["men"])) > 0 && strlen(trim($_POST["men"])) <= 3) &&
        preg_match("/^\d+$/", $_POST["men"])
    ) {
        $men = "is-valid";
    } else {
        $valid = false;
    }
    if (
        isset($_POST["women"]) &&
        (strlen(trim($_POST["women"])) > 0 && strlen(trim($_POST["women"])) <= 3) &&
        preg_match("/^\d+$/", $_POST["women"])
    ) {
        $women = "is-valid";
    } else {
        $valid = false;
    }




    if ($userKey != 0)
        $audiovisual = $userKey;

    $loans->noAccount = isset($_POST["noAccount"]) ? trim($_POST["noAccount"]) : " ";
    $loans->entryTime = isset($_POST["startDate"]) ? trim($_POST["startDate"]) : " ";
    $loans->departureTime = isset($_POST["endDate"]) ? trim($_POST["endDate"]) : " ";
    $loans->men = isset($_POST["men"]) ? trim($_POST["men"]) : " ";
    $loans->women = isset($_POST["women"]) ? trim($_POST["women"]) : " ";
}

var_dump($loans);

if ($valid) {
    $dao = new DAOLoans();
    if ($userKey != 0) {

        if ($dao->edit($loans)) {
            header("Location: tabAudioviaulRoom.php");
        } else {
            echo "Error";
        }
    } else {
        if ($dao->add($loans) == 0) {
            echo "Error al guardar";
        } else {
            header("Location: tabAudioviaulRoom.php");
        }
    }
}
