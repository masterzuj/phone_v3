<?php
session_start();
?>
<meta charset="UTF-8">

<script src="./jquery-3.7.1.js" sourcemappingurl="./jquery-3.7.1.min.map"></script>

<script>
	console.log("werbung");
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
  left: 15px;
  top: 450px;
  width: 450px;
  height: 150px;
  
 }
#input_div{

	position: fixed;
	width: 450px;
	height: 40px;
	top: 390px;
}
#input_reset{
	height: 40px;
	font-size: 30px;
	background-color: red;
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
	
}
#werbung_container{
	position: fixed;
	height: 340px;
	width: 420px;
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

	#x_button{
	
		position: fixed;
		top: 0px;
		left: 420px;
	
	}	
	#ok_button{
	
		position: fixed;
		top: 350px;
		left: 170px;
	
	}	
</style>

<div id="x_button"><a href="./werbung_unset.php"><input type="button" value="X" style="background-color: red; font-size: 30px;"/></a></div>
<div id="ok_button"><a href="./werbung_v2.php"><input type="button" value="» OK «" style="background-color: lightgreen; font-size: 30px;"/></a></div>

<div id="werbung_container">

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
	
	
<div id="out">your advertisement</div>
<div id="in">your advertisement could be here!</div>

</div>

<div id="input_div"><input type="reset" value="✘" id="input_reset"> <textarea id="text_input" placeholder="your advertisement"></textarea> <input type="submit" value="✓" id="input_submit"></div>
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
	
	<div id="taste" class="push_taste">€</div>
	
	<br clear="both"/>
	
	<div id="taste" class="push_taste" style="width: 417px;"> </div>
	
</div>

<script>
$(document).ready(function() {
console.log("ready");

	$("#tasten_div").hide();
	
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
	$("#werbung_container").prepend("<div id='out'>"+$("#text_input").val()+"</div>").text();
	
	
	$.post("./werbung_session.php", { type: "out", werbung: $("#text_input").val() }, function(response) {}, "json");
	
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

//type werbung

*/



</script>
