<?php include('tpl.meta.php');?>
<style>
.btn.btn-link{
	color: #737373;
}
#header{
	margin-top: 15px;
	margin-bottom: 15px;
}
.box_style_1 > table{
	border: none;
}
.box_style_1 > table > tbody > tr{
	border: none;
}
.box_style_1 > table > tbody > tr >td{
	border: none;
}
</style>
<div id="header">
	<div class="container">
  	<div class="row">
    	<div class="col-sm-12">
      	<a href="<?php echo base_url();?>"><img src="<?php echo base_url()?>assets/frontend/img/logo_sticky.png"></a>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-sm-8">
      <h3><?php echo $this->lang->line('Check Out');?></h3>
      <p> <?php echo $this->lang->line('Please fill in the form below to complete checkout process');?> </p>
      <form id="form-checkout" method="post">
        <p><strong><?php echo $this->lang->line('Personal Information');?></strong></p>
        <hr>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-4">
              <label><?php echo $this->lang->line('First Name');?></label>
              <input name="firstname" class="form-control" value="<?php if(isset($member[0]->firstname)){ echo $member[0]->firstname;}?>" required type="text">
            </div>
            <div class="col-sm-4">
              <label><?php echo $this->lang->line('Last Name');?></label>
              <input name="lastname" class="form-control" value="<?php if(isset($member[0]->lastname)){ echo $member[0]->lastname;}?>" required type="text">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-4">
              <label><?php echo $this->lang->line('Address');?></label>
              <input class="form-control" name="address" value="<?php if(isset($member[0]->address)){ echo $member[0]->address;}?>" required type="text">
            </div>
            <div class="col-sm-4">
              <label><?php echo $this->lang->line('City');?></label>
              <input class="form-control" name="city" value="<?php if(isset($member[0]->city)){ echo $member[0]->city;}?>" required type="text">
            </div>
            <div class="col-sm-4">
              <label><?php echo $this->lang->line('State/Province');?></label>
              <input class="form-control" name="state" value="<?php if(isset($member[0]->state)){ echo $member[0]->state;}?>" required type="text">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-4">
              <label><?php echo $this->lang->line('Zipcode');?></label>
              <input class="form-control" name="zipcode" value="<?php if(isset($member[0]->zipcode)){ echo $member[0]->zipcode;}?>" required type="text">
            </div>
            <div class="col-sm-4">
              <label><?php echo $this->lang->line('Country');?></label>
              <select name="country" class="form-control" required>
              	<option value="">- <?php echo $this->lang->line('Select');?> - </option>
              	<?php 
								foreach($countries as $index=>$value){
									if(isset($member[0]->country)){
										if($member[0]->country == $value->code){
											$select = ' selected';
										}else{
											$select = '';
										}
									}else{
										$select = '';
									}
									echo '<option value="'.$value->code.'" '.$select.'>'.$value->name.'</option>';
								}?>
              </select>
            </div>
            <div class="col-sm-4">
              <label><?php echo $this->lang->line('Email address');?></label>
              <input class="form-control" name="email" value="<?php if(isset($member[0]->email)){ echo $member[0]->email;}?>" required type="text">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-4">
              <label><?php echo $this->lang->line('Phone');?></label>
              <input name="phone" class="form-control" value="<?php if(isset($member[0]->phone)){ echo $member[0]->phone;}?>" type="text">
            </div>
            <div class="col-sm-4">
              <label><?php echo $this->lang->line('Fax');?></label>
              <input name="fax" class="form-control" value="<?php if(isset($member[0]->fax)){ echo $member[0]->fax;}?>" type="text">
            </div>
            <div class="col-sm-4">
              <label><?php echo $this->lang->line('Pick up area');?></label>
              <input name="pickup_area" class="form-control" value="" type="text" required>
            </div>
          </div>
        </div>
        <br>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-12"> <strong><?php echo $this->lang->line('Select Payment Method');?></strong>
              <hr>
            </div>
          </div>
          
          <div class="row">
          	<div class="col-sm-4">
            	<label><?php echo $this->lang->line('Payment');?></label>
            	<select name="payment_type" class="form-control">
              	<?php 
								foreach($payment_setting as $index=>$value){
									if($value->default_payment == 1){
										$select = ' selected';
									}else{
										$select = '';
									}
									?>
              	<option value="<?php echo $value->type;?>"<?php echo $select; ?>><?php echo $value->type;?></option>
                <?php }?>
              </select>
            </div>
          	<div class="col-sm-8">
<?php
foreach($payment as $index=>$value){
?>            

            <div id="<?php echo $this->Slug->url($value->type)?>" class="box_style_1" style="display:none;">            	
              <?php 
							$detail = json_decode($value->detail,true);
							
							switch($value->type){
								case'Bank Transfer';
									echo '<table class="table">';
									foreach($detail as $ii=>$vv){
										echo '<tr>';
										echo '<td>'.$this->lang->line($ii).':</td>';
										echo '<td>'.$vv.'</td>';
										echo '</tr>';
									}
									echo '</table>';								
								break;
								case'Credit Card';
									echo '<div class="form-group row">';
									echo '<label class="col-sm-4 control-label">'.$this->lang->line('Credit Card').'</label>';
									echo '<div class="col-sm-8">';
									echo '<select name="card" class="form-control">';
									foreach($detail['credit'] as $ii=>$vv){
										echo '<option value="'.$vv.'">'.$vv.'</option>';
									}
									echo '</select>';
									echo '</div>';
									echo '</div>';
									echo '<div class="form-group row">';
									echo '<label class="col-sm-4 control-label">'.$this->lang->line('Card Number').'</label>';
									echo '<div class="col-sm-8">';
									echo '<input type="text" name="card_number" class="form-control">';
									echo '</div>';
									echo '</div>';
									echo '<div class="form-group row">';
									echo '<label class="col-sm-4 control-label">'.$this->lang->line('Bank Issue').'</label>';									
									echo '<div class="col-sm-8">';
									echo '<input class="form-control" name="card_bank_issue" type="text">';
									echo '</div>';
									echo '</div>';
									echo '<div class="form-group row">';
									echo '<label class="col-sm-4 control-label">'.$this->lang->line('Card Holder').'</label>';									
									echo '<div class="col-sm-8">';
									echo '<input class="form-control" name="card_holder" type="text">';
									echo '</div>';
									echo '</div>';
									echo '<div class="form-group row">';
									echo '<label class="col-sm-4 control-label">'.$this->lang->line('Security Code (CVC)').'</label>';									
									echo '<div class="col-sm-8">';
									echo '<input class="form-control" name="card_cvc" type="text">';
									echo '</div>';
									echo '</div>';
								break;
								case'PayPal';
									echo '<img src="'.base_url().'assets/frontend/img/paypal.jpg">';
								break;
							}
							?>
            </div>
<?php
}
?>            
            
            </div>
          </div>
          
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-4">
              <input name="save" class="btn btn-block btn-success" value="<?php echo $this->lang->line('Process Checkout');?>" type="submit">
            </div>
            <div class="col-sm-8 text-right">
            	<a href="<?php echo base_url();?>" class="btn btn-link"><?php echo $this->lang->line('Continue Shopping');?></a>
            </div>
          </div>
        </div>
      </form>
    </div>
    <!-- End col-md-8 -->
    
    <div class="col-md-4 col-sm-4">
      <div class="box_style_1">
        <h4><?php echo $this->lang->line('Place your order');?></h4>
        <?php 
				foreach($cart as $index=>$value){?>
        <hr>
        <p> 
				<strong><?php echo $value->item;?></strong> <a href="<?php echo base_url()?>cart/delete?cart_id=<?php echo $value->cart_id?>" class="delete-cart pull-right"><i class="fa fa-close"></i></a>
        	<ul class="list-unstyled">
          	<li><?php 
						
						echo $this->lang->line('Check-in');?>: <?php echo date('F d, Y', strtotime($value->checkin));
						if($value->checkin_time != '00:00:00'){
							echo ' ';
							echo substr($value->checkin_time,0,5);
						}
						?> 
            <?php echo $this->lang->line('Adults');?>: <?php 
						echo $value->adults; 
						if($value->child){
							echo ' ';
							echo $this->lang->line('Child');
							echo ': ';
							echo $value->child;
						}
						?></li>
            <li><?php echo $this->lang->line('Total');?>: <?php 
						echo $value->currency;
						echo ' ';
						echo number_format($value->cost,0,'',',');?></li>
          </ul>
        </p>
        <?php 
				}
				?>
        <table class="table">
        	<tr>
          	<td class="text-right"><strong><?php echo $this->lang->line('Total');?></strong>:</td>
          	<td width="100" nowrap class="text-right"><?php 
						echo $sumcart[0]->currency;
						echo ' ';
						echo number_format($sumcart[0]->cart_cost,0,'',','); ?></td>
          </tr>
        	<tr>
          	<td class="text-right"><strong><?php echo $this->lang->line('Tax');?></strong>:</td>
          	<td class="text-right" nowrap><?php 
						echo $sumcart[0]->currency;
						echo ' ';						
						echo number_format($sumcart[0]->cart_tax,0,'',','); ?></td>
          </tr>
        	<tr>
          	<td class="text-right"><strong><?php echo $this->lang->line('Grand Total');?></strong>:</td>
          	<td class="text-right" nowrap><?php
						echo $sumcart[0]->currency;
						echo ' ';						
						echo number_format($sumcart[0]->cart_total,0,'',','); ?></td>
          </tr>
        </table>
      </div>
      <div class="box_style_4"> <i class="fa fa-fw fa-support"></i>
        <h4><?php echo $this->lang->line('Need Help?');?></h4>
        <a href="tel://<?php echo $property[0]->property_phone;?>" class="phone"><?php echo $property[0]->property_phone;?></a> <small><?php echo $this->lang->line('Monday to Friday 9.00am - 7.30pm');?></small> </div>
    </div>
    <!-- End col-md-4 --> 
  </div>
  <!-- End row --> 
</div>
<!-- End container --> 
<script>
$('.delete-cart').click(function(){
	return confirm('<?php echo $this->lang->line('Delete this');?>');
});

function payment(val){
	if(val == 'Bank Transfer'){
		$('#bank-transfer').show();
		$('#paypal').hide();
		$('#credit-card').hide();
	}else if(val == 'PayPal'){
		$('#bank-transfer').hide();
		$('#paypal').show();
		$('#credit-card').hide();
	}else {
		$('#bank-transfer').hide();
		$('#paypal').hide();
		$('#credit-card').show();
	}
}

payment($('select[name=payment_type]').val());

$('select[name=payment_type]').change(function(){
	payment(this.value);
});

$('#form-checkout').validate();

</script>
</body>
</html>