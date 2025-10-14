<?php
session_start();

unset($_SESSION['werbung_daten']);

header("Location: ./werbung_v2.php");
exit();
?>