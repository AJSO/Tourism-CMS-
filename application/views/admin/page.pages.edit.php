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
                  <div class="fg-line">
                    <input type="text" name="page_menu" class="form-control" maxlength="50" required value="<?php if(isset($item[0]->page_menu)){ echo $item[0]->page_menu; }?>">
                  </div>
                  <p class="help-block">Maximum 50 charectors</p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <div class="fg-line">
                    <input type="text" name="page_title" class="form-control" maxlength="150" required value="<?php if(isset($item[0]->page_title)){ echo $item[0]->page_title; }?>">
                  </div>
                  <p class="help-block">Maximum 150 charectors</p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Content Detail</label>
                <div class="col-sm-10">
                  <textarea name="page_detail" class="html-editor"><?php if(isset($item[0]->page_detail)){ echo $item[0]->page_detail;}?>
</textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-4">
                  <div class="fg-line">
                    <select name="page_status" id="page_status" class="form-control">
                      <option value="0" <?php if(isset($item[0]->page_status)){ if($item[0]->page_status == 0){ echo ' selected'; }}?>>Pending</option>
                      <option value="1" <?php if(isset($item[0]->page_status)){ if($item[0]->page_status == 1){ echo ' selected'; }}?>>Publish</option>
                    </select>
                  </div>
                </div>
                <?php 
								if(empty($item[0]->page_display_order)){
									$page_display_order = $display_order+1;
								}else{
									$page_display_order = $item[0]->page_display_order;
								}

								?>
                <label class="col-sm-2 control-label">Order</label>
                <div class="col-sm-4">
                  <div class="fg-line">
                    <input class="form-control" name="page_display_order" value="<?php echo $page_display_order; ?>">
                  </div>
                </div>
                <?php 
								if(empty($item[0]->page_date)){
									$page_date = date('Y-m-d h:i:s');
								}else{
									$page_date = $item[0]->page_date;
								}
																
								list($thedate, $thetime) = explode(' ',$page_date);
								list($yy,$mm,$dd) = explode('-',$thedate);
								list($hh,$ii,$ss) = explode(':',$thetime);
								?>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label date-published">Date of publish</label>
                <div class="col-sm-4 date-published">
                  <div class="input-group">
                    <div class="fg-line">
                      <input type="text" name="thedate" value="<?php echo date('m/d/Y h:i:a',mktime($hh,$ii,$ss,$mm,$dd,$yy));?>" class="form-control date-time-picker">
                    </div>
                    <span class="input-group-addon"><i class="zmdi zmdi-calendar-alt"></i></span> </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input name="save" type="submit" class="btn btn-success" value="Save"></button>
                  <input name="delete" type="submit" id="page_delete" value="Delete" class="btn btn-danger" <?php if(empty($item[0]->page_id)){ echo 'disabled'; }?>>
                  <input type="hidden" name="page_id" value="<?php if(isset($item[0]->page_id)){ echo $item[0]->page_id; }?>">
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php include('page.footer.php');?>
