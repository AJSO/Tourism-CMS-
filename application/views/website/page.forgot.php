<?php 
include('tpl.meta.php');
?>
<section class="login">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div id="login">
          <form method="post" id="form-login">
            <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/frontend/img/logo_sticky.png"></a>
            <hr>
            <?php if($complete){?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><?php echo $this->lang->line('Success');?>!</strong>
  <?php echo $this->lang->line('Your password has been send');?>
</div>						
						
						<?php }?>
            <?php if($error){?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><?php echo $this->lang->line('Error');?>!</strong>
  <?php echo $this->lang->line('Invalid Email');?>
</div>						
						<?php }?>
            <div class="form-group">
              <label><?php echo $this->lang->line('Email');?></label>
              <input type="text" name="email" class="form-control" required>
            </div>
            <input type="submit" name="save" class="btn_full" value="<?php echo $this->lang->line('Submit');?>">
            <a href="<?php echo base_url();?>signin" class="btn_full_outline"><?php echo $this->lang->line('Sign In');?></a>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
$('#form-login').validate();
</script>
</body>
</html>