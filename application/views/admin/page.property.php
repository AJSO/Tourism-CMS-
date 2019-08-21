<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Setting</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li class="active">Property</li>
            </ol>
          </div>
        </div>
      </div>
    </header>
    <div class="box-typical box-typical-padding">
      <h5 class="with-border">Information</h5>
      <form id="form-property" action="<?php echo base_url();?>admin/property" method="post">
        <?php if($save){ ?>
        <div class="alert alert-success alert-dismissable">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          Property information has been update. </div>
        <?php }?>
        <div class="form-group row">
          <label class="control-label col-sm-3">Name</label>
          <div class="col-sm-9">
            <input type="text" name="property_name" class="form-control" value="<?php echo $property[0]->property_name; ?>" required >
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-sm-3">Address</label>
          <div class="col-sm-9">
            <input type="text" name="property_address" class="form-control" value="<?php echo $property[0]->property_address; ?>" required >
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-sm-3">City</label>
          <div class="col-sm-9">
            <input type="text" name="property_city" class="form-control" value="<?php echo $property[0]->property_city; ?>" required >
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-sm-3">State/Province</label>
          <div class="col-sm-9">
            <input type="text" name="property_state" class="form-control" value="<?php echo $property[0]->property_state; ?>" required >
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-sm-3">Zipcode</label>
          <div class="col-sm-9">
            <input type="text" name="property_zipcode" class="form-control" value="<?php echo $property[0]->property_zipcode; ?>" required >
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-sm-3">Country</label>
          <div class="col-sm-9">
            <select name="property_country" class="form-control">
              <?php foreach($country as $value){
							
							if($value->code == $property[0]->property_country){
								$selected = 'selected';
							}else{
								$selected = '';
							}
							
							?>
              <option value="<?php echo $value->code; ?>" <?php echo $selected; ?>><?php echo $value->name;?></option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-sm-3">Default Language</label>
          <div class="col-sm-9">
            <select name="lang" class="form-control">
              <?php foreach($languages as $i=>$v){
										
										if($v->code == $property[0]->lang){
											$select = 'selected';
										}else{
											$select = '';
										}
										
										?>
              <option value="<?php echo $v->code; ?>" <?php echo $select ;?>><?php echo $v->code.' - '. $v->name; ?></option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-sm-3">Email</label>
          <div class="col-sm-9">
            <input type="text" name="property_email" class="form-control" value="<?php echo $property[0]->property_email; ?>" required >
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-sm-3">Website</label>
          <div class="col-sm-9">
            <input type="text" name="property_website" class="form-control" value="<?php echo $property[0]->property_website; ?>" required >
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-sm-3">Phone</label>
          <div class="col-sm-9">
            <input type="text" name="property_phone" class="form-control" value="<?php echo $property[0]->property_phone; ?>"required >
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-sm-3">Fax</label>
          <div class="col-sm-9">
            <input type="text" name="property_fax" class="form-control" value="<?php echo $property[0]->property_fax; ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-sm-3">Mobile</label>
          <div class="col-sm-9">
            <input type="text" name="property_mobile" class="form-control" value="<?php echo $property[0]->property_mobile; ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-sm-3">Location</label>
          <div class="col-sm-9">
            <input type="text" name="property_location" class="form-control" value="<?php echo $property[0]->property_location; ?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-sm-3">Default Currency</label>
          <div class="col-sm-9">
            <select name="currency" class="form-control">
              <?php 
												foreach($currency as $index=>$value){
													if($property[0]->currency == $value->code){
														$select = ' selected';
													}else{
														$select = '';
													}
													echo '<option value="'.$value->code.'" '.$select.'>'.$value->code.' - '.$value->name.'</option>';
												}
												?>
            </select>
          </div>
        </div>
        <?php 
							
							$social = json_decode($property[0]->social);
							
							foreach($socials as $index=>$value){?>
        <div class="form-group row">
          <label class="control-label col-sm-3"><?php echo $value; ?></label>
          <div class="col-sm-9">
            <input type="text" name="social[<?php echo $index; ?>]" class="form-control" value="<?php if(isset($social->$index)){ echo $social->$index;} ?>">
          </div>
        </div>
        <?php 
							}
							?>
        <div class="form-group row">
        	<div class="col-sm-3">&nbsp;</div>
          <div class="col-sm-9">
          <button class="btn btn-success" type="submit"> Save </button>
          <button class="btn btn-danger" type="reset"> Reset </button>
          <input name="property_id" type="hidden" value="<?php echo $property[0]->property_id;?>">
          <input name="save" type="hidden" value="1">
          </div>
        </div>
      </form>
    </div>
    <!--.box-typical--> 
  </div>
  <!--.container-fluid--> 
</div>
<!--.page-content-->

<?php include('tpl.footer.php');?>