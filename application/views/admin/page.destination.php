<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
  			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Destinations</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
								<li class="active">Destinations</li>
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
              <div id="toolbar"> <strong>Destinations</strong> </div>
            </div>
            <div class="pull-right search"> </div>
          </div>
          <div class="fixed-table-container" style="padding-bottom: 0px;">
            <div class="fixed-table-body">
                        <?php
						echo '<table class="table">';
						echo '<thead>';
						echo '<tr>';
						echo '<th>';
						echo '<a href="'.base_url().'admin/destination?field=destination_id&sort='.$sort.'">';
						if($field == 'destination_id'){
							if($sort == 'ASC'){
								echo '<i class="fa fa-sort-amount-desc"></i> ';
							}else{
								echo '<i class="fa fa-sort-amount-asc"></i> ';
							}
						}
						echo 'ID</a></th>';
						echo '<th><a href="'.base_url().'admin/destination?field=destination_code&sort='.$sort.'">';
						if($field == 'destination_code'){
							if($sort == 'ASC'){
								echo '<i class="fa fa-sort-amount-desc"></i> ';
							}else{
								echo '<i class="fa fa-sort-amount-asc"></i> ';
							}
						}						
						echo 'IATA</a></th>';
						echo '<th><a href="'.base_url().'admin/destination?field=destination_name&sort='.$sort.'">';
						if($field == 'destination_name'){
							if($sort == 'ASC'){
								echo '<i class="fa fa-sort-amount-desc"></i> ';
							}else{
								echo '<i class="fa fa-sort-amount-asc"></i> ';
							}
						}						
						echo 'Name</a></th>';
						echo '<th><a href="'.base_url().'admin/destination?field=destination_country&sort='.$sort.'">';
						if($field == 'destination_country'){
							if($sort == 'ASC'){
								echo '<i class="fa fa-sort-amount-desc"></i> ';
							}else{
								echo '<i class="fa fa-sort-amount-asc"></i> ';
							}
						}
						echo 'Country</a></th>';
						echo '<th>';
						echo '<a href="'.base_url().'admin/destination?field=destination_status&sort='.$sort.'">';
						if($field == 'destination_status'){
							if($sort == 'ASC'){
								echo '<i class="fa fa-sort-amount-desc"></i> ';
							}else{
								echo '<i class="fa fa-sort-amount-asc"></i> ';
							}
						}						
						echo 'Status</a></th>';
						echo '<th><a href="'.base_url().'admin/destination?field=destination_updated&sort='.$sort.'">';
						if($field == 'destination_updated'){
							if($sort == 'ASC'){
								echo '<i class="fa fa-sort-amount-desc"></i> ';
							}else{
								echo '<i class="fa fa-sort-amount-asc"></i> ';
							}
						}
						echo 'Updated</a></th>';
						echo '<th> </th>';
						echo '</tr>';
						echo '</thead>';
						echo '<tbody>';
						if(count($destination['rows']) == 0){
							echo '<tr>';
							echo '<td colspan="6" class="text-center"> Not Found</td>';
							echo '</tr>';
						}
            foreach($destination['rows'] as $index=>$value){
							echo '<tr>';
							echo '<td>'.$value->destination_id.'</td>';
							echo '<td>'.$value->destination_code.'</td>';
							echo '<td>'.$value->destination_name.'</td>';
							echo '<td>'.$value->destination_country.'</td>';
							echo '<td>';
							if($value->destination_status == 1){
								echo 'Publish';
							}else{
								echo 'Pending';
							}
							echo '</td>';
							echo '<td>'.$value->destination_updated.'</td>';
							echo '<td class="text-right">';
							$url = base_url().'admin/destination/edit?destination_id='.$value->destination_id;
							echo '<a href="'.$url.'" class="btn btn-primary">';
							echo 'Edit';
							echo '</a>';
							
							echo '</td>';
							echo '</tr>';
           	}
						echo '</tbody>';
						echo '</table>';
						?>

            </div>
            <?php 
						$url = base_url().'admin/destination?field='.$this->input->get('field').'&sort='.$this->input->get('sort').'&q='.$q;
						$url .= '&limit='.$this->input->get('limit');
						echo $this->Paginate->backend($url, $page, $destination['pages'], $destination['items']);
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