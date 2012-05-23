<?php
$username ="root";
$pass = "";
$db = "system_mpp";


$link1 = mysql_connect('localhost',$username,$pass);
mysql_select_db($db);
mysql_set_charset("utf8",$link1);
?>