<?php
/*session_start();
if($_SESSION['access']!=1&&$_SESSION['access']<3):
header("Location: index.php");
endif;*/
require 'classes/conn.php';
function __autoload($class_name) {
    require 'classes/'.$class_name . '.php';
}
$msg="";
if(isset($_POST['submit'])):

if(!empty($_POST['nric'])&&!empty($_POST['matrix'])):
$users = new Voters;
//registering voters
if($users->AddVoters($_POST['nric'],$_POST['matrix'])):

//generating unique ticket for voters
$users->createTicket($_POST['nric'],$_POST['matrix']);
$msg="Successfully registered. Your ticket number is <strong>".$users->showTicket($_POST['nric'],$_POST['matrix'])."</strong>";

else:
$msg="MyKad/Matrix Already registered or Invalid input.";
endif;

else:
$msg="Please fill NRIC & Matrix.";
endif;
endif;
?>
<html>
<head>
<title>RegisterForm</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/style.css">
<link id='theme' rel='stylesheet' href='css/bigbox.css'/>
<script src='js/humane.js'></script>
</head>

<body>
	<!-- Used for showing Alert regarding action  -->
	<div style="text-align: center;"><?php if(!empty($msg)) { echo "<span>".$msg."</span><br>"; }?></div>
	<div id="MainBody">
		<div id="LoginBox">
		
		<img src="images/logoapiti.png" class="logo height="138" width="138">
		<h1 class="Headline">Election Registration <span>2011</span></h1>

		<form method="post" action="#">
			<input type="text" value="Matriculation ID" class="custom" onclick="this.value=''" name="matrix"><br><br>
			<input type="text" value="MyKad" class="custom" onclick="this.value=''" name="nric">
		
		<h4 class="getatix"><!-- <a href="#">get a ticket</a>--><button type="submit" name="submit" id="auth" >Register</button></h4>
		</form>
		</div>
  	</div>
</body>
</html>