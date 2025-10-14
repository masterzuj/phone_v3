<?php


session_start();

if(isset($_GET["allow_cookie"])){
	$_SESSION["allow_cookie"] = true;
}

?>
<meta charset="UTF-8">

<script src="./jquery-3.7.1.js" sourcemappingurl="./jquery-3.7.1.min.map"></script>
 
<script src="./jquery-ui-1.14.1/jquery-ui-1.14.1/jquery-ui.js"></script>
  
<link rel="stylesheet" href="./jquery-ui-1.14.1/jquery-ui-1.14.1/jquery-ui.css">


<style>

body{
	
	font-family: Courier New;
	
	}
	
a {
  text-decoration: none;
	color: black;	
}
	#backgroundholder{
		background-image: url('background/background_c.png');
		opacity: 0.5;
		position: fixed;
		top: 0px;
		left: 0px;
		width: 450px;
		height: 800px;
	}
#kachelholder{
	position: fixed;
	top: 0px;
	left: 0px;
	
	list-style-type: none; 
	margin: 0; 
	padding: 0; 
	width: 450px;
	height: 800px;
	
	
}

#kachel{
	margin: 6px; 
	float: left; 
	width: 100px; 
	height: 90px; 
	font-size: 4em; 
	text-align: center;
	background-color: lightblue;
	border-radius: 50px;
	opacity: 1;
}

#kachelbild{
	height: 80px;
	width: 80px;
}
#menu{
	position: absolute; 
	bottom: 0px;
	background-color: lightgray;
	height: 40px;
	width: 450px;
	border-radius: 10px;
}
#menubild{
	height: 40px;
	width: 40px;
}
	
	#cookie_allow{
		background-color: white;
		position: fixed;
		bottom: 0px;
		width: 450;
		text-align: center;
		margin-left: -7px;
		opacity: 0.9;
	}
</style>

<div id="backgroundholder"></div>

<div id="kachelholder">
	
<div id="kachel"><a href="./document/phone.html">✆</a></div>
<div id="kachel"><a href="./document/mic/mic.html">🎤︎︎</a></div>
<div id="kachel"><a href="./document/cam.html">📷</a></div>
<div id="kachel"><a href="./document/planets/index.html">🔭</a></div>	
<div id="kachel"><a href="./document/hand/index.html">🖐</a></div>	
<div id="kachel"><a href="./document/chat/index.php">📧</a></div>	
<div id="kachel"><a href="./document/contacts/index.php">😀</a></div>
<div id="kachel" style="font-size: 90px;"><a href="./document/rhombus/index.html">◊</a></div>	
<div id="kachel"><a href="./document/todo/index.php">✅</a></div>
<div id="kachel"><a href="./document/news/index.php">📰</a></div>	
<div id="kachel"><a href="./document/kreuzgold.html">✞</a></div>
<div id="kachel"><a href="./document/pyramid.html">∆</a></div> 
<div id="kachel"><a href="./document/draw/draw.html">✎</a></div> 
<div id="kachel"><a href="./document/pfeil/">🖱️</a></div> 
<div id="kachel"><a href="./document/color_rate.html">🖌</a></div>	
	<div id="kachel"><a href="./document/stab/">🪄</a></div>
	<div id="kachel"><a href="./document/candle_v2/">📈</a></div>


</div>



<?php 

if($_SESSION["allow_cookie"] != true){
	
?>

<div id="cookie_allow">
		
		<p>By clicking the "Allow" button you <br/> agree to technically necessary cookies</p>
		<button id="button_cookie" style="background-color: lightblue;">Allow!</button>
		
</div>


<?php } ?>

 <script>
  $( function() {
    $( "#kachelholder" ).sortable();
    $( "#kachelholder" ).disableSelection();
	  
	  $( "#button_cookie" ).on("click", function(){
	  	$( "#cookie_allow" ).hide();
		window.location.href = "./menu_v2.php?allow_cookie";
	  });
  } );
  </script>
