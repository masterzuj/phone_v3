<?php
session_start();

$call_nr = trim(htmlspecialchars($_POST["nr"]));
$_SESSION['call_daten']= $call_nr; 

return true;
?>