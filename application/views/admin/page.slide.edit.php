<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<section id="main">
<?php include('page.sidebar.php');?>
<section id="content">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2>Slide<small>Javascript image slider for your website. This non-jQuery slideshow works beautifully.</small></h2>
      </div>
      <div class="card-body">
<?php if($save){?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Your slide has been update </div>
        <?php }?>
        <?php if($delete){?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Your slide has been delete </div>
        <?php }?>
        <form class="form-horizontal" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
              <div class="fg-line">
                <input type="text" name="slide_title" class="form-control" value="<?php if(isset($slide[0]->slide_title)){ echo $slide[0]->slide_title; }?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
              <div class="fg-line">
                <input type="text" name="slide_description" class="form-control" value="<?php if(isset($slide[0]->slide_description)){ echo $slide[0]->slide_description; }?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Message</label>
            <div class="col-sm-10">
              <div class="fg-line">
                <input type="text" name="slide_message" class="form-control" value="<?php if(isset($slide[0]->slide_message)){ echo $slide[0]->slide_message; }?>" >
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Label</label>
            <div class="col-sm-10">
              <div class="fg-line">
                <input type="text" name="slide_label" class="form-control" value="<?php if(isset($slide[0]->slide_label)){ echo $slide[0]->slide_label; }?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">URL</label>
            <div class="col-sm-10">
              <div class="fg-line">
                <input type="text" name="url" class="form-control" required value="<?php if(isset($slide[0]->slide_label)){ echo $slide[0]->url; }?>" >
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Photo</label>
            <div class="col-sm-10">
              <input type="file" name="image" <?php if(empty($slide[0]->slide_id)){ echo 'required'; }?>>
              <p class="help-block">Recommed image size 848x370</p>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" name="save" class="btn btn-success" value="Save">
              <input type="submit" name="delete" class="btn btn-danger" value="Delete" <?php if(empty($slide[0]->slide_id)){ echo ' disabled';}?>>
              <input name="slide_id" type="hidden" value="<?php if(isset($slide[0]->slide_id)){ echo $slide[0]->slide_id;}?>">
              <input name="upload_id" type="hidden" value="<?php if(isset($slide[0]->upload_id)){ echo $slide[0]->upload_id;}?>">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php include('page.footer.php');?>
