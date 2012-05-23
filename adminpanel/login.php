<?php
session_start();
if(isset($_SESSION['access'])):
header("Location: index.php");
endif;
require '../classes/conn.php';
function __autoload($class_name) {
    require '../classes/'.$class_name . '.php';
}
$msg="";
if(isset($_POST['submit'])):

if(!empty($_POST['password'])&&!empty($_POST['username'])):
$validate = new users();

//Validate User
if($validate->validateUser($_POST['username'], $_POST['password'])):
$_SESSION['access']= $validate->getUserLevel($_POST['username']);
$_SESSION['username'] = $_POST['username'];
header("Location: index.php");
endif;

endif;
endif;
?>
<html>
<head>
<title>Student Election Admin Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/style.css">
<style type="text/css">
		body {	background-color:#C0C0C0;
				background-image:none;}
</style>

</head>

<body>
	<!-- Used for showing Alert regarding action  -->
	<div style="text-align: center;"><?php if(!empty($msg)) { echo "<span>".$msg."</span><br>"; }?></div>
	<div id="MainBody">
		<div id="LoginBox">
		
		<img src="../images/AdminOnly.gif" class="logo height="140" width="140">
		<h1 class="Headline">Election <span>Admin Panel</span></h1>

		<form method="post" action="#">
			<input type="text" value="Username" class="custom" onclick="this.value=''" name="username"><br><br>
			<input type="password" value="Password" class="custom" onclick="this.value=''" name="password">
		

		<h4 class="getatix"><!-- <a href="#">get a ticket</a>--><button type="submit" name="submit" id="auth">Login</button></h4>
		</form>
		</div>
  	</div>
</body>
</html>