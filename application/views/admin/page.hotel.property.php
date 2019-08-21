<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
      <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Hotels</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li><a href="<?php echo base_url();?>admin/hotel">Hotels</a></li>
              <li class="active">
                <?php if(empty($hotels[0]->hotels_id)){ echo 'Add';}else{ echo 'Edit';}?>
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
              <div id="toolbar"> <strong>Hotels</strong> </div>
            </div>
            <div class="pull-right search"> </div>
          </div>
          <div class="fixed-table-container" style="padding-bottom: 0px;">
            <div class="fixed-table-body">
              <table id="table" data-pagination="true" data-search="true" data-use-row-attr-func="true" data-reorderable-rows="true" data-toolbar="#toolbar" class="table table-hover">
                <thead>
                  <tr>
                    <th nowrap><a href="<?php echo base_url()?>admin/hotels?field=hotels_id&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>">
                      <?php 
										if($field == 'hotels_id'){ 
											if($sort == 'ASC'){ 
												echo '<i class="fa fa-sort-amount-desc"></i>';
											}else{ 
												echo '<i class="fa fa-sort-amount-asc"></i>';
											} 
										}?>
                      ID</a></th>
                    <th ><a href="<?php echo base_url()?>admin/hotels?field=hotels_title&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>&limit=<?php echo $this->input->get('limit');?>">
                      <?php if($field == 'hotels_title'){ if($sort == 'ASC'){ echo '<i class="fa fa-sort-amount-desc"></i>';}else{ echo '<i class="fa fa-sort-amount-asc"></i>';} }?>
                      Title</a></th>
                    <th><a href="<?php echo base_url()?>admin/hotels?field=hotels_description&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>&limit=<?php echo $this->input->get('limit');?>">
                      <?php if($field == 'hotels_description'){ if($sort == 'ASC'){ echo '<i class="fa fa-sort-amount-desc"></i>';}else{ echo '<i class="fa fa-sort-amount-asc"></i>';} }?>
                      Description</a></th>
                    <th><a href="<?php echo base_url()?>admin/hotels?field=parent_id&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>&limit=<?php echo $this->input->get('limit');?>">
                      <?php if($field == 'parent_id'){ if($sort == 'ASC'){ echo '<i class="fa fa-sort-amount-desc"></i>';}else{ echo '<i class="fa fa-sort-amount-asc"></i>';} }?>
                      Parent</a></th>
                    <th><a href="<?php echo base_url()?>admin/hotels?field=hotels_active&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>&limit=<?php echo $this->input->get('limit');?>">
                      <?php if($field == 'hotels_active'){ if($sort == 'ASC'){ echo '<i class="fa fa-sort-amount-desc"></i>';}else{ echo '<i class="fa fa-sort-amount-asc"></i>';} }?>
                      Status</a></th>
                    <th> <a href="<?php echo base_url()?>admin/hotels?field=hotels_updated&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q;?>&limit=<?php echo $this->input->get('limit');?>">
                      <?php if($field == 'hotels_updated'){ if($sort == 'ASC'){ echo '<i class="fa fa-sort-amount-desc"></i>';}else{ echo '<i class="fa fa-sort-amount-asc"></i>';} }?>
                      Updated</a></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
					
					if(count($hotels['rows'])){
						foreach($hotels['rows'] as $index=>$value){?>
                  <tr>
                    <td><?php echo $value->hotels_id;?></td>
                    <td><?php echo $value->hotels_title;?></td>
                    <td><?php echo $value->hotels_description;?></td>
                    <td><?php 
							
							$rs = $this->hotels->get_id($value->parent_id);
							if(empty($rs)){
								echo '-';
							}else{
								echo $rs[0]->hotels_title;
							}
							?></td>
                    <td><?php if($value->hotels_active == 1){echo 'Publish'; }else{ echo 'Pending';} ?></td>
                    <td nowrap="nowrap"><?php echo $value->hotels_updated; ?></td>
                    <td class="text-right" nowrap><?php 
									if(count($languages) > 1){
										echo '<ul class="list-inline">';
										foreach($languages as $i=>$v){
											
											list($c1, $c2) = explode('_',$v->code);
											$c2 = strtolower($c2);
											
											echo '<li>';
											if($v->code == $property[0]->lang){
												echo '<a class="btn btn-primary" href="'.base_url().'admin/hotels/edit?hotels_id='.$value->hotels_id.'">';
												echo '<img src="'.base_url().'assets/backend/img/spacer.png" class="flag flag-'.$c2.'" height="32" width="32" />';
												echo '</a>';
											}else{
												echo '<a class="btn btn-primary" href="'.base_url().'admin/hotels/'.$v->code.'/edit?hotels_id='.$value->hotels_id.'">';
												echo '<img src="'.base_url().'assets/backend/img/spacer.png" class="flag flag-'.$c2.'" height="32" width="32" />';
												echo '</a>';
											}
											echo '</li>';
										}
										echo '</ul>';										
									}else{
										echo '<a class="btn btn-primary" href="'.base_url().'admin/hotels/edit?hotels_id='.$value->hotels_id.'">';
                  	echo 'Edit';
										echo '</a>';
									}
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
						$url = base_url().'admin/hotels?field='.$this->input->get('field').'&sort='.$this->input->get('sort').'&q='.$q;
						$url .= '&limit='.$this->input->get('limit');
						echo $this->Paginate->backend($url, $page, $hotels['pages'], $hotels['items']);
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