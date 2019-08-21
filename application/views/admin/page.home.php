<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-6">
        <div class="chart-statistic-box">
          <div class="chart-txt">
            <div class="chart-txt-top">
              <p><span class="unit"><?php echo $property[0]->currency; ?></span><span class="number">
							<?php if($monthincome[date('n')]){ echo number_format($monthincome[date('n')],0,'',',');}else{ echo '0';};?></span>
              </p>
              <p class="caption"><?php echo date('M'). ' '.date('Y');?></p>
            </div>
            <table class="tbl-data">
              <tr>
                <td class="price color-purple"><?php echo $monthorder;?></td>
                <td>Orders</td>
              </tr>
            </table>
          </div>
          <style>
          #chart_div .month {
							padding: 4.69px;
							padding-left: 10px;
							font-size:12px;
					}
          </style>
          <div class="chart-container">
            <div class="chart-container-in">
              <div id="chart_div" style="width:100%;">
             		<?php
                	$n = 1;
									while($n <=12){
										echo '<div class="month">';
										echo date('M Y', mktime(0,0,0,$n,1, date('Y')));
										
										$value = $monthincome[$n];
										echo '<span class="pull-right">';
										if($value){
											echo $property[0]->currency.' '. number_format($value,0,'',',');
										}else{
											echo '-';
										}
										echo '</span>';
										echo '</div>';
										$n++;
									}
								?>              
              </div>
            </div>
          </div>
        </div>
        <!--.chart-statistic-box--> 
      </div>
      <!--.col-->
      <div class="col-xl-6">
        <div class="row">
          <div class="col-sm-6">
            <article class="statistic-box red">
              <div>
                <div class="number"><?php echo $count_order;?></div>
                <div class="caption">
                  <div>Orders</div>
                </div>
              </div>
            </article>
          </div>
          <!--.col-->
          <div class="col-sm-6">
            <article class="statistic-box purple">
              <div>
                <div class="number"><?php echo $count_trafic;?></div>
                <div class="caption">
                  <div>Visitors</div>
                </div>
              </div>
            </article>
          </div>
          <!--.col-->
          <div class="col-sm-6">
            <article class="statistic-box yellow">
              <div>
                <div class="number"><?php echo $count_member; ?></div>
                <div class="caption">
                  <div>Customers</div>
                </div>
              </div>
            </article>
          </div>
          <!--.col-->
          <div class="col-sm-6">
            <article class="statistic-box green">
              <div>
                <div class="number"><?php echo $inquiry;?></div>
                <div class="caption">
                  <div>inquiry</div>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-xl-12 dahsboard-column">
        <section class="box-typical box-typical-dashboard panel panel-default scrollable">
          <header class="box-typical-header panel-heading">
            <h3 class="panel-title">Recent orders</h3>
          </header>
          <div class="box-typical-body panel-body">
            <table class="tbl-typical">
              <tr>
                <th><div>Status</div></th>
                <th><div>Clients</div></th>
                <th align="center"><div>Orders#</div></th>
                <th align="center"><div>Total</div></th>
                <th align="center"><div>Date</div></th>
              </tr>
              <?php 
						if(count($payment['rows'])){
							foreach($payment['rows'] as $index=>$value){
								$customer = json_decode($value->customer,true);
						?>
              <tr>
                <td><?php 
							
							if($value->payment_status == 'pending'){
								echo '<span class="label label-default">Pending</span>';
							}else{
								echo '<span class="label label-success">Confirmed</span>';
							}
							 ?></td>
                <td><?php echo $customer['firstname'] . ' '.$customer['lastname'];?></td>
                <td class="text-center"><?php echo $value->customer_email; ?></td>
                <td class="text-center"><?php echo $value->total. ' '.$value->currency; ?></td>
                <td class="text-center"><?php echo $value->payment_entered;?></td>
              </tr>
              <?php 
							}
						}else{
							echo '<tr>';
							echo '<td class="text-center" colspan="5"> Not found</td>';
							echo '</tr>';
						}
						?>
            </table>
          </div>
        </section>
      </div>          
      </div>
  </div>
</div>

<!--.page-content--> 

<script>
  $(document).ready(function() {
    $('.panel').lobiPanel({
      sortable: true
    });
    $('.panel').on('dragged.lobiPanel', function(ev, lobiPanel){
      $('.dahsboard-column').matchHeight();
    });
 });
</script> 
<?php include('tpl.footer.php');?>