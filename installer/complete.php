<?php

include('functions.php');

session_start();

$host = $_SESSION['host'];
$dbname = $_SESSION['dbname'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$sql = "SELECT * FROM cms_user ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rs = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sign in</title>

<!-- Vendor CSS -->
<link href="<?php echo base_url();?>assets/backend/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/backend/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/backend/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">

<!-- CSS -->
<link href="<?php echo base_url();?>assets/backend/css/app.min.1.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/backend/css/app.min.2.css" rel="stylesheet">
</head>

<body>
<div class="login" data-lbg="teal">
<!-- Login -->
<div class="l-block toggled" id="l-login">
  <form method="post">
    <div class="lb-header palette-Teal bg"> CMS ADMINISTRATION </div>
    <div class="lb-body">
      <p class="m-b-30">Your administrator</p>
      <br>
      <div class="form-group fg-float">
        <div class="fg-line">
          <input type="text" name="host" class="input-sm form-control fg-input" required value="<?php echo $rs['email'];?>">
          <label class="fg-label">Email</label>
        </div>
      </div>
      <div class="form-group fg-float">
        <div class="fg-line">
          <input type="text" name="password" class="input-sm form-control fg-input" required value="<?php echo $rs['password'];?>">
          <label class="fg-label">Password</label>
        </div>
      </div>
      <div class="form-group fg-float">
      <a href="<?php echo base_url()?>admin/login" class="btn btn-primary">Login</a>
      </div>
      
      <div class="form-group fg-float">
      Please remove installer after installation
      </div>
    </div>
  </form>
</div>

<!-- Javascript Libraries --> 
<script src="<?php echo base_url();?>assets/backend/vendors/bower_components/jquery/dist/jquery.min.js"></script> 
<script src="<?php echo base_url();?>assets/backend/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 
<!-- Placeholder for IE9 --> 
<!--[if IE 9 ]>
<script src="<?php echo base_url();?>assets/backend/vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
<![endif]--> 
<script src="<?php echo base_url();?>assets/backend/js/functions.js"></script>
</body>
</html>