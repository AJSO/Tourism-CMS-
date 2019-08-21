<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Payment Setting </h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
								<li><a href="<?php echo base_url();?>admin/payment-setting">Payment Setting </a></li>
								<li class="active"><?php if(empty($payment[0]->id)){ echo 'Add';}else{ echo 'Edit';}?></li>
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
            Your payment has been update. </div>
          <?php }?>
          <?php 
														
							if(in_array($payment[0]->type, array('PayPal', 'Skrill'))){
?>
          <div class="form-group row">
            <label class="col-sm-4 control-label">Email</label>
            <div class="col-sm-8">
              <div class="fg-line">
                <input name="detail[username]" type="text" class="form-control" value="<?php if(isset($detail['username'])){ echo $detail['username']; }?>" required>
              </div>
            </div>
          </div>
          <?php
							}else if($payment[0]->type == 'Bank Transfer'){
?>
          <div class="form-group row">
            <label class="col-sm-4 control-label">Swift code</label>
            <div class="col-sm-8">
              <div class="fg-line">
                <input name="detail[swift]" type="text" class="form-control" value="<?php if(isset($detail['swift'])){echo $detail['swift']; }?>" required>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 control-label">Bank Name</label>
            <div class="col-sm-8">
              <div class="fg-line">
                <input name="detail[bankname]" type="text" class="form-control" value="<?php if(isset($detail['bankname'])){echo $detail['bankname']; } ?>" required>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 control-label">Branch</label>
            <div class="col-sm-8">
              <div class="fg-line">
                <input name="detail[branch]" type="text" class="form-control" value="<?php if(isset($detail['branch'])){echo $detail['branch']; } ?>" required>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 control-label">Account Number</label>
            <div class="col-sm-8">
              <div class="fg-line">
                <input name="detail[accountnumber]" type="text" class="form-control" value="<?php if(isset($detail['accountnumber'])){ echo $detail['accountnumber'];} ?>" required>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 control-label">Account Type</label>
            <div class="col-sm-8">
              <div class="fg-line">
                <input name="detail[accounttype]" type="text" class="form-control" value="<?php if(isset($detail['accounttype'])){ echo $detail['accounttype'];} ?>" required>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 control-label">Account name</label>
            <div class="col-sm-8">
              <div class="fg-line">
                <input name="detail[accountname]" type="text" class="form-control" value="<?php if(isset($detail['accountname'])){ echo $detail['accountname'];} ?>" required>
              </div>
            </div>
          </div>
          <?php							
							}else if($payment[0]->type == 'Credit Card'){
								
								
							?>
          <div class="form-group row">
            <label class="col-sm-4 control-label">Credit card</label>
            <div class="col-sm-8">
              <div class="fg-line">
                <select name="detail[credit][]" class="form-control" multiple>
                  <?php 
											foreach($card_arr as $v){
												
												if(in_array($v,$detail['credit'])){
													$select = ' selected';
												}else{
													$select = '';
												}
												?>
                  <option value="<?php echo $v; ?>" <?php echo $select; ?>><?php echo $v?></option>
                  <?php }?>
                </select>
              </div>
            </div>
          </div>
          <?php
							}
?>
          <div class="form-group row">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
              <input name="save" class="btn btn-success" type="submit" value="Save">
              <input name="reset" class="btn btn-danger" type="reset" value="Reset">
              <input name="id" type="hidden" value="<?php echo $payment[0]->id; ?>">
            </div>
          </div>
        </form>


			</div><!--.box-typical-->
		</div><!--.container-fluid-->
	</div><!--.page-content-->

<?php include('tpl.footer.php');?>