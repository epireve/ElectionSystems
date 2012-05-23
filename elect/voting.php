<?php
session_start();
if(!isset($_SESSION['vote'])):
header("Location: ../index.php");
endif;
require '../classes/conn.php';
function __autoload($class_name) {
    require '../classes/'.$class_name . '.php';
}
?>

<head>
	<link href="../adminpanel/css/bootstrap.css" rel="stylesheet">

		<script type="text/javascript"> 
			<!-- 
				var checkCount=0
				var maxChecks=10

				function setChecks(obj){  
				if(obj.checked){ 
				checkCount=checkCount+1 
				}else{ 
				checkCount=checkCount-1 
				} 
				if (checkCount>maxChecks){ 
				obj.checked=false 
				checkCount=checkCount-1 
				alert("You can only vote maximum to "+maxChecks+" candidate only") 
				} 
			} 
		</script>

</head>
<body>
<center>
<div class="topbar"><div class="fill" style="background:#FF6633;"><h2 style="text-shadow:1px 2px 4px #000; color:#fff;">Vote your candidate</h2></div></div><br><br><br>
<form method="post" action="end.php" name="vote" id="vote">
<table border=1 class="bordered-table" style="width:400px;">

<?php 
$ListCandidate = new candidates();
$position = new position();
$course = new courses();
$sex = new gender();
$result = $ListCandidate->listCandidates();
//$count= $CheckRow->checkRow();
$count=mysql_num_rows($result);
/*$positionName -> $sql = "SELECT name FROM position WHERE id='$position'";
		$result = mysql_num_rows(mysql_query($sql)); 

echo '<tr><td colspan="3"><center>POSITION NAME</center></td></tr>';*/

while ($candidate = mysql_fetch_array($result)):
?>
<?php if($candidate['hold']!=0):?>
<?php echo'<tr>' ?>
<!--?php for($a=1; $a<=3; $a++) {?-->
	<td><input type="checkbox" name="voting[]" value="<?php echo $candidate['id']?>" onclick="setChecks(this)"></td>
	<td><img src="<?php echo $candidate['images'];?>" width="100px" height="100px"></td>
	<td>
		<?php printf("%s%04d",$position->getPositionPrefix($candidate['position_id']), $candidate['id']);?><br>
		<?php echo $candidate['name']?><br>
		<?php echo $course->getCourseName($candidate['courses_id']);?><br>
		<?php echo $sex->getGenderName($candidate['gender_id']);?>
	</td>
<!--?php }?-->
</tr>
<?php endif;?>
<?php endwhile; ?>
<tr>
<td colspan="9" align="center" style="background-color:whiteSmoke;"><button type="submit" name="votenow" id="votenow"><strong>&raquo;Submit vote</strong></button>

<?php
if(isset($_POST['votenow'])){

   if(isset($_POST['voting'])){
        $num = 0;
        $box = $_POST['voting'];
        while (list ($key,$id) = @each ($box)) {
              $num++;
              $sql="UPDATE candidates SET vote_count = vote_count +1 WHERE id ='$id'";
              $result=mysql_query($sql);
        }
        echo"$num record(s) have been deleted.";
   }
   else{
   echo "No records selected.";
   }
}
?>

</table>

</form>
</center>
</body>