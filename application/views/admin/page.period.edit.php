<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
      <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Periods</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li><a href="<?php echo base_url();?>admin/period<?php if(isset($period[0]->destination_id)){echo '?destination_id='.$period[0]->destination_id;}?>">Periods</a></li>
              <li class="active">
                <?php if(empty($period[0]->period_id)){ echo 'Add';}else{ echo 'Edit';}?>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </header>
    <div class="box-typical box-typical-padding">
      <h5 class="with-border">Information</h5>
      <form enctype="multipart/form-data" method="post">
        <div class="form-group row">
          <label class="col-sm-3 control-label">Season Name</label>
          <div class="col-sm-9">
            <input name="period_name" class="form-control" value="<?php if(isset($period[0]->period_name)){ echo $period[0]->period_name; }?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Destination</label>
          <div class="col-sm-9">
          	<select class="form-control" name="destination_id">
            	<option value=""> - Select - </option>
            	<?php 
							foreach($destination as $index=>$value){
								if(isset($peroid[0]->destination_id)){
									if($value->destination_id == $peroid[0]->destination_id){
										$select = 'selected';
									}else{
										$select = '';
									}
								}else{
									$select = '';
								}
								?>
            	<option value="<?php $value->destination_id; ?>" <?php echo $select;?>><?php echo $value->destination_name;?></option>
              <?php 
							}
							?>
            </select>
          </div>
				</div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Period Start</label>
          <div class="col-sm-3">
            <div class="row">
              <div class="col-md-6">
                <select name="dd1" class="form-control" required>
                  <option value="">Select</option>
                  <?php 
										$n = 1;
										while($n <= 31){
											if(isset($period[0]->dd1)){																					
												if($n == $period[0]->dd1){
													$select = 'selected';
												}else{
													$select = '';
												}
											}											
										?>
                  <option value="<?php echo $n; ?>"<?php echo $select;?>><?php echo $n; ?></option>
                  <?php 
											$n++;
										}?>
                </select>
              </div>
              <div class="col-md-6">
                <select name="mm1" class="form-control" required>
                  <option value="">Select</option>
                  <?php 
										$n = 1;
										while($n <= 12){
											if(isset($period[0]->mm1)){																					
												if($n == $period[0]->mm1){
													$select = 'selected';
												}else{
													$select = '';
												}
											}											
										?>
                  <option value="<?php echo $n; ?>" <?php echo $select;?>><?php echo date('M',mktime(0,0,0,$n,1,date('Y'))); ?></option>
                  <?php 
											$n++;
										}?>
                </select>
              </div>
            </div>
          </div>
          <label class="col-sm-3 control-label">Period End</label>
          <div class="col-sm-3">
            <div class="row">
              <div class="col-md-6">
                <select name="dd2" class="form-control" required>
                  <option value="">Select</option>
                  <?php 
										$n = 1;
										while($n <= 31){
											if(isset($period[0]->dd2)){
												if($period[0]->dd2 == $n){
													$select = ' selected';
												}else{
													$select = '';
												}
											}
											?>
                  <option value="<?php echo $n; ?>" <?php echo $select; ?>><?php echo $n; ?></option>
                  <?php 
										$n++;
									}
									?>
                </select>
              </div>
              <div class="col-md-6">
                <select name="mm2" class="form-control" required>
                  <option value="">Select</option>
                  <?php 
										$n = 1;
										while($n <= 12){
											if(isset($period[0]->mm2)){
												if($period[0]->mm2 == $n){
													$select = ' selected';
												}else{
													$select = '';
												}
											}
															
															?>
                  <option value="<?php echo $n; ?>" <?php echo $select; ?>><?php echo date('M',mktime(0,0,0,$n,1,date('Y'))); ?></option>
                  <?php 
											$n++;
										}?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3"></div>
          <div class="col-md-9">
            <input name="save_period" class="btn btn-success" type="submit" value="Save">
            <input name="delete_period" class="btn btn-danger" type="submit" value="Delete" onClick="return confirm('Delete period')" <?php if(empty($period[0]->period_id)){ echo 'disabled';}?>>
            <input name="period_id" type="hidden" value="<?php if(isset($period[0]->period_id)){ echo $period[0]->period_id;} ?>">
            <input type="hidden" name="destination_id" value="<?php if(isset($destination[0]->destination_id)){ echo $destination[0]->destination_id;} ?>">
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