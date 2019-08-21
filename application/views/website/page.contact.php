<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<section class="parallax-window" style="background:url(<?php echo base_url();?>assets/frontend/img/slide/contactus.jpg) center center;">
  <div class="parallax-content-1">
    <div class="animated">
      <h1><?php echo $this->lang->line('Contact us');?></h1>
      <p><?php echo $this->lang->line('If you need help, Please contact us using the information below');?></p>
    </div>
  </div>
</section>
<!-- End Section -->

<div id="position">
  <div class="container">
    <ul>
      <li><a href="<?php echo base_url();?>"><?php echo $this->lang->line('Home');?></a></li>
      <li><?php echo $this->lang->line('Contact Us');?></li>
    </ul>
  </div>
</div>
<!-- End Position -->

<div class="container margin_60">
  <div class="row">
    <div class="col-md-8 col-sm-8">
      <form method="post" id="form-contact">
      	<?php if($save){?>
      	<div class="alert alert-success alert-dismissible" role="alert">
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        	<span aria-hidden="true">&times;</span></button>
          <strong><?php echo $this->lang->line('Success');?>!</strong> 
          <?php echo $this->lang->line('Your message has been send');?>
        </div>
				<?php }?>
        
        <?php if($error > 0){?>
      	<div class="alert alert-success alert-dismissible" role="alert">
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        	<span aria-hidden="true">&times;</span></button>
          <strong><?php echo $this->lang->line('Error');?>!</strong> 
          <?php 
					foreach($error_reason as $value){
						echo $value.'<br>';
					}
					?>
        </div>
				<?php }?>
      
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="form-group">
              <label><?php echo $this->lang->line('First Name');?></label>
              <input type="text" class="form-control" id="name_contact" name="contact[firstname]" required>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group">
              <label><?php echo $this->lang->line('Last Name');?></label>
              <input type="text" class="form-control" id="lastname_contact" name="contact[lastname]" required>
            </div>
          </div>
        </div>
        <!-- End row -->
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="form-group">
              <label><?php echo $this->lang->line('Email');?></label>
              <input type="email" id="email_contact" name="contact[email]" class="form-control" required>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group">
              <label><?php echo $this->lang->line('Phone');?></label>
              <input type="text" id="phone_contact" name="contact[phone]" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label><?php echo $this->lang->line('Message');?></label>
              <textarea rows="5" id="message_contact" name="contact[message]" class="form-control" required style="height:200px;"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label><?php echo $this->lang->line('Human verification');?></label>
            <div class="g-recaptcha" data-sitekey="<?php echo $recaptcha[0]->apikey;?>"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <input type="submit" name="save" value="<?php echo $this->lang->line('Submit');?>" class="btn_1" id="submit-contact">
          </div>
        </div>
      </form>
    </div>
    <!-- End col-md-8 -->
    
    <div class="col-md-4 col-sm-4">
      <div class="box_style_1">
        <h4><?php echo $this->lang->line('Address');?></h4>
        <p> <?php echo $property[0]->property_address;?> <?php echo $property[0]->property_city;?> <?php echo $property[0]->property_state;?> <?php echo $property[0]->property_zipcode;?> </p>
        <hr>
        <h4><?php echo $this->lang->line('Help center');?></h4>
        <p><?php echo $this->lang->line('If you need help, Please contact us using the information below');?></p>
        <ul id="contact-info">
          <li><i class="fa fa-fw fa-phone"></i> <?php echo $property[0]->property_phone;?> / <?php echo $property[0]->property_mobile;?></li>
          <li><i class="fa fa-fw fa-envelope"></i> <a href="mailto:<?php echo $property[0]->property_email;?>"><?php echo $property[0]->property_email;?></a></li>
        </ul>
      </div>
      <div class="box_style_4"> <i class="fa fa-fw fa-support"></i>
        <h4>Need <span>Help?</span></h4>
        <a href="tel://<?php echo $property[0]->property_phone;?>" class="phone"><?php echo $property[0]->property_phone;?></a> <small><?php echo $this->lang->line('Monday to Friday 9.00am - 7.30pm');?></small> </div>
    </div>
  </div>
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
$('#form-contact').validate();
</script>
<?php include('tpl.footer.php');?>