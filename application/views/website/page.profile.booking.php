<?php include('tpl.meta.php');?>
<?php include('tpl.header.plain.php');?>
<div class="container margin_60" style="margin-top:60px;">
  <div class="row">
    <aside class="col-lg-3 col-md-3">
      <?php include('tpl.profile.menu.php');?>
      <?php include('tpl.needhelp.php');?>
    </aside>
    <div class="col-lg-9 col-md-9">
      <div class="box_style_1">
        <p><?php echo $this->lang->line('Booking');?></p>
        <hr>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th nowrap><a href="<?php echo base_url()?>admin/payment?field=id&page=<?php echo $page; ?>&sort=<?php echo $sort; ?>">
                  <?php
              	if($field == 'id'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-desc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';									
									}
								}
							?>
                  <?php echo $this->lang->line('ID');?></a></th>
                <th><a href="<?php echo base_url()?>admin/payment?field=customer&page=<?php echo $page; ?>&sort=<?php echo $sort; ?>">
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
                <th><a href="<?php echo base_url()?>admin/payment?field=customer_email&page=<?php echo $page; ?>&sort=<?php echo $sort; ?>">
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
                <th><a href="<?php echo base_url()?>admin/payment?field=cost&page=<?php echo $page; ?>&sort=<?php echo $sort; ?>">
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
                <th><a href="<?php echo base_url()?>admin/payment?field=tax&page=<?php echo $page; ?>&sort=<?php echo $sort; ?>">
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
                <th><a href="<?php echo base_url()?>admin/payment?field=total&page=<?php echo $page; ?>&sort=<?php echo $sort; ?>">
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
                <th><a href="<?php echo base_url()?>admin/payment?field=payment_entered&page=<?php echo $page; ?>&sort=<?php echo $sort; ?>">
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
                <td nowrap><?php echo number_format($value->cost,0,'',',') . ' '.$value->currency; ?></td>
                <td nowrap><?php echo number_format($value->tax,0,'',','). ' '.$value->currency; ?></td>
                <td nowrap><?php echo number_format($value->total,0,'',','). ' '.$value->currency; ?></td>
                <td><?php echo $value->payment_entered; ?></td>
                <td><a href="<?php echo base_url();?>profile/booking/info?id=<?php echo $value->id; ?>"><i class="fa fa-fw fa-file-text"></i></a></td>
              </tr>
              <?php 
						}
						?>
            </tbody>
          </table>
        </div>
        <?php 
						if($payment['pages'] > 1){
							$url = base_url().'profile/booking?field='.$this->input->get('field').'&sort='.$this->input->get('sort');
							echo $this->Paginate->frontpages($url, $page, $payment['pages']);
						}
			?>
      </div>
    </div>
  </div>
</div>
<?php include('tpl.footer.php');?>