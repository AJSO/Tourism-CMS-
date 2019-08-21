<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Cars</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li><a href="<?php echo base_url();?>admin/transfer/car">Cars</a></li>
              <li class="active">
                <?php if(empty($car[0]->car_id)){ echo 'Add';}else{ echo 'Edit';}?>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </header>
    <div class="box-typical box-typical-padding">
      <h5 class="with-border">Information</h5>
      <form method="post" id="form-content" class="form-horizontal" enctype="multipart/form-data">
        <?php if($save){ ?>
        <div class="alert alert-success alert-dismissable ">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          Your car has been update. </div>
        <?php }?>
        <?php if($delete == 1){ ?>
        <div class="alert alert-danger alert-dismissable ">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          Your car has been delete. </div>
        <?php }?>
        <div class="form-group row">
          <label class="col-sm-4 control-label">Brand</label>
          <div class="col-sm-8">
            <select class="form-control" name="car_brand" required>
              <option value="">- Select -</option>
              <?php 
							
							foreach($brands as $index=>$value){
								if(isset($car[0]->car_brand)){
									if($car[0]->car_brand == $value){
										$select = 'selected';
									}else{
										$select = '';
									}
								}else{
									$select = '';
								}
								
								?>
              <option value="<?php echo $value;?>" <?php echo $select; ?>><?php echo $value; ?></option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 control-label">Model</label>
          <div class="col-sm-8">
            <input type="text" name="car_model" class="form-control" value="<?php if(isset($car[0]->car_model)){ echo $car[0]->car_model; }?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 control-label">Year</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="car_year" value="<?php if(isset($car[0]->car_year)){ echo $car[0]->car_year; }?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 control-label">Transmission</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="car_transmission" value="<?php if(isset($car[0]->car_transmission)){ echo $car[0]->car_transmission; }?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 control-label">Car Passenger Capacity</label>
          <div class="col-sm-8">
            <select class="form-control" name="car_passenger_capacity" required>
              <option value=""> - Select -</option>
              <?php 
							$i = 1;
							while($i <= 12){
								if(isset($car[0]->car_passenger_capacity)){
									if($car[0]->car_passenger_capacity == $i){
										$select = ' selected';
									}else{
										$select = '';
									}
								}else{
									$select = '';
								}
								echo '<option value="'.$i.'"'.$select.'>'.$i.'</option>';
								$i++;
							}?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 control-label">Large Luggage Capacity</label>
          <div class="col-sm-8">
            <select name="car_luggage_large_capacity" class="form-control" required>
              <?php 
							$i = 1;
							while($i <= 12){
								if(isset($car[0]->car_luggage_large_capacity)){
									if($car[0]->car_luggage_large_capacity == $i){
										$select = ' selected';
									}else{
										$select = '';
									}
								}else{
									$select = '';
								}
								echo '<option value="'.$i.'"'.$select.'>'.$i.'</option>';
								$i++;
							}?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 control-label">Small Luggage Capacity</label>
          <div class="col-sm-8">
            <select name="car_luggage_small_capacity" class="form-control" required>
              <?php 
							$i = 1;
							while($i <= 12){
								if(isset($car[0]->car_luggage_small_capacity)){
									if($car[0]->car_luggage_small_capacity == $i){
										$select = ' selected';
									}else{
										$select = '';
									}
								}else{
									$select = '';
								}
								echo '<option value="'.$i.'"'.$select.'>'.$i.'</option>';
								$i++;
							}?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 control-label">Car Entertainment</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="car_entertainment" required value="<?php if(isset($car[0]->car_entertainment)){ echo $car[0]->car_entertainment; }?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 control-label">Photo</label>
          <div class="col-sm-8">
            <input type="file" name="image" <?php if(empty($car[0]->car_id)){ echo ' required';}?>>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-4">&nbsp;</div>
          <div class="col-sm-8">
            <input name="save" class="btn btn-success" type="submit" value="Save">
            <input name="delete" class="btn btn-danger btn-delete" type="submit" <?php if(empty($car[0]->car_id)){ echo 'disabled'; }?> value="Delete" onClick="return confirm('Delete car')">
            <input type="hidden" name="car_id" value="<?php if(isset($car[0]->car_id)){ echo $car[0]->car_id;}?>">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
$('#form-content').validate();
</script>
<?php include('tpl.footer.php');?>