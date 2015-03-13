<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
     <title>My.ICI Login</title>`
<style>
     body{
          background-image: url("<?php echo base_url("_assets/img/bg7.jpg"); ?>");
          background-repeat: yes;
          background-size: 100%;
          font-family: Calibri;
          color: #148fb1;
     }         
     .well container{
          background-color: #ddecf6;
     }

     img{
          margin-top:150px;
     }

</style>
</head>
<link rel="stylesheet" href="<?php echo base_url("_assets/css/login2.css"); ?>">

	<body>
     <div>
     <center>
          <?php 
          $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
          echo form_open("NewCon/student_login", $attributes);?>
          
               <img src="<?php echo base_url("_assets/img/logo5.png"); ?>" style="margin-bottom: 20px; size: 85%;"><br>
               <p style="margin-bottom: 30px;"><h3><b>My.ICI Student Login </b></h3></p>
               <fieldset>
                    &nbsp;&nbsp;
                    <input type="text" style="width:250px; height: 37px; text-align: center; margin-bottom: 10px;" id="studentid" name="studentid" placeholder="e.g. 2010-F1234"/><br>
                    <span class="text-danger"><?php echo form_error('studentid'); ?></span>
                    <input type="password" style=" width:250px; height: 37px; text-align: center; margin-bottom: 20px;" id="password" name="password" placeholder="Password"/><br>
                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                    <input id="btn_login" name="btn_login" type="submit" class="btn btn-success" value="Submit"  style="width: 180px;"/>
                    <br><br>
                    <p><a href="<?php print(base_url().'index.php/NewCon/p_home') ?>">Click here</a> to access the Parent Portal</p>
               </fieldset>
     </center>
     <?php echo form_close(); ?>
          <div class="col-md-6 col-md-offset-3">
               <?php echo $this->session->flashdata('msg'); ?>
          </div>

	</body>

</html>