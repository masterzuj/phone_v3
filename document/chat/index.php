<?php
session_start();
?>
<meta charset="UTF-8">

<script src="./jquery-3.7.1.js" sourcemappingurl="./jquery-3.7.1.min.map"></script>

<script>
	console.log("chat");
</script>

<style>

body{
		font-family: Courier New;
	}
	
#taste{
	width: 36px;
	height: 36px;
	float: left;
	border: 1px solid lightblue;
	border-radius: 3px;
	font-size: 30px;
	color: gray;
	text-align: center;
	background-color: white;
}
#tasten_div{

  position: fixed;
  left: 50%;
  bottom: 0px;
  transform: translate(-50%, -50%);
  width: 450px;
  height: 150px;
  
 }
#input_div{

	position: fixed;
	width: 450px;
	height: 40px;
	bottom: 250px;
}
#input_reset{
	height: 40px;
	font-size: 30px;
	background-color: red;
	border-radius: 20px;
}
#text_input{
	height: 50px;
	font-size: 18px;
	width: 330px;
}
#input_submit{
	height: 40px;
	font-size: 30px;
	background-color: lightgreen;
	border-radius: 20px;
}
#message_container{
	position: fixed;
	height: 600px;
	width: 450px;
	overflow-y: auto;  
	overflow-x: hidden;  
}

#in{
	width: 300px;
	background-color: lightgray;
	margin-top: 5px;
	border-radius: 5px;
	font-size: 12px;
}

#out{
	width: 300px;
	background-color: lightblue;
	margin-top: 5px;
	border-radius: 5px;
	font-size: 12px;
	margin-left: 100px;
}

</style>
<div id="message_container">

<?php
	
    if (isset($_SESSION['message_daten']) && is_array($_SESSION['message_daten'])) {
    foreach ($_SESSION['message_daten'] as $nachricht) {
        $type = isset($nachricht['type']) ? htmlspecialchars($nachricht['type']) : 'unknown';
        $message = isset($nachricht['message']) ? htmlspecialchars($nachricht['message']) : '';
        echo "<div id='" . $type . "'>" . $message . "</div>\n";
    }
} else {
   // echo "<p>Keine Nachrichten vorhanden.</p>\n";
}
?>
	
	
<div id="out">Your answer</div>
<div id="in">Your first incoming message</div>

</div>

<div id="input_div"><input type="reset" value="✘" id="input_reset"> <textarea id="text_input"></textarea> <input type="submit" value="✓" id="input_submit"></div>
<div id="tasten_div">
	<div id="taste" class="push_taste">1</div>
	<div id="taste" class="push_taste">2</div>
	<div id="taste" class="push_taste">3</div>
	<div id="taste" class="push_taste">4</div>
	<div id="taste" class="push_taste">5</div>
	<div id="taste" class="push_taste">6</div>
	<div id="taste" class="push_taste">7</div>
	<div id="taste" class="push_taste">8</div>
	<div id="taste" class="push_taste">9</div>
	<div id="taste" class="push_taste">0</div>
	<div id="taste" class="push_taste">ß</div>
	
	<br clear="both"/>
	
	<div id="taste" class="push_taste">q</div>
	<div id="taste" class="push_taste">w</div>
	<div id="taste" class="push_taste">e</div>
	<div id="taste" class="push_taste">r</div>
	<div id="taste" class="push_taste">t</div>
	<div id="taste" class="push_taste">z</div>
	<div id="taste" class="push_taste">u</div>
	<div id="taste" class="push_taste">i</div>
	<div id="taste" class="push_taste">o</div>
	<div id="taste" class="push_taste">p</div>
	<div id="taste" class="push_taste">ü</div>
	
	<br clear="both"/>
	
	<div id="taste" class="push_taste">a</div>
	<div id="taste" class="push_taste">s</div>
	<div id="taste" class="push_taste">d</div>
	<div id="taste" class="push_taste">f</div>
	<div id="taste" class="push_taste">g</div>
	<div id="taste" class="push_taste">h</div>
	<div id="taste" class="push_taste">j</div>
	<div id="taste" class="push_taste">k</div>
	<div id="taste" class="push_taste">l</div>
	<div id="taste" class="push_taste">ö</div>
	<div id="taste" class="push_taste">ä</div>
	
	<br clear="both"/>
	
	<div id="taste" class="push_taste">y</div>
	<div id="taste" class="push_taste">x</div>
	<div id="taste" class="push_taste">c</div>
	<div id="taste" class="push_taste">v</div>
	<div id="taste" class="push_taste">b</div>
	<div id="taste" class="push_taste">n</div>
	<div id="taste" class="push_taste">m</div>
	
	<div id="taste" class="push_taste">!</div>
	<div id="taste" class="push_taste">?</div>
	<div id="taste" class="push_taste">.</div>
	
	<br clear="both"/>
	
	<div id="taste" class="push_taste" style="width: 440px;"> </div>
	
</div>

<script>
$(document).ready(function() {
console.log("ready");

$(window).click(function() {
  console.log("window clicked");
  $("#tasten_div").hide("fast");
  $("#input_div").css("bottom", "50px");
});

$("#text_input").on("click", function(event) {
	console.log("text clicked");
	$("#tasten_div").show("fast");
	$("#input_div").css("bottom", "250px");
	event.stopPropagation();
});

$input_val = "";

$(".push_taste").on("click", function() {
	console.log("taste pushed");
	$input_val = $("#text_input").val();
	$("#text_input").val($input_val + $(this).html());
	//$("#tasten_div").show("fast");
	event.stopPropagation();
});


$("#input_submit").on("click", function() {
	console.log($("#text_input").val());
	$("#message_container").prepend("<div id='out'>"+$("#text_input").val()+"</div>");
	
	
	$.post("./message_session.php", { type: "out", message: $("#text_input").val() }, function(response) {}, "json");
	
	$("#text_input").val("");
});

$("#input_reset").on("click", function() {
	$("#text_input").val("");
});
	});
/*
$("#text_input").on("input", function() {
	console.log("typed");
});

//type message

*/



</script>
