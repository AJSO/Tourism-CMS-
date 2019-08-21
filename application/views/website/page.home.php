<?php
include('tpl.meta.php');
include('tpl.header.php');
include('tpl.slide.php');

include('tpl.featured.php');

?>
<div class="white_bg">
  <div class="container margin_60">
    <div class="main_title">
      <h2><?php echo $this->lang->line('Other Popular Tours');?></h2>
      <p><?php echo $this->lang->line('Discovery Tours and Activities');?></p>
    </div>
    <div class="row add_bottom_45">
    	
      <?php 
			$n = 1;
			$x = 0;
			while($n <= 3){?>
      <div class="col-md-4 other_tours">
        <ul>
        	<?php 
					for($i=1; $i<=6; $i++){
						if(isset($populartours[$x])){
						?>
          <li><a href="<?php echo $populartours[$x]->link; ?>">
						<?php echo $populartours[$x]->widget_title; ?><span class="other_tours_price">
						<?php echo $populartours[$x]->widget_description;?></span></a> </li>
          	<?php
						}
						$x++;
					}?>
        </ul>
      </div>
      <?php 
				$n++;
			}
			?>
    </div>
  </div>
</div>

<script src="<?php echo base_url();?>assets/frontend/rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script src="<?php echo base_url();?>assets/frontend/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script src="<?php echo base_url();?>assets/frontend/js/revolution_func.js"></script>
<?php include('tpl.footer.php');?>