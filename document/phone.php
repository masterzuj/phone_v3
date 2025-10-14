<?php 
session_start();
?>
	<script>
		console.log("phone");
	</script>
<meta name="format-detection" content="telephone=yes">

<style>

.phonebutton{

	background-color: lightblue;
	height: 80px;
	width: 80px;
	margin: 5px;
	border-radius: 20px;
	border: 5px solid lightgray;
	
	font-size: 50px;
}
.callbutton{

	background-color: lightblue;
	height: 80px;
	width: 80px;
	margin: 5px;
	border-radius: 20px;
	border: 5px solid lightgray;
	
	font-size: 50px;
}
#tel_num{
	width: 400px;
	height: 40px;
	font-size: 35px; 
	margin-left: 20px;
	margin: 0 auto;
	text-align: center;
	margin-top: 20px;
	margin-bottom: 20px;
	border: 5px solid lightgray;
	border-radius: 20px;
	color: gray;
}
</style>
<div id="tel_num"><?php echo $_SESSION['call_daten']; ?></div>
<center>
<button class="phonebutton">1</button>
<button class="phonebutton">2</button>
<button class="phonebutton">3</button>

<br/>

<button class="phonebutton">4</button>
<button class="phonebutton">5</button>
<button class="phonebutton">6</button>

<br/>

<button class="phonebutton">7</button>
<button class="phonebutton">8</button>
<button class="phonebutton">9</button>

<br/>

<button class="phonebutton">*</button>
<button class="phonebutton">0</button>
<script src="jquery-3.7.1.js" sourcemappingurl="jquery-3.7.1.min.map"></script>

<button class="phonebutton">#</button>

<br/><br/>
</center>
<center>
<button class="callbutton startcall" style="background-color: lightgreen;">✆</button>
<button class="callbutton stopcall" style="background-color: red; margin-left: 80px;">✆</button>
</center>

<script>
// A $( document ).ready() block.
$( document ).ready(function() {
    console.log( "ready!" );


	var telnum = "0049";
	$(".phonebutton").on('click',function(e) {
	
			telnum += $(this).html();
		
			console.log(telnum);
			
			
			
			$("#tel_num").html(telnum);
		
	});
	
	$(".startcall").on('click',function(e) {
	
	
			
			window.open("tel:" + $("#tel_num").html() );
			
			console.log("tel:" + $("#tel_num").html());
			
		
	});
	
	$(".stopcall").on('click',function(e) {
	
		$("#tel_num").html("");
		
		telnum = "0049";
			
	});
	
});

</script>