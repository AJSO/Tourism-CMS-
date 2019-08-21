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
      <form class="sign-box reset-password-box" method="post">
        <div class="sign-avatar"> <img src="<?php echo base_url();?>assets/backend/img/avatar-sign.png" alt=""> </div>
        <header class="sign-title">Forgot Password</header>
        <?php 
			if($save){?>
        <div class="alert alert-success alert-dismissable text-center">
          <button class="close" onClick="$(this).parent().hide();return false;">×</button>
          Email address and instructions has sent to your mailbox </div>
        <br>
        <?php
			}else{
				

				if($error){
				?>
        <div class="alert alert-danger text-center">
          <button class="close" onClick="$(this).parent().hide();return false;">×</button>
          Invalid email address </div>
        <br>
        <?php
				}else{?>
        <p class="m-b-30">Please enter your Email address and instructions will be sent to your mailbox</p>
        <?php }
			}
			?>
        <div class="form-group">
          <input type="text" class="form-control" name="username" placeholder="E-Mail"/>
        </div>
        <input type="submit" name="save" class="btn btn-rounded" value="Submit">
        or <a href="<?php echo base_url()?>admin/login">Sign in</a>
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