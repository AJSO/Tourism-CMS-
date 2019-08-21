<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Payments</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li><a href="<?php echo base_url();?>admin/payment">Payments</a></li>
              <li class="active">View</li>
            </ol>
          </div>
        </div>
      </div>
    </header>
    <section class="box-typical box-typical-padding">
      <div class="box_style_1">
        <h3>Thank you for your order #invoice <?php echo $invoice[0]->id; ?></h3>
        <p>Thank you for shopping with us. We have received your order and it is currently being processed</p>
        <p><strong>Customer information</strong></p>
        <?php 
					$customer = json_decode($invoice[0]->customer, true);
					$country = $this->Country->get_code($customer['country']);
					$items = json_decode($invoice[0]->item,true);

					echo '<p>';
					echo $customer['firstname'] . ' '.$customer['lastname'].'<br>';
					echo '<strong>Address</strong>: ' . $customer['address'] . ' '.$customer['city'] . ' ';
					echo $customer['state'] . ' '. $customer['zipcode']. ' '.$country[0]->name. '<br>';
					echo '<strong>Phone</strong>: '.$customer['phone']. ' ';
					echo '<strong>Fax</strong>: '.$customer['fax'] . ' ';
					echo '<strong>Email</strong>: <a href="mailto:'.$invoice[0]->customer_email.'">'.$invoice[0]->customer_email.'</a>';
					echo '</p>';
					?>
        <p><strong><?php echo $this->lang->line('Order Information');?></strong></p>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th nowrap="nowrap">Items</th>
                <th width="68" nowrap="nowrap">Check-in</th>
                <th width="66" nowrap="nowrap">Adults</th>
                <th width="31" nowrap="nowrap">Child</th>
                <th width="31" nowrap="nowrap">Cost</th>
                <th width="26" nowrap="nowrap">Tax</th>
                <th nowrap="nowrap" class="text-right">Total</th>
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
                <td nowrap="nowrap"><?php
								echo date('F d Y',strtotime($value['checkin'])); 
								if(isset($value['time'])){
									echo ' ';
									echo substr($value['time'],0,5);
								}
								?></td>
                <td nowrap="nowrap"><?php echo $value['adults']; ?></td>
                <td nowrap="nowrap"><?php echo $value['child'];?></td>
                <td nowrap="nowrap"><?php echo $value['cost'];?></td>
                <td nowrap="nowrap"><?php echo $value['tax'];?></td>
                <td align="right" nowrap="nowrap"><?php echo $value['total']; ?></td>
              </tr>
              <?php 
					}
					?>
            <?php $currency = $this->Currency->get_code($invoice[0]->currency); ?>
            <tr>
              <td colspan="6" align="right" nowrap="nowrap"><strong>Total:</strong></td>
              <td width="80" align="right" nowrap="nowrap"><strong><?php echo $invoice[0]->cost?></strong></td>
            </tr>
            <tr>
              <td colspan="6" align="right" nowrap="nowrap"><strong>Tax:</strong></td>
              <td align="right" nowrap="nowrap"><strong><?php echo $invoice[0]->tax; ?></strong></td>
            </tr>
            <tr>
              <td colspan="5" nowrap="nowrap" >* Currencies are in <?php echo $currency[0]->name; ?></td>
              <td align="right" nowrap="nowrap"><strong>Grand Total:</strong></td>
              <td align="right" nowrap="nowrap"><strong><?php echo $invoice[0]->total; ?></strong></td>
            </tr>
            </tbody>
          </table>
        </div>
        <?php 					
					if($invoice[0]->payment_type == 'Bank Transfer'){

						$banktransfer = $this->Payment->get_setting_type('Bank Transfer');
						?>
        <p>You can make payments by making transactions directly to seller's bank account. Details are as follow:</p>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <td><strong>Bank Name</strong></td>
                <td><strong>Branch</strong></td>
                <td><strong>Account Number</strong></td>
                <td><strong>Account Type</strong></td>
                <td><strong>Account Name</strong></td>
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
    </section>
  </div>
</div>
<?php include('tpl.footer.php');?>