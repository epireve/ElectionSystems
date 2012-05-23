<?php 
require '../classes/conn.php';
function __autoload($class_name) {
    require '../classes/'.$class_name . '.php';
}
$remove = new courses();
$remove->killCourse($_GET['id']);
header("Location: setup.php")
?>