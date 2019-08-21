<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
      <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Cars</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li class="active">Cars</li>
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
              <div id="toolbar"> <strong>Cars</strong> </div>
            </div>
            <div class="pull-right"> 
            	<form method="get">
            	<select name="brand" class="form-control" onChange="this.form.submit();">
							<?php 
							foreach($brands as $index=>$value){
								if($value->car_brand == $this->input->get('brand')){
									$select = ' selected';
								}else{
									$select = '';
								}
								
								echo '<option value="'.$value->car_brand.'"'.$select.'>'.$value->car_brand.'</option>';
							}
							?></select>
              </form>
            </div>
          </div>
          <div class="fixed-table-container" style="padding-bottom: 0px;">
            <div class="fixed-table-body">
              <table id="table" data-pagination="true" data-search="true" data-use-row-attr-func="true" data-reorderable-rows="true" data-toolbar="#toolbar" class="table table-hover">
                <thead>
                  <tr>
                    <th nowrap><a href="<?php echo base_url()?>admin/transfer/car?field=car_id&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>">
                      <?php 
										if($field == 'car_id'){ 
											if($sort == 'ASC'){ 
												echo '<i class="fa fa-sort-amount-desc"></i>';
											}else{ 
												echo '<i class="fa fa-sort-amount-asc"></i>';
											} 
										}?>
                      ID</a></th>
                    <th ><a href="<?php echo base_url()?>admin/transfer/car?field=car_model&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>&limit=<?php echo $this->input->get('limit');?>">
                      <?php 
											if($field == 'car_model'){ 
												if($sort == 'ASC'){ 
													echo '<i class="fa fa-sort-amount-desc"></i>';
												}else{ 
													echo '<i class="fa fa-sort-amount-asc"></i>';
												} 
											}
											?>
                      Model</a></th>
                    <th><a href="<?php echo base_url()?>admin/transfer/car?field=car_year&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>&limit=<?php echo $this->input->get('limit');?>">
                      <?php 
											if($field == 'car_year'){ 
												if($sort == 'ASC'){ 
													echo '<i class="fa fa-sort-amount-desc"></i>';
												}else{ 
													echo '<i class="fa fa-sort-amount-asc"></i>';
												} 
											}?>
                      Year</a></th>
                    <th><a href="<?php echo base_url()?>admin/transfer/car?field=car_passenger_capacity&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>&limit=<?php echo $this->input->get('limit');?>">
                      <?php 
											if($field == 'car_passenger_capacity'){ 
												if($sort == 'ASC'){ 
													echo '<i class="fa fa-sort-amount-desc"></i>';
												}else{ 
													echo '<i class="fa fa-sort-amount-asc"></i>';
												} 
											}?>
                      Passenger Capacity</a></th>
                    <th><a href="<?php echo base_url()?>admin/transfer/car?field=car_luggage_large_capacity&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>&limit=<?php echo $this->input->get('limit');?>">
                      <?php 
											if($field == 'car_luggage_large_capacity'){ 
												if($sort == 'ASC'){ 
													echo '<i class="fa fa-sort-amount-desc"></i>';
												}else{ 
													echo '<i class="fa fa-sort-amount-asc"></i>';
												} 
											}?>
                      Large Luggage</a></th>
                    <th> <a href="<?php echo base_url()?>admin/transfer/car?field=car_luggage_small_capacity&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>&limit=<?php echo $this->input->get('limit');?>">
                      <?php 
											if($field == 'car_luggage_small_capacity'){ 
												if($sort == 'ASC'){ 
													echo '<i class="fa fa-sort-amount-desc"></i>';
												}else{ 
													echo '<i class="fa fa-sort-amount-asc"></i>';
												} 
											}?>
                      Small Luggage</a></th>
                    <th>
                    <a href="<?php echo base_url()?>admin/transfer/car?field=car_updated&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>&limit=<?php echo $this->input->get('limit');?>">
                      <?php 
											if($field == 'car_updated'){ 
												if($sort == 'ASC'){ 
													echo '<i class="fa fa-sort-amount-desc"></i>';
												}else{ 
													echo '<i class="fa fa-sort-amount-asc"></i>';
												} 
											}?>
                    Updated</a></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
					if(count($cars)){
						foreach($cars as $index=>$value){?>
                  <tr>
                    <td><?php echo $value->car_id;?></td>
                    <td><?php echo $value->car_model;?></td>
                    <td><?php echo $value->car_year;?></td>
                    <td><?php echo $value->car_passenger_capacity;?></td>
                    <td><?php echo $value->car_luggage_large_capacity;?></td>
                    <td nowrap="nowrap"><?php echo $value->car_luggage_small_capacity; ?></td>
                    <td nowrap="nowrap"><?php echo $value->car_updated; ?></td>
                    <td class="text-right" nowrap><?php 
										echo '<a class="btn btn-primary" href="'.base_url().'admin/transfer/car/edit?car_id='.$value->car_id.'">';
                  	echo 'Edit';
										echo '</a>';
									?></td>
                  </tr>
                  <?php 
						}
					}else{
					?>
                  <tr>
                    <td colspan="8" class="text-center"> Not found </td>
                  </tr>
                  <?php 
					}
					?>
                </tbody>
              </table>
            </div>
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