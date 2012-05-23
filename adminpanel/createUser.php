<? include("header.php");?>
    <div class="container">

      <div class="content">
        <div class="page-header">
          <h1>Create user account</h1>
        </div>
        <div class="row">
          <div class="span10">
		<span style="text-align: center;color: red;"><?php if($_GET['error']==1) echo "Please fill all the field.";?></span>
          <form action="users.php" method="post" enctype="multipart/form-data"><!--Form-->
            <fieldset>
            <div class="clearfix">
                <label for="Course">Access</label>
                <div class="input">
                  <select name="lvl" id="Course">
                    <option>Select Access</option>          
                    <?php if($_SESSION['access']>=3):?>  
                    <option value="1">Vote Registrar</option>
                    <option value="2">Candidate Registrar</option>
                    <?php endif;?>
                    <?php if($_SESSION['access']>=4):?>  
                    <option value="3">Commision of Election</option>
                    <option value="4">Super Admin</option>
                    <?php endif;?>
                    </select>
                </div>
            </div>
              <div class="clearfix">
                <label for="Name">Username</label>
                <div class="input">
                  <input class="xlarge" id="Name" name="username" size="30" type="text">
                </div>
              </div>
               <div class="clearfix">
                <label for="Name">Password</label>
                <div class="input">
                  <input class="xlarge" id="Name" name="password" size="30" type="password">
                </div>
              </div>
               <div class="clearfix">
                <label for="Name">E-mail</label>
                <div class="input">
                  <input class="xlarge" id="Name" name="email" size="30" type="text">
                </div>
              </div>

            

              <button type="submit" name="submit" class="btn primary">Create Account</button><br><br>
            </fieldset>
          </form>

            

          </div>
          
        </div>
      </div>

<? include("footer.php");?>