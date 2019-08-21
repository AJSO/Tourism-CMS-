<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Profile</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li class="active">Profile</li>
            </ol>
          </div>
        </div>
      </div>
    </header>
    <div class="box-typical box-typical-padding">
      <h5 class="with-border">Information</h5>
      <form id="form-profile" class="form-horizontal" action="<?php echo base_url();?>admin/profile" method="post" enctype="multipart/form-data">
        <?php if($save){ ?>
        <div class="alert alert-success alert-dismissable">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          Your profile has been update. </div>
        <?php }?>
        <div class="row">
        <div class="col-md-4">
          <?php if(empty($profile[0]->user_avatar)){?>
          <img src="<?php echo base_url();?>assets/backend/img/avatar-1-128.png" class="img-responsive img-rounded" style="width:150px">
          <?php } else{ ?>
          <img src="<?php echo base_url().$profile[0]->user_avatar;?>" class="img-responsive img-rounded" style="width:150px">
          <?php } ?>
          <p class="m-t-1">
            <input type="file" name="avatar">
          </p>
        </div>
        <div class="col-md-8">
          <div class="form-group row">
            <label class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
              <input type="text" name="email" class="form-control" value="<?php echo $profile[0]->email; ?>" required >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label">Password</label>
            <div class="col-sm-9">
              <input type="password" name="password" class="form-control" value="<?php echo $profile[0]->password; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label">First Name</label>
            <div class="col-sm-9">
              <input type="text" name="user_firstname" class="form-control" value="<?php echo $profile[0]->user_firstname; ?>" required >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label">Last Name</label>
            <div class="col-sm-9">
              <input type="text" name="user_lastname" class="form-control" value="<?php echo $profile[0]->user_lastname; ?>" required >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label">Nickname</label>
            <div class="col-sm-9">
              <input type="text" name="user_nickname" class="form-control" value="<?php echo $profile[0]->user_nickname; ?>" required >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label">Phone</label>
            <div class="col-sm-9">
              <input type="text" name="user_phone" class="form-control" value="<?php echo $profile[0]->user_phone; ?>" required >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label">Location</label>
            <div class="col-sm-9">
              <input type="text" name="user_location" class="form-control" value="<?php echo $profile[0]->user_location; ?>" required >
            </div>
          </div>
          <?php 
									
									$data = json_decode($profile[0]->user_social);
									
									foreach($socials as $index=>$value){?>
          <div class="form-group row">
            <label class="col-sm-3 control-label"><?php echo $value; ?></label>
            <div class="col-sm-9">
              <input type="text" name="socials[<?php echo $index;?>]" class="form-control" value="<?php if(isset($data->$index)){ echo $data->$index; } ?>">
            </div>
          </div>
          <?php } ?>
          <div class="form-group row">
            <label class="col-sm-3 control-label">About You</label>
            <div class="col-sm-9">
              <textarea name="user_intro" class="form-control"  style="height: 100px"><?php echo $profile[0]->user_intro; ?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label">Type</label>
            <div class="col-sm-9">
              <select name="user_type" class="form-control">
                <option <?php if(isset($profile[0]->user_type)){ if($profile[0]->user_type == 'admin'){ echo ' selected';}} ?> value="admin">Admin</option>
                <option <?php if(isset($profile[0]->user_type)){ if($profile[0]->user_type == 'author'){ echo ' selected';}} ?> value="author">Author</option>
                <option <?php if(isset($profile[0]->user_type)){ if($profile[0]->user_type == 'translator'){ echo ' selected';}} ?> value="translator">Translator</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label">Status</label>
            <div class="col-sm-9">
              <select name="user_active" class="form-control" >
                <option value="0" <?php if(isset($profile[0]->user_active)){ if($profile[0]->user_active == 0){ echo ' selected'; } } ?>>Inactive</option>
                <option value="1" <?php if(isset($profile[0]->user_active)){ if($profile[0]->user_active == 1){ echo ' selected'; } }?>>Active</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-3"></div>
            <div class=" col-sm-9">
              <input class="btn btn-success text-uppercase" name="save" type="submit" value="Save">
              <input class="btn btn-danger text-uppercase" name="reset" type="reset" value="Reset">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--.box-typical--> 
</div>
<!--.container-fluid-->
</div>
<!--.page-content-->

<?php include('tpl.footer.php');?>