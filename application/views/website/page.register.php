<?php include('tpl.meta.php');?>
<section class="login">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div id="login">
          <form method="post" id="form-register">
            <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/frontend/img/logo_sticky.png"></a>
            <hr>
            <?php if($complete){?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><?php echo $this->lang->line('Success');?>!</strong>  <?php echo $this->lang->line('Thank you for registering with us');?>
</div>						
<?php }?>
            <?php if($error){?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><?php echo $this->lang->line('Error');?>!</strong>  <?php echo $this->lang->line('Email already existing');?>
</div>						
    				<?php }?>
            <div class="form-group">
              <label><?php echo $this->lang->line('Email');?></label>
              <input type="email" name="email" class=" form-control" required>
            </div>
            <div class="form-group">
              <label><?php echo $this->lang->line('Password');?></label>
              <input type="password" name="password" class=" form-control" id="password" required>
            </div>
            <div class="form-group">
              <label><?php echo $this->lang->line('Confirm password');?></label>
              <input type="password" class=" form-control" id="password_again" name="password_again" required>
            </div>
            <div id="pass-info" class="clearfix"></div>
            <input name="save" type="submit" class="btn_full" value="<?php echo $this->lang->line('Create an account');?>">
            <a href="<?php echo base_url()?>signin" class="btn_full_outline"><?php echo $this->lang->line('Sign In');?></a>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
$('#form-register').validate({
  rules: {
    password: "required",
    password_again: {
      equalTo: "#password"
    }
  }	
});
</script>
</body>
</html>