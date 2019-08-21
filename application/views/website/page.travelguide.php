<?php
include('tpl.meta.php');
include('tpl.header.php');
?>
<section class="parallax-window" style="background:url(<?php echo base_url();?>assets/frontend/img/slide/travelguide.jpg)">
  <div class="parallax-content-1">
    <div class="animated">
      <h1><?php echo $this->lang->line('Travel Guide');?></h1>
      <p><?php echo $this->lang->line('Travel Guide Description');?></p>
    </div>
  </div>
</section>
<!-- End section -->

<div id="position">
  <div class="container">
    <ul>
      <li><a href="<?php echo base_url()?>"><?php echo $this->lang->line('Home');?></a></li>
      <?php 
			if(isset($country)){
			?>
      <li><a href="<?php echo base_url();?>travelguide"><?php echo $this->lang->line('Travel Guide');?></a></li>
      <li><?php echo $country[0]->name;?></li>
			<?php
			}else{?>
      <li class="active"><?php echo $this->lang->line('Travel Guide');?></li>
      <?php }?>
    </ul>
  </div>
</div>

<div class="container margin_60">
  <div class="row">
    <aside class="col-lg-3 col-md-3">
        
      <div class="box_style_cat">
        <ul id="cat_nav">
          <li><a href="#" id="active"><?php echo $this->lang->line('All Countries');?></a></li>
          <?php foreach($countries as $index=>$value){?>
          <li><a href="<?php echo base_url();?>travelguide?country=<?php echo $value->code;?>"><?php echo $value->name;?></a></li>
          <?php }?>
        </ul>
      </div>
      <?php include('tpl.needhelp.php');?>
    </aside>
    <!--End aside -->
    <div class="col-lg-9 col-md-9">
      <?php 
			
			foreach($destination['rows'] as $index=>$value){
				
				$url = base_url().'travelguide/'.$value->destination_slug;
				?>
      <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="img_list">
            	<a href="<?php echo $url;?>">
              <img src="<?php echo base_url()?>thumbnail/<?php echo $value->thumbnail; ?>/400x300" alt="Image">
              </a> 
            </div>
          </div>
          <div class="clearfix visible-xs-block"></div>
          <div class="col-lg-0 col-md-8 col-sm-8">
            <div class="tour_list_desc">
              <h3><a href="<?php echo $url; ?>"><?php echo $value->destination_name;?>, <?php echo $value->name; ?></a></h3>
              <p><?php echo $value->destination_description;?></p>
            </div>
          </div>
        </div>
      </div>
      <?php
      }
			if($destination['pages']  > 1){

				$url = base_url().'travelguide';
				if(isset($country)){
					$url .= '?country='.$country;
				}
			?>
      <hr>
      <div class="text-center"> <?php echo $this->Paginate->pages($url, $page, $destination['pages']);?> </div>
      <?php 

			}
			?>
    </div>
  </div>
</div>
<?php include('tpl.footer.php');?>