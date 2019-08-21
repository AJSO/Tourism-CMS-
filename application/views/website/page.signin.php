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
            <?php if($error){?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><?php echo $this->lang->line('Error');?>!</strong>
  <?php echo $this->lang->line('Invalid Email/Password');?>
</div>						
						<?php }?>
            <div class="form-group">
              <label><?php echo $this->lang->line('Email');?></label>
              <input type="text" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label><?php echo $this->lang->line('Password');?></label>
              <input type="password" name="password" class=" form-control" required>
            </div>
            <p class="small"> <a href="<?php echo base_url();?>forgotpassword"><?php echo $this->lang->line('Forgot Password?');?></a> </p>
            <input type="submit" name="save" class="btn_full" value="<?php echo $this->lang->line('Sign In');?>">
            <a href="<?php echo base_url();?>register" class="btn_full_outline">Register</a>
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