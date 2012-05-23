<?php
session_start();
if(!isset($_SESSION['vote'])):
header("Location: ../index.php");
endif;
require '../classes/conn.php';
function __autoload($class_name) {
    require '../classes/'.$class_name . '.php';
}

//add vote count to candidate.
//$give = new candidates();
//$give->plusOne($_POST['voting']);

if(isset($_POST['votenow'])){//check to see if the delete button has been pressed

   if(isset($_POST['voting'])){ //check to see if any boxes have been checked 
        $num = 0;//used to count the number of rows that were deleted
        $box = $_POST['voting'];
        while (list ($key,$id) = @each ($box)) { //loop through all the checkboxes
              $num++;
              $sql="UPDATE candidates SET vote_count = vote_count +1 WHERE id ='$id'";//delete any that match id
              $result=mysql_query($sql);//send the query to mysql
        }
        //print the logs that were deleted
        echo"";
   }
   else{//no boxes checked
   echo "";
   }
}

//remove voting privilage from voters.
$remove = new Voters();
$remove->revokeTheVote($_SESSION['matrix']);
session_destroy();
?>
<head>
	<link href="../adminpanel/css/bootstrap.css" rel="stylesheet">
</head>
<body style="background-image:url('../images/bg.png');">
</center>
<div class="container">
<div class="content"><br>
<div class="hero-unit">
<div class="row">
	<div class="span3"><img src="../images/logoapiti.png"></div>
	<div class="span10">
	          <h1 style="text-shadow:1px 1px 5px #000; color:#000000;">Thanks for attending this Election</h1>
	          <p style="color:#000;">A big 'Thank You' for your cooperation for this election. Your vote will change the future.<br><br>Sincerely,<br> Student Election Commision <?echo date('Y');?></p>
	          <p><a class="btn primary" href="../index.php">See you again</a></p>
	        </div></div>
</div></div>
</center>
</body>