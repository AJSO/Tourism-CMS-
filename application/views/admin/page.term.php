<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
  	<header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Terms</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li><a href="<?php echo base_url();?>admin/term">Terms</a></li>
              <li class="active">
                <?php if(empty($term[0]->term_id)){ echo 'Add';}else{ echo 'Edit';}?>
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
              <div id="toolbar"> <strong>Terms</strong> </div>
            </div>
            <div class="pull-right search"> </div>
          </div>
          <div class="fixed-table-container" style="padding-bottom: 0px;">
            <div class="fixed-table-body">
              <table class="table">
          	<thead>
              <tr>
              	<th><a href="<?php echo base_url();?>admin/term?field=term_id&sort=<?php echo $sort; ?>&q=<?php echo $q; ?>">
                <?php 
								if($field == 'term_id'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-desc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';									
									}
								}
								?> ID</a></th>
              	<th><a href="<?php echo base_url();?>admin/term?field=term_title&sort=<?php echo $sort; ?>&q=<?php echo $q; ?>">
								<?php 
								if($field == 'term_title'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-desc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';									
									}
								}
								?> Title</a></th>
              	<th><a href="<?php echo base_url();?>admin/term?field=term_default&sort=<?php echo $sort; ?>&q=<?php echo $q; ?>">								
								<?php 
								if($field == 'term_default'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-desc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';									
									}
								}
								?> Default</a></th>
              	<th><a href="<?php echo base_url();?>admin/term?field=term_updated&sort=<?php echo $sort; ?>&q=<?php echo $q; ?>">								<?php 
								if($field == 'term_updated'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-desc></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';									
									}
								}
								?>
                Updated</a></th>
              	<th></th>
              </tr>            
            </thead>
            <tbody>
            	<?php 
							
							if(count($term['rows']) == 0){
								echo '<tr>';
								echo '<td class="text-center" colspan="6">Not found</td>';
								echo '</tr>';
							}
							
							foreach($term['rows'] as $index=>$value){?>
            	<tr>
              	<td><?php echo $value->term_id; ?></td>
              	<td><?php echo $value->term_title; ?></td>
              	<td><?php echo $value->term_default; ?></td>
              	<td><?php echo $value->term_updated; ?></td>
              	<td class="text-right"><?php 
								echo '<a href="'.base_url().'admin/term/edit?term_id='.$value->term_id.'" class="btn btn-primary">';
								echo 'Edit';
								echo '</a>';
									?></td>
              </tr>
              <?php 
							}
							?>
            </tbody>
          </table>
            </div>
            <?php 
						$url = base_url().'admin/term?field='.$this->input->get('field').'&sort='.$this->input->get('sort').'&q='.$q;
						$url .= '&limit='.$this->input->get('limit');
						echo $this->Paginate->backend($url, $page, $term['pages'], $term['items']);
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