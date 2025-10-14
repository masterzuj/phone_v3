<?php
session_start();
?>
<meta charset="UTF-8">

<style>

body{font-family: Courier New; }

	a{
		color: black;
	}
	
	#werbung_container{
		position: fixed;
		top: 450px;
		height: 350px;
		width: 450px;
		overflow-y: auto;  
		overflow-x: hidden;  
	}
</style>
<div id="werbung_container">
	<a href="./index.php">
	|_your advertisement could be here!_|<br/>
	|___________________________________|<br/>
	|___________advertisement___________|<br/><br/>

		<?php

		if (isset($_SESSION['werbung_daten']) && is_array($_SESSION['werbung_daten'])) {
		foreach ($_SESSION['werbung_daten'] as $nachricht) {
			$type = isset($nachricht['type']) ? htmlspecialchars($nachricht['type']) : 'unknown';
			$werbung = isset($nachricht['werbung']) ? htmlspecialchars($nachricht['werbung']) : '';
			echo "<div id='" . $type . "'>" . $werbung . "</div>\n";
		}
		} else {
		   // echo "<p>Keine Nachrichten vorhanden.</p>\n";
		}
		?>

	<br/>|_contact zujkov.com________________|<br/>

	</a>
</div>


<iframe src="./drop_v3.php" style="position: fixed; top: 0px; width: 450px; height: 450px;"></iframe>