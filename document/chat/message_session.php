<?php
session_start();

/*
if (!isset($_SESSION['meine_messages'])) {
    $_SESSION['meine_messages'] = []; // Initialisiere das Array, falls es noch nicht existiert
}

$neues_element = trim(htmlspecialchars($_POST["message"]));
$_SESSION['meine_messages'][] = $neues_element; //zusätzlich hinzufügen
*/

$type = trim(htmlspecialchars($_POST["type"]));
$message = trim(htmlspecialchars($_POST["message"]));

$neues_array = ["type" => $type, "message" => $message]; //type "in" or "out"

if (!isset($_SESSION['message_daten'])) {
    $_SESSION['message_daten'] = [];
}

//$_SESSION['message_daten'][] = $neues_array; // zusätzlich hinzufügen

array_unshift($_SESSION['message_daten'], $neues_array); // zusätzlich hinzufügen, am anfang

?>