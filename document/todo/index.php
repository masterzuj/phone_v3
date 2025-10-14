<?php
session_start();
?>
<meta charset="UTF-8">

<script src="./jquery-3.7.1.js" sourcemappingurl="./jquery-3.7.1.min.map"></script>

<script>
	console.log("TODO");
</script>
<style>
body{
		font-family: Courier New;
		
	}
#container{
		overflow-y: auto;  
		overflow-x: hidden;  
		height: 750px;
}

#contact{
	width: 400px;
	height: 60px;
	background-color: lightgray;
	margin-top: 10px;
}

#img{
	width: 50px;
	height: 50px;
	background-color: lightblue;
	font-size: 35px;
}
	#aufgabe_check{
		transform: scale(3); 
		margin: 17px;
	}
</style>


<div id="contact">
	<table><tr><td>
		<div id="img">
			<button style="margin-top: 15px;" id="add_contact">Add +</button>
		</div>
	</td><td>
		<div id="name"><input type="text" placholder="name" name="name" id="c_name" style="font-size: 25px;"/></div>
	</td></tr></table>
</div>

<div id="container">	
	<?php
	
    if (isset($_SESSION['todo_daten']) && is_array($_SESSION['todo_daten'])) {
    foreach ($_SESSION['todo_daten'] as $nachricht) {
        $c_name = isset($nachricht['name']) ? htmlspecialchars($nachricht['name']) : 'unknown';
        echo "
		
		<div id='contact'>
			<table><tr><td>
				<div id='img'>
					<!-- <img src='./user.png' style='width: 50px; height: 50px;'/> -->
					<input type='checkbox' id='aufgabe_check'/>
				</div>
			</td><td>
				<div id='name'>".$c_name."</div>
			</td></tr></table>
		</div>
		";
    }
} else {
   // echo "<p>Keine Nachrichten vorhanden.</p>\n";
}
?>
	
	
<div id="contact">
	<table><tr><td>
		<div id="img">
			<!-- <img src="./user.png" style="width: 50px; height: 50px;"/> -->
			<input type="checkbox" id="aufgabe_check"/>
		</div>
	</td><td>
		<div id="name">Ihre zweite Aufgabe</div>
	</td></tr></table>
</div>

<div id="contact">
	<table><tr><td>
		<div id="img">
			<!-- <img src="./user.png" style="width: 50px; height: 50px;"/> -->
			<input type="checkbox" id="aufgabe_check"/>
		</div>
	</td><td>
		<div id="name">Ihre erste Aufgabe</div>
	</td></tr></table>
</div>

</div>


<script>

$(document).ready(function() {
	$("#add_contact").on("click", function() {

		$("#container").prepend("<div id='contact'><table><tr><td><div id='img'><!-- <img src='./user.png' style='width: 50px; height: 50px;'/> --><input type='checkbox' id='aufgabe_check'/></div></td><td><div id='name'>"+$("#c_name").val()+"</div></td></tr></table></div>");
		
		$.post("./todo_session.php", { name: $("#c_name").val() }, function(response) {}, "json");

		$("#text_input").val("");
	});
	
});

</script>
