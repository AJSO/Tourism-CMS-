<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">  <header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>APIs</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
								<li class="active">APIs</li>
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
              <div id="toolbar"> <strong>APIs</strong> </div>
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
						echo '<a href="'.base_url().'admin/api?field=api_id&sort='.$sort.'">';
						if($field == 'api_id'){
							if($sort == 'ASC'){
								echo '<i class="fa fa-sort-amount-asc"></i> ';
							}else{
								echo '<i class="fa fa-sort-amount-asc"></i> ';
							}
						}
						echo 'ID</a></th>';
						echo '<th><a href="'.base_url().'admin/api?field=name&sort='.$sort.'">';
						if($field == 'name'){
							if($sort == 'ASC'){
								echo '<i class="fa fa-sort-amount-asc"></i> ';
							}else{
								echo '<i class="fa fa-sort-amount-asc"></i> ';
							}
						}						
						echo 'Name</a></th>';
						echo '<th><a href="'.base_url().'admin/api?field=apikey&sort='.$sort.'">';
						if($field == 'apikey'){
							if($sort == 'ASC'){
								echo '<i class="fa fa-sort-amount-asc"></i> ';
							}else{
								echo '<i class="fa fa-sort-amount-asc"></i> ';
							}
						}
						echo 'Key</a></th>';
						echo '<th><a href="'.base_url().'admin/api?field=updated&sort='.$sort.'">';
						if($field == 'updated'){
							if($sort == 'ASC'){
								echo '<i class="fa fa-sort-amount-asc"></i> ';
							}else{
								echo '<i class="fa fa-sort-amount-asc"></i> ';
							}
						}
						echo 'Updated</a></th>';
						echo '<th> </th>';
						echo '</tr>';
						echo '</thead>';
						echo '<tbody>';
						if(count($api) == 0){
							echo '<tr>';
							echo '<td colspan="6" class=""> Not Found</td>';
							echo '</tr>';
						}
            foreach($api as $index=>$value){
							echo '<tr>';
							echo '<td>'.$value->api_id.'</td>';
							echo '<td>'.$value->name.'</td>';
							echo '<td>'.$value->apikey.'</td>';
							echo '<td>'.$value->updated.'</td>';
							echo '<td class="text-right">';
							echo '<a class="btn btn-primary" href="'.base_url().'admin/api/edit?api_id='.$value->api_id.'">Edit</a>';
							echo '</td>';
							echo '</tr>';
           	}
						echo '</tbody>';
						echo '</table>';
						?>
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