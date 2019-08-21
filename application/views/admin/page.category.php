<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Categories</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
								<li class="active">Categories</li>
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
              <div id="toolbar"> <strong>Categories</strong> </div>
            </div>
            <div class="pull-right search"> </div>
          </div>
          <div class="fixed-table-container" style="padding-bottom: 0px;">
            <div class="fixed-table-body">
              <table id="table" data-pagination="true" data-search="true" data-use-row-attr-func="true" data-reorderable-rows="true" data-toolbar="#toolbar" class="table table-hover">
                <thead>
                  <tr>
                    <th nowrap><a href="<?php echo base_url()?>admin/category?field=category_id&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>">
                      <?php 
										if($field == 'category_id'){ 
											if($sort == 'ASC'){ 
												echo '<i class="fa fa-sort-amount-desc"></i>';
											}else{ 
												echo '<i class="fa fa-sort-amount-asc"></i>';
											} 
										}?>
                      ID</a></th>
                    <th ><a href="<?php echo base_url()?>admin/category?field=category_title&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>&limit=<?php echo $this->input->get('limit');?>">
                      <?php if($field == 'category_title'){ if($sort == 'ASC'){ echo '<i class="fa fa-sort-amount-desc"></i>';}else{ echo '<i class="fa fa-sort-amount-asc"></i>';} }?>
                      Title</a></th>
                    <th><a href="<?php echo base_url()?>admin/category?field=category_description&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>&limit=<?php echo $this->input->get('limit');?>">
                      <?php if($field == 'category_description'){ if($sort == 'ASC'){ echo '<i class="fa fa-sort-amount-desc"></i>';}else{ echo '<i class="fa fa-sort-amount-asc"></i>';} }?>
                      Description</a></th>
                    <th><a href="<?php echo base_url()?>admin/category?field=parent_id&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>&limit=<?php echo $this->input->get('limit');?>">
                      <?php if($field == 'parent_id'){ if($sort == 'ASC'){ echo '<i class="fa fa-sort-amount-desc"></i>';}else{ echo '<i class="fa fa-sort-amount-asc"></i>';} }?>
                      Parent</a></th>
                    <th><a href="<?php echo base_url()?>admin/category?field=category_active&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>&limit=<?php echo $this->input->get('limit');?>">
                      <?php if($field == 'category_active'){ if($sort == 'ASC'){ echo '<i class="fa fa-sort-amount-desc"></i>';}else{ echo '<i class="fa fa-sort-amount-asc"></i>';} }?>
                      Status</a></th>
                    <th> <a href="<?php echo base_url()?>admin/category?field=category_updated&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>&limit=<?php echo $this->input->get('limit');?>">
                      <?php if($field == 'category_updated'){ if($sort == 'ASC'){ echo '<i class="fa fa-sort-amount-desc"></i>';}else{ echo '<i class="fa fa-sort-amount-asc"></i>';} }?>
                      Updated</a></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
					
					if(count($category['rows'])){
						foreach($category['rows'] as $index=>$value){?>
                  <tr>
                    <td><?php echo $value->category_id;?></td>
                    <td><?php echo $value->category_title;?></td>
                    <td><?php echo $value->category_description;?></td>
                    <td><?php 
							
							$rs = $this->Category->get_id($value->parent_id);
							if(empty($rs)){
								echo '-';
							}else{
								echo $rs[0]->category_title;
							}
							?></td>
                    <td><?php if($value->category_active == 1){echo 'Publish'; }else{ echo 'Pending';} ?></td>
                    <td nowrap="nowrap"><?php echo $value->category_updated; ?></td>
                    <td class="text-right" nowrap><?php 
										$url = base_url().'admin/category/edit?category_id='.$value->category_id;
										echo '<a class="btn btn-primary" href="'.$url.'">';
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
            <?php 
						$url = base_url().'admin/category?field='.$this->input->get('field').'&sort='.$this->input->get('sort').'&q='.$q;
						$url .= '&limit='.$this->input->get('limit');
						echo $this->Paginate->backend($url, $page, $category['pages'], $category['items']);
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