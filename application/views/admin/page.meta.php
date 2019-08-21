<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo ucfirst($module).' - '.$property[0]->property_name .' Admin ' ;?></title>

<!-- Vendor CSS -->
<link href="<?php echo base_url();?>assets/backend/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/backend/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/backend/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/backend/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/backend/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">

<link href="<?php echo base_url();?>assets/backend/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/backend/vendors/farbtastic/farbtastic.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/backend/vendors/bower_components/chosen/chosen.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/backend/vendors/summernote/dist/summernote.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/backend/vendors/magnific-popup/magnific-popup.css" rel="stylesheet">

<!-- CSS -->
<link href="<?php echo base_url();?>assets/backend/css/app.min.1.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/backend/css/app.min.2.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/backend/flags/flags.css" rel="stylesheet">

<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url();?>assets/images/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url();?>assets/images/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>assets/images/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/images/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>assets/images/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url();?>assets/images/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url();?>assets/images/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url();?>assets/images/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>assets/images/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url();?>assets/images/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>assets/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>assets/images/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/images/favicon-16x16.png">
<link rel="manifest" href="<?php echo base_url();?>assets/images/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo base_url();?>assets/images/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

</head>
<body data-ma-header="red-400">
