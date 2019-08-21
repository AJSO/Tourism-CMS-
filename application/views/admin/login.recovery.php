<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>CodePaul - Admin</title>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<link rel="stylesheet" href="<?php echo base_url();?>assets/backend/css/separate/pages/login.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/backend/css/lib/font-awesome/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/backend/css/lib/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/backend/css/main.css">
</head>
<body>
<div class="page-center">
  <div class="page-center-in">
    <div class="container-fluid">
      <form class="sign-box">
        <div class="sign-avatar"> <img src="<?php echo base_url()?>assets/backend/img/avatar-sign.png" alt=""> </div>
        <header class="sign-title">Recovery Password</header>
        <?php if($save){?>
        <div class="alert alert-success alert-dismissable text-center">
          <button aria-hidden="true" class="close" onClick="$(this).parent().hide();return">×</button>
          Your account has been update </div>
        <?php }?>
        <div class="form-group">
          <input name="username" type="email" required class="form-control" placeholder="E-mail">
        </div>
        <div class="form-group">
          <input name="password" type="password" required class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
          <input name="password_again" id="password_again" type="password" required class="form-control" placeholder="Password Again">
        </div>
        <input type="submit" name="save" class="btn btn-rounded btn-success sign-up" value="Recovery">
        <p class="sign-note">Already have an account? <a href="<?php echo base_url()?>admin/login">Sign in</a></p>
      </form>
    </div>
  </div>
</div>
<!--.page-center--> 

<script src="<?php echo base_url();?>assets/backend/js/lib/jquery/jquery.min.js"></script> 
<script src="<?php echo base_url();?>assets/backend/js/lib/tether/tether.min.js"></script> 
<script src="<?php echo base_url();?>assets/backend/js/lib/bootstrap/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>assets/backend/js/plugins.js"></script> 
<script src="<?php echo base_url();?>assets/backend/js/lib/match-height/jquery.matchHeight.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/backend/js/lib/jquery-validation/jquery.validate.min.js"></script> 
<script>
		$(function() {
				$('.page-center').matchHeight({
						target: $('html')
				});

				$(window).resize(function(){
						setTimeout(function(){
								$('.page-center').matchHeight({ remove: true });
								$('.page-center').matchHeight({
										target: $('html')
								});
						},100);
				});
		});
</script> 
<script>
$('input[name=username]').focus();
$('form').validate({
  rules: {
    password: "required",
    password_again: {
      equalTo: "#password"
    }
  }
});
</script>
</body>
</html>