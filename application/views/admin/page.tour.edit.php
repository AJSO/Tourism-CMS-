<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Tours</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li><a href="<?php echo base_url();?>admin/tour">Tours</a></li>
              <li class="active"> Edit </li>
            </ol>
          </div>
        </div>
      </div>
    </header>
    <div class="box-typical box-typical-padding">
      <h5 class="with-border">Information</h5>
      <form id="form-info" method="post" enctype="multipart/form-data" class="form-horizontal">
        <?php if($save){ ?>
        <div class="alert alert-success alert-dismissable ">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          Your tour has been update. </div>
        <?php }?>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Type</label>
          <div class="col-sm-9">
            <select name="type" class="form-control" required>
              <option value="">- Select - </option>
              <?php
	foreach($type as $index=>$value){
		if(isset($tour[0]->type)){
			if($value == $tour[0]->type){ 
				$select = ' selected';
			}else{
				$select = ''; 
			}
		}else{
			$select = '';
		}
		echo '<option value="'.$value.'" '.$select.'>'.$value.'</option>';
	}
?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Destination</label>
          <div class="col-sm-9">
            <select name="destination_id" class="form-control">
              <option value=""> - Select - </option>
              <?php 
												
												foreach($destination as $index=>$value){
													if($value->destination_id == $tour[0]->destination_id){
														$select = ' selected';
													}else{
														$select = '';
													}
													?>
              <option value="<?php echo $value->destination_id; ?>"<?php echo $select; ?>> <?php echo $value->destination_name.', '.$value->destination_country; ?></option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Category </label>
          <div class="col-sm-9">
            <select name="category" class="form-control" required>
              <option value=""> - Select - </option>
              <option value="inbound"<?php if($tour[0]->category == 'inbound'){ echo ' selected';}?>>Inbound</option>
              <option value="outbound"<?php if($tour[0]->category == 'outbound'){ echo ' selected';}?>>Outbound</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Code</label>
          <div class="col-sm-3">
            <input type="text" name="tour_code" class="form-control" value="<?php if(isset($tour[0]->tour_code)){ echo $tour[0]->tour_code;} ?>" required>
          </div>
          <label class="col-sm-3 control-label">Name</label>
          <div class="col-sm-3">
            <input type="text" name="tour_name" class="form-control" value="<?php if(isset($tour[0]->tour_name)){ echo $tour[0]->tour_name;} ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Rating</label>
          <div class="col-sm-3">
            <select name="tour_rating" class="form-control" required>
              <option value="">Select</option>
              <?php 
										$i = 1;
										$select = '';
										while($i <= 5){
											if($tour[0]->tour_rating){
												if($i == $tour[0]->tour_rating){
													$select = 'selected';
												}else{
													$select = '';
												}
											}
											echo '<option value="'.$i.'" '.$select.'>'.$i.'</option>';
											$i++;
										}
										?>
            </select>
          </div>
          <label class="col-sm-3 control-label">Currency</label>
          <div class="col-sm-3">
            <select name="tour_currency" class="form-control">
              <?php 
											foreach($currency as $index=>$value){
												if($tour[0]->tour_currency){
													if($value->code == $tour[0]->tour_currency){
														$select = ' selected';
													}else{
														$select = '';
													}
												}else{
													if($value->code == $property[0]->currency){
														$select = ' selected';
													}else{
														$select = '';
													}
												}
												echo '<option value="'.$value->code.'"'.$select.'>'.$value->code . ' - '.$value->name.'</option>'; 	
											}
											?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Description</label>
          <div class="col-sm-9">
            <textarea name="tour_description" class="form-control html-editor" type="text"><?php if(isset($tour[0]->tour_description)){ echo $tour[0]->tour_description;} ?>
</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Overview</label>
          <div class="col-sm-9">
            <textarea name="tour_overview" class="form-control html-editor" rows="5" ><?php if(isset($tour[0]->tour_overview)){ echo $tour[0]->tour_overview;} ?>
</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">What's include</label>
          <div class="col-sm-9">
            <textarea name="tour_inclusion" class="form-control html-editor" rows="5" ><?php if(isset($tour[0]->tour_inclusion)){ echo $tour[0]->tour_inclusion;} ?>
</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Schedule</label>
          <div class="col-sm-9">
            <textarea name="tour_specifications" class="form-control html-editor" rows="5" ><?php if(isset($tour[0]->tour_specifications)){ echo $tour[0]->tour_specifications;} ?>
</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Rate Adult</label>
          <div class="col-sm-3">
            <input type="text" name="tour_price" class="form-control" value="<?php if(isset($tour[0]->tour_price)){ echo $tour[0]->tour_price;}?>">
          </div>
          <label class="col-sm-3 control-label">Cross Rate</label>
          <div class="col-sm-3">
            <input type="text" name="tour_price_cross" class="form-control" value="<?php if(isset($tour[0]->tour_price_cross)){ echo $tour[0]->tour_price_cross;}?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Rate Child</label>
          <div class="col-sm-3">
            <input type="text" name="tour_price_child" class="form-control" value="<?php if(isset($tour[0]->tour_price_child)){ echo $tour[0]->tour_price_child;}?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Terms &amp; Conditions</label>
          <div class="col-sm-3">
            <select name="term_id" class="form-control">
              <?php 
												foreach($term as $index=>$value){
													if($value->term_id == $tour[0]->term_id){
														$select = ' selected';
													}else{
														$select = '';
													}
													echo '<option value="'.$value->term_id.'"'.$select.'>'.$value->term_title.'</option>';
												}?>
            </select>
          </div>
          <label class="col-sm-3 control-label">Booking in advance</label>
          <div class="col-sm-3">
            <select name="tour_cutof" class="form-control">
              <?php 
                      $n = 0;
                      while($n <= 60){
												if($n == $tour[0]->tour_cutof){
													$select = ' selected';
												}else{
													$select = '';
												}
                        echo '<option value="'.$n.'"'.$select.'>'.$n.'</option>';
                        $n++;
                      }
                      ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Status</label>
          <div class="col-sm-3">
            <select name="tour_status" class="form-control" required>
              <option value="">Select</option>
              <option value="1"<?php if(isset($tour[0]->tour_status)){ if($tour[0]->tour_status == 1){echo 'selected';}}?>>Publish</option>
              <option value="0"<?php if(isset($tour[0]->tour_status)){ if($tour[0]->tour_status == '0'){echo 'selected';}}?>>Pending</option>
            </select>
          </div>
          <label class="col-sm-3 control-label">Rate ratelated with period</label>
          <div class="col-sm-3">
            <select name="tour_period" class="form-control" required>
              <option value="">Select</option>
              <option value="0"<?php if(isset($tour[0]->tour_period)){ if($tour[0]->tour_period == '0'){echo 'selected';}}?>>No</option>
              <option value="1"<?php if(isset($tour[0]->tour_period)){ if($tour[0]->tour_period == '1'){echo 'selected';}}?>>Yes</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-3"></div>
          <div class="col-sm-9">
            <input type="submit" name="save" class="btn btn-success" value="Save">
            <input type="submit" name="delete" class="btn btn-danger" value="Delete">
            <input type="hidden" name="tour_id" value="<?php if(isset($tour[0]->tour_id)){ echo $tour[0]->tour_id; }?>">
          </div>
        </div>
      </form>
    </div>
    <div class="box-typical box-typical-padding">
      <h5 class="with-border">Photo</h5>
      <form method="post" enctype="multipart/form-data" class="form-horizontal">
        <?php
							if(isset($tour[0]->thumbnail)){
              	$rs = $this->Upload->get_id($tour[0]->thumbnail);
								if(isset($rs[0]->filepath)){
									echo '<img id="thumbnail" src="'.base_url().$rs[0]->filepath.'" style="max-width: 218px; max-height:218px" class="img-responsive m-b-30">';
								}
							}else{
								echo '<img id="thumbnail" src="'.base_url().'assets/backend/img/upload.png" style="max-width: 218px; max-height:218px" class="img-responsive">';							
							}
							?>
        <br>
        <br>
        <div class="form-group row">
          <div class="col-sm-12">
            <input type="file" name="image">
          </div>
        </div>
        <button type="submit" class="btn btn-success">Upload</button>
        <input type="hidden" name="tour_id" value="<?php echo $tour[0]->tour_id; ?>">
        <input type="hidden" name="thumbnail" value="<?php echo $tour[0]->thumbnail; ?>">
        <input type="hidden" name="updatethumb" value="1">
      </form>
    </div>
    <?php if($tour[0]->tour_period == 1){?>
    <div class="box-typical box-typical-padding">
      <form method="post" id="form-rate">
        <?php 
								echo '<div class="from-group">';
								echo '<table class="table" style="border:none;">';
								echo '<tr>';
								echo '<th style="width:150px;border:none;">Period Name</th>';
								echo '<th style="width:150px;border:none;">Period Start</th>';
								echo '<th style="width:150px;border:none;">Period End</th>';
								echo '<th style="border:none;">Per Adult</th>';
								echo '<th style="border:none;">Per Child</th>';
								echo '</tr>';
								foreach($period as $ii=>$vv){
									echo '<tr>';
									if(
									mktime(0,0,0,$vv->mm1,$vv->dd1, date('Y')) <= mktime(0,0,0,date('m'),date('d'), date('Y')) &&
									mktime(0,0,0,$vv->mm2,$vv->dd2, date('Y')) <= mktime(0,0,0,date('m'),date('d'), date('Y'))
									){
										$yy1 = date('Y')+1;
										$yy2 = date('Y')+1;
										$next_year = true;
									}else{
										
										if($vv->mm1 > $vv->mm2){
											$yy1 = date('Y');
											$yy2 = date('Y')+1;
										}else{
											$yy1 = date('Y');
											$yy2 = date('Y');
										}
									}
									
									if(isset($rate[$vv->period_id]->adult)){
										$rate_value_1 = $rate[$vv->period_id]->adult;
									}else{
										$rate_value_1 = '';
									}

									if(isset($rate[$vv->period_id]->child)){
										$rate_value_2 = $rate[$vv->period_id]->child;
									}else{
										$rate_value_2 = '';
									}
									
									
									if(isset($rate[$vv->period_id]->rate_id)){
										$rate_id = $rate[$vv->period_id]->rate_id;
									}else{
										$rate_id = '';
									}
									
									echo '<td>'.$vv->period_name.'</td>';
									echo '<td>'.date('d M Y',mktime(0,0,0,$vv->mm1,$vv->dd1,$yy1)).'</td>';
									echo '<td>'.date('d M Y',mktime(0,0,0,$vv->mm2,$vv->dd2,$yy2)).'</td>';
									echo '<td><input type="text" name="adult[]" class="form-control" value="'.$rate_value_1.'" required></td>';
									echo '<td>';
									echo '<input type="text" name="child[]" class="form-control" value="'.$rate_value_2.'" required>';
									echo '<input type="hidden" name="rate_id_arr[]" value="'.$rate_id.'">';
									echo '<input type="hidden" name="period_id[]" value="'.$vv->period_id.'">';
									echo '</td>';
									echo '</tr>';
								}
								echo '</table>';
								echo '</div>';
								echo '<div class="from-group">';	
								echo '<input type="submit" name="save_rate" class="btn btn-success" value="Save">';
								echo '<input type="hidden" name="tour_id" value="'.$tour[0]->tour_id.'">';
								echo '</div>';
								
							?>
      </form>
    </div>
    <?php }?>
  </div>
</div>
<script>
$('#form-info').validate();
$('#form-rate').validate();
</script>
<?php include('tpl.footer.php');?>