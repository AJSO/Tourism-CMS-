<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<section class="parallax-window" style="background:url(<?php echo base_url();?>assets/frontend/img/slide/<?php echo $category; ?>.jpg); background-position: center center; background-repeat: no-repeat">
  <div class="parallax-content-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center"><?php echo $this->lang->line($category.' title');?></h1>
          <div class="text-center"><?php echo $this->lang->line($category.' description');?></div>
        </div>
      </div>
    </div>
  </div>
</section>
<div id="position">
  <div class="container">
    <ul>
      <li><a href="<?php echo base_url();?>"><?php echo $this->lang->line('Home');?></a></li>
      <li><?php echo $this->lang->line($category);?></li>
    </ul>
  </div>
</div>
<!-- Position -->

<div class="container margin_60">
  <div class="row">
    <aside class="col-lg-3 col-md-3">
      <form method="get">
        <div class="box_style_cat">
          <ul id="cat_nav">
            <li><a href="<?php echo base_url() ?>tours/<?php echo $category; ?>" id="active"><?php echo $this->lang->line('All tours');?></a></li>
            <?php foreach($types as $index=>$value){?>
            <li><a href="<?php echo base_url();?>tours/outbound?type=<?php echo $value->type; ?>"><?php echo $value->type;?> </a></li>
            <?php }?>
          </ul>
        </div>

        <div class="box_style_cat">
          <ul id="cat_nav">
            <li><a href="<?php echo base_url() ?>tours/<?php echo $category; ?>?type=<?php echo $type; ?>" id="active"><?php echo $this->lang->line('Destinations');?></a></li>
            <?php foreach($destination as $index=>$value){?>
            <li><a href="<?php echo base_url() ?>tours/<?php echo $category; ?>?type=<?php echo $type; ?>&destination_id=<?php echo $value->destination_id; ?>"><?php echo $value->destination_name. ', '.$value->name ;?> </a></li>
            <?php }?>
          </ul>
        </div>

<?php if($tour['items'] > 1){?>
        <div id="filters_col"> <?php echo $this->lang->line('Filters');?>
          <div id="collapseFilters">
            <?php if($rate[0]->max_rate != $rate[0]->min_rate ){?>
            <div class="filter_type">
              <h6>
                <label for="amount"><?php echo $this->lang->line('Price range')?>:</label>
                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                <input type="hidden" name="min_rate_select">
                <input type="hidden" name="max_rate_select">
              </h6>
              <div id="slider-range"></div>
              <script>	
  $(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: <?php echo number_format($rate[0]->min_rate,0,'','');?>,
      max: <?php echo number_format($rate[0]->max_rate,0,'','');?>,
      values: [ <?php echo number_format($min_rate_select,0,'',''). ','.number_format($max_rate_select,0,'',''); ?> ],
      slide: function( event, ui ) {				
        $( "#amount" ).val( '<?php echo $sym[0]->sym; ?>'+(ui.values[ 0 ]).formatMoney(0) + " - <?php echo $sym[0]->sym; ?>" + (ui.values[ 1 ]).formatMoney(0));
				$('input[name=min_rate_select]').val( ui.values[ 0 ]);
				$('input[name=max_rate_select]').val( ui.values[ 1 ]);
      }
    });
    $( "#amount" ).val('<?php echo $sym[0]->sym; ?>'+
		 ($( "#slider-range" ).slider( "values", 0 )).formatMoney(0) +
      " - <?php echo $sym[0]->sym; ?>" + ($( "#slider-range" ).slider( "values", 1 )).formatMoney(0) );
  });
	
  </script> 
            
            
            </div>
            <?php
}
?>
            <div class="filter_type">
              <h6><?php echo $this->lang->line('Rating');?></h6>
              <ul>
                <li>
                  <label>
                    <input type="checkbox" name="rating[]" value="5" <?php if(in_array(5,$rating)){ echo ' checked';}?>>
                    <span class="rating"> <i class="fa fa-fw fa-star voted"></i><i class="fa fa-fw fa-star voted"></i><i class="fa fa-fw fa-star voted"></i><i class="fa fa-fw fa-star voted"></i><i class="fa fa-fw fa-star voted"></i> </span></label>
                </li>
                <li>
                  <label>
                    <input type="checkbox" name="rating[]" value="4" <?php if(in_array(4,$rating)){ echo ' checked';}?>>
                    <span class="rating"> <i class="fa fa-fw fa-star voted"></i><i class="fa fa-fw fa-star voted"></i><i class="fa fa-fw fa-star voted"></i><i class="fa fa-fw fa-star voted"></i><i class="fa fa-fw fa-star"></i> </span></label>
                </li>
                <li>
                  <label>
                    <input type="checkbox" name="rating[]" value="3" <?php if(in_array(3,$rating)){ echo ' checked';}?>>
                    <span class="rating"> <i class="fa fa-fw fa-star voted"></i><i class="fa fa-fw fa-star voted"></i><i class="fa fa-fw fa-star voted"></i><i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star"></i> </span></label>
                </li>
                <li>
                  <label>
                    <input type="checkbox" name="rating[]" value="2" <?php if(in_array(2,$rating)){ echo ' checked';}?>>
                    <span class="rating"> <i class="fa fa-fw fa-star voted"></i><i class="fa fa-fw fa-star voted"></i><i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star"></i> </span></label>
                </li>
                <li>
                  <label>
                    <input type="checkbox" name="rating[]" value="1" <?php if(in_array(1,$rating)){ echo ' checked';}?>>
                    <span class="rating"> <i class="fa fa-fw fa-star voted"></i><i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star"></i><i class="fa fa-fw fa-star"></i> </span></label>
                </li>
              </ul>
              <button type="submit" class="btn_1"><?php echo $this->lang->line('Filters');?></button>
              <input type="hidden" name="type" value="<?php echo $type;?>">
              <input type="hidden" name="destination_id" value="<?php echo $destination_id; ?>">
              <input type="hidden" name="sort_price" value="<?php echo $this->input->get('sort_price');?>">
              <input type="hidden" name="sort_rating" value="<?php echo $this->input->get('sort_rating');?>">
              
            </div>
          </div>
        </div>
        <?php }?>
        <div class="box_style_2"> <i class="fa fa-fw fa-support"></i>
          <h4><?php echo $this->lang->line('Need Help?')?></h4>
          <a href="tel://<?php echo $property[0]->property_phone;?>" class="phone"><?php echo $property[0]->property_phone;?></a> <small><?php echo $this->lang->line('Monday to Friday 9.00am - 7.30pm');?></small> </div>
      </form>
    </aside>
    <!--End aside -->
    <div class="col-lg-9 col-md-9">
    	<form method="get">
      <div id="tools">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="styled-select-filters">
              <select name="sort_price" id="sort_price">
                <option value="" selected=""><?php echo $this->lang->line('Sort by price');?></option>
                <option value="asc"<?php if($this->input->get('sort_price') == 'asc'){ echo ' selected';}?>><?php echo $this->lang->line('Lowest price');?></option>
                <option value="desc"<?php if($this->input->get('sort_price') == 'desc'){ echo ' selected';}?>><?php echo $this->lang->line('Highest price');?></option>
              </select>
            </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="styled-select-filters">
              <select name="sort_rating" id="sort_rating">
                <option value="" selected=""><?php echo $this->lang->line('Sort by ranking');?></option>
                <option value="asc"<?php if($this->input->get('sort_rating') == 'asc'){ echo ' selected';}?>><?php echo $this->lang->line('Lowest ranking');?></option>
                <option value="desc"<?php if($this->input->get('sort_rating') == 'desc'){ echo ' selected';}?>><?php echo $this->lang->line('Highest ranking');?></option>
              </select>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 hidden-xs text-right"> </div>
        </div>
      </div>
      </form>
      
      <script>
      $('#sort_price').change(function(){
				window.location.href = '<?php echo base_url();?>tours/<?php echo $category;?>?sort_price=' + this.value;
			});
      $('#sort_rating').change(function(){
				window.location.href = '<?php echo base_url();?>tours/<?php echo $category;?>?sort_rating=' + this.value;
			});
      </script>
      
      <?php 
			foreach($tour['rows'] as $index=>$value){
				$url = base_url().'tours/'.$category.'/'.$value->tour_slug;
				?>
      <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="img_list"><a href="<?php echo $url;?>"> <img src="<?php echo base_url() ?>thumbnail/<?php echo $value->thumbnail?>/800x400" alt="Image">
              <div class="short_info"><?php echo $value->type;?> </div>
              </a> </div>
          </div>
          <div class="clearfix visible-xs-block"></div>
          <div class="col-lg-5 col-md-5 col-sm-5">
            <div class="tour_list_desc">
              <h3><a href="<?php echo $url; ?>"><?php echo $value->tour_name;?></a></h3>
              <?php echo $value->destination_name; ?>, <?php echo $value->name; ?><br>
              <div class="rating"> <i class="fa fa-fw fa-star <?php if($value->tour_rating >=1){ echo 'voted';}?>"></i> <i class="fa fa-fw fa-star <?php if($value->tour_rating >=2){ echo 'voted';}?>"></i> <i class="fa fa-fw fa-star <?php if($value->tour_rating >=3){ echo 'voted';}?>"></i> <i class="fa fa-fw fa-star <?php if($value->tour_rating >=4){ echo 'voted';}?>"></i> <i class="fa fa-fw fa-star <?php if($value->tour_rating >=5){ echo 'voted';}?>"></i> </div>
              <p><?php echo $value->tour_description;?></p>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="price_list">
              <div>
              	<?php echo $sym[0]->sym?><?php 
							echo $this->Currency->convert($value->tour_price, $value->tour_currency, $sess[0]->currency, $currency);
							?>
                <?php if($value->tour_price_cross > 1){?>
                <span class="normal_price_list"><?php echo $sym[0]->sym?><?php 
							echo $this->Currency->convert($value->tour_price_cross, $value->tour_currency, $sess[0]->currency, $currency);
							
							 ?>
                </span>
                <?php }else{ echo '<br><br>';}?>
                <small>*<?php echo $this->lang->line('Per person');?></small>
                <p><a href="<?php echo $url;?>" class="btn_1"><?php echo $this->lang->line('Details');?></a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
      <?php 
			if($tour['pages'] > 1){
				$url = base_url().'tours/'.$category;
				$url .= '?min_rate_select='.$min_rate_select.'&max_rate_select='.$max_rate_select;
				$url .= '&sort_price='.$this->input->get('sort_price');
				$url .= '&tour_rating='.$this->input->get('tour_rating');
			?>
      <hr>
      <div class="text-center"> <?php echo $this->Paginate->pages($url, $page, $tour['pages']);?> </div>
      <?php 
			}?>
    </div>
  </div>
</div>
<?php include('tpl.footer.php');?>
