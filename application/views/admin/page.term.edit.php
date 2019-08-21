<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Terms</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li><a href="<?php echo base_url();?>admin/term">Terms</a></li>
              <li class="active">
                <?php if(empty($term[0]->term_id)){ echo 'Add';}else{ echo 'Edit';}?>
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
          Your terms has been update. </div>
        <?php }?>
        <?php if($delete){ ?>
        <div class="alert alert-danger alert-dismissable ">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          Your terms has been delete. </div>
        <?php }?>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Title</label>
          <div class="col-sm-9">
            <input type="text" name="term_title" class="form-control" value="<?php if(isset($term[0]->term_title)){ echo $term[0]->term_title; }?>" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label">Description</label>
          <div class="col-sm-9">
            <textarea name="term_description" class="form-control" rows="10"><?php if(isset($term[0]->term_description)){ echo $term[0]->term_description; }?>
</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 control-label" for="webSite">Default</label>
          <div class="col-sm-9">
            <select name="term_default" class="form-control">
              <option value="0"<?php if(isset($term[0]->term_default)){ if($term[0]->term_default == 0){ echo 'selected'; } } ?>>No</option>
              <option value="1"<?php if(isset($term[0]->term_default)){ if($term[0]->term_default == 1){ echo 'selected'; } } ?>>Yes</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-3"></div>
          <div class="col-sm-9">
            <input name="save" class="btn btn-success" type="submit" value="Save">
            <input name="delete" class="btn btn-danger btn-delete" type="submit" <?php if(empty($term[0]->term_id)){ echo 'disabled'; }?> value="Delete">
            <input name="term_id" type="hidden" value="<?php if(isset($term[0]->term_id)){echo $term[0]->term_id;} ?>">
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