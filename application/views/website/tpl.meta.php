<?php

switch($module)
{
	case'homepage';
		$title = $seo[0]->title;
		$description = $seo[0]->description;
		$keywords = $title.','.$seo[0]->keywords;
	break;
	case'tourinfo';
		$title = $tour[0]->tour_name;
		$description = $tour[0]->tour_description;
		$keywords = $title.','.$seo[0]->keywords;
	break;
	case'inbound';
		$title = $this->lang->line('inbound title'). ' | '.$seo[0]->title ;
		$description = $this->lang->line('inbound description');
		$keywords = $title.','.$seo[0]->keywords;
	break;
	case'outbound';
		$title = $this->lang->line('outbound title'). ' | '.$seo[0]->title;
		$description = $this->lang->line('outbound description');
		$keywords = $title.','.$seo[0]->keywords;
	break;
	case'cart';
		$title = $this->lang->line('Shopping Cart').' | '. $seo[0]->title;
	break;
	case'transfer';
		$title = $this->lang->line('Transfer Services').' | '. $seo[0]->title;
		$description = $title .' '.str_replace("\r\n",' ',trim($service[0]->description));
		$description = substr($description,0,450);
		$keywords = $title.','.$seo[0]->keywords;
	break;
	case'thankyou';
		$title = $this->lang->line('Thank you for your order').' | '. $seo[0]->title;
	break;
	case'signin';
		$title = $this->lang->line('Sign In').' | '. $seo[0]->title;
	break;
	case'forgot';
		$title = $this->lang->line('Forgot Password?').' | '. $seo[0]->title;
	break;
	case'register';
		$title = $this->lang->line('Create an account').' | '. $seo[0]->title;
	break;
	case'contactus';
		$title = $this->lang->line('Contact Us').' | '. $seo[0]->title;
	break;
	case'booking';
		$title = $this->lang->line('Booking').' | '. $seo[0]->title;
	break;
	case'booking-detail';
		$title = $this->lang->line('Booking').'#'.$invoice[0]->id.' | '. $seo[0]->title;
	break;
	case'profile';
		$title = $this->lang->line('Profile').' | '. $seo[0]->title;
	break;
	case'setting';
		$title = $this->lang->line('Setting').' | '. $seo[0]->title;
	break;
	case'travelguide';
		$title = $this->lang->line('Travel Guide').' | '. $seo[0]->title;
	break;
	default: 
		$title = '';
		$description = '';
		$keywords = $title.','.$seo[0]->keywords;
}

?>
<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if(isset($description)){?>
<meta name="description" content="<?php echo $description;?>">
<?php }?>
<?php if(isset($keywords)){?>
<meta name="keywords" content="<?php echo $keywords;?>">
<?php }?>
<title><?php echo $title;?></title>
<link href="<?php echo base_url();?>assets/frontend/css/base.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo base_url();?>assets/frontend/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo base_url();?>assets/frontend/css/date_time_picker.css" rel="stylesheet" type="text/css" media="all">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url();?>assets/frontend/rs-plugin/css/settings.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo base_url();?>assets/frontend/css/extralayers.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo base_url();?>assets/frontend/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css" media="all">


<script src="<?php echo base_url();?>assets/frontend/js/jquery-1.11.2.min.js"></script>
<script src="<?php echo base_url();?>assets/frontend/jquery-ui/jquery-ui.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>assets/frontend/js/bootstrap-timepicker.js"></script>
</head>
<body>

<!--[if lte IE 8]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

