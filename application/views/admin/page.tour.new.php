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
              <li><a href="<?php echo base_url();?>admin/tours">Tours</a></li>
              <li class="active">
              Add
              </li>
            </ol>
          </div>
        </div>
      </div>
    </header>
    <div class="box-typical box-typical-padding">
      <h5 class="with-border">Information</h5>
      <form method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="row">
          <div class="col-md-4"> <img id="thumbnail" src="<?php echo base_url();?>assets/backend/img/upload.png" alt="Upload image" style="max-width: 218px; max-height:218px" class="img-responsive" /> <br>
            <br>
            <input type="file" name="image" id="image" required>
            <br>
            <br>
            <div class="alert alert-info">
              <ul >
                <li style="font-size:12px">The image file size is preferred: 436x436.</li>
                <li style="font-size:12px">Images must be smaller than 200kb (JPG only).</li>
                <li style="font-size:12px">File names must be in English and numbers.</li>
              </ul>
            </div>
            <br>
          </div>
          <div class="col-md-8">
            <div class="form-group row">
              <label class="col-sm-4 control-label">Type</label>
              <div class="col-sm-8">
                <select name="type" class="form-control" required>
                  <option value="">- Select - </option>
                  <?php
	foreach($type as $index=>$value){
		echo '<option value="'.$value.'">'.$value.'</option>';
	}
?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 control-label">Category </label>
              <div class="col-sm-8">
                <select name="category" class="form-control" required>
                  <option value=""> - Select - </option>
                  <option value="inbound">Inbound</option>
                  <option value="outbound">Outbound</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 control-label">Destination </label>
              <div class="col-sm-8">
                <select name="destination_id" class="form-control" required>
                  <option value=""> - Select - </option>
                  <?php
                      foreach($destination as $index=>$value){
												echo '<option value="'.$value->destination_id.'">';
												echo $value->destination_name.', '.$value->destination_country.'</option>';
											}
											?>
                </select>
              </div>
            </div>
          <label class="col-sm-3 control-label">Rating</label>
          <div class="col-sm-3">
            <select name="tour_rating" class="form-control" required>
              <option value="">Select</option>
              <?php 
								$i = 1;
								while($i <= 5){
									echo '<option value="'.$i.'">'.$i.'</option>';
									$i++;
								}
							?>
            </select>
          </div>
            
            <div class="form-group row">
              <label class="col-sm-4 control-label">Currency</label>
              <div class="col-sm-8">
                <select name="tour_currency" class="form-control">
                  <?php 
										foreach($currency as $index=>$value){
											
											if($value->code == $property[0]->currency){
												$select = ' selected';
											}else{
												$select = '';
											}
											
											echo '<option value="'.$value->code.'"'.$select.'>'.$value->code . ' - '. $value->name .'</option>';
										}?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 control-label">Name</label>
              <div class="col-sm-8">
                <input type="text" name="tour_name" class="form-control" required>
              </div>
            </div>
            <div class="form-group row"> </div>
            <div class="form-group row">
              <label class="col-sm-4 control-label">Description</label>
              <div class="col-sm-8">
                <textarea name="tour_description" rows="7" maxlength="150" required class="form-control" type="text"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 control-label">Rate related with periods</label>
              <div class="col-sm-8">
                <select name="tour_period" class="form-control">
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 control-label">Booking in advance </label>
              <div class="col-sm-8">
                <select name="tour_cutof" class="form-control">
                  <?php 
										$n = 0;
										while($n <= 60){
											echo '<option value="'.$n.'">'.$n.'</option>';
											$n++;
										}
										?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 control-label">Terms</label>
              <div class="col-sm-8">
                <select name="term_id" class="form-control">
                  <?php 
									foreach($term as $index=>$value){
										if($value->term_default == 1){
											$select = ' selected';
										}else{
											$select = '';
										}
										echo '<option value="'.$value->term_id.'"'.$select.'>'.$value->term_title.'</option>';
									}?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-4"> </div>
              <div class="col-sm-8">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="reset" class="btn btn-danger" onClick="$('#thumbnail').attr('src','<?php echo base_url();?>assets/backend/img/upload-img.png');">Reset</button>
                <input type="hidden" name="save" value="1">
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