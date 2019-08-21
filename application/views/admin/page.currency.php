<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Currencies</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
								<li class="active">Currencies</li>
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
              <div id="toolbar"> <strong>Currencies</strong> </div>
            </div>
            <div class="pull-right search text-right">
            <a href="<?php echo base_url()?>admin/currency/update"> <i class="fa fa-refresh"></i> </a> 
            </div>
          </div>
          <div class="fixed-table-container" style="padding-bottom: 0px;">
            <div class="fixed-table-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th><a href="<?php echo base_url();?>admin/currency?field=id&sort=<?php echo $sort; ?>">
                      <?php 
											if($field == 'id'){ 
												if($sort == 'ASC'){
													echo '<i class="fa fa-fw fa-sort-amount-desc"></i>';
												}else{ 
													echo '<i class="fa fa-fw fa-sort-amount-asc"></i>';
												}
											}?>
                      ID</a></th>
                      <th><a href="<?php echo base_url();?>admin/currency?field=code&sort=<?php echo $sort; ?>">
                      <?php 
											if($field == 'code'){ 
												if($sort == 'ASC'){
													echo '<i class="fa fa-fw fa-sort-amount-desc"></i>';
												}else{ 
													echo '<i class="fa fa-fw fa-sort-amount-asc"></i>';
												}
											}?>                      
                      Code</a></th>
                      <th>
                      <?php 
											if($field == 'name'){ 
												if($sort == 'ASC'){
													echo '<i class="fa fa-fw fa-sort-amount-desc"></i>';
												}else{ 
													echo '<i class="fa fa-fw fa-sort-amount-asc"></i>';
												}
											}?>                      
                      <a href="<?php echo base_url();?>admin/currency?field=name&sort=<?php echo $sort; ?>">Name</a></th>
                      <th>
                      <?php 
											if($field == 'value_usd'){ 
												if($sort == 'ASC'){
													echo '<i class="fa fa-fw fa-sort-amount-desc"></i>';
												}else{ 
													echo '<i class="fa fa-fw fa-sort-amount-asc"></i>';
												}
											}?>                                            
                      <a href="<?php echo base_url();?>admin/currency?field=value_usd&sort=<?php echo $sort; ?>">Value</a></th>
                      <th>
                      <?php 
											if($field == 'updated'){ 
												if($sort == 'ASC'){
													echo '<i class="fa fa-fw fa-sort-amount-desc"></i>';
												}else{ 
													echo '<i class="fa fa-fw fa-sort-amount-asc"></i>';
												}
											}?>                                                                  
                      <a href="<?php echo base_url();?>admin/currency?field=updated&sort=<?php echo $sort; ?>">Updated</a></th>
                      <th>
                      <?php 
											if($field == 'active'){ 
												if($sort == 'ASC'){
													echo '<i class="fa fa-fw fa-sort-amount-desc"></i>';
												}else{ 
													echo '<i class="fa fa-fw fa-sort-amount-asc"></i>';
												}
											}?>                                                                                        
                      <a href="<?php echo base_url();?>admin/currency?field=active&sort=<?php echo $sort; ?>">Active</a></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($currency as $index=>$value){?>
                    <tr>
                      <td><?php echo $value->id; ?></td>
                      <td><?php echo $value->code; ?></td>
                      <td><?php echo $value->name; ?></td>
                      <td><?php echo $value->value_usd; ?></td>
                      <td><?php echo $value->updated;?></td>
                      <td><?php 
									if($value->active){
										echo '<a href="'.base_url().'admin/currency/inactive?id='.$value->id.'">';
										echo '<span class="text-success"><i class="zmdi zmdi-check-circle"></i> Active</span>'; 
										echo '</a>';
									}else{ 
										echo '<a href="'.base_url().'admin/currency/active?id='.$value->id.'">';
										echo '<span class="text-danger"><i class="zmdi zmdi-close-circle"></i> Inactive</span>';
										echo '</a>';
									}
									?></td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--.box-typical--> 
    
  </div>
  <!--.container-fluid--> 
</div>
<!--.page-content-->
<?php include('tpl.footer.php');?>