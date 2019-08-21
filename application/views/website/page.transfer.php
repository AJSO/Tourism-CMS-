<?php 
include('tpl.meta.php');
include('tpl.header.php');
?>
<section class="parallax-window" style="background:url(<?php echo base_url();?>assets/frontend/img/slide/transfer.jpg) center center no-repeat; background-size: 100%;">
  <div class="parallax-content-2">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-8">
          <h1><?php echo $this->lang->line('Transfer Services');?></h1>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End section -->

<div id="position">
  <div class="container">
    <ul>
      <li><a href="<?php echo base_url(); ?>"><?php echo $this->lang->line('Home');?></a></li>
      <li><?php echo $this->lang->line('Transfers');?></li>
    </ul>
  </div>
</div>
<!-- End Position -->

<div class="container margin_60">
  <div class="row">
    <div id="single_tour_desc" class="col-md-8">
      <div class="row">
        <div class="col-md-3">
          <h3><?php echo $this->lang->line('Description');?></h3>
        </div>
        <div class="col-md-9">
        	<?php if(isset($service[0]->description)){?>
          <h4><?php echo $service[0]->title;?></h4>
          <p><?php echo nl2br($service[0]->description);?> </p>
          <?php }?>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-3">
          <h3><?php echo $this->lang->line('Terms & Conditions');?></h3>
        </div>
        <div class="col-md-9">
        	<?php if(isset($term[0]->term_description)){?>
          <p> 
						<?php  echo nl2br($term[0]->term_description);?>
          </p>
          <?php }?>
        </div>
      </div>
    </div>
    <aside class="col-md-4">
      <form method="post" id="form-transfer" action="<?php echo base_url();?>transfer/addcart">
        <div class="box_style_1">
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="form-group">
                <label><?php echo $this->lang->line('Your trip');?></label>
                <select name="trip" class="form-control">
                  <option value="oneway"><?php echo $this->lang->line('One way');?></option>
                  <option value="roundtrip"><?php echo $this->lang->line('Roundtrip');?></option>
                </select>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label><?php echo $this->lang->line('Date');?></label>
                <input class="form-control date-pick" name="checkin" required value="<?php echo date('m/d/Y');?>">
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label><?php echo $this->lang->line('Time');?></label>
                <input class="form-control time-pick" name="checkin_time" required>
              </div>
            </div>
            <div class="col-md-12 col-sm-12">
              <div class="form-group">
                <label><?php echo $this->lang->line('Car');?></label>
                <select name="car_id" class="form-control" required>
                  <?php foreach($cars as $index=>$value){?>
                  <option value="<?php echo $value->car_id; ?>"><?php echo $value->car_brand. ' - '. $value->car_model .' '.$value->car_year;?></option>
                  <?php }?>
                </select>
              </div>
            </div>
            <div class="col-md-12 col-sm-12">
              <div class="form-group">
                <label><?php echo $this->lang->line('Destinaion');?></label>
                <select name="destination_id" class="form-control" required>
                <option value=""> - <?php echo $this->lang->line('Select');?> - </option>
                  <?php 
							foreach($destination as $index=>$value){
								echo '<option value="'.$value->destination_id.'">'.$value->destination_name.'</option>';
							}
							?>
                </select>
              </div>
            </div>
          </div>
          <!-- End row -->
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="form-group">
                <label><?php echo $this->lang->line('Departure');?></label>
                <select name="pickup" class="form-control" required>
                	<option value="0"> - <?php echo $this->lang->line('Select');?> - </option>
                  <?php foreach($area as $index=>$value){?>
                  <option value="<?php echo $value->area_id?>"> <?php echo $value->area_name; ?></option>
                  <?php }?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label><?php echo $this->lang->line('Arrival');?></label>
                <select name="dropoff" class="form-control" required>
                	<option value="0"> - <?php echo $this->lang->line('Select');?> - </option>
                  <?php 
								foreach($area as $index=>$value){
									if($value->area_id != $area_id){	
									?>
                  <option value="<?php echo $value->area_id;?>"><?php echo $value->area_name; ?></option>
                  <?php 
									}
								}?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
          	<div class="col-md-12">
            	<div class="form-group">
              	<label><?php echo $this->lang->line('Price');?></label>
                <input id="price_show" class="form-control" readonly required>
                                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
            	<input type="hidden" name="price">
              <input name="save" value="<?php echo $this->lang->line('Book Now');?>" class="btn_1 btn-block" id="submit-contact" type="submit">
            </div>
          </div>
        </div>
        <div class="box_style_4">
          <div class="circle"> <i class="fa fa-fw fa-phone"></i> </div>
          <h4><?php echo $this->lang->line('Book by phone');?></h4>
          <a href="tel://<?php echo $property[0]->property_phone;?>" class="phone"><?php echo $property[0]->property_phone;?></a> <small><?php echo $this->lang->line('Monday to Friday 9.00am - 7.30pm');?></small> </div>
      </form>
    </aside>
  </div>
</div>
<script>

$('select[name=trip]').change(function(){
	var destination_id = $('select[name=destination_id]').val();
	var car_id = $('select[name=car_id]').val();
	var pickup = $('select[name=pickup]').val();
	var dropoff = $('select[name=dropoff]').val();
	
	var url = '<?php echo base_url();?>transfer/rate?car_id='+ car_id +'&destination_id=' + destination_id + '&pickup=' + pickup + '&dropoff=' + dropoff;
	
	$.ajax({
		url: url,
		type:'GET'
	}).done(function(msg) {
		if(msg != 'N/A'){
			
			if($('select[name=trip]').val() == 'oneway'){
				trip = 1;
			}else{
				trip = 2;
			}
			var money = eval(msg);
			var m = (money).formatMoney(0) * trip;
					
			$('#price_show').val(m);
			$('input[name=price]').val(money);
		}else{
			$('#price_show').val('N/A');
			$('input[name=price]').val('');		
		}
	});	

});

$('select[name=car_id]').change(function(){
	var url = '<?php echo base_url();?>transfer/destination';
	$('select[name=destination_id]').load(url);

	var pickup = '<?php echo base_url();?>transfer/pickup?destination_id=0';
	var dropoff = '<?php echo base_url();?>transfer/dropoff?destination_id=0';
		
	$('select[name=pickup]').load(pickup);
	$('select[name=dropoff]').load(dropoff);
	$('#price_show').val('N/A');
	$('input[name=price]').val('');

});

$('select[name=destination_id]').change(function(){
	var pickup = '<?php echo base_url();?>transfer/pickup?destination_id=' + this.value;
	var dropoff = '<?php echo base_url();?>transfer/dropoff?destination_id=' + this.value;
		
	$('select[name=pickup]').load(pickup);
	$('select[name=dropoff]').load(dropoff);
	$('#price_show').val('N/A');
	$('input[name=price]').val('');

});

$('select[name=pickup]').change(function(){
	var destination_id = $('select[name=destination_id]').val();
	var area_id = this.value;
	var url = '<?php echo base_url();?>transfer/dropoff?destination_id=' + destination_id + '&pickup=' + area_id;
	$('select[name=dropoff]').load(url);
	$('#price_show').val('N/A');
	$('input[name=price]').val('');

});

$('select[name=dropoff]').change(function(){
	
	var destination_id = $('select[name=destination_id]').val();
	var car_id = $('select[name=car_id]').val();
	var pickup = $('select[name=pickup]').val();
	
	var url = '<?php echo base_url();?>transfer/rate?car_id='+ car_id +'&destination_id=' + destination_id + '&pickup=' + pickup + '&dropoff=' + this.value;
	
	$.ajax({
		url: url,
		type:'GET'
	}).done(function(msg) {
		if(msg != 'N/A'){
			
			if($('select[name=trip]').val() == 'oneway'){
				var trip = 1;
			}else{
				var trip = 2;
			}
			var money = eval(msg)* trip;
			var m = (money).formatMoney(0);
					
			$('#price_show').val(m);
			$('input[name=price]').val(money);
		}else{
			$('#price_show').val('N/A');
			$('input[name=price]').val('');		
		}
	});	
});

$('.date-pick').datepicker({
	"startDate": '0d'
});

$('.time-pick').timepicker({});
$('#form-transfer').validate({
  submitHandler: function(form) {
    if(	$('input[name=price]').val() == false){
			alert('<?php echo $this->lang->line('Not Available'); ?>');
			return false;
		}else{
			$(form).submit();
		}
  }	
});

</script>
<?php include('tpl.footer.php');?>
