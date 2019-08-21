<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<section id="main">
<?php include('page.sidebar.php');?>
<section id="content">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2>Pages <small>Pages are for content such as "About," "Contact," etc. </small></h2>
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
              <form class="form-horizontal" method="post">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Menu</label>
                  <div class="col-sm-10">
                    <p class="m-t-5">
                      <?php if(isset($content[0]->page_menu)){ echo $content[0]->page_menu; }?>
                    </p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <p class="m-t-5">
                      <?php if(isset($content[0]->page_title)){ echo $content[0]->page_title; }?>
                    </p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Content Detail</label>
                  <div class="col-sm-10">
                    <div class="m-t-5 scrolling">
                      <?php if(isset($content[0]->page_detail)){ echo $content[0]->page_detail;}?>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-4">
                    <p class="m-t-5">
                      <?php if(isset($content[0]->page_status)){ if($content[0]->page_status == 0){ echo ' Pending'; }}?>
                      <?php if(isset($content[0]->page_status)){ if($content[0]->page_status == 1){ echo ' Publish'; }}?>
                    </p>
                  </div>
                  <?php 
								if(empty($content[0]->page_date)){
									$page_date = date('Y-m-d h:i:s');
								}else{
									$page_date = $content[0]->page_date;
								}
																
								list($thedate, $thetime) = explode(' ',$page_date);
								list($yy,$mm,$dd) = explode('-',$thedate);
								list($hh,$ii,$ss) = explode(':',$thetime);
								?>
                  <label class="col-sm-2 control-label">Date of publish</label>
                  <div class="col-sm-4 ">
                    <p class="m-t-5"><?php echo $content[0]->page_date; ?></p>
                  </div>
                </div>
              </form>
            </div>
            <div id="translate" class="tab-pane <?php if($save || $delete){ echo 'active';}?>" role="tabpanel">
              <form id="form-content" class="form-horizontal" method="post">
                <div class="row">
                  <div class="col-md-12 col-lg-12">
                    <?php if($save){?>
                    <div class="alert alert-success alert-dismissable">
                      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                      Your page has been save. </div>
                    <?php }?>
                    <?php if($delete == 1){ ?>
                    <div class="col-md-12">
                      <div class="alert alert-warning alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        Your page has been delete. </div>
                    </div>
                    <?php }?>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Menu</label>
                      <div class="col-sm-10">
                        <input type="text" name="menu" class="form-control" maxlength="50" required value="<?php if(isset($item[0]->menu)){ echo $item[0]->menu; }?>">
                        <p class="help-block">Maximum 50 charectors</p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Title</label>
                      <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" maxlength="150" required value="<?php if(isset($item[0]->title)){ echo $item[0]->title; }?>">
                        <p class="help-block">Maximum 150 charectors</p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Content Detail</label>
                      <div class="col-sm-10">
                        <textarea name="detail" class="html-editor"><?php if(isset($item[0]->detail)){ echo $item[0]->detail;}?>
</textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Status</label>
                      <div class="col-sm-10">
                        <select name="status" id="page_status" class="form-control">
                          <option value="0" <?php if(isset($item[0]->status)){ if($item[0]->status == 0){ echo ' selected'; }}?>>Pending</option>
                          <option value="1" <?php if(isset($item[0]->status)){ if($item[0]->status == 1){ echo ' selected'; }}?>>Publish</option>
                        </select>
                      </div>
                    </div>
                    <?php 
								if(empty($item[0]->datepublish)){
									$page_date = date('Y-m-d h:i:s');
								}else{
									$page_date = $item[0]->datepublish;
								}
																
								list($thedate, $thetime) = explode(' ',$page_date);
								list($yy,$mm,$dd) = explode('-',$thedate);
								list($hh,$ii,$ss) = explode(':',$thetime);
								?>
                    <div class="form-group date-published">
                      <label class="col-sm-2 control-label">Publish</label>
                      <div class="col-sm-10">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="input-group">
                              <input type="text" name="thedate" id="datepicker-autoclose" value="<?php echo $mm.'/'.$dd.'/'.$yy; ?>" class="form-control">
                              <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span> </div>
                          </div>
                          <div class="col-sm-6">
                            <div data-autoclose="true" data-align="top" data-placement="top" class="input-group clockpicker ">
                              <input type="text" name="thetime" value="<?php echo $hh.':'.$ii; ?>" class="form-control">
                              <span class="input-group-addon bg-custom b-0 text-white"> <span class="glyphicon glyphicon-time"></span> </span> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-success" name="save" value="Save">
                        <input type="submit" class="btn btn-danger" name="delete" <?php if(empty($item[0]->id)){ echo 'disabled'; }?> onClick="return confirm('Delete')" value="Delete">
                        <input type="hidden" name="page_id" value="<?php echo $page_id; ?>">
                        <input type="hidden" name="id" value="<?php if(isset($item[0]->id)){ echo $item[0]->id; }?>">
                      </div>
                    </div>
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
