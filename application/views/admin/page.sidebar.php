<?php
$notification_payment = $this->Payment->get();
$notification_contact = $this->Contact->get();
$notification_activity = $this->Activity->get(date('Y'));
?>
<style>
.sua-menu {
	overflow: auto;
}
</style>
<aside id="s-user-alerts" class="sidebar">

<ul class="tab-nav tn-justified tn-icon m-t-10" data-tab-color="teal">
  <li><a class="sua-messages" href="#sua-messages" data-toggle="tab"><i class="zmdi zmdi-email"></i></a></li>
  <li><a class="sua-notifications" href="#sua-notifications" data-toggle="tab"><i class="zmdi zmdi-notifications"></i></a></li>
  <li><a class="sua-tasks" href="#sua-tasks" data-toggle="tab"><i class="zmdi zmdi-view-list-alt"></i></a></li>
</ul>
<div class="tab-content">
  <div class="tab-pane fade" id="sua-messages">
    <ul class="sua-menu list-inline list-unstyled palette-Light-Blue bg">
      <li class="pull-right"><a href="#" data-ma-action="sidebar-close"><i class="zmdi zmdi-close"></i></a></li>
    </ul>
    <div class="list-group lg-alt c-overflow">
      <?php
			if(count($notification_payment['rows'])){
      	foreach($notification_payment['rows'] as $index=>$value){
					$customer = json_decode($value->customer, true);
				?>
      <a href="<?php echo base_url();?>admin/payment/info?id=<?php echo $value->id; ?>" class="list-group-item media">
      <div class="media-body">
        <div class="lgi-heading">Invoice #<?php echo $value->id; ?> <?php echo $customer['firstname'] . ' '.$customer['lastname']; ?></div>
        <small class="lgi-text"> <i class="zmdi zmdi-money"></i> <?php echo number_format($value->total, 0,'',',');?> By <?php echo $value->payment_type; ?> <i class="zmdi zmdi-time"></i> <?php echo $value->payment_entered; ?> </small> </div>
      </a>
      <?php 
				}
			}else{
			?>
      <a href="#" class="list-group-item media">
      <div class="media-body"> Not found</div>
      </a>
      <?php
			}
				?>
    </div>
  </div>
  <div class="tab-pane fade" id="sua-notifications">
    <ul class="sua-menu list-inline list-unstyled palette-Orange bg">
      <li class="pull-right"><a href="#" data-ma-action="sidebar-close"><i class="zmdi zmdi-close"></i> </a></li>
    </ul>
    <div class="list-group lg-alt c-overflow">
      <?php 
				if(count($notification_contact['rows'])){
					foreach($notification_contact['rows'] as $index=>$value){?>
      <a href="#" class="list-group-item media">
      <div class="media-body">
        <div class="lgi-heading"><?php echo $value->contactname; ?></div>
        <small class="lgi-text"><?php echo $value->comments; ?></small> </div>
      </a>
      <?php 
					}
				}else{
				?>
      <a href="#" class="list-group-item media">
      <div class="media-body"> Not found</div>
      </a>
      <?php 
				}?>
    </div>
  </div>
  <div class="tab-pane fade" id="sua-tasks">
    <ul class="sua-menu list-inline list-unstyled palette-Green-400 bg">
      <li class="pull-right"><a href="#" data-ma-action="sidebar-close"><i class="zmdi zmdi-close"></i></a></li>
    </ul>
    <div class="list-group lg-alt c-overflow">
      <?php 
			if(count($notification_activity['rows'])){
				foreach($notification_activity['rows'] as $index=>$value){
			?>
      <div class="list-group-item">
        <div class="lgi-heading m-b-5"><?php echo $value->email; ?></div>
        <small class="lgi-text"><?php echo $value->message;?></small> </div>
      <?php
	      }
			}else{
?>
      <a href="#" class="list-group-item media">
      <div class="media-body"> Not found</div>
      </a>
      <?php			
			}
			?>
    </div>
  </div>
</div>
</aside>
<aside id="s-main-menu" class="sidebar">
  <div class="smm-header"> <i class="zmdi zmdi-long-arrow-left" data-ma-action="sidebar-close"></i> </div>
  <ul class="smm-alerts">
    <li class="" data-user-alert="sua-messages" data-ma-action="sidebar-open" data-ma-target="user-alerts"> <i class="zmdi zmdi-email"></i> </li>
    <li data-user-alert="sua-notifications" data-ma-action="sidebar-open" data-ma-target="user-alerts"> <i class="zmdi zmdi-notifications"></i> </li>
    <li data-user-alert="sua-tasks" data-ma-action="sidebar-open" data-ma-target="user-alerts"> <i class="zmdi zmdi-view-list-alt"></i> </li>
  </ul>
  <ul class="main-menu">
    <li class="<?php if($module == 'home'){ echo 'active';}?>"> <a href="<?php echo base_url();?>admin"><i class="zmdi zmdi-home"></i> Home</a> </li>
    <?php
    $content_arr = array('posts','pages', 'slide');
		?>
    <li class="sub-menu <?php if(in_array($module, $content_arr)){ echo 'active';}?>"> <a href="#" data-ma-action="submenu-toggle"><i class="zmdi zmdi-file"></i> Contents</a>
      <ul>
        <li class="<?php if($module == 'posts'){ echo 'active';}?>"><a href="<?php echo base_url();?>admin/post">Posts</a></li>
        <li class="<?php if($module == 'pages'){ echo 'active';}?>"><a href="<?php echo base_url();?>admin/page">Pages</a></li>
        <li class="<?php if($module == 'slide'){ echo 'active';}?>"><a href="<?php echo base_url();?>admin/slide">Slide</a></li>
      </ul>
    </li>
    <li class="sub-menu <?php if($module == 'widget'){ echo 'active';}?>"> 
    	<a href="#" data-ma-action="submenu-toggle"><i class="zmdi zmdi-widgets"></i> Widget</a>
      <ul>
      	<li class="<?php if(isset($type)){ if($type == 'brands'){ echo 'active';}}?>"><a href="<?php echo base_url();?>admin/widget/brands">Brands</a></li>
      	<li class="<?php if(isset($type)){ if($type == 'services'){ echo 'active';}}?>"><a href="<?php echo base_url();?>admin/widget/services">Services</a></li>
      	<li class="<?php if(isset($type)){ if($type == 'videos'){ echo 'active';}}?>"><a href="<?php echo base_url();?>admin/widget/videos">Videos</a></li>
      	<li class="<?php if(isset($type)){ if($type == 'mission'){ echo 'active';}}?>"><a href="<?php echo base_url();?>admin/widget/mission">Mission</a></li>
      	<li class="<?php if(isset($type)){ if($type == 'ourteam'){ echo 'active';}}?>"><a href="<?php echo base_url();?>admin/widget/ourteam">Our Team</a></li>
        <li class="<?php if(isset($type)){ if($type == 'counter'){ echo 'active';}}?>"><a href="<?php echo base_url();?>admin/widget/counter">Counter</a></li>        
        <li class="<?php if(isset($type)){ if($type == 'gallery'){ echo 'active';}}?>"><a href="<?php echo base_url();?>admin/widget/gallery">Gallery</a></li>        
        <li class="<?php if(isset($type)){ if($type == 'about'){ echo 'active';}}?>"><a href="<?php echo base_url();?>admin/widget/about">About</a></li>        
        <li class="<?php if(isset($type)){ if($type == 'contact'){ echo 'active';}}?>"><a href="<?php echo base_url();?>admin/widget/contact">Contact</a></li>        
      </ul>
    </li>
    <?php
    $ecommerce_arr = array('categories','product', 'destination', 'terms');
		?>
    <li class="sub-menu <?php if(in_array($module, $ecommerce_arr)){ echo 'active';}?>"> <a href="#" data-ma-action="submenu-toggle"> <i class="zmdi zmdi-money"></i> Packages</a>
      <ul>
      	<li class="<?php if($module == 'destination'){ echo 'active'; }?>"><a href="<?php echo base_url();?>admin/destination">Destinations</a></li>
        <li class="<?php if($module == 'categories'){ echo 'active'; }?>"><a href="<?php echo base_url();?>admin/category">Categories</a></li>
        <li class="<?php if($module == 'product'){ echo 'active'; }?>"><a href="<?php echo base_url();?>admin/product">Products</a></li>
        <li class="<?php if($module == 'terms'){ echo 'active'; }?>"><a href="<?php echo base_url();?>admin/term">Terms</a></li>
      </ul>
    </li>
    <?php
    $feature_arr = array('product featured','specialoffer', 'newproduct', 'bestseller');
		?>
    <li class="sub-menu <?php if(in_array($module, $feature_arr)){ echo 'active';}?>">
    <a href="#" data-ma-action="submenu-toggle"> <i class="zmdi zmdi-star"></i> Featured</a>
      <ul>
        <li class="<?php if(isset($type)){if($type == 'specialoffer'){ echo 'active'; }}?>"><a href="<?php echo base_url();?>admin/product/featured/ourtopdeals">Our Top Deals</a></li>
        <li class="<?php if(isset($type)){if($type == 'promotion'){ echo 'active'; }}?>"><a href="<?php echo base_url();?>admin/product/featured/promotion">Promotions</a></li>
        <?php 
				/*<li><a href="<?php echo base_url();?>admin/product/featured/newarrivals">New Arrivals</a></li>
        <li><a href="<?php echo base_url();?>admin/product/featured/toprated">Top Rated</a></li>
        <li><a href="<?php echo base_url();?>admin/product/featured/onsale">On Sale</a></li>*/?>
      </ul>    	
    </li>
    <li class="sub-menu <?php if(in_array($module, array('media','photo','video'))){ echo 'active';}?>"> <a href="#" data-ma-action="submenu-toggle"><i class="zmdi zmdi-camera"></i> Media</a>
      <ul>
        <li class="<?php if($module == 'photo'){ echo 'active';}?>"><a href="<?php echo base_url();?>admin/media/image">Images</a></li>
        <li class="<?php if($module == 'video'){ echo 'active';}?>"><a href="<?php echo base_url();?>admin/media/video">Videos</a></li>
      </ul>
    </li>
    <li class="<?php if($module == 'members'){ echo 'active';}?>"><a href="<?php echo base_url();?>admin/member"><i class="zmdi zmdi-face"></i> Members</a></li>
    <li class="<?php if($module == 'newsletter'){ echo 'active';}?>"><a href="<?php echo base_url();?>admin/newsletter"><i class="zmdi zmdi-email"></i> Newsletter</a></li>
    <li class="<?php if($module == 'payment'){ echo 'active';}?>"><a href="<?php echo base_url();?>admin/payment"><i class="zmdi zmdi-paypal"></i> Payment</a></li>
  </ul>
</aside>
