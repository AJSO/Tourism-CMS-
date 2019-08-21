<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Areas</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li class="active">Areas</li>
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
              <div id="toolbar"> <strong>Areas</strong> </div>
            </div>
            <div class="pull-right">
              <form method="get">
                <select name="destination_id" class="form-control" onChange="this.form.submit()">
                  <?php foreach($destination as $index=>$value) {?>
                  <option value="<?php echo $value->destination_id; ?>" <?php if($destination_id == $value->destination_id){ echo ' selected';}?>><?php echo $value->destination_name;?></option>
                  <?php }?>
                </select>
              </form>
            </div>
          </div>
          <div class="fixed-table-container" style="padding-bottom: 0px;">
            <div class="fixed-table-body">
              <table id="table" data-pagination="true" data-search="true" data-use-row-attr-func="true" data-reorderable-rows="true" data-toolbar="#toolbar" class="table table-hover">
                <thead>
                  <tr>
                    <th nowrap><a href="<?php echo base_url()?>admin/area?field=area_id&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>">
                      <?php 
										if($field == 'area_id'){ 
											if($sort == 'ASC'){ 
												echo '<i class="fa fa-sort-amount-desc"></i>';
											}else{ 
												echo '<i class="fa fa-sort-amount-asc"></i>';
											} 
										}?>
                      ID</a></th>
                    <th ><a href="<?php echo base_url()?>admin/area?field=area_name&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>&limit=<?php echo $this->input->get('limit');?>">
                      <?php if($field == 'area_name'){ if($sort == 'ASC'){ echo '<i class="fa fa-sort-amount-desc"></i>';}else{ echo '<i class="fa fa-sort-amount-asc"></i>';} }?>
                      Title</a></th>
                    <th> <a href="<?php echo base_url()?>admin/area?field=area_updated&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>&limit=<?php echo $this->input->get('limit');?>">
                      <?php if($field == 'area_updated'){ if($sort == 'ASC'){ echo '<i class="fa fa-sort-amount-desc"></i>';}else{ echo '<i class="fa fa-sort-amount-asc"></i>';} }?>
                      Updated</a></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
					
					if(count($area)){
						foreach($area as $index=>$value){?>
                  <tr>
                    <td><?php echo $value->area_id;?></td>
                    <td><?php echo $value->area_name;?></td>
                    <td nowrap="nowrap"><?php echo $value->area_updated; ?></td>
                    <td class="text-right" nowrap><?php 
										echo '<a class="btn btn-primary" href="'.base_url().'admin/area/edit?area_id='.$value->area_id.'">';
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