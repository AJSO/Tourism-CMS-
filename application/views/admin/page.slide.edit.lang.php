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
      <div class="card-body card-padding">
        <div role="tabpanel">
          <ul role="tablist" class="tab-nav">
            <li class=" <?php if(!$save && !$delete){ echo 'active';}?>"><a data-toggle="tab" role="tab" aria-controls="original" href="#original" aria-expanded="false">Original
              <?php 
							$rs = $this->Language->get_code($property[0]->lang);
							echo '('.$rs[0]->name.')';
							?>
              </a></li>
            <li class="<?php if($save || $delete){ echo 'active';}?>"><a data-toggle="tab" role="tab" aria-controls="translate" href="#translate" aria-expanded="false">Translate
              <?php
							$rs = $this->Language->get_code($lang);
							echo '('.$rs[0]->name.')';
?>
              </a></li>
          </ul>
          <div class="tab-content">
            <div id="original" class="tab-pane <?php if(empty($save) && empty($delete)){ echo 'active';}?>" role="tabpanel">
              <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <p class="m-t-5">
                      <?php if(isset($slide[0]->slide_title)){ echo $slide[0]->slide_title; }?>
                    </p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <p class="m-t-5">
                      <?php if(isset($slide[0]->slide_description)){ echo $slide[0]->slide_description; }?>
                    </p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Message</label>
                  <div class="col-sm-9">
                    <p class="m-t-5">
                      <?php if(isset($slide[0]->slide_message)){ echo $slide[0]->slide_message; }?>
                    </p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Label</label>
                  <div class="col-sm-9">
                    <p class="m-t-5">
                      <?php if(isset($slide[0]->slide_label)){ echo $slide[0]->slide_label; }?>
                    </p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">URL</label>
                  <div class="col-sm-9">
                    <p class="m-t-5">
                      <?php if(isset($slide[0]->slide_label)){ echo $slide[0]->url; }?>
                    </p>
                  </div>
                </div>
              </form>
            </div>
            <div id="translate" class="tab-pane <?php if($save || $delete){ echo 'active';}?>" role="tabpanel">
              <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <?php if($save){ ?>
                <div class="alert alert-success alert-dismissable ">
                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                  Your slide translation has been update. </div>
                <?php }?>
                <?php if($delete == 1){ ?>
                <div class="alert alert-warning alert-dismissable ">
                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                  Your slide translation has been delete. </div>
                <?php }?>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <div class="fg-line">
                      <input type="text" name="title" class="form-control" value="<?php if(isset($item[0]->title)){ echo $item[0]->title; }?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <div class="fg-line">
                      <input type="text" name="description" class="form-control" value="<?php if(isset($item[0]->description)){ echo $item[0]->description; }?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Message</label>
                  <div class="col-sm-9">
                    <div class="fg-line">
                      <input type="text" name="message" class="form-control" value="<?php if(isset($item[0]->message)){ echo $item[0]->message; }?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Label</label>
                  <div class="col-sm-9">
                    <div class="fg-line">
                      <input type="text" name="label" class="form-control" value="<?php if(isset($item[0]->label)){ echo $item[0]->label; }?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <input name="save" type="submit" class="btn btn-success" value="Save">
                    <input name="delete" type="submit" class="btn btn-danger" value="Delete" <?php if(empty($item[0]->id)){ echo ' disabled';}?>>
                    <input name="slide_id" type="hidden" value="<?php if(isset($slide[0]->slide_id)){ echo $slide[0]->slide_id;}?>">
                    <input name="upload_id" type="hidden" value="<?php if(isset($slide[0]->upload_id)){ echo $slide[0]->upload_id;}?>">
                    <input name="id" type="hidden" value="<?php if(isset($item[0]->id)){ echo $item[0]->id; }?>">
                    <input type="hidden" name="lang" value="<?php echo $lang; ?>">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include('page.footer.php');?>
