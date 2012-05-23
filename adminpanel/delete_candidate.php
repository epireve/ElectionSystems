<?php 
require '../classes/conn.php';
function __autoload($class_name) {
    require '../classes/'.$class_name . '.php';
}
$remove = new candidates();
$remove->killCandidate($_GET['id']);
header("Location: candidate.php")
?>