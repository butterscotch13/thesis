<!DOCTYPE HTML>
<html>
	<head>
		<title>Change Password</title>
	</head>
	
	<body>
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
		<center>
<div class="col-lg-8 main">
               <div class="">      
                    <div class="well">       
                         <div class="minhead">
                              <h3>CHANGE PASSWORD</h3>
                         </div>
                         <br><br>
                         <center>
                         <?php 
          $attributes = array("class" => "form-horizontal", "id" => "changepassform", "name" => "changepassform");
          echo form_open("NewCon/changePass", $attributes);?>
          
                           
          <fieldset>
               <div class="form-group">
               <div class="row colbox">
               <div class="col-sm-4 control-label">
                    <label for="oldpass" class="control-label">Current Password</label>
               </div>
               <div class="col-sm-5">
                    <input class="form-control" id="oldpass" name="oldpass" type="password"/>
                    <span class="text-danger"><?php echo form_error('oldpass'); ?></span>
               </div>
               </div>
               </div>
               
               <div class="form-group">
               <div class="row colbox">
               <div class="col-sm-4 control-label">
               <label for="newpass" class="control-label">New Password</label>
               </div>
               <div class="col-sm-5">
                    <input class="form-control" id="newpass" name="newpass" type="password"/>
                    <span class="text-danger"><?php echo form_error('newpass'); ?></span>
               </div>
               </div>
               </div>

               <div class="form-group">
               <div class="row colbox">
               <div class="col-sm-4 control-label">
               <label for="cpass" class="control-label">Confirm Password</label>
               </div>
               <div class="col-sm-5">
                    <input class="form-control" id="cpass" name="cpass" type="password"/>
                    <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
               </div>
               </div>
               </div>
              <br>
               <div class="row">
               <div class="col-lg-12 col-sm-12 text-center">
                    <input id="btn_login" name="btn_login" type="submit" class="btn btn-success" value="Update Password" />
                    <button type="button" class="btn btn-default"><a href="<?php print(base_url().'index.php/NewCon/getProfile') ?>">Cancel</a></button>
               </div>
               </div>

          </fieldset>


          </div>
          </div>
          <?php echo form_close(); ?>
          <?php echo $this->session->flashdata('msg'); ?>
          </div>
     </div>
</div>
     </div>


	</body>

</html>