<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Transfers</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li class="active">
              	Services
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
          Your services has been update. </div>
        <?php }?>
        <div class="form-group row">
          <label class="col-sm-4 control-label">Title</label>
          <div class="col-sm-8">
              <input type="text" name="title" class="form-control" value="<?php if(isset($service[0]->title)){ echo $service[0]->title; }?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 control-label">Description</label>
          <div class="col-sm-8">
              <textarea name="description" rows="10" class="form-control html-editor"><?php 
							if(isset($service[0]->description)){ echo $service[0]->description; }?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 control-label">Terms</label>
          <div class="col-sm-8">
          	<select name="term_id" class="form-control">
            <?php 
						$select = '';
						foreach($term as $index=>$value){
							if(isset($service[0]->term_id)){
								if($value->term_id == $service[0]->term_id){
									$select = ' selected';
								}else{
									$select = '';
								}
							}else{
								$select = '';
							}
							echo '<option value="'.$value->term_id.'"'.$select.'>'.$value->term_title.'</option>';
						}?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-4">&nbsp;</div>
          <div class="col-sm-8">
            <input name="save" class="btn btn-success" type="submit" value="Save">
            <input name="reset" class="btn btn-danger" type="reset" value="Reset">
            <input name="id" type="hidden" value="<?php if(isset($service[0]->id)){echo $service[0]->id;}?>">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include('tpl.footer.php');?>