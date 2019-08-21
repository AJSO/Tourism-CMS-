<header class="site-header">
    <div class="container-fluid">
        <a href="#" class="site-logo">
            <img class="hidden-md-down" src="<?php echo base_url()?>assets/backend/img/logo.png" alt="">
            <img class="hidden-lg-up" src="<?php echo base_url()?>assets/backend/img/logo.png" alt="">
        </a>
        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar" style="margin-left: 15px;">
            <span>toggle menu</span>
        </button>
        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">
                  <div class="dropdown dropdown-typical">
                            <a class="dropdown-toggle" id="dd-header-marketing" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="font-icon font-icon-cogwheel"></span>
                            </a>

                            <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dd-header-marketing">
                              <a href="<?php echo base_url()?>admin/property" class="dropdown-item"> 
                              <i class="font-icon fa fa-fw fa-building"></i>
                              Settings </a> 
                              <div class="dropdown-divider"></div>

                              <a href="<?php echo base_url()?>admin/api" class="dropdown-item"> 
                              <i class="font-icon fa fa-fw fa-plug"></i>
                              Api</a>
	                            <div class="dropdown-divider"></div>
                              <a href="<?php echo base_url()?>admin/currency" class="dropdown-item"> 
                              <i class="font-icon fa fa-fw fa-money"></i>
                              Currencies</a>
                              <div class="dropdown-divider"></div>
                            <a href="<?php echo base_url()?>admin/payment-setting" class="dropdown-item">
                              <i class="font-icon fa fa-fw fa-paypal"></i>
                               Payment Setting</a> 
                            <div class="dropdown-divider"></div>
                              <a href="<?php echo base_url()?>admin/users" class="dropdown-item">
                              <i class="font-icon fa fa-fw fa-users"></i>
                               Users Account</a>  
                            <div class="dropdown-divider"></div>
                              <a href="<?php echo base_url()?>admin/activities" class="dropdown-item"> 
                              <i class="font-icon fa fa-fw fa-bar-chart"></i>
                              Activities</a>
                            <div class="dropdown-divider"></div>
                              <a href="<?php echo base_url()?>admin/languages" class="dropdown-item"> 
                              <i class="font-icon fa fa-fw fa-globe"></i>
                              Languages</a> 
                            <div class="dropdown-divider"></div>
                              <a href="<?php echo base_url()?>admin/seo" class="dropdown-item"> 
                              <i class="font-icon fa fa-fw fa-pie-chart"></i>
                              SEO </a> 
                    </div>
                  </div>
                  <div class="dropdown user-menu">
                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php if(empty($sess[0]->user_avatar)){?>
                            <img src="<?php echo base_url()?>assets/backend/img/avatar-2-64.png" alt="">
                        <?php }else{
                            echo '<img src="'.base_url().$sess[0]->user_avatar.'" alt="">';
												}?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                            <a href="<?php echo base_url().'admin/profile'?>" class="dropdown-item"> 
                            	<span class="font-icon glyphicon glyphicon-user"></span> Profile</a> 
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo base_url().'admin/profile/activities'?>" class="dropdown-item"> 
                            	<span class="font-icon glyphicon glyphicon-stats"></span> Activity</a> 
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo base_url().'admin/logout'?>" class="dropdown-item"> <span class="font-icon glyphicon glyphicon-log-out"></span> Logout</a> 

                    </div>
                    </div>
                </div><!--.site-header-shown-->

                <div class="site-header-collapsed">
                    <div class="site-header-collapsed-in">
                      
                        <div class="dropdown">
                            <button class="btn btn-rounded dropdown-toggle" id="dd-header-add" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Add
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-header-add">
                              <a href="<?php echo base_url();?>admin/destination/new" class="dropdown-item"> 
                              <i class="font-icon fa fa-fw fa-globe"></i> Destination </a>
                            <div class="dropdown-divider"></div>
                              <a href="<?php echo base_url();?>admin/area/new" class="dropdown-item"> 
                              <i class="font-icon fa fa-fw fa-map-marker"></i> Area </a>
                            <div class="dropdown-divider"></div>
                              <a href="<?php echo base_url();?>admin/period/new" class="dropdown-item"> 
                              <i class="font-icon fa fa-fw fa-calendar"></i> Period </a>
                            <div class="dropdown-divider"></div>
                              <a href="<?php echo base_url();?>admin/transfer/car/new" class="dropdown-item"> 
                              <i class="font-icon fa fa-car"></i> Car </a>
                            <div class="dropdown-divider"></div>
                              <a href="<?php echo base_url();?>admin/tour/new" class="dropdown-item"> 
                              <i class="font-icon fa fa-fw fa-list-alt"></i> Tour </a>
                            <div class="dropdown-divider"></div>
                              <a href="<?php echo base_url();?>admin/term/new" class="dropdown-item"> 
                              <i class="font-icon fa fa-fw fa-info"></i> Term </a>
                            <div class="dropdown-divider"></div>
                              <a href="<?php echo base_url();?>admin/users/new" class="dropdown-item"> 
                              <i class="font-icon fa fa-fw fa-user"></i> User </a>
                            <div class="dropdown-divider"></div>
                              <a href="<?php echo base_url();?>admin/seo/new" class="dropdown-item"> 
                              <i class="font-icon fa fa-fw fa-pie-chart"></i> SEO </a>
                            </div>
                        </div>
                        <!--.help-dropdown-->
                        <div class="site-header-search-container">
                            <form class="site-header-search closed" method="get" action="<?php if(isset($search_action)){ echo $search_action;}?>">
                                <input type="text" name="q" placeholder="Search"/>
                                <button type="submit">
                                    <span class="font-icon-search"></span>
                                </button>
                                <div class="overlay"></div>
                            </form>
                        </div>
                    </div><!--.site-header-collapsed-in-->
                </div><!--.site-header-collapsed-->
            </div><!--site-header-content-in-->
        </div><!--.site-header-content-->
    </div><!--.container-fluid-->
</header>