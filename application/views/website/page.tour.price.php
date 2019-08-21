<form method="post" action="<?php echo base_url().'tours/addcart';?>">
  <table class="table">
    <thead>
      <tr>
        <th colspan="2"><?php echo $tour[0]->tour_name?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $this->lang->line('Check-in');?>:</td>
        <td><?php 
			list($y,$m,$d) = explode('-',$checkin);
			echo date('F d Y', mktime(0,0,0,$m,$d,$y));?></td>
      </tr>
      <tr>
        <td><?php echo $this->lang->line('Adults');?>:</td>
        <td><?php echo $adults;?></td>
      </tr>
      <?php if($child){?>
      <tr>
        <td><?php echo $this->lang->line('Children');?>:</td>
        <td><?php echo $child;?></td>
      </tr>
      <?php }?>
      <tr>
        <td><?php echo $this->lang->line('Price');?>:</td>
        <td><?php echo $sess[0]->currency. ' '.$this->Currency->convert($price, $tour[0]->tour_currency, $sess[0]->currency, $currency);?></td>
      </tr>
    </tbody>
  </table>
  <input type="submit" class="btn_full" value="<?php echo $this->lang->line('Book Now');?>">
  
  <input type="hidden" name="checkin" value="<?php echo $checkin;?>">
  <input type="hidden" name="adults" value="<?php echo $adults;?>">
  <input type="hidden" name="child" value="<?php echo $child;?>">
  <input type="hidden" name="cost" value="<?php echo $price; ?>">
  <input type="hidden" name="currency" value="<?php echo $tour[0]->tour_currency;?>">
  <input type="hidden" name="item" value="<?php echo $tour[0]->tour_name; ?>">
  
  <input type="button" id="edit-form" class="btn btn-block btn-link" value="<?php echo $this->lang->line('Change Date');?>">
</form>
<script>
$('#edit-form').click(function(){
	$('#date-select-2').hide();
	$('#date-select-1').fadeIn();
});
</script>