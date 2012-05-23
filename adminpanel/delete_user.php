<?php 
require '../classes/conn.php';
function __autoload($class_name) {
    require '../classes/'.$class_name . '.php';
}
$remove = new users();
$remove->killUsers($_GET['id']);
header("Location: users.php")
?>