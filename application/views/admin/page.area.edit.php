<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Areas</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li><a href="<?php echo base_url();?>admin/area<?php if(isset($area[0]->destination_id)){ echo '?destination_id='.$area[0]->destination_id; }?>">Areas</a></li>
              <li class="active">
                <?php if(empty($area[0]->area_id)){ echo 'Add';}else{ echo 'Edit';}?>
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
          Your area has been update. </div>
        <?php }?>
        <?php if($delete == 1){ ?>
        <div class="alert alert-danger alert-dismissable ">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          Your area has been delete. </div>
        <?php }?>
        
        <div class="form-group row">
          <label class="col-sm-3 control-label">Destination</label>
          <div class="col-sm-9">
            <select name="destination_id" class="form-control" required>
            	<option value=""> - Select - </option>
            	<?php 
							foreach($destination as $index=>$value){
								if(isset($area[0]->destination_id)){
									if($area[0]->destination_id == $value->destination_id){
										$select = ' selected';
									}else{
										$select = ' ';
									}
								}else{
									$select = '';
								}
								?>
            	<option value="<?php echo $value->destination_id; ?>" <?php echo $select;?>><?php echo $value->destination_name;?></option>
              <?php }?>
            </select>
          </div>
        
        </div>
        
        <div class="form-group row">
          <label class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
            <input type="text" name="area_name" class="form-control" value="<?php if(isset($area[0]->area_name)){ echo $area[0]->area_name;}?>" required>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-3"></div>
          <div class="col-md-9">
            <input name="save" class="btn btn-success" type="submit" value="Save">
            <input name="delete" class="btn btn-danger" type="submit" value="Delete" onClick="return confirm('Delete area')" <?php if(empty($area[0]->area_id)){ echo 'disabled';}?>>
            <input type="hidden" name="area_id" value="<?php if(isset($area[0]->area_id)){ echo $area[0]->area_id;} ?>">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include('tpl.footer.php');?>