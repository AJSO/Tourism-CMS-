<?php
include('functions.php');

session_start();

if(isset($_POST['save'])){
	
	$host = $_POST['host'];
	$user = $_POST['user'];
	$password = $_POST['password'];
	$dbname = $_POST['dbname'];
	
	$_SESSION['host'] = $host;
	$_SESSION['dbname'] = $dbname;
	$_SESSION['user'] = $user;
	$_SESSION['password'] = $password;
	
	$mysqli = new mysqli($host, $user, $password, $dbname);
	if (mysqli_connect_errno())	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$datafile = 'data.sql';

	$templine = '';
	$lines = file($datafile);
		
	foreach ($lines as $line)	{
		if (substr($line, 0, 2) == '--' || $line == '')
				continue;
		
		$templine .= $line;
		if (substr(trim($line), -1, 1) == ';')
		{
			$mysqli->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error() . '<br /><br />');
			$templine = '';
		}
	}
	
	// make /application/config/database.php
	$content = file_get_contents('../application/config/database.sample.php');
	
	$content = str_replace(':hostname:',$host,$content);
	$content = str_replace(':username:',$user,$content);
	$content = str_replace(':password:',$password,$content);
	$content = str_replace(':database:',$dbname,$content);
	
	file_put_contents('../application/config/database.php', $content);

	
	// show default admin password
	header('location: complete.php');
	exit;	
}

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
    <div class="lb-header palette-Teal bg"> CMS INSTALLER </div>
    <div class="lb-body">
      <div class="form-group fg-float">
        <div class="fg-line">
          <input type="text" name="host" class="input-sm form-control fg-input" required>
          <label class="fg-label">MySQL Host</label>
        </div>
      </div>
      <div class="form-group fg-float">
        <div class="fg-line">
          <input type="text" name="dbname" class="input-sm form-control fg-input" required>
          <label class="fg-label">MySQL Database</label>
        </div>
      </div>
      <div class="form-group fg-float">
        <div class="fg-line">
          <input type="text" name="user" class="input-sm form-control fg-input" required>
          <label class="fg-label">MySQL User</label>
        </div>
      </div>
      <div class="form-group fg-float">
        <div class="fg-line">
          <input type="password"  name="password" class="input-sm form-control fg-input">
          <label class="fg-label">MySQL Password</label>
        </div>
      </div>
      <input type="submit" name="save" class="btn palette-Teal bg" value="Install">
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