<?php
session_start();
?>
<meta charset="UTF-8">

<script src="./jquery-3.7.1.js" sourcemappingurl="./jquery-3.7.1.min.map"></script>

<script>
	console.log("contacts");
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
</style>


<div id="contact">
	<table><tr><td>
		<div id="img">
			<button style="margin-top: 15px;" id="add_contact">Add +</button>
		</div>
	</td><td>
		<div id="name"><input type="text" placholder="name" name="name" id="c_name"/></div>
		<div id="nr" style="margin-top: 5px;"><input type="text" placholder="nr" name="nr" id="c_nr"/></div>
	</td></tr></table>
</div>

<div id="container">	
	<?php
	
    if (isset($_SESSION['contact_daten']) && is_array($_SESSION['contact_daten'])) {
    foreach ($_SESSION['contact_daten'] as $nachricht) {
        $c_name = isset($nachricht['name']) ? htmlspecialchars($nachricht['name']) : 'unknown';
        $c_nr = isset($nachricht['nr']) ? htmlspecialchars($nachricht['nr']) : '';
        echo "
		
		<div id='contact'>
			<table><tr><td>
				<div id='img'>
					<!-- <img src='./user.png' style='width: 50px; height: 50px;'/> -->
					😀
				</div>
			</td><td>
				<div id='name'>".$c_name."</div>
				<div id='nr' class='call_nr'>".$c_nr."</div>
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
			😀
		</div>
	</td><td>
		<div id="name">Your first Contact Name</div>
		<div id="nr" class="call_nr">0049...Nr...</div>
	</td></tr></table>
</div>

<div id="contact">
	<table><tr><td>
		<div id="img">
			<!-- <img src="./user.png" style="width: 50px; height: 50px;"/> -->
			😀
		</div>
	</td><td>
		<div id="name">Your second Contact Name</div>
		<div id="nr" class="call_nr">0049...Nr...</div>
	</td></tr></table>
</div>

</div>


<script>

$(document).ready(function() {
	$("#add_contact").on("click", function() {

		$("#container").prepend("<div id='contact'><table><tr><td><div id='img'><!-- <img src='./user.png' style='width: 50px; height: 50px;'/> -->😀</div></td><td><div id='name'>"+$("#c_name").val()+"</div><div id='nr'>"+$("#c_nr").val()+"</div></td></tr></table></div>");
		
		$.post("./contact_session.php", { name: $("#c_name").val(), nr: $("#c_nr").val() }, function(response) {}, "json");

		$("#text_input").val("");
	});
	
	$(".call_nr").on("click", function() {
		console.log("call:"+$(this).html());
		$.post("./call_session.php", { nr: $(this).html() }, function(response) {window.location.href="../phone.php";});
	});
});

</script>
