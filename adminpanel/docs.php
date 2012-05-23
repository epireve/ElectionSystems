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
          <h1>User manual</h1>
        </div>
        <div class="row">
          <div class="span12">
          <strong>How to use this system?</strong><br/><br/>
          Student Election system is straightforward. Before start to vote, voters (students) must <a href="../rvoter.php">register MyKad and Matriculation ID</a> in order to eligible to electing. The system will generate an unique ticket which will be used to in the <a href="../rvoter.php">election</a>.<br/><br/>

          <strong>Chronology</strong><br/><br/>
          <ul>
          <li>Admin create Candidate Registrar and Vote Registrar.
          <li>Candidate Registrar will insert all candidates.
          <li>Register client will register, handle, validate and print a unique ticket to Voter (Student) before proceed to voting.
          <li>Unique ticket will be generated randomly based on MyKad/Matrix detail.
          <li>Voting client/Station/Kiosk will ask Matrix and unique ticket before voting.
          <li>Commission of Election will print the result upon election end.</ul>

          <strong>User’s scope</strong><br/><br/>
          Those are the account and it's authorization level. All credential can be accessed through <a href="index.php">Commision and Administrative Panel</a>. Super admin can create as many user as he want.<br><br>
          <ol>
            <li>Voters (Student)</li>
            The User who voting which is student<br/><br/>
            
            <li>Vote Registrar</li>
            Registering, handling, validating and print a unique ticket to Voter (Student). Cannot update/alter the record after creation<br/><br/>
            
            <li>Candidate Registrar</li>
            Register all candidates to be elected. Cannot update/alter the record after creation<br/><br/>
            
            <li>Commission of Election / Admin</li>
            Create Vote Registrar and Candidate Registrar. Ability to create, view, updates and deletes records<br/><br/>
            
            <li>Superadmin</li>
            Full control privilege<br/><br/>
            Username:Password - suadmin:suadmin
          </ol>

          <strong>Technical requirement</strong><br/><br/>
          Student Election System are built based on basic MVC practice and using Object Relational Method (ORM). The admin panel is backed by Twitter Bootstrap CSS3 framework. <br/><img src="http://i.imgur.com/0Ka3G.png"<br/>
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