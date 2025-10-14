<?php
session_start();



$type = strip_tags(trim(htmlspecialchars($_POST["type"])));
$werbung = strip_tags(trim(htmlspecialchars($_POST["werbung"])));

$neues_array = ["type" => $type, "werbung" => $werbung]; //type "in" or "out"

if (!isset($_SESSION['werbung_daten'])) {
    $_SESSION['werbung_daten'] = [];
}


array_unshift($_SESSION['werbung_daten'], $neues_array); // zusätzlich hinzufügen, am anfang

?>