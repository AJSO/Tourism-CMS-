<div class="mobile-menu-left-overlay"></div>
<nav class="side-menu">
  <ul class="side-menu-list">
    <li class="pink <?php if($module == 'home'){ echo ' active';}?>"> <a href="<?php echo base_url();?>admin"><span> <i class="font-icon font-icon-dashboard"></i> <span class="lbl">Dashboard</span> </span></a></li>
    <li class="pink <?php if($module == 'destinations'){ echo 'active'; }?>"> <a href="<?php echo base_url();?>admin/destination"> <i class="font-icon fa fa-fw fa-globe"></i> <span class="lbl">Destinations</span></a></li>
    <li class="pink <?php if($module == 'areas'){ echo 'active'; }?>"><a href="<?php echo base_url();?>admin/area"> <i class="font-icon glyphicon glyphicon-map-marker"></i> <span class="lbl">Areas</span></a></li>
    <li class="pink <?php if($module == 'period'){ echo 'active'; }?>"><a href="<?php echo base_url();?>admin/period"> <i class="font-icon fa fa-fw fa-calendar"></i> <span class="lbl">Periods</span></a></li>
    <li class="pink with-sub <?php if($module == 'transfer'){ echo 'active opened'; }?>"> <span> <i class="font-icon fa fa-fw fa-car"></i> <span class="lbl">Transfers</span> </span>
      <ul>
        <li><a href="<?php echo base_url()?>admin/transfer/car"><span class="lbl">Cars</span></a></li>
        <li><a href="<?php echo base_url()?>admin/transfer/service"><span class="lbl">Services</span></a></li>
        <li><a href="<?php echo base_url()?>admin/transfer/price"><span class="lbl">Price Lists</span></a></li>
      </ul>
    </li>
    <li class="pink <?php if($module == 'tour'){ echo 'active'; }?>"> <a href="<?php echo base_url()?>admin/tour"><span> <i class="font-icon fa fa-fw fa-list-alt"></i> <span class="lbl">Tours</span> </span></a> </li>
    <li class="pink <?php if($module == 'terms'){ echo 'active';}?>"> <a href="<?php echo base_url();?>admin/term"><span> <i class="font-icon font-icon-dashboard"></i> <span class="lbl">Terms</span> </span></a></li>
    <li class="pink <?php if($module == 'featured'){ echo 'active';}?>"> <a href="<?php echo base_url()?>admin/featured"> <span> <i class="font-icon fa fa-fw fa-gift"></i> <span class="lbl">Featured</span> </span></a> </li>
    <li class="pink with-sub <?php if($module == 'widget'){ echo 'active opened';}?>"> <span> <i class="font-icon fa fa-fw fa-cubes"></i> <span class="lbl">Widget</span> </span>
      <ul>
        <li class="<?php if(isset($type)){ if($type == 'slide'){ echo 'active';}}?>"><a href="<?php echo base_url();?>admin/widget/slide"><span class="lbl">Slide</span></a></li>
        <li class="<?php if(isset($type)){ if($type == 'populartours'){ echo 'active';}}?>"><a href="<?php echo base_url();?>admin/widget/populartours"><span class="lbl">Popular Tours</span></a></li>
      </ul>
    </li>
    <li class="pink <?php if($module == 'payment'){ echo 'active';}?>"> <a href="<?php echo base_url();?>admin/payment"><span> <i class="glyphicon glyphicon-list-alt"></i> <span class="lbl">Payment</span> </span></a></li>
  </ul>
</nav>
<!--.side-menu--> 
