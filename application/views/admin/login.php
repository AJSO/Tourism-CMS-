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
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/separate/pages/login.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/lib/font-awesome/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/lib/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/css/main.css">
</head>
<body>
<div class="page-center">
  <div class="page-center-in">
    <div class="container-fluid">
      <form class="sign-box" method="post">
        <div class="sign-avatar"> <img src="<?php echo base_url()?>assets/backend/img/avatar-sign.png" alt=""> </div>
        <header class="sign-title">Sign In</header>
        <?php if($login){?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Error!</strong> Invalid email / password. </div>
        <br>
        <?php }?>
        <div class="form-group">
          <input type="text" name="username" class="form-control" placeholder="E-Mail"/>
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Password"/>
        </div>
        <div class="form-group">
          <div class="checkbox">
            <input type="checkbox" name="remember" value="1" id="signed-in"/>
            <label for="signed-in">Keep me signed in</label>
          </div>
        </div>
        <input type="submit" name="save" class="btn btn-rounded" value="Sign in">
        <p class="sign-note">Can't login? <a href="<?php echo base_url();?>admin/forgot">Forget Password</a></p>
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
<script src="<?php echo base_url();?>assets/backend/js/app.js"></script>
</body>
</html>