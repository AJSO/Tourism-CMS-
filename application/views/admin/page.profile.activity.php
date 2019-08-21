<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Activities</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
								<li class="active">Activities</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical">


<div class="table-responsive">
        <div class="bootstrap-table">
          <div class="fixed-table-toolbar">
            <div class="bars pull-left">
              <div id="toolbar"> <strong>Activities</strong> </div>
            </div>
            <div class="pull-right search">
        <select class="form-control" onChange="window.location.href='<?php echo base_url()?>admin/profile/activities?field=<?php echo $this->input->get('field')?>&sort=<?php echo $this->input->get('sort')?>&limit=<?php echo $this->input->get('limit');?>&year='+ this.value;">
              <?php 
		$i = date('2016');
		while($i >= date('Y')){?>
              <option value="<?php echo $i; ?>"><?php echo $i;?></option>
              <?php 
			$i--;
		}
		?>
        </select>
            </div>
          </div>
          <div class="fixed-table-container" style="padding-bottom: 0px;">
            <div class="fixed-table-body">
              <table class="table">
              <thead>
                <tr>
                  <th width="150">
                  <a href="<?php echo base_url();?>admin/profile/activities?field=entered&sort=<?php echo $sort;?>&limit=<?php echo $this->input->get('limit');?>">
                  <?php 
									if($field == 'entered'){
										if($sort == 'DESC'){
											echo '<i class="fa fa-sort-amount-asc"></i>'; 
										}else{
											echo '<i class="fa fa-sort-amount-desc"></i>'; 
										}
									}?>
                   Date Time</a>
                  </th>
                  <th>
                  <a href="<?php echo base_url();?>admin/profile/activities?field=message&sort=<?php echo $sort;?>&limit=<?php echo $this->input->get('limit');?>">
                  <?php 
										if($field == 'message'){ 
										if($sort == 'DESC'){
											echo '<i class="fa fa-sort-amount-asc"></i>'; 
										}else{
											echo '<i class="fa fa-sort-amount-desc"></i>'; 
										}
										}?> Log
                  </a>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php 
							if(isset($activity['rows'])){
								foreach($activity['rows'] as $index=>$value){?>
                <tr>
                  <td scope="row" nowrap><?php echo $value->entered;?></td>
                  <td><?php echo stripslashes($value->message);?></td>
                </tr>
                <?php 
								}
							}else{
							?>
                <tr>
                  <td colspan="2" class="">Empty</td>
                </tr>
                <?php 
							}
							?>
              </tbody>
            </table>
            </div>
            <?php 
						$url = base_url().'admin/profile/activities?field='.$this->input->get('field').'&sort='.$this->input->get('sort');
						$url .= '&year='.$this->input->get('year');
						echo $this->Paginate->backend($url, $page, $activity['pages'], $activity['items']);
			?>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>



			</div><!--.box-typical-->
		</div><!--.container-fluid-->
	</div><!--.page-content-->

<?php include('tpl.footer.php');?>