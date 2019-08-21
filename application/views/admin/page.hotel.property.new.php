<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Hotels</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li><a href="<?php echo base_url();?>admin/hotel/property">Hotels</a></li>
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
      <form method="post" id="form-content" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group row">
          <label class="col-sm-4 control-label">Title</label>
          <div class="col-sm-7">
            <div class="fg-line">
              <input type="text" name="category_title" class="form-control" value="<?php if(isset($category[0]->category_title)){ echo $category[0]->category_title; }?>" required>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 control-label">Parent</label>
          <div class="col-sm-7">
            <div class="fg-line">
              <select name="parent_id" class="form-control">
                <option value="0"> - No Parent - </option>
                <?php 
										if(isset($category[0]->parent_id)){ 
											$this->Category->tree(0, $category[0]->parent_id, 1);
										}else{
											$this->Category->tree(0, 0, 1);
										}?>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 control-label">Description</label>
          <div class="col-sm-7">
            <div class="fg-line">
              <textarea name="category_description" class="form-control html-editor"><?php if(isset($category[0]->category_description)){ echo $category[0]->category_description; }?>
</textarea>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 control-label">Thumbnail</label>
          <div class="col-sm-7">
            <input type="file" name="image" <?php if(empty($category[0]->category_id)){ echo 'required';}?>>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 control-label">Display order</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="category_display_order" value="<?php if(isset($category[0]->category_display_order)){ echo $category[0]->category_display_order;}?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-4 control-label" for="webSite">Status</label>
          <div class="col-sm-7">
            <select name="category_active" class="form-control">
              <option value="0"<?php if(isset($category[0]->category_active)){ if($category[0]->category_active == 0){ echo 'selected'; } } ?>>Inactive</option>
              <option value="1"<?php if(isset($category[0]->category_active)){ if($category[0]->category_active == 1){ echo 'selected'; } } ?>>Active</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-4">&nbsp;</div>
          <div class="col-sm-8">
            <input name="save" class="btn btn-success" type="submit" value="Save">
            <input name="delete" class="btn btn-danger btn-delete" type="submit" <?php if(empty($category[0]->category_id)){ echo 'disabled'; }?> value="Delete" onClick="return confirm('Delete category')">
            <input name="category_id" type="hidden" value="<?php if(isset($category[0]->category_id)){echo $category[0]->category_id;} ?>">
            <input name="upload_id" type="hidden" value="<?php if(isset($category[0]->thumbnail)){echo $category[0]->thumbnail;} ?>">
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