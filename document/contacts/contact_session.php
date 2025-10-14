<?php
session_start();

/*
if (!isset($_SESSION['meine_messages'])) {
    $_SESSION['meine_messages'] = []; // Initialisiere das Array, falls es noch nicht existiert
}

$neues_element = trim(htmlspecialchars($_POST["message"]));
$_SESSION['meine_messages'][] = $neues_element; //zusätzlich hinzufügen
*/

$type = trim(htmlspecialchars($_POST["name"]));
$message = trim(htmlspecialchars($_POST["nr"]));

$neues_array = ["name" => $type, "nr" => $message]; //type "in" or "out"

if (!isset($_SESSION['contact_daten'])) {
    $_SESSION['contact_daten'] = [];
}

//$_SESSION['message_daten'][] = $neues_array; // zusätzlich hinzufügen

array_unshift($_SESSION['contact_daten'], $neues_array); // zusätzlich hinzufügen, am anfang

?>