<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3> Payment Setting </h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li class="active"> Payment Setting </li>
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
              <div id="toolbar"> <strong>Payment Setting</strong> </div>
            </div>
            <div class="pull-right search"> </div>
          </div>
          <div class="fixed-table-container" style="padding-bottom: 0px;">
            <div class="fixed-table-body">
              <table class="table">
                <thead>
                  <tr>
                    <th><a href="<?php echo base_url()?>admin/payment-setting?field=id&sort=<?php echo $sort; ?>&q=<?php echo $q;?>">
                      <?php 
									if($field == 'id'){
										if($sort == 'DESC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-desc"></i>';
										}
									}?>
                      ID</a></th>
                    <th><a href="<?php echo base_url()?>admin/payment-setting?field=type&sort=<?php echo $sort; ?>&q=<?php echo $q;?>">
                      <?php 
									if($field == 'type'){
										if($sort == 'DESC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-desc"></i>';
										}
									}?>
                      Type</a></th>
                    <th><a href="<?php echo base_url()?>admin/payment-setting?field=detail&sort=<?php echo $sort; ?>&q=<?php echo $q;?>">
                      <?php 
									if($field == 'detail'){
										if($sort == 'DESC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-desc"></i>';
										}
									}?>
                      Detail</a></th>
                    <th width="80"><a href="<?php echo base_url()?>admin/payment-setting?field=updated&sort=<?php echo $sort; ?>&q=<?php echo $q;?>">
                      <?php 
									if($field == 'updated'){
										if($sort == 'DESC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-desc"></i>';
										}
									}?>
                      Updated</a></th>
                    <th width="25"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($payment as $index=>$value){?>
                  <tr>
                    <td><?php echo $value->id;?></td>
                    <td nowrap><?php echo $value->type; ?></td>
                    <td><?php echo $value->detail;?></td>
                    <td nowrap="nowrap"><?php echo $value->updated;?></td>
                    <td class="text-right"><a href="<?php echo base_url()?>admin/payment-setting/edit?id=<?php echo $value->id; ?>" class="btn btn-primary"> Edit </a></td>
                  </tr>
                  <?php } ?>
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