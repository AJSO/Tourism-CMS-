<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<section id="main">
<?php include('page.sidebar.php');?>
<section id="content">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2>Member<small>Membership is officially here, giving you everything you need to create a robust membership experience for your website</small></h2>
      </div>
      <div class="card-body card-padding">
        <?php if($done){?>
        <div class="alert alert-success alert-dismissable">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          Your member has been update. </div>
        <?php }?>
        <div class="col-sm-2">
          <?php
						/* 
							if(isset($member[0]->avatar)){
								echo '<div class="p-20">';
								echo '<img src="'.base_url().$member[0]->avatar.'">';
								echo '</div>';
							}
						*/
					?>
        </div>
        <div class="row">
          <form id="form-member" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="col-sm-5">
              <div class="p-20">
                <div class="form-group">
                  <label class="control-label col-sm-4">Email</label>
                  <div class="col-sm-8">
                    <input type="email" name="email" class="form-control input-md" id="email" value="<?php if(isset($member[0]->email)){ echo $member[0]->email; }?>" required />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4">Password</label>
                  <div class="col-sm-8">
                    <input type="password" name="password" class="form-control input-md" id="password" value="<?php if(isset($member[0]->password)){ echo $member[0]->password; }?>" required />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4">Title</label>
                  <div class="col-sm-8">
                    <select name="title" class="form-control" required>
                      <option value=""> Select </option>
                      <option value="Mr." <?php if(isset($member[0]->title)){ if($member[0]->title == 'Mr.'){ echo ' selected';}} ?>>Mr.</option>
                      <option value="Mrs." <?php if(isset($member[0]->title)){ if($member[0]->title == 'Mrs.'){echo ' selected';}} ?>>Mrs.</option>
                      <option value="Miss" <?php if(isset($member[0]->title)){ if($member[0]->title == 'Miss'){echo ' selected';}} ?>>Miss.</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4">First name</label>
                  <div class="col-sm-8">
                    <input type="text" name="firstname" id="firstname" class="form-control input-md" value="<?php if(isset($member[0]->firstname)){ echo $member[0]->firstname; }?>" required />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4">Middle name</label>
                  <div class="col-sm-8">
                    <input type="text" name="middlename" id="middlename" class="form-control input-md" value="<?php if(isset($member[0]->middlename)){ echo $member[0]->middlename; }?>" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4">Last name</label>
                  <div class="col-sm-8">
                    <input type="text" name="lastname" id="lastname" class="form-control input-md" value="<?php if(isset($member[0]->lastname)){ echo $member[0]->lastname; }?>" required />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4">Nick name</label>
                  <div class="col-sm-8">
                    <input type="text" name="nickname" id="nickname" class="form-control input-md" value="<?php if(isset($member[0]->nickname)){ echo $member[0]->nickname; }?>" required />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4">Address</label>
                  <div class="col-sm-8">
                    <input type="text" name="address" id="address" class="form-control input-md" value="<?php if(isset($member[0]->address)){ echo $member[0]->address; }?>" required />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4">City</label>
                  <div class="col-sm-8">
                    <input type="text" name="city" id="city" class="form-control input-md" value="<?php if(isset($member[0]->city)){ echo $member[0]->city; }?>" required />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4">State/Province</label>
                  <div class="col-sm-8">
                    <input type="text" name="state" id="state" class="form-control input-md" value="<?php if(isset($member[0]->state)){ echo $member[0]->state; }?>" required />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4">Zipcode</label>
                  <div class="col-sm-8">
                    <input type="text" name="zipcode" id="zipcode" class="form-control input-md" value="<?php if(isset($member[0]->zipcode)){ echo $member[0]->zipcode; }?>" required />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4">Country</label>
                  <div class="col-sm-8">
                    <select name="country" class="form-control" required >
                      <option value=""> Select </option>
                      <?php 
									foreach($country as $index=>$value){
										
										if(isset($member[0]->country)){
											if($member[0]->country == $value->code){
												$select = ' selected';
											}else{
												$select = '';
											}
										}else{
											$select = '';
										}
										
										echo '<option value="'.$value->code.'" '.$select.'>'.$value->name.'</option>';
									}
									?>
                    </select>
                  </div>
                </div>
<!--
                <div class="form-group">
                  <label class="control-label col-sm-4">Avatar</label>
                  <div class="col-sm-8">
                    <input type="file" name="avatar">
                  </div>
                </div> -->
                <div class="form-group">
                  <label class="control-label col-sm-4">Status</label>
                  <div class="col-sm-8">
                    <select name="member_status" class="form-control">
                      <option value="0" <?php if(isset($member[0]->member_status)){ if($member[0]->member_status == 1){ echo 'selected'; } }?>>Inactive</option>
                      <option value="1" <?php if(isset($member[0]->member_status)){ if($member[0]->member_status == 1){ echo 'selected'; } }?>>Active</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-8 col-sm-offset-4">
                    <input type="submit" name="save" class="btn btn-primary" value="Save">
                    <input type="hidden" name="member_id" value="<?php if(isset($member[0]->member_id)){ echo $member[0]->member_id; }?>">
                  </div>
                </div>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include('page.footer.php');?>
