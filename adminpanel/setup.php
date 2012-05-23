<? include("header.php");?>

    <div class="container">

      <div class="content">
        <div class="page-header">
          <h1>Configuration</h1>
        </div>
        <div class="row">
          <div class="span10">
            <h2>Add Course</h2>
			<?php 
			$course = new courses;
			if(isset($_POST['courseF'])&&isset($_POST['Course'])):
			$course->addCourse();
			endif;
			if(isset($_POST['updateC'])):
			$course->editCourse($_POST['id']);
			endif;
			?>
            <form action="" method="post">
                  <input class="xlarge" id="xlInput" name="Course" size="30" type="text" style="width:320px;">
                  <button type="submit" name="courseF" class="btn primary">Register</button>
            </form>

            <table class="bordered-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Course Name</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
        <?php 
		 
		 $result = $course->listCourses();
		 $i=1;
		
		 while( $lcourse = mysql_fetch_array($result)):
		 ?>
          <tr>
            <th><?php echo $i;?></th>
            <td><?php echo $lcourse['name'];?></td>
            <td><a href="edit_course.php?id=<?php echo $lcourse['id'];?>">Edit</a>&nbsp;&nbsp;<a href="delete_course.php?id=<?php echo $lcourse['id'];?>">Delete</a></td>
          </tr>
          <?php $i++;?>
          <?php endwhile;?>
          
          <?php if($i==1):?>
          <tr>
            <th colspan="3" style="text-align: center;">No Course(s)</th>
          </tr>
          <?php endif;?>
        </tbody>
      </table>
		
      <h2>Add Position</h2>
            <?php 
			$newposition = new position;
			if(isset($_POST['positionF'])&&isset($_POST['position'])&&isset($_POST['prefix'])):
			$newposition->addPosition();
			endif;
			if(isset($_POST['updateP'])):
			$newposition->editPosition($_POST['id']);
			endif;
			?>
            <form action="" method="post">
            	  <input class="xlarge" id="xlInput" name="prefix" size="3" type="text" style="width:45px;">
                  <input class="xlarge" id="xlInput" name="position" size="30" type="text">
                  <button type="submit" name="positionF" class="btn primary">Register</button>
            </form>

            <table class="bordered-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Prefix</th>
            <th>Position</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
        <?php 
		 
		 $result = $newposition->listPositions();
		 $i=1;
		
		 while( $lcourse = mysql_fetch_array($result)):
		 ?>
          <tr>
            <th><?php echo $i;?></th>
            <td><?php echo $lcourse['prefix'];?></td>
            <td><?php echo $lcourse['name'];?></td>
            <td><a href="edit_position.php?id=<?php echo $lcourse['id'];?>">Edit</a>&nbsp;&nbsp;<a href="delete_position.php?id=<?php echo $lcourse['id'];?>">Delete</a></td>
          </tr>
          <?php $i++;?>
          <?php endwhile;?>
          
          <?php if($i==1):?>
          <tr>
            <th colspan="3" style="text-align: center;">No Position(s)</th>
          </tr>
          <?php endif;?>
        </tbody>
      </table>

          </div>
          
          
          
          
        </div>
      </div>

<? include("footer.php");?>