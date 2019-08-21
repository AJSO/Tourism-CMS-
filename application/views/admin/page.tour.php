<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
      <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Tours</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li class="active">Tours</li>
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
              <div id="toolbar"> <strong>Tours</strong> </div>
            </div>
            <div class="pull-right search text-right"> 
            <select name="category" class="form-control">
            	<option value="">All</option>
            	<option value="inbound"<?php if($category == 'inbound'){ echo 'selected'; }?>>Inbound</option>
            	<option value="outbound"<?php if($category == 'outbound'){ echo 'selected'; }?>>Outbound</option>
            </select>
            <script>
						$('select[name=category]').change(function(){					
	            window.location.href = '<?php echo base_url();?>admin/tour?q=<?php echo $q;?>&category='+this.value;
						});
            </script>
            </div>
          </div>
          <div class="fixed-table-container" style="padding-bottom: 0px;">
            <div class="fixed-table-body">
              <table class="table">
            <thead>
              <tr>
                <th nowrap="nowrap"><a href="<?php echo base_url();?>admin/tour?field=tour_id&q=<?php echo $q;?>&sort=<?php echo $sort; ?>&page=<?php echo $page; ?>&tour_status=<?php echo $tour_status; ?>&category=<?php echo $category;?>">
                  <?php
                  if($field == 'tour_id'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';										
										}
									}
									?>
                  ID</a></th>
                <th><a href="<?php echo base_url();?>admin/tour?field=tour_code&q=<?php echo $q;?>&sort=<?php echo $sort; ?>&page=<?php echo $page; ?>&tour_status=<?php echo $tour_status; ?>&category=<?php echo $category;?>">
                  <?php
                  if($field == 'tour_code'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';										
										}
									}
									?>
                  Code</a></th>
                <th><a href="<?php echo base_url();?>admin/tour?field=tour_name&q=<?php echo $q;?>&sort=<?php echo $sort; ?>&page=<?php echo $page; ?>&tour_status=<?php echo $tour_status; ?>&category=<?php echo $category;?>">
                  <?php
                  if($field == 'tour_name'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';										
										}
									}
									?>
                  Name</a></th>
                <th><a href="<?php echo base_url();?>admin/tour?field=tour_description&q=<?php echo $q;?>&sort=<?php echo $sort; ?>&page=<?php echo $page; ?>&tour_status=<?php echo $tour_status; ?>&category=<?php echo $category;?>">
                  <?php
                  if($field == 'tour_description'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';										
										}
									}
									?>
                  Description</a></th>
                <th><a href="<?php echo base_url();?>admin/tour?field=tour_status&q=<?php echo $q;?>&sort=<?php echo $sort; ?>&page=<?php echo $page; ?>&tour_status=<?php echo $tour_status; ?>&category=<?php echo $category;?>">
                  <?php
                  if($field == 'tour_status'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';										
										}
									}
									?>
                  Status</a></th>
                <th><a href="<?php echo base_url();?>admin/tour?field=tour_updated&q=<?php echo $q;?>&sort=<?php echo $sort; ?>&page=<?php echo $page; ?>&tour_status=<?php echo $tour_status; ?>&category=<?php echo $category;?>">
                                  <?php
                  if($field == 'tour_updated'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
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
							if(count($tour['rows']) == 0 ){
								echo '<tr>';
								echo '<td class="text-center" colspan="8"> Not found</td>';
								echo '</tr>';
							}
							
							foreach($tour['rows'] as $index=>$value){
							?>
              <tr>
                <td><?php echo $value->tour_id; ?></td>
                <td><?php echo $value->tour_code; ?></td>
                <td><?php echo $value->tour_name; ?></td>
                <td><?php 
									
										$value->tour_description = strip_tags($value->tour_description);
										echo $value->tour_description;									
									
									 ?></td>
                <td><?php 
									if($value->tour_status == 1){
										echo 'Publish';
									}else{
										echo 'Pending';
									}
									 ?></td>
                <td nowrap><?php echo $value->tour_updated; ?></td>
                <td nowrap class="text-right"><?php 
										echo '<a href="'.base_url().'admin/tour/edit?tour_id='.$value->tour_id.'" class="btn btn-primary">';
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
						$url = base_url().'admin/tour?field='.$this->input->get('field').'&sort='.$this->input->get('sort').'&q='.$q;
						$url .= '&limit='.$this->input->get('limit').'&category='.$category;
						echo $this->Paginate->backend($url, $page, $tour['pages'], $tour['items']);
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