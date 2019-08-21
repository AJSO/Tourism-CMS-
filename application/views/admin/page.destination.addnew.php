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
      <form class="form-horizontal" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-4">
<img id="thumbnail" src="<?php echo base_url();?>assets/backend/img/upload.png" alt="Upload image" style="max-width: 218px; max-height:218px" class="img-responsive m-b-30" />
              <br>
              <br>
              <input type="file" name="image" id="image" required>
              <br>
              <br>
              <div class="alert alert-info">
              <ul class="m-t-30 list-unstyled">
                <li>The image file size is preferred: 436x436.</li>
                <li>Images must be smaller than 200kb (JPG only).</li>
                <li>File names must be in English and numbers.</li>
              </ul>
              </div>
              </div>
            <div class="col-sm-8">

              <div class="form-group row">
                <label class="col-sm-2 control-label">Slug</label>
                <div class="col-sm-10">
                  <div class="fg-line">
                    <input type="text" name="destination_slug" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 control-label">IATA Code</label>
                <div class="col-sm-10">
                  <div class="fg-line">
                    <input type="text" name="destination_code" class="form-control" required>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <div class="fg-line">
                    <input type="text" name="destination_name" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 control-label">Country</label>
                <div class="col-sm-10">
                  <div class="fg-line">
                    <select name="destination_country" class="form-control" required>
                      <option value="">Select</option>
                      <?php 
								foreach($country as $index=>$value){
									echo '<option value="'.$value->code.'">'.$value->name.'</option>';
								}
								?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                  <div class="fg-line">
                  <textarea name="destination_description" rows="5" required class="form-control" maxlength="255" ></textarea>
                  </div>
                 </div>       	
              </div>
              <div class="form-group row">
              	<div class="col-sm-2"></div>
                <div class="col-sm-10">
                  <input type="submit" class="btn btn-success" name="save" value="Save">
                  <input type="reset" class="btn btn-danger">
                  <input type="hidden" name="api_id" value="<?php if(isset($api[0]->api_id)){ echo $api[0]->api_id;} ?>">
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