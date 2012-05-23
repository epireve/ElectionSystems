<?php 
error_reporting(E_ALL);
session_start();
if(!isset($_SESSION['access'])):
header("Location: login.php");
endif;

require '../classes/conn.php';
function __autoload($class_name) {
    require '../classes/'.$class_name . '.php';
}
?>
<html lang="en"><head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/plus.css" rel="stylesheet">

    <script src="js/raphael-min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/g.raphael.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/g.bar.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/g.pie.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
          // Creates canvas 640 × 480 at 10, 50
          var r = Raphael(10, 50, 640, 480);
          // Creates pie chart at with center at 320, 200,
          // radius 100 and data: [55, 20, 13, 32, 5, 1, 2]
          r.g.piechart(320, 240, 100, [55, 20, 13, 32, 5, 1, 2]);
    </script> 
  </head>

  <body>

    <div class="topbar">
      <div class="fill">
        <div class="container-fluid">
          
          <a class="brand" href="#">Student Election System</a>

         <ul class="nav">
			<?php if($_SESSION['access']>=3):?>
            <li><a href="statistic.php">Statistic</a></li>
			<?php endif;?>
			<?php if($_SESSION['access']>=3||$_SESSION['access']==1):?>
            <li ><a href="voters.php">Voters</a></li>
			<?php endif;?>
			<?php if($_SESSION['access']>=3||$_SESSION['access']==2):?>
            <li><a href="candidate.php">Candidate</a></li>
            <?php endif;?>
			<?php if($_SESSION['access']>=4):?>
            <li><a href="setup.php">Setup</a></li>
            <?php endif;?>
            <?php if($_SESSION['access']>=3):?>
            <li><a href="users.php">System Users</a></li>
            <li><a href="docs.php">Documentation</a></li>
            <?php endif;?>
            </ul>
            <p class="pull-right">Logged in as <a href="logout.php"><?php echo $_SESSION['username'];?></a></p>
        </div>
      </div>
    </div>
