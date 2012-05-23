<?php 
require '../classes/conn.php';
function __autoload($class_name) {
    require '../classes/'.$class_name . '.php';
}
$remove = new Voters();
$remove->killVoter($_GET['id']);
header("Location: voters.php")
?>