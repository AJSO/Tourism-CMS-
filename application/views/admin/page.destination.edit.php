<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Destinations</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li><a href="<?php echo base_url();?>admin/destination">Destinations</a></li>
              <li class="active">
                <?php if(empty($destination[0]->destination_id)){ echo 'Add';}else{ echo 'Edit';}?>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </header>
    <div class="box-typical box-typical-padding">
      <h5 class="with-border">Information</h5>
      <form method="post" class="form-horizontal">
        <?php if($save){ ?>
        <div class="alert alert-success alert-dismissable ">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          Your destination has been update. </div>
        <?php }?>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Slug</label>
          <div class="col-sm-9">
            <input type="text" name="destination_slug" class="form-control" required value="<?php if(isset($destination[0]->destination_slug)){ echo $destination[0]->destination_slug;}?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">IATA Code</label>
          <div class="col-sm-9">
            <input type="text" name="destination_code" class="form-control" value="<?php if(isset($destination[0]->destination_code)){ echo $destination[0]->destination_code;}?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
            <input type="text" name="destination_name" class="form-control" value="<?php if(isset($destination[0]->destination_name)){ echo $destination[0]->destination_name;}?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Country</label>
          <div class="col-sm-9">
            <select name="destination_country" class="form-control" required>
              <option value="">Select</option>
              <?php 
								$select = '';
								foreach($country as $index=>$value){
									if(isset($destination[0]->destination_country)){
										if($destination[0]->destination_country == $value->code){
											$select = ' selected';
										}else{
											$select = '';
										}
									}
									echo '<option value="'.$value->code.'" '.$select.'>'.$value->name.'</option>';
								}
								?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Description</label>
          <div class="col-sm-9">
            <textarea name="destination_description" class="form-control html-editor"><?php 
													if(isset($destination[0]->destination_description)){ 
														echo $destination[0]->destination_description; 
													}
													?>
</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Overview</label>
          <div class="col-sm-9">
            <textarea name="destination_overview" class="form-control html-editor"><?php
													if(isset($destination[0]->destination_overview)){ 
														echo $destination[0]->destination_overview; 
													}                          
													?>
</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Guide</label>
          <div class="col-sm-9">
            <textarea name="destination_guide" class="form-control html-editor"><?php
													if(isset($destination[0]->destination_guide)){ 
														echo $destination[0]->destination_guide; 
													}                          
                          ?>
</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Geo location</label>
          <div class="col-sm-9">
            <input type="text" name="destination_geolocation" class="form-control" value="<?php if(isset($destination[0]->destination_geolocation)){ echo $destination[0]->destination_geolocation;}?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Zoom</label>
          <div class="col-sm-9">
            <?php 
										$i = 0;
										$select = '';
										echo '<select name="destination_geolocation_zoom" class="form-control">';
										while($i <= 20){
											if(isset($destination[0]->destination_geolocation_zoom)){
												if($i == $destination[0]->destination_geolocation_zoom){
													$select = ' selected';
												}else{
													$select = '';
												}
											}
											echo '<option value="'.$i.'"'.$select.'>'.$i.'</option>';
											$i++;
										}
										echo '</select>';
										?>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Status</label>
          <div class="col-sm-9">
            <select name="destination_status" class="form-control">
              <option value="0" <?php if(isset($destination[0]->destination_status)){ if($destination[0]->destination_status == 0){ echo ' selected';} }?>>Pending</option>
              <option value="1"<?php if(isset($destination[0]->destination_status)){ if($destination[0]->destination_status == 1){ echo ' selected';} }?>>Publish</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-3"> </div>
          <div class="col-sm-3 col-sm-9">
            <input type="submit" class="btn btn-success" name="save" value="Save">
            <input type="submit" class="btn btn-danger" name="delete" value="Delete" onClick="return confirm('Delete destination')">
            <input type="hidden" name="destination_id" value="<?php if(isset($destination[0]->destination_id)){ echo $destination[0]->destination_id;} ?>">
          </div>
        </div>
      </form>
    </div>
    <div class="box-typical box-typical-padding">
      <h5 class="with-border">Picture</h5>
      <div class="row">
        <div class="col-sm-3">
          <?php 
							if(isset($destination[0]->thumbnail)){
								echo '<img src="'.base_url().'admin/thumbnail/'.$destination[0]->thumbnail.'">';
							}
							?>
        </div>
        <div class="col-sm-9">
          <form enctype="multipart/form-data" method="post" class="form-inline">
            <div class="form-group row">
              <input type="file" name="image">
            </div>
            <div class="form-group row">
              <input name="upload" class="btn btn-success" type="submit" value="Upload">
              <input type="hidden" name="destination_id" value="<?php if(isset($destination[0]->destination_id)){ echo $destination[0]->destination_id;}?>">
            </div>
          </form>
        </div>
      </div>
    </div>
<?php
      if(count($periods)){
?>
    <section class="box-typical">
      <div class="table-responsive">
        <div class="bootstrap-table">
          <div class="fixed-table-toolbar">
            <div class="bars pull-left">
              <div id="toolbar"> <strong>Periods</strong> </div>
            </div>
            <div class="pull-right search"> </div>
          </div>
          <?php
        echo '<table class="table">';
				echo '<thead>';
				echo '<tr>';
				echo '<th>Season Name</th>';
				echo '<th>Period</th>';
				echo '<th></th>';
				echo '</thead>';
				echo '<tbody>';
				echo '</tr>';
        foreach($periods as $value){
            
          $url = base_url().'admin/destination/edit';
          $url .= '?destination_id='.$destination[0]->destination_id.'&period_id='.$value->period_id;
          
          echo '<tr>';
          echo '<td>'.$value->period_name.'</td>';
          echo '<td>';
          echo date('d M', mktime(0,0,0,$value->mm1, $value->dd1, date('Y')));
          echo ' - ';
          echo date('d M', mktime(0,0,0,$value->mm2, $value->dd2, date('Y')));
          echo ' ';
          echo '</td>';
          echo '<td class="text-right">';
          echo '<a href="'.$url.'" class="btn btn-primary">Edit</a>';
          echo '</td>';
          echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
      ?>
        </div>
      </div>
    </section>
<?php
			}
?>    
  </div>
</div>
<?php include('tpl.footer.php');?>