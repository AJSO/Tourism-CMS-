<?php
include('tpl.meta.php');
include('tpl.header.php');
?>
<section class="parallax-window" style="background:url(<?php echo base_url().'thumbnail/'.$tour[0]->thumbnail.'/';?>1400x470)">
<div class="parallax-content-2">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8">
        <h1><?php echo $tour[0]->tour_name;?></h1>
        <span><?php echo $destination[0]->destination_name;?>, <?php echo $country[0]->name; ?></span> <span class="rating"> <i class="fa fa-star <?php if($tour[0]->tour_rating >= 1){ echo 'voted';}?>"></i> <i class="fa fa-star <?php if($tour[0]->tour_rating >= 2){ echo 'voted';}?>"></i> <i class="fa fa-star <?php if($tour[0]->tour_rating >= 3){ echo 'voted';}?>"></i> <i class="fa fa-star <?php if($tour[0]->tour_rating >= 4){ echo 'voted';}?>"></i> <i class="fa fa-star <?php if($tour[0]->tour_rating >= 5){ echo 'voted';}?>"></i> </div>
      <div class="col-md-4 col-sm-4">
        <div id="price_single_main"> <?php echo $this->lang->line('from');?> <span>
          <?php 
				echo $sym[0]->sym.$this->Currency->convert($tour[0]->tour_price, $tour[0]->tour_currency, $sess[0]->currency, $currency);
				?>
          </span>
      </div>
    </div>
  </div>
</div>
</section>
<!-- End section -->

<div id="position">
  <div class="container">
    <ul>
      <li><a href="<?php echo base_url();?>"><?php echo $this->lang->line('Home');?></a></li>
      <li><a href="<?php echo base_url();?>tours/<?php echo $category;?>"><?php echo $this->lang->line($category);?></a></li>
      <li><a href="<?php echo base_url();?>tours/<?php echo $category;?>?desitnation_id=<?php echo $destination[0]->destination_id;?>"><?php echo $destination[0]->destination_name;?></a></li>
      <li><?php echo $tour[0]->tour_name;?></li>
    </ul>
  </div>
</div>
<!-- End Position -->

<div class="container margin_60">
  <div class="row">
    <div class="col-md-8" id="single_tour_desc">
      <div class="row">
        <div class="col-md-3">
          <h3><?php echo $this->lang->line('Overview')?></h3>
        </div>
        <div class="col-md-9">
          <h4><?php echo $tour[0]->tour_name;?></h4>
          <p><?php echo nl2br($tour[0]->tour_overview);?></p>
          <h4><?php echo $this->lang->line('Tour Inclusion')?></h4>
          <p><?php echo nl2br($tour[0]->tour_inclusion);?></p>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-3">
          <h3><?php echo $this->lang->line('Schedule')?></h3>
        </div>
        <div class="col-md-9"> <?php echo nl2br($tour[0]->tour_specifications);?> </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-3">
          <h3><?php echo $this->lang->line('Terms & Conditions')?></h3>
        </div>
        <div class="col-md-9"> <?php echo nl2br($term[0]->term_description);?> </div>
      </div>
    </div>
    <!--End  single_tour_desc-->
    
    <aside class="col-md-4">
      <form id="date-select" method="get">
      	<div id="date-select-2" style="<?php echo 'display:none;';?>" class="box_style_1 expose">
        	<div class="inner"></div>
        </div>
        <div id="date-select-1" class="box_style_1 expose">
          <p class="text-center"><strong><?php echo $this->lang->line('Check Availability')?></strong></p>
          <hr>
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="form-group">
                <label><?php echo $this->lang->line('Select date');?></label>
                <input class="date-pick form-control" name="checkin" data-date-format="M d, yyyy" type="text" required readonly>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label><?php echo $this->lang->line('Adults');?></label>
                <select class="form-control" name="adults">
                  <?php 
								$n = 1;
								while($n<=12){?>
                  <option value="<?php echo $n;?>"><?php echo $n;?></option>
                  <?php 
									$n++;
								}
								?>
                </select>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label><?php echo $this->lang->line('Children');?></label>
                <select class="form-control" name="child">
                  <?php 
								$n = 0;
								while($n<=12){?>
                  <option value="<?php echo $n;?>"><?php echo $n;?></option>
                  <?php 
									$n++;
								}
								?>
                </select>
              </div>
            </div>
          </div>
          <input name="save" type="submit" class="btn_full" value="<?php echo $this->lang->line('Check Availability');?>">
          <input name="tour_id" type="hidden" value="<?php echo $tour[0]->tour_id; ?>">
        </div>
      <script>
				$('.date-pick').datepicker({
					startDate: '<?php echo '+'.$tour[0]->tour_cutof;?>d'
				});      
				$('#date-select').validate({
					submitHandler:function (form) {
						
							var url = '<?php echo base_url()?>tours/checkrate?child='+ $('select[name=child]').val() + '&adults='+ $('select[name=adults]').val() + '&tour_id='+$('input[name=tour_id]').val()+'&checkin=' + encodeURI($('input[name=checkin]').val());
							$('#date-select-2 .inner').load(url);
							$('#date-select-1').hide();
							$('#date-select-2').fadeIn();
							return false;
						}
					});
      </script>
      <div class="box_style_4">
        <div class="circle"> <i class="fa fa-fw fa-phone"></i> </div>
        <h4><?php echo $this->lang->line('Book by phone');?></h4>
        <a href="tel://<?php echo $property[0]->property_phone;?>" class="phone"><?php echo $property[0]->property_phone;?></a> <small><?php echo $this->lang->line('Monday to Friday 9.00am - 7.30pm');?></small> </div>
      </form>

    </aside>
  </div>
  	<?php 
		if(count($related)){
			$n = 1;
			
			echo '<hr>';
			
			
			echo '<div class="main_title">';
			echo '<h2><span>'.$destination[0]->destination_name.'</span> '.$this->lang->line('Tours').'</h2>';
			echo '<p>'.$this->lang->line('Discovery Tours and Activities').'</p>';
			echo '</div>';
			
			echo '<div class="row">';
			foreach($related as $index=>$value){

				$url = base_url().'tours/'.$value->category.'/'.$value->tour_slug;

				echo '<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">';
				echo '<div class="strip_all_tour_list">';
				echo '<a href="'.$url.'">';
				echo '<div class="img-container">';
				echo '<img src="'.base_url().'thumbnail/'.$value->thumbnail.'/400x300">';
				echo '</div>';
				echo '</a>';
				echo '<p class="tour-travelguide"><a href="'.$url.'">'.$value->tour_name.'</a></p>';
				echo '</div>';
				echo '</div>';
				if($n%4 ==0){
					echo '<div class="clearfix"></div>';
				}
				$n++;
			}
			echo '</div>';
		}?>
  
</div>
<?php include('tpl.footer.php');?>
