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
        <form id="form-checkout" method="post">
          <p><strong><?php echo $this->lang->line('Personal Information');?></strong></p>
          <hr>
          <?php if($save){?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><?php echo $this->lang->line('Success');?>!</strong> <?php echo $this->lang->line('Your profile has been updated');?>
</div>					
					<?php }?>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label><?php echo $this->lang->line('First Name');?></label>
                <input name="firstname" class="form-control" value="<?php echo $member[0]->firstname; ?>" required type="text">
              </div>
              <div class="col-sm-6">
                <label><?php echo $this->lang->line('Last Name');?></label>
                <input name="lastname" class="form-control" value="<?php echo $member[0]->lastname;?>" required type="text">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label><?php echo $this->lang->line('Address');?></label>
                <input class="form-control" name="address" value="<?php echo $member[0]->address;?>" required type="text">
              </div>
              <div class="col-sm-6">
                <label><?php echo $this->lang->line('City');?></label>
                <input class="form-control" name="city" value="<?php echo $member[0]->city;?>" required type="text">
              </div>
            </div>
          </div>
          <div class="form-group">
          
          	<div class="row">
              <div class="col-sm-6">
                <label><?php echo $this->lang->line('State/Province');?></label>
                <input class="form-control" name="state" value="<?php echo $member[0]->state;?>" required type="text">
              </div>            
              <div class="col-sm-6">
                <label><?php echo $this->lang->line('Zipcode');?></label>
                <input class="form-control" name="zipcode" value="<?php echo $member[0]->zipcode; ?>" required type="text">
              </div>
            </div>
          
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <label><?php echo $this->lang->line('Country');?></label>
                <select name="country" class="form-control" required>
                  <option value="">- <?php echo $this->lang->line('Select');?> - </option>
                  <?php 
								foreach($countries as $index=>$value){
									if($member[0]->country == $value->code){
										$select = ' selected';
									}else{
										$select = '';
									}
									echo '<option value="'.$value->code.'" '.$select.'>'.$value->name.'</option>';
								}?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
          	<div class="row">
              <div class="col-sm-6">
                <label><?php echo $this->lang->line('Phone');?></label>
                <input name="phone" class="form-control" value="<?php echo $member[0]->phone; ?>" type="text">
              </div>            
              <div class="col-sm-6">
                <label><?php echo $this->lang->line('Fax');?></label>
                <input name="fax" class="form-control" value="<?php echo $member[0]->fax; ?>" type="text">
              </div>
            </div>
          </div>
          <br>
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
<!-- End container -->
<?php include('tpl.footer.php');?>