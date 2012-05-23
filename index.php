<?php
session_start();

require 'classes/conn.php';
function __autoload($class_name) {
    require 'classes/'.$class_name . '.php';
}
$msg="";
if(isset($_POST['submit'])):

if(!empty($_POST['matrix'])&&!empty($_POST['uticket'])):
$validate = new Voters();

//Validate User
if($validate->validateVoter2($_POST['matrix'], $_POST['uticket'])&&$validate->votingStatus($_POST['matrix'])):
$_SESSION['matrix'] = $_POST['matrix'];
$_SESSION['vote'] = 1;
header("Location: elect/voting.php");
else:
$msg="You are not allowed to Vote in this election, <br> Please make sure you insert the correct details and never use your vote.";
endif;

endif;
endif;
?>
<html>
<head>
<title>Student Election 2011l</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<!-- Used for showing Alert regarding action  -->
	<div style="text-align: center;"><?php if(!empty($msg)) { echo "<span>".$msg."</span><br>"; }?></div>
	<div id="MainBody">
		<div id="LoginBox">
		
		<img src="images/logoapiti.png" class="logo height="138" width="138">
		<h1 class="Headline">Student Council Election <span>2011</span></h1>

		<form method="post" action="#">
			<input type="text" value="Matrix ID" class="custom" onclick="this.value=''" name="matrix"><br><br>
			<input type="text" value="Unique Ticket" class="custom" onclick="this.value=''" name="uticket">
		

		<h4 class="getatix"><!-- <a href="#">get a ticket</a>--><button type="submit" name="submit" id="auth">Start Voting</button></h4>
		</form>
		</div>
  	</div>
</body>
</html>