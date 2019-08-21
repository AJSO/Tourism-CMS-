<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<section id="main">
<?php include('page.sidebar.php');?>
<section id="content">
  <div class="container">
    <div class="card">
    	<?php if(isset($media[0]->type)){?>
    
      <div class="card-header">
        <h2><?php echo ucfirst($media[0]->type); ?>s <small>All of <?php echo ucfirst($media[0]->type); ?>s file on your website</small></h2>
      </div>
      <div class="card-body card-padding">
        <div class="row">
          <div class="col-sm-12  col-md-6 col-lg-6">
            <div class="card-box">
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
            </div>
          </div>
          <div class="col-sm-12  col-md-6 col-lg-6">
            <div class="card-box">
              <div class="p-20">
                <form id="preview-picture" class="form-horizontal" action="<?php echo base_url(); ?>admin/media/edit" method="post" enctype="multipart/form-data">
                  <?php 
							if($save){
								?>
                  <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    Your media has been update. </div>
                  <?php 
							}
?>							
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Entered</label>
                    <div class="col-sm-10">
                      <p class="m-t-5"><?php echo $media[0]->fileentered;?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">URL</label>
                    <div class="col-sm-10">
                      <p class="m-t-5"><?php echo base_url().$media[0]->filepath;?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Caption</label>
                    <div class="col-sm-10">
                      <textarea name="filecaption" class="form-control"><?php if(isset($media[0]->filecaption)){ echo $media[0]->filecaption;} ?>
</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                      <input type="file" name="media">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" onClick="$('input[name=action]').val('save')">Save </button>
                      <button type="submit" class="btn btn-danger btn-delete">Delete </button>
                      <input type="hidden" name="upload_id" value="<?php if(isset($media[0]->upload_id)){ echo $media[0]->upload_id; } ?>">
                      <input type="hidden" name="action">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
			}else{?>
                  <div class="alert alert-warning alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    Your media has been delete. </div>
                  <?php 
			
			<?php }
			?>
    </div>
  </div>
</section>
<?php include('page.footer.php');?>
