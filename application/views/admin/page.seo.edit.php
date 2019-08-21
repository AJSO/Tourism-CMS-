<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>SEO</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li><a href="<?php echo base_url();?>admin/seo">SEO</a></li>
              <li class="active">
                <?php if(empty($seo[0]->id)){ echo 'Add';}else{ echo 'Edit';}?>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </header>
    <div class="box-typical box-typical-padding">
      <h5 class="with-border">Information</h5>
      <form class="form-horizontal" method="post">
      <?php if($save){ ?>
          <div class="alert alert-success alert-dismissable ">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            Your seo has been update. </div>
          <?php }?>

        <div class="form-group row">
          <label class="col-sm-2 control-label">Language</label>
          <div class="col-sm-10">
<select name="lang" class="form-control">
              <?php 
									foreach($languages as $index=>$value){
										if(isset($seo[0]->lang)){
											if($seo[0]->lang == $value->code){
												$select = 'selected';
											}else{
												$select = '';
											}
										}else{
											$select = '';
										}
										echo '<option value="'.$value->code.'" '.$select.'>'.$value->code .' - '.$value->name.'</option>';
									}
									?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 control-label">Title</label>
          <div class="col-sm-10">
<input type="text" name="title" class="form-control" required value="<?php if(isset($seo[0]->title)){ echo $seo[0]->title; }?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 control-label">Description</label>
          <div class="col-sm-10">
<textarea class="form-control" name="description" required ><?php if(isset($seo[0]->description)){ echo $seo[0]->description; }?>
</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 control-label">Keywords</label>
          <div class="col-sm-10">
<textarea class="form-control" name="keywords" required><?php if(isset($seo[0]->keywords)){ echo $seo[0]->keywords; }?>
</textarea>
          </div>
        </div>
        <div class="form-group row">
        	<div class="col-sm-2"></div>
          <div class="col-sm-10">
            <input name="save" type="submit" class="btn btn-success" value="Save">
            <input type="submit" class="btn btn-danger" value="Reset">
            <input type="hidden" name="id" value="<?php if(isset($seo[0]->id)){ echo $seo[0]->id; }?>">
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