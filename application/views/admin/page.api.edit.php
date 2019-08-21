<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>APIs</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
								<li><a href="<?php echo base_url();?>admin/api">APIs</a></li>
								<li class="active"><?php if(empty($api[0]->api_id)){ echo 'Add';}else{ echo 'Edit';}?></li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">

				<h5 class="with-border">Information</h5>

				<form class="form-horizontal" method="post">
<?php if($save){?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Your API has been save </div>
        <?php }?>
        <?php if($delete){?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Your API has been delete </div>
        <?php }?>

          <div class="form-group row">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <div class="fg-line">
                <input type="text" name="name" class="form-control" value="<?php if(isset($api[0]->name)){ echo $api[0]->name; }?>" required>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 control-label">Api key</label>
            <div class="col-sm-10">
              <div class="fg-line">
                <input type="text" name="apikey" class="form-control" value="<?php if(isset($api[0]->apikey)){ echo $api[0]->apikey; }?>">
              </div>
            </div>
          </div>
          <div class="form-group row">
          	<div class="col-sm-2"></div>
            <div class="col-sm-10">
              <input type="submit" class="btn btn-success" name="save" value="Save">
              <input type="submit" class="btn btn-danger" name="delete" value="Delete" <?php if(empty($api[0]->api_id)){ echo 'disabled';}?> onClick="return confirm('Delete API')">
              <input type="hidden" name="api_id" value="<?php if(isset($api[0]->api_id)){ echo $api[0]->api_id;} ?>">
            </div>
          </div>
        </form>


			</div><!--.box-typical-->
		</div><!--.container-fluid-->
	</div><!--.page-content-->

<?php include('tpl.footer.php');?>