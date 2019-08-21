<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<section class="parallax-window" style="background:url(<?php echo base_url();?>assets/frontend/img/slide/travelguide.jpg)">
  <div class="parallax-content-1">
    <div class="animated">
      <h1><?php echo $destination[0]->destination_name;?></h1>
      <p><?php echo $this->lang->line('Travel Guide');?></p>
    </div>
  </div>
</section>
<div id="position">
  <div class="container">
    <ul>
      <li><a href="<?php echo base_url()?>"><?php echo $this->lang->line('Home');?></a></li>
      <li><a href="<?php echo base_url();?>travelguide"><?php echo $this->lang->line('Travel Guide');?></a></li>
      <li><a href="<?php echo base_url();?>travelguide?country=<?php echo $destination[0]->destination_country;?>"><?php echo $country[0]->name;?></a></li>
      <li><?php echo $destination[0]->destination_name; ?></li>
    </ul>
  </div>
</div>
<div class="container margin_60">
  <div class="row">
    <div class="col-md-4 col-sm-6"> <img src="<?php echo base_url();?>thumbnail/<?php echo $destination[0]->thumbnail?>/400x300" alt="<?php echo $destination[0]->destination_name;?>" class="img-responsive styled"> </div>
    <div class="col-md-7 col-md-offset-1 col-sm-6">
      <h3><?php echo $destination[0]->destination_name;?> <span><?php echo $this->lang->line('Overview');?></span></h3>
      <p><?php echo nl2br($destination[0]->destination_overview);?></p>
      <h3><?php echo $destination[0]->destination_name;?> <span><?php echo $this->lang->line('Guide');?></span></h3>
      <p><?php echo nl2br($destination[0]->destination_guide);?></p>
    </div>
  </div>
  
  	<?php 
		if(count($tours)){

  		echo '<hr class="add_bottom_45">
  <div class="main_title">
    <h2><span>'.$destination[0]->destination_name.'</span> '.$this->lang->line('Tours').'</h2>
    <p>'.$this->lang->line('Discovery Tours and Activities').'</p>
  </div>';


			$n = 1;
			echo '<div class="row">';
			foreach($tours as $index=>$value){
				
				$url = base_url().'tours/'.$value->category.'/'.$value->tour_slug;
				
				echo '<div class="col-sm-6 col-md-3 col-lg-3">';
				echo '<div class="strip_all_tour_list">';
				echo '<a href="'.$url.'">';
				echo '<div class="img-container">';
				echo '<img src="'.base_url().'thumbnail/'.$value->thumbnail.'/400x300" class="img-responsive">';
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
		}
		?>
  
  
</div>
<?php include('tpl.footer.php');?>