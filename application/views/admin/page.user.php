<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
  <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Users Account</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li class="active"> Users Account
              </li>
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
              <div id="toolbar"> <strong>Users</strong> </div>
            </div>
            <div class="pull-right search"> </div>
          </div>
          <div class="fixed-table-container" style="padding-bottom: 0px;">
            <div class="fixed-table-body">
              <table class="table">
            <thead>
              <tr>
                <th><a href="<?php echo base_url()?>admin/users?field=email&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q; ?>">
                  <?php 
								if($field == 'email'){
									if($sort == 'DESC'){	
                		echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
                		echo '<i class="fa fa-sort-amount-desc"></i>';
									}
                }?>
                  Email</a></th>
                <th><a href="<?php echo base_url()?>admin/users?field=user_firstname&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q; ?>">
                  <?php 
								if($field == 'user_firstname'){
									if($sort == 'DESC'){	
                		echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
                		echo '<i class="fa fa-sort-amount-desc"></i>';
									}
                }?>
                  Fist name</a></th>
                <th><a href="<?php echo base_url()?>admin/users?field=user_lastname&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q; ?>">
                  <?php 
								if($field == 'user_lastname'){
									if($sort == 'DESC'){	
                		echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
                		echo '<i class="fa fa-sort-amount-desc"></i>';
									}
                }?>
                  Last name</a></th>
                <th><a href="<?php echo base_url()?>admin/users?field=user_nickname&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q; ?>">
                  <?php 
								if($field == 'user_nickname'){
									if($sort == 'DESC'){	
                		echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
                		echo '<i class="fa fa-sort-amount-desc"></i>';
									}
                }?>
                  Nick name</a></th>
                <th><a href="<?php echo base_url()?>admin/users?field=user_location&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q; ?>">
                  <?php 
								if($field == 'user_location'){
									if($sort == 'DESC'){	
                		echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
                		echo '<i class="fa fa-sort-amount-desc"></i>';
									}
                }?>
                  Location</a></th>
                <th><a href="<?php echo base_url()?>admin/users?field=user_type&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q; ?>">
                  <?php 
								if($field == 'user_type'){
									if($sort == 'DESC'){	
                		echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
                		echo '<i class="fa fa-sort-amount-desc"></i>';
									}
                }?>
                  Type</a></th>
                <th><a href="<?php echo base_url()?>admin/users?field=user_active&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q; ?>">
                  <?php 
								if($field == 'user_active'){
									if($sort == 'DESC'){	
                		echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
                		echo '<i class="fa fa-sort-amount-desc"></i>';
									}
                }?>
                  Status</a></th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <?php 
						
							if(count($users['rows'])){
            		foreach($users['rows'] as $index=>$value){?>
              <tr>
                <td><?php echo $value->email; ?></td>
                <td><?php echo $value->user_firstname; ?></td>
                <td><?php echo $value->user_lastname; ?></td>
                <td><?php echo $value->user_nickname; ?></td>
                <td><?php echo $value->user_location; ?></td>
                <td><?php echo $value->user_type; ?></td>
                <td><?php if($value->user_active == 1){ echo 'Active'; }else{ echo 'Inactive';} ?></td>
                <td class="text-right"><a href="<?php echo base_url();?>admin/users/edit?user_id=<?php echo $value->user_id;?>" class="btn btn-primary">
                Edit</a></td>
              </tr>
              <?php 
								}
							} 
							?>
            </tbody>
          </table>
            </div>
            <?php 
						$url = base_url().'admin/users?field='.$this->input->get('field').'&sort='.$this->input->get('sort').'&q='.$q;
						$url .= '&limit='.$this->input->get('limit');
						echo $this->Paginate->backend($url, $page, $users['pages'], $users['items']);
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