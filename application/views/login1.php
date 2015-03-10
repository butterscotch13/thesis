<!DOCTYPE HTML>
<html>
	<head>
		<title>Navigation</title>
	</head>
	
	<body>
		<center>
		<div class="container">
     <div class="row">
          <div class="col-lg-4 col-sm-4 well">
          <?php 
          $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
          echo form_open("LoginT/login", $attributes);?>
          
          <fieldset>
               <legend>Login</legend>
               <div class="form-group">
               <div class="row colbox">
               <div class="col-lg-4 col-sm-4">
                    <label for="studentid" class="control-label">Student ID</label>
               </div>
               <div class="col-lg-8 col-sm-8">
                    <input class="form-control" id="studentid" name="studentid" placeholder="e.g. 2010-F1234" type="text" value="<?php echo set_value('studentid'); ?>" />
                    <span class="text-danger"><?php echo form_error('studentid'); ?></span>
               </div>
               </div>
               </div>
               
               <div class="form-group">
               <div class="row colbox">
               <div class="col-lg-4 col-sm-4">
               <label for="password" class="control-label">Password</label>
               </div>
               <div class="col-lg-8 col-sm-8">
                    <input class="form-control" id="password" name="password" placeholder="Password" type="password" value="<?php echo set_value('password'); ?>" />
                    <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
               </div>
               </div>
               </div>
                              
               <div class="form-group">
               <div class="col-lg-12 col-sm-12 text-center">
                    <input id="btn_login" name="btn_login" type="submit" class="btn btn-success" value="Login" />
                    <!--<input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel" />-->
               </div>
               </div>
          </fieldset>
          <?php echo form_close(); ?>
          <?php echo $this->session->flashdata('msg'); ?>
          </div>
     </div>
</div>

	</body>

</html>