<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<section id="main">
<?php include('page.sidebar.php');?>
<section id="content">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2><?php echo ucfirst($media[0]->type); ?>s <small>All of <?php echo ucfirst($media[0]->type); ?>s file on your website</small></h2>
      </div>
      <div class="card-body card-padding">
        <div class="row">
          <div class="col-sm-12  col-md-6 col-lg-6">
            <?php 
				if(isset($media[0]->type)){				
					if($media[0]->type == 'image'){
						echo '<img src="'.base_url().$media[0]->filepath.'" class="img-responsive">';
					}else{
						if(isset($media[0]->filepath)){
							$key = $property[0]->jwplayer;
					?>
            <div id="jwPlayer">Loading the player...</div>
            <script src="<?php echo base_url(); ?>assets/plugins/jwplayer-7.4.4/jwplayer.js"></script> 
            <script>jwplayer.key="<?php echo $key;?>";</script> 
            <script>
						var playerInstance = jwplayer("jwPlayer");
						playerInstance.setup({
							image: "<?php echo base_url().$media[0]->filepath ;?>.jpg",
							file: "<?php echo base_url().$media[0]->filepath ;?>",
							width: '800',
							height: '450'
						});
						</script>
            <?php
						}
					}
				}
				?>
            <form class="form-horizontal m-t-15">
              <div class="form-group">
                <label class="col-sm-2 control-label">Language</label>
                <div class="col-sm-10">
                  <p class="m-t-5"><strong><?php echo $default_language;?></strong></p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">URL</label>
                <div class="col-sm-10">
                  <p class="m-t-5"><a href="<?php echo base_url().$media[0]->filepath;?>" target="_blank"><?php echo base_url().$media[0]->filepath; ?></a></p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Caption</label>
                <div class="col-sm-10">
                  <p class="m-t-5">
                    <?php if(isset($media[0]->filecaption)){ echo $media[0]->filecaption;}else{ echo '-';} ?>
                  </p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Entered</label>
                <div class="col-sm-10">
                  <p class="m-t-5"><?php echo $media[0]->fileentered; ?></p>
                </div>
              </div>
            </form>
          </div>
          <div class="col-sm-12  col-md-6 col-lg-6">
            <form id="preview-picture" class="form-horizontal" method="post">
              <?php 
							if($save){
								?>
              <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                Your translation media has been update. </div>
              <?php 
							}
							
							if($delete){
								?>
              <div class="alert alert-warning alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                Your translation media has been delete. </div>
              <?php 
							}
							?>
              <div class="form-group">
                <label class="col-sm-2 control-label">Language</label>
                <div class="col-sm-10">
                  <p class="m-t-5"><strong><?php echo $language[0]->name;?></strong></p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Caption</label>
                <div class="col-sm-10">
                  <textarea name="caption" class="form-control"><?php if(isset($item[0]->caption)){ echo $item[0]->caption;} ?>
</textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" name="save" class="btn btn-success" onClick="$('input[name=action]').val('save')">Save</button>
                  <button type="submit" name="delete" class="btn btn-danger btn-delete" <?php if(empty($item[0]->id)){ echo 'disabled'; } ?>> Delete</button>
                  <input type="hidden" name="upload_id" value="<?php echo $upload_id; ?>">
                  <input type="hidden" name="id" value="<?php if(isset($item[0]->id)){ echo $item[0]->id; } ?>">
                  <input type="hidden" name="action" value="">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include('page.footer.php');?>
