<?php
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Connecting to PayPal</title>
</head>
<body>
<center>
<h1><?php echo $this->lang->line('Connecting to PayPal');?></h1>
<img src="<?php echo base_url();?>assets/frontend/img/paypal.png" border="0" alt="PayPal Logo">
</center>
<form id="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="business" value="<?php echo $arr['username'];?>">
  <input type="hidden" name="item_name" value="ORDER NUMBER: <?php echo $invoice[0]->id; ?>">
  <input type="hidden" name="quantity" value="1">
  <input type="hidden" name="amount" value="<?php echo $invoice[0]->total; ?>">
  <input type="hidden" name="currency_code" value="<?php echo $invoice[0]->currency;?>">
  <input type="hidden" name="invoice" value="<?php echo $invoice[0]->id; ?>">
  <input type="hidden" name="first_name" value="<?php echo $customer['firstname']; ?>">
  <input type="hidden" name="last_name" value="<?php echo $customer['lastname']; ?>">
  <input type="hidden" name="address1" value="<?php echo $customer['address'];?>">
  <input type="hidden" name="address2" value="">
  <input type="hidden" name="city" value="<?php echo $customer['city'];?>">
  <input type="hidden" name="zip" value="<?php echo $customer['zipcode'];?>">
  <input type="hidden" name="country" value="<?php echo $customer['country'];?>">
  <input type="hidden" name="email" value="<?php echo $invoice[0]->customer_email;?>" />
  <input type="hidden" name="notify_url" value="<?php echo base_url().'paypal/ipn?id=' . $invoice[0]->id ;?>">
  <input type="hidden" name="return" value="<?php echo base_url().$sess[0]->lang.'/thankyou?id=' . $invoice[0]->id ; ?>">
</form>
<script>
document.getElementById('paypal').submit();
</script>
</body>
</html>
