<div class="layer"></div>
<header id="plain">
  <div id="top_line">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6"></div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <ul id="top_links">
						<li><a href="<?php echo base_url();?>profile"><i class="fa fa-fw fa-user"></i><?php echo $this->lang->line('My Account');?></a></li>
          	<li><a href="<?php echo base_url();?>cart"><i class="fa fa-fw fa-shopping-cart"></i> <?php echo $this->lang->line('Shopping Cart');?></a></li>
            <li><a href="<?php echo base_url();?>signout"><i class="fa fa-fw fa-power-off"></i><?php echo $this->lang->line('Sign out');?></a></li>
          </ul>
        </div>
      </div>
      <!-- End row --> 
    </div>
    <!-- End container--> 
  </div>
  <!-- End top line-->
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-3 col-xs-3">
        <div id="logo_home">
          <h1><a href="<?php echo base_url();?>" title="<?php echo $property[0]->property_name; ?>"><?php echo $property[0]->property_name; ?></a></h1>
        </div>
      </div>
      <nav class="col-md-9 col-sm-9 col-xs-9"> <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
        <div class="main-menu">
          <div id="header_menu"> <img src="<?php echo base_url()?>assets/frontend/img/logo_sticky.png" width="160" height="34" alt="" data-retina="true"> </div>
          <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
          <ul>
            <li><a href="<?php echo base_url();?>"><?php echo $this->lang->line('Home');?></a></li>
            <li><a href="<?php echo base_url();?>tours/inbound"><?php echo $this->lang->line('Tours Inbound');?></a></li>
            <li><a href="<?php echo base_url();?>tours/outbound"><?php echo $this->lang->line('Tours Outbound');?></a></li>
            <li><a href="<?php echo base_url();?>transfer"><?php echo $this->lang->line('Transfers')?></a></li>
            <li><a href="<?php echo base_url();?>travelguide"><?php echo $this->lang->line('Travel Guide');?></a></li>
            <li><a href="<?php echo base_url();?>contactus"><?php echo $this->lang->line('Contact Us');?></a></li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</header>
