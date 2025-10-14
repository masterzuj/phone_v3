<?php 
session_start();

if(isset($_POST["name_user"])){
	$_SESSION["name_user"] = trim(htmlspecialchars($_POST["name_user"]));
}

//echo $_SESSION["name_user"] ;
?>

<meta charset="UTF-8">

<script src="./jquery-3.7.1.js" sourcemappingurl="./jquery-3.7.1.min.map"></script>

<style>
	body{
		
	}
	#background_container{
		background-image: url('background/background_c.png');
		opacity: 1;
	
		background-position-y: 99%;
		height: 40px;
		width: 450px;
		position: fixed;
		top: 0px;
		left:0px;
	}
	a{
	color: white;
	}
#menu{
	position: fixed;
		top: 0px;
		left:10px;
	background-color: blue;
	height: 40px;
	width: 430px;
	border-radius: 10px;
	opacity: 0.7;
}
#menubild{
	height: 40px;
	width: 40px;
}

</style>
<div id="background_container"></div>
<div id="menu">
	<!--
	<div style="position: absolute; left: 10px; font-size: 30px;" id="user_container">
		<form action="./controls.php" method="POST">
			<input type="submit" style="width: 30px;" value="ok" id="user_ok"/>
			<input type="text" name="name_user" id="user_name" style="width: 130px;" value="<?php echo $_SESSION['name_user']; ?>" placeholder="user name"/>
		</form>
	</div>
	-->
	<div style="position: absolute; left: 10px; color: black; font-size: 20px; margin-top: 10px; color: white;">ⓩⓤⓚⓤⓝⓕⓣ</div>
	<div style="position: absolute; left: 220px; font-size: 30px; color: white;"><a onclick="window.parent.location.href = 'just_phone_v2.php';"><b>⌂</b></a></div>
	
	<div style="position: absolute; right: 10px; font-size: 30px; color: white;"><a onclick="history.back()"><b>←</b></a></div>
	
</div>
<script>
$(document).ready(function() {
	$(window).click(function() {
	  $("#user_ok").hide("fast");
		$("#user_container").css("top", "10px");
	});

	$("#user_name").on("click", function(event) {
		$("#user_ok").show("fast");
		$("#user_container").css("top", "0px");
		event.stopPropagation();
	});
});
</script>