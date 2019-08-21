<footer>
  <div class="container">
  	<div class="row">
    	<div class="col-md-12 text-center">
          <ul class="list-inline">
            <li><a href="<?php echo base_url();?>"><?php echo $this->lang->line('Home');?></a></li>
            <li><a href="<?php echo base_url();?>tours/inbound"><?php echo $this->lang->line('Tours Inbound');?></a></li>
            <li><a href="<?php echo base_url();?>tours/outbound"><?php echo $this->lang->line('Tours Outbound');?></a></li>
            <li><a href="<?php echo base_url();?>transfer"><?php echo $this->lang->line('Transfers')?></a></li>
            <li><a href="<?php echo base_url();?>travelguide"><?php echo $this->lang->line('Travel Guide');?></a></li>
            <li><a href="<?php echo base_url();?>contactus"><?php echo $this->lang->line('Contact Us');?></a></li>
          </ul>
      	<p>
				<?php echo $this->lang->line('Need help?');?>
         <?php echo $this->lang->line('Phone');?>: <a href="tel://<?php echo $property[0]->property_phone;?>"><?php echo $property[0]->property_phone;?></a>
         <?php echo $this->lang->line('Email');?>: <a href="mailto:<?php echo $property[0]->property_email; ?>"><?php echo $property[0]->property_email;?></a>   
         </p>   
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div id="social_footer">
          <ul>
            <?php 
						$socails = json_decode($property[0]->social,true);
						foreach($socails as $index=>$value){
							if($value){
						?>
            <li><a href="<?php echo $value;?>" target="_blank"><i class="icon-<?php echo $index; ?>"></i></a></li>
            <?php
							}
						}
						?>
          </ul>
          
          © <?php echo $property[0]->property_name; ?> <?php echo date('Y');?>
        </div>
      </div>
    </div>
  </div>
</footer>
<script src="<?php echo base_url();?>assets/frontend/js/scripts.js"></script>
</body>
</html>