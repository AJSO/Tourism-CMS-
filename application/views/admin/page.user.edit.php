<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Users Account</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li><a href="<?php echo base_url();?>admin/users">Users Account</a></li>
              <li class="active">
                <?php if(empty($profile[0]->user_id)){ echo 'Add';}else{ echo 'Edit';}?>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </header>
    <div class="box-typical box-typical-padding">
      <h5 class="with-border">Information</h5>
      <form id="form-profile" class="form-horizontal" action="<?php echo base_url();?>admin/users/edit" method="post" enctype="multipart/form-data">
        <div class="row">
          <?php if($save){ ?>
          <div class="col-md-12">
          <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            Your user has been update. </div>
            </div>
          <?php }?>
          <div class="col-md-4">
            <?php if(empty($profile[0]->user_avatar)){?>
            <img src="<?php echo base_url();?>assets/backend/img/avatar-1-128.png" class="img-responsive" style="width:150px">
            <?php } else{ ?>
            <img src="<?php echo base_url().$profile[0]->user_avatar;?>" class="img-responsive" style="width:150px">
            <?php } ?>
            <br>
            <br>
            <p class="m-t-15">
              <input type="file" name="avatar">
            </p>
          </div>
          <div class="col-md-8">
            <div class="form-group row">
              <label class="col-sm-3 control-label">Email</label>
              <div class="col-sm-9">
                <div class="fg-line">
                  <input type="text" name="email" class="form-control" value="<?php if(isset($profile[0]->email)){ echo $profile[0]->email;} ?>" required >
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 control-label">Password</label>
              <div class="col-sm-9">
                <div class="fg-line">
                  <input type="password" name="password" class="form-control" value="<?php if(isset($profile[0]->password)){ echo $profile[0]->password;} ?>">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 control-label">First Name</label>
              <div class="col-sm-9">
                <div class="fg-line">
                  <input type="text" name="user_firstname" class="form-control" value="<?php if(isset($profile[0]->user_firstname)){ echo $profile[0]->user_firstname;} ?>" required >
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 control-label">Last Name</label>
              <div class="col-sm-9">
                <div class="fg-line">
                  <input type="text" name="user_lastname" class="form-control" value="<?php if(isset($profile[0]->user_lastname)){ echo $profile[0]->user_lastname;} ?>" required >
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 control-label">Nickname</label>
              <div class="col-sm-9">
                <div class="fg-line">
                  <input type="text" name="user_nickname" class="form-control" value="<?php if(isset($profile[0]->user_nickname)){ echo $profile[0]->user_nickname;} ?>" required >
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 control-label">Phone</label>
              <div class="col-sm-9">
                <div class="fg-line">
                  <input type="text" name="user_phone" class="form-control" value="<?php if(isset($profile[0]->user_phone)){ echo $profile[0]->user_phone;} ?>" required >
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 control-label">Location</label>
              <div class="col-sm-9">
                <div class="fg-line">
                  <input type="text" name="user_location" class="form-control" value="<?php if(isset($profile[0]->user_location)){ echo $profile[0]->user_location;} ?>" required >
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 control-label">About You</label>
              <div class="col-sm-9">
                <div class="fg-line">
                  <textarea name="user_intro" class="form-control" style="height: 100px"><?php if(isset($profile[0]->user_intro)){ echo $profile[0]->user_intro; }?>
</textarea>
                </div>
              </div>
            </div>
            <?php 
									if(isset($profile[0]->user_social)){
										$data = json_decode($profile[0]->user_social);
									}
									foreach($socials as $index=>$value){?>
            <div class="form-group row">
              <label class="col-sm-3 control-label"><?php echo $value; ?></label>
              <div class="col-sm-9">
                <div class="fg-line">
                  <input type="text" name="socials[<?php echo $index;?>]" class="form-control" value="<?php if(isset($data->$index)){ echo $data->$index; } ?>">
                </div>
              </div>
            </div>
            <?php } ?>
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
                <select name="user_active" class="form-control">
                  <option value="0" <?php if(isset($profile[0]->user_active)){ if($profile[0]->user_active == 0){ echo ' selected'; } } ?>>Inactive</option>
                  <option value="1" <?php if(isset($profile[0]->user_active)){ if($profile[0]->user_active == 1){ echo ' selected'; } }?>>Active</option>
                </select>
              </div>
            </div>
              <div class="form-group row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                  <input class="btn btn-success" type="submit" name="save" value="Save">
                  <input class="btn btn-danger" type="reset" value="Reset">
                  <input name="user_id" type="hidden" value="<?php if(isset($profile[0]->user_id)){ echo $profile[0]->user_id; }?>">
                </div>
              </div>
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