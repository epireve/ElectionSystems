<?php error_reporting(E_ALL);?>
<? include("header.php");?>

    <div class="container">
	<?php 
	$edit = new candidates();
	$value = $edit->getCandidateById($_GET['id']);
	?>
	
      <div class="content">
        <div class="page-header">
          <h1>Edit Candidate</h1>
        </div>
        <div class="row">
          <div class="span10">
		<span style="text-align: center;color: red;"><?php if($_GET['error']==1) echo "Please fill all the field.";?></span>
          <form action="candidate.php" method="post" enctype="multipart/form-data"><!--Form-->
            <fieldset>
              <div class="clearfix">
                <label for="Name">Name</label>
                <div class="input">
                  <input class="xlarge" id="Name" name="name" size="30" type="text" value="<?php echo $value['name'];?>">
                </div>
              </div>

              <div class="clearfix">
                <label for="Course">Course</label>
                <div class="input">
                  <select name="course" id="Course">
                    <option>Select Course</option>
                    <?php 
                     $listC = new courses();		 
					 $result = $listC->listCourses();
					 $i=1;
					
					 while( $lcourse = mysql_fetch_array($result)):
					 ?>
                    <option value="<?php echo $lcourse['id'];?>" <?php if($lcourse['id']==$value['courses_id']) echo "selected"?>><?php echo $lcourse['name'];?></option>
                    <?php $i++;?>
                    <?php endwhile;?>   
                  </select>
                </div>
            </div>

              <div class="clearfix">
                <label for="Matriculation ID">Matriculation ID</label>
                <div class="input">
                  <input class="large" id="xlInput" name="matrixId" size="10" type="text" value="<?php echo $value['matrix'];?>">
                </div>
              </div>

              <div class="clearfix">
                <label for="Gender">Gender</label>
                <div class="input">
                  <select name="gender" id="Position">
                    <option>Select Gender</option>
                    <?php 
                     $listG = new gender();		 
					 $result = $listG->listGenders();
					 $i=1;
					
					 while( $lcourse = mysql_fetch_array($result)):
					 ?>
                    <option value="<?php echo $lcourse['id'];?>" <?php if($lcourse['id']==$value['gender_id']) echo "selected"?>><?php echo $lcourse['name'];?></option>
                    <?php $i++;?>
                    <?php endwhile;?>   
                  </select>
                </div>
            </div>

              <div class="clearfix">
                <label for="Position">Position</label>
                <div class="input">
                  <select name="position" id="Position">
                    <option>Select Position</option>
                    <?php 
                     $listP = new position();		 
					 $result = $listP->listPositions();
					 $i=1;
					
					 while( $lcourse = mysql_fetch_array($result)):
					 ?>
                    <option value="<?php echo $lcourse['id'];?>" <?php if($lcourse['id']==$value['position_id']) echo "selected"?>><?php echo $lcourse['name'];?></option>
                    <?php $i++;?>
                    <?php endwhile;?>   
                  </select>
                </div>
            </div>

              <div class="clearfix">
                <label for="Hold">Hold</label>
                <div class="input">
                  <select name="hold" id="Hold">
                    <option>----Please Select----</option>
                    <option value="0" <?php if($value['hold']==0) echo "selected"?>>Hold</option>
                    <option value="1" <?php if($value['hold']==1) echo "selected"?>>Open</option>
                  </select>
                </div>
            </div>

          <div class="clearfix">
              <label for="Photo">Photo</label>
              <div class="input">
                <input class="input-file" id="Photo" name="photo" type="file">
              </div>
          </div>
				<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
              <button type="submit" name="update" class="btn primary">Update</button><br><br>
            </fieldset>
          </form>

            

          </div>
          
        </div>
      </div>

<? include("footer.php");?>