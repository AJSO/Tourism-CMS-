<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Payment</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li class="active">Payment</li>
            </ol>
          </div>
        </div>
      </div>
    </header>
    <section class="box-typical">
      <div class="table-responsive">
        <div class="bootstrap-table">
          <div class="fixed-table-toolbar">
            <div class="bars pull-left">
              <div id="toolbar"> <strong>Payment</strong> </div>
            </div>
            <div class="pull-right search"> </div>
          </div>
          <div class="fixed-table-container" style="padding-bottom: 0px;">
            <div class="fixed-table-body">
              <table class="table">
                <thead>
                  <tr>
                    <th><a href="<?php echo base_url()?>admin/payment?field=id&page=<?php echo $page; ?>&q=<?php echo $q; ?>&sort=<?php echo $sort; ?>">
                      <?php
              	if($field == 'id'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-desc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';									
									}
								}
							?>
                      ID</a></th>
                    <th><a href="<?php echo base_url()?>admin/payment?field=customer&page=<?php echo $page; ?>&q=<?php echo $q; ?>&sort=<?php echo $sort; ?>">
                      <?php
              	if($field == 'customer'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-desc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';									
									}
								}
							?>
                      Customer</a></th>
                    <th><a href="<?php echo base_url()?>admin/payment?field=customer_email&page=<?php echo $page; ?>&q=<?php echo $q; ?>&sort=<?php echo $sort; ?>">
                      <?php
              	if($field == 'customer_email'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-desc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';									
									}
								}
							?>
                      Email</a></th>
                    <th><a href="<?php echo base_url()?>admin/payment?field=cost&page=<?php echo $page; ?>&q=<?php echo $q; ?>&sort=<?php echo $sort; ?>">
                      <?php
              	if($field == 'cost'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';									
									}
								}
							?>
                      Cost</a></th>
                    <th><a href="<?php echo base_url()?>admin/payment?field=tax&page=<?php echo $page; ?>&q=<?php echo $q; ?>&sort=<?php echo $sort; ?>">
                      <?php
              	if($field == 'tax'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-desc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';									
									}
								}
							?>
                      Tax</a></th>
                    <th><a href="<?php echo base_url()?>admin/payment?field=total&page=<?php echo $page; ?>&q=<?php echo $q; ?>&sort=<?php echo $sort; ?>">
                      <?php
              	if($field == 'total'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-desc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';									
									}
								}
							?>
                      Total</a></th>
                    <th><a href="<?php echo base_url()?>admin/payment?field=payment_entered&page=<?php echo $page; ?>&q=<?php echo $q; ?>&sort=<?php echo $sort; ?>">
                      <?php
              	if($field == 'payment_entered'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-desc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';									
									}
								}
							?>
                      Entered</a></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
						if(count($payment['rows']) == false){
							echo '<tr>';
							echo '<td class="text-center" colspan="9"> Not found</td>';
							echo '</tr>';
						}
						foreach($payment['rows'] as $index=>$value){
							
							$customer = json_decode($value->customer,true);
							
						?>
                  <tr>
                    <td><?php echo $value->id; ?></td>
                    <td><?php echo $customer['firstname'] . ' '.$customer['lastname'];?></td>
                    <td><?php echo $value->customer_email; ?></td>
                    <td><?php echo $value->cost . ' '.$value->currency; ?></td>
                    <td><?php echo $value->tax. ' '.$value->currency; ?></td>
                    <td><?php echo $value->total. ' '.$value->currency; ?></td>
                    <td><?php echo $value->payment_entered; ?></td>
                    <td><a href="<?php echo base_url();?>admin/payment/info?id=<?php echo $value->id; ?>" class="btn btn-primary">View</a></td>
                  </tr>
                  <?php 
						}
						?>
                </tbody>
              </table>
            </div>
            <?php 
						$url = base_url().'admin/payment?field='.$this->input->get('field').'&sort='.$this->input->get('sort').'&q='.$q;
						$url .= '&limit='.$this->input->get('limit');
						echo $this->Paginate->backend($url, $page, $payment['pages'], $payment['items']);
			?>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </section>
    <!--.box-typical--> 
    
  </div>
  <!--.container-fluid--> 
</div>
<!--.page-content-->
<?php include('tpl.footer.php');?>