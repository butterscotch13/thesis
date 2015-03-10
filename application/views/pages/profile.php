<div class="container-fluid">
  <div class="row">

    <img src="<?php echo base_url("_assets/img/logo3.png"); ?>">
      <!-- </div> -->
      
      <p class="header">  <a href='<?php print(base_url().'index.php/NewCon/logout') ?>'> Logout</a></p>


  </div>
</div>

<!--SIDEBAR-->
    <div class="col-lg-2 col-lg-offset-1">
      <div>
        <img name="student_photo" src="<?php echo base_url("_assets/img/facebook-default-no-profile-pic2.jpg"); ?>" class="under1">
        <p class="over" name="student_name"></p>
        <img src="<?php echo base_url("_assets/img/img-f2.png"); ?>" class="under">
      </div>
      <div class="sidebar">
        <ul class="nav">
          <li class="li2"><a href="<?php print(base_url().'index.php/NewCon/getProfile') ?>"><b>Profile</b></a></li>
          <li class="li2"><a href="<?php print(base_url().'index.php/NewCon/getGrades') ?>"><b>Grades</b></a></li>
          <li class="li2"><a href="<?php print(base_url().'index.php/NewCon/getClearance') ?>"><b>Clearance</b></a></li>
          <li class="li2"><a href="<?php print(base_url().'index.php/NewCon/getInc') ?>"><b>INC Grade Monitor</b></a></li>
          <li class="li2"><a href="<?php print(base_url().'index.php/NewCon/getSchedule') ?>"><b>Class Schedule</b></a></li>
          <li class="li2"><a href="<?php print(base_url().'index.php/NewCon/getAssessment') ?>"><b>Assessment of Fees</b></a></li>
          <li class="li2"><a href="<?php print(base_url().'index.php/NewCon/checkadreq') ?>"><b>Admission Requirements</b></a></li>
        </ul>
      </div> 
    </div> <!-- end of col-lg-2 -->
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-8 main">
    <?php foreach ($result as $row){ ?>
    <div class="well">
          <div class="minhead">
            <h3><span class="glyphicon glyphicon-user"></span>STUDENT PROFILE</h3>
          </div>
          <br><br>
          <table class="table table-bordered">
              <tr>
                <th  colspan="3">
                  ENROLLMENT INFORMATION
                </th>
              </tr>
              <tr>
                <td class="htr">Student ID Number</td>
                <td><?php echo $row->studentid; ?></td>
              </tr>
              <tr>
                <td>Name</td>
                <td><?php echo $row->firstname; ?> <?php echo $row->lastname; ?></td>
              </tr>
              <tr>
                <td>Course</td>
                <td><?php echo $row->description; ?></td>
              </tr>
              <tr>
                <td>Last Enrolled</td>
                <td></td>
              </tr>
          </table>
          
          <table class="table table-bordered">
              <tr>
                <th  colspan="3">
                  PERSONAL INFORMATION
                </th>
              </tr>
              <tr>
                <td class="htr">Gender</td>
                <td><?php echo $row->sex; ?></td>
              </tr>
              <tr>
                <td>Civil Status</td>
                <td><?php echo $row->maritalstatus; ?></td>
              </tr>
              <tr>
                <td>Contact Number</td>
                <td></td>
              </tr>
              <tr>
                <td>Current Address</td>
                <td><?php echo $row->currentaddress;?></td>
              </tr>
              <tr>
                <td>Citizenship</td>
                <td><?php echo $row->citizenship; ?></td>
              </tr>
              <tr>
                <td>Date of Birth</td>
                <td><?php echo $row->dateofbirth; ?></td>
              </tr>
              <tr>
                <td>Place of Birth</td>
                <td><?php echo $row->placeofbirth;?></td>
              </tr>
              <tr>
                <td>Religion</td>
                <td><?php echo $row->religion; ?></td>
              </tr>
              <tr>
                <td>Name of Father</td>
                <td><?php echo $row->fathername; ?></td>
              </tr>
              <tr>
                <td>Name of Mother</td>
                <td><?php echo $row->mothername; ?></td>
              </tr>
          </table>
          <br>
          <div class="row">
            <button type="button" class="btn btn-default"><a href="<?php print(base_url().'index.php/NewCon/getEditProfile') ?>">Edit Profile</a></button> 
            <button type="button" class="btn btn-default"><a href="<?php print(base_url().'index.php/NewCon/changePass') ?>">Change Password</a></button>
          </div>
                
                  
</div>
</div>
</div>


     
    <?php } ?> 