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
      <div class="col-sm-12"> <a href="<?php echo base_url();?>"><img src="<?php echo base_url()?>assets/frontend/img/logo_sticky.png"></a> </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-sm-8">
    <div class="box_style_1">
      <h3><?php echo $this->lang->line('Thank you for your order')?> #invoice <?php echo $invoice[0]->id; ?></h3>
      <p><?php echo $this->lang->line('Thank you for shopping with us. We have received your order and it is currently being processed');?></p>
      <p><strong><?php echo $this->lang->line('Customer information');?></strong></p>
      <?php 
					$customer = json_decode($invoice[0]->customer, true);
					$country = $this->Country->get_code($customer['country']);
					$items = json_decode($invoice[0]->item,true);

					echo '<p>';
					echo $customer['firstname'] . ' '.$customer['lastname'].'<br>';
					echo '<strong>'.$this->lang->line('Address').'</strong>: ' . $customer['address'] . ' '.$customer['city'] . ' ';
					echo $customer['state'] . ' '. $customer['zipcode']. ' '.$country[0]->name. '<br>';
					echo '<strong>'.$this->lang->line('Phone').'</strong>: '.$customer['phone']. ' ';
					echo '<strong>'.$this->lang->line('Fax').'</strong>: '.$customer['fax'] . ' ';
					echo '<strong>'.$this->lang->line('Email').'</strong>: <a href="mailto:'.$invoice[0]->customer_email.'">'.$invoice[0]->customer_email.'</a>';
					echo '<br>';
					echo '<strong>'.$this->lang->line('Pick up area').':</strong> ';
					if($invoice[0]->pickup_area){
						echo $invoice[0]->pickup_area;
					}else{
						echo '-';
					}
					echo '</p>';
					?>
      <p><strong><?php echo $this->lang->line('Order Information');?></strong></p>
      <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th nowrap="nowrap"><?php echo $this->lang->line('Items');?></th>
            <th width="68" nowrap="nowrap"><?php echo $this->lang->line('Check-in');?></th>
            <th width="66" nowrap="nowrap"><?php echo $this->lang->line('Adults');?></th>
            <th width="31" nowrap="nowrap"><?php echo $this->lang->line('Child');?></th>
            <th width="31" nowrap="nowrap"><?php echo $this->lang->line('Cost');?></th>
            <th width="26" nowrap="nowrap"><?php echo $this->lang->line('Tax');?></th>
            <th nowrap="nowrap" class="text-right"><?php echo $this->lang->line('Total');?></th>
          </tr>
        </thead>
        <tbody>
          <?php 
					foreach($items as $index=>$value){
						?>
          <tr>
            <td><?php 
						echo $value['name']; 
						?></td>
            <td nowrap="nowrap">
						<?php echo date('F d Y',strtotime($value['checkin'])); ?>
            <?php if(isset($value['time'])){echo substr($value['time'],0,5);}?>
            </td>
            <td nowrap="nowrap"><?php echo $value['adults']; ?></td>
            <td nowrap="nowrap"><?php echo $value['child'];?></td>
            <td nowrap="nowrap"><?php echo $value['cost'];?></td>
            <td nowrap="nowrap"><?php echo $value['tax'];?></td>
            <td align="right" nowrap="nowrap"><?php echo $value['total']; ?></td>
          </tr>
          <?php 
					}
					?>
        </tbody>
        <?php $currency = $this->Currency->get_code($invoice[0]->currency); ?>
        <tr>
          <td colspan="6" align="right" nowrap="nowrap"><strong><?php echo $this->lang->line('Total');?>:</strong></td>
          <td width="80" align="right" nowrap="nowrap"><strong><?php echo $invoice[0]->cost?></strong></td>
        </tr>
        <tr>
          <td colspan="6" align="right" nowrap="nowrap"><strong><?php echo $this->lang->line('Tax');?>:</strong></td>
          <td align="right" nowrap="nowrap"><strong><?php echo $invoice[0]->tax; ?></strong></td>
        </tr>
        <tr>
          <td colspan="5" nowrap="nowrap" >* <?php echo $this->lang->line('Currencies are in');?> <?php echo $currency[0]->name; ?></td>
          <td align="right" nowrap="nowrap"><strong><?php echo $this->lang->line('Grand Total');?>:</strong></td>
          <td align="right" nowrap="nowrap"><strong><?php echo $invoice[0]->total; ?></strong></td>
        </tr>
      </table>
      </div>

      <?php 					
					if($invoice[0]->payment_type == 'Bank Transfer'){

						$banktransfer = $this->Payment->get_setting_type('Bank Transfer');
						?>
      <p><?php echo $this->lang->line('You can make payments by making transactions directly to seller\'s bank account. Details are as follow');?>:</p>
      <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <td><strong><?php echo $this->lang->line('bankname');?></strong></td>
            <td><strong><?php echo $this->lang->line('branch');?></strong></td>
            <td><strong><?php echo $this->lang->line('accountnumber');?></strong></td>
            <td><strong><?php echo $this->lang->line('accounttype');?></strong></td>
            <td><strong><?php echo $this->lang->line('accountname');?></strong></td>
          </tr>
        </thead>
        <tbody>
          <?php 
							foreach($banktransfer as $index=>$value){ 
								$arr = json_decode($value->detail, true);
															?>
          <tr>
            <td><?php echo $arr['bankname']; ?></td>
            <td><?php echo $arr['branch']; ?></td>
            <td><?php echo $arr['accountnumber']?></td>
            <td><?php echo $arr['accounttype'];?></td>
            <td><?php echo $arr['accountname'];?></td>
          </tr>
          <?php }?>
        </tbody>
      </table>
      </div>
      <?php
					}
					?>
     </div>
    </div>
    <div class="col-md-4 col-sm-4">
      <div class="box_style_2"> <i class="fa fa-fw fa-support"></i>
        <h4><?php echo $this->lang->line('Need Help?');?></h4>
        <a href="tel://<?php echo $property[0]->property_phone;?>" class="phone"><?php echo $property[0]->property_phone;?></a> <small><?php echo $this->lang->line('Monday to Friday 9.00am - 7.30pm');?></small> </div>
    </div>
  </div>
</div>


<p class="text-center">© <?php echo $property[0]->property_name; ?> 2016</p>

</body>
</html>