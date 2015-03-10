<div class="container-fluid">
  <div class="row">
    <?php foreach ($query as $row){ ?>

    <img src="<?php echo base_url("_assets/img/logo3.png"); ?>">
      <!-- </div> -->
      
      <p class="header">Hello <?php echo $row->firstname; ?>!  <a href='<?php print(base_url().'index.php/NewCon/logout') ?>'> Logout</a></p>

      <?php } ?>

  </div>
</div>