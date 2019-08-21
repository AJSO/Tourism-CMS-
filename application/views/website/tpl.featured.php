<div class="container margin_60">
  <?php foreach($featured['destination'] as $index=>$value){?>
  <div class="main_title">
    <h2><?php echo $value->destination_name; ?> <span><?php echo $this->lang->line('Tours');?></span></h2>
    <p><?php echo substr($value->destination_description,0,100); ?>...</p>
  </div>
  <div class="row">
    <?php 
		
		foreach($featured['tours'][$value->destination_id] as $ii=>$vv){
			
			$url = base_url().'tours/';
			if($property[0]->property_country == $value->destination_country){
				$url .= 'inbound';
			}else{
				$url .= 'outbound';			
			}
			
			$url .= '/'.$vv->tour_slug;
				
			?>
    <div class="col-md-4 col-sm-4">
      <div class="tour_container">
        <div class="img_container"> <a href="<?php echo $url; ?>">
          <div class="img-container"> <img src="<?php echo base_url()?>thumbnail/<?php echo $vv->thumbnail;?>/400x300" alt="<?php echo $vv->tour_name; ?>"> </div>
          <div class="ribbon top_rated"></div>
          <div class="short_info"> <?php echo $vv->type;?> <span class="price"><sup><?php echo $sym[0]->sym;?></sup> <?php echo $this->Currency->convert($vv->tour_price, $vv->tour_currency, $sess[0]->currency, $currency); ?></span> </div>
          </a> </div>
        <div class="tour_title">
          <h3><a href="<?php echo $url;?>"><?php echo $vv->tour_name;?></a></h3>
          <div class="rating"> <i class="fa fa-fw fa-star <?php if($vv->tour_rating >= 1){ echo 'voted';}?>"></i> <i class="fa fa-fw fa-star <?php if($vv->tour_rating >= 2){ echo 'voted';}?>"></i> <i class="fa fa-fw fa-star <?php if($vv->tour_rating >= 3){ echo 'voted';}?>"></i> <i class="fa fa-fw fa-star <?php if($vv->tour_rating >= 4){ echo 'voted';}?>"></i> <i class="fa fa-fw fa-star <?php if($vv->tour_rating >= 5){ echo 'voted';}?>"></i> </div>
        </div>
      </div>
    </div>
    <?php }?>
  </div>
  <div class="clearfix"></div>
  <?php }?>
</div>
