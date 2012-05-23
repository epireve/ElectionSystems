<?php 
require '../classes/conn.php';
function __autoload($class_name) {
    require '../classes/'.$class_name . '.php';
}
$remove = new gender();
$remove->killGender($_GET['id']);
header("Location: setup.php")
?>