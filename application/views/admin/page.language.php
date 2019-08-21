<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
<header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Languages</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li class="active">Languages
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
              <div id="toolbar"> <strong>Languages</strong> </div>
            </div>
            <div class="pull-right search"> </div>
          </div>
          <div class="fixed-table-container" style="padding-bottom: 0px;">
            <div class="fixed-table-body">
              <form>
                <table class="table">
                  <thead>
                    <tr>
                      <th width="80" nowrap="nowrap"><a href="<?php echo base_url(); ?>admin/languages?field=code&sort=<?php echo $sort;?>">
                        <?php 
										if($field == 'code'){ 
											if($sort =='DESC'){
												echo '<i class="fa fa-sort-amount-asc"></i>';
										 	}else{
												echo '<i class="fa fa-sort-amount-asc"></i>';
											}
										 }?>
                        Code </a></th>
                      <th><a href="<?php echo base_url(); ?>admin/languages?field=name&sort=<?php echo $sort;?>">
                        <?php 										
										if($field == 'name'){
											if($sort == 'DESC'){
												echo '<i class="fa fa-sort-amount-asc"></i>';
											}else{
												echo '<i class="fa fa-sort-amount-asc"></i>';
											}
										}
										?>
                        Language </a></th>
                      <th width="150"><a href="<?php echo base_url(); ?>admin/languages?field=active&sort=<?php echo $sort;?>">
                        <?php 										
										if($field == 'active'){
											if($sort == 'DESC'){
												echo '<i class="fa fa-sort-amount-asc"></i>';
											}else{
												echo '<i class="fa fa-sort-amount-asc"></i>';
											}
										}
										?>
                        Active</a></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($languages as $index=>$value){ ?>
                    <tr>
                      <td nowrap><?php 
									list($c1, $c2) = explode('_',$value->code);
									$c2 = strtolower($c2);
										
									echo '<ul class="list-inline">';
									echo '<li><img src="'.base_url().'assets/backend/img/spacer.png" width="32" height="32" class="flag flag-'.$c2.'" title="'.$value->code.'" height="32" width="32"></li>';
									echo '</ul>';
									?></td>
                      <td><?php echo $value->name; ?></td>
                      <td><?php 
									
									if($value->code == $property[0]->lang){
										if($value->active == 1){ 
											echo '<i class="zmdi zmdi-check-circle text-success"></i> ';
											echo '<span class="text-success">Active</a>'; 
										}else{ 
											echo '<i class="zmdi zmdi-close-circle text-danger"></i> ';
											echo '<span class="text-danger">Inactive</span>'; 
										} 
									}else{
										if($value->active == 1){ 
											echo '<a href="'.base_url().'admin/languages/inactive?code='.$value->code.'" class="text-success">';
											echo '<i class="zmdi zmdi-check-circle"></i> ';
											echo 'Active<a>'; 
										}else{ 
											echo '<a href="'.base_url().'admin/languages/active?code='.$value->code.'" class="text-danger">';
											echo '<i class="zmdi zmdi-close-circle"></i> ';
											echo 'Inactive</a>';
										}
									}
									?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </form>
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