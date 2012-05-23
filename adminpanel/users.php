<?php 
error_reporting(E_ALL);
if(isset($_POST['submit'])||isset($_POST['update'])):
if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['email'])&&isset($_POST['lvl'])):
?>
<? include("header.php");?>
<?php 
if(isset($_POST['update'])):
$update = new users();
if($update->editUser($_POST['id'])):
$msg="User has been updated.";
else:
$msg="Fail to save update change(s).";
endif;
else:
$register = new users();
if($register->createUser($_POST['username'], $_POST['password'], $_POST['email'], $_POST['lvl'])):
$msg="User has been registered.";
else:
$msg="User already registered.";
endif;
endif;

else:
header("Location: createUser.php?error=1");
endif;
else:
include("header.php");
endif;

?>
    <div class="container">

      <div class="content">
        <div class="page-header">
          <h1>List of Users</h1>
        </div>
        <div class="row">
          <div class="span10">
			  <a href="createUser.php"><input type="button" value="Create System User" class="btn"></a><br><br>
			  <span style="text-align: center"><?php echo $msg;?></span>
            <table class="bordered-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Username</th>
            <th>Email</th>
            <th>Access</th>
          </tr>
        </thead>
        <tbody>
 <?php 
 $user = new users;
 $lvoters = $user->listUsers();
 $i=1;

 while( $voters = mysql_fetch_array($lvoters)):
 ?>
 			
          <tr>
            <th><?php echo $i;?></th>
            <td><?php echo $voters['username'];?></td>
            <td><?php echo $voters['email'];?></td>
            <td><?php echo getLvl($voters['lvl']);?></td>
            <td><a href="edit_user.php?id=<?php echo $voters['id'];?>">Edit</a>&nbsp;&nbsp;<?php if($voters['lvl']!=4):?><a href="delete_user.php?id=<?php echo $voters['id'];?>">Delete</a><?php endif;?></td>
          </tr>
          <?php $i++;?>
<?php endwhile;?>
<?php if($i==1):?>
 			<tr>
            <th colspan="5" style="text-align: center;">No Users(s).</th>
            </tr>
<?php endif;?>
        </tbody>
      </table>

          </div>
          
        </div>
      </div>
<?php 
function getLvl($lvl)
{
	switch($lvl):
		case 1:
			return "Vote Registrar";
			break;
		case 2:
			return "Candidate Registrar";
			break;
		case 3:
			return "Commission of Election";
			break;
		case 4:
			return "Super Admin";
			break;
		default:
			return "Unknown";
			break;
	endswitch;
}
?>
<? include("footer.php");?>