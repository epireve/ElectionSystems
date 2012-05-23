<?php
session_start();
if(!isset($_SESSION['vote'])):
header("Location: index.php");
endif;
require 'classes/conn.php';
function __autoload($class_name) {
    require 'classes/'.$class_name . '.php';
}

//add vote count to candidate.
$give = new candidates();
$give->plusOne($_POST['voting']);
//remove voting privilage from voters.
$remove = new Voters();
$remove->revokeTheVote($_SESSION['matrix']);
?>
<center>
<h1>Thanks for attending this Election</h1>
<a href="index.php">Bye</a>
</center>