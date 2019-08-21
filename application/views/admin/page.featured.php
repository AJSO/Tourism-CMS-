<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Featured</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li class="active">Featured</li>
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
          Your featured has been update. </div>
        <?php }?>
        <div class="form-group row">
          <label class="col-sm-4 control-label">Destination</label>
          <div class="col-sm-8">
          	<select name="destination_id" class="form-control">
              <?php 
							foreach($destination as $index=>$value){
								
								if($value->destination_id == $destination_id){
									$select = 'selected';
								}else{
									$select = '';
								}
								
								?>
              <option value="<?php echo $value->destination_id;?>" <?php echo $select;?>><?php echo $value->destination_name;?></option>
              <?php 
							}
							?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-4">Tours</div>
          <div class="col-sm-8">
          <select name="tours[]" id="tours" class="form-control" multiple>
          	<?php 
						foreach($tour as $index=>$value){
							if(in_array($value->tour_id, $featured)){
								$select = ' selected';
							}else{
								$select = '';
							}
							echo '<option value="'.$value->tour_id.'"'.$select.'>'.$value->tour_name.'</option>';
						}
						?>
          </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-4">&nbsp;</div>
          <div class="col-sm-8">
            <input name="save" class="btn btn-success" type="submit" value="Save">
            <input name="delete" class="btn btn-warning btn-delete" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
$('select[name=destination_id]').change(function(){
	window.location.href = '<?php echo base_url();?>admin/featured?destination_id=' + this.value;
});
</script>
<?php include('tpl.footer.php');?>