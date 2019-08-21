<?php include('tpl.meta.php');?>
<?php include('tpl.header.plain.php');?>
<div class="container margin_60" style="margin-top:60px;">
  <div class="row">
    <aside class="col-lg-3 col-md-3">
      <?php include('tpl.profile.menu.php');?>
			<?php include('tpl.needhelp.php');?>
    </aside>
    <div class="col-lg-9 col-md-9">
      <div id="personal-info" class="box_style_1">
        <form id="form-setting" method="post">
          <p><strong><?php echo $this->lang->line('Setting');?></strong></p>
          <hr>
          <?php if($save){?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><?php echo $this->lang->line('Success');?>!</strong> <?php echo $this->lang->line('Your setting has been updated');?>
</div>					
					<?php }?>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label><?php echo $this->lang->line('Email');?></label>
                <input name="email" class="form-control" value="<?php echo $member[0]->email; ?>" readonly required type="text">
              </div>
              <div class="col-sm-6">
                <label><?php echo $this->lang->line('Password');?></label>
                <input name="password" class="form-control" value="<?php echo $member[0]->password;?>" required type="password">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <input name="save" class="btn_1" value="<?php echo $this->lang->line('Save');?>" type="Submit">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
$('#form-setting').validate();
</script>
<?php include('tpl.footer.php');?>