<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Widgets</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li><a href="<?php echo base_url();?>admin/widget/<?php echo $type;?>"><?php echo $widget_title; ?></a></li>
              <li class="active"> Edit </li>
            </ol>
          </div>
        </div>
      </div>
    </header>
    <div class="box-typical box-typical-padding">
      <h5 class="with-border">Information</h5>
      <form class="form-horizontal" method="post" enctype="multipart/form-data">

        <?php if($save){ ?>
        <div class="alert alert-success alert-dismissable ">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          Your widget has been update. </div>
        <?php }?>
      
        <div class="form-group row">
            <label class="col-sm-4 control-label">Title</label>
            <div class="col-sm-8">
<input type="text" name="widget_title" class="form-control input-sm" required value="<?php if(isset($widget[0]->widget_title)){echo $widget[0]->widget_title;} ?>">
            </div>
          </div>
        <div class="form-group row">
            <label class="col-sm-4 control-label">Description</label>
            <div class="col-sm-8">
<textarea name="widget_description" class="form-control input-sm" required><?php if(isset($widget[0]->widget_description)){echo $widget[0]->widget_description;} ?>
</textarea>
            </div>
          </div>
          
          <?php if($type == 'populartours'){?>
        <div class="form-group row">
            <label class="col-sm-4 control-label">URL</label>
            <div class="col-sm-8">
<input type="text" name="link" class="form-control input-sm" value="<?php if(isset($widget[0]->link)){ echo $widget[0]->link; }?>">
            </div>
          </div>
					
					<?php }?>
          
          <?php if($type == 'services'){?>
        <div class="form-group row">
            <label class="col-sm-4 control-label">Icon</label>
            <div class="col-sm-8">
<input type="text" name="icon" class="form-control input-sm" value="<?php if(isset($widget[0]->icon)){ echo $widget[0]->icon; }?>">
            </div>
          </div>
          <?php }?>
          <?php
              if($type == 'brands' || $type == 'mission' || $type == 'ourteam' || $type == 'gallery' || $type == 'slide'){
							?>
          <div class="form-group row">
            <label class="col-sm-4 control-label">Thumbnail</label>
            <div class="col-sm-8">
<input type="file" name="image" <?php if(empty($widget[0]->widget_id)){ echo 'required';}?>>
            </div>
          </div>
          <?php
							}
							?>
          <div class="form-group row">
            <label class="col-sm-4 control-label">Display order</label>
            <div class="col-sm-8">
<input type="text" name="displayorder" class="form-control input-sm" value="<?php if(isset($widget[0]->displayorder)){echo $widget[0]->displayorder;} ?>">
            </div>
          </div>
          <div class="form-group row">
          
          <div class="col-sm-4"></div>
            <div class="col-sm-8">
              <input name="save" class="btn btn-success" type="submit" value="Save">
              <input name="delete" class="btn btn-warning" type="reset" <?php if(empty($widget[0]->widget_id)){ echo 'disabled';}?> value="Reset">
              <input type="hidden" name="widget_id" value="<?php if(isset($widget[0]->widget_id)){ echo $widget[0]->widget_id;}?>">
              <input type="hidden" name="upload_id" value="<?php if(isset($widget[0]->thumbnail)){ echo $widget[0]->thumbnail; }?>">
            </div>
          </div>
        </form>
    </div>
  </div>
</div>

<?php include('tpl.footer.php');?>