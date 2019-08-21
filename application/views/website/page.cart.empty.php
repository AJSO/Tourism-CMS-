<?php include('tpl.meta.php');?>
<style>
.btn.btn-link{
	color: #737373;
}
#header{
	margin-top: 15px;
	margin-bottom: 15px;
}
</style>
<div id="header">
	<div class="container">
  	<div class="row">
    	<div class="col-sm-12">
      	<a href="<?php echo base_url();?>"><img src="<?php echo base_url()?>assets/frontend/img/logo_sticky.png"></a>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-sm-8">
      <h3><?php echo $this->lang->line('Shopping Cart');?></h3>
      <p><?php echo $this->lang->line('Your shopping cart has been empty');?> </p>
      <p><a href="<?php echo base_url();?>"><?php echo $this->lang->line('Continue Shopping');?></a></p>
    </div>
  </div>
</div>
</body>
</html>