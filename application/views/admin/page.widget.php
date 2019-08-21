<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Widgets</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li class="active"> <?php echo $widget_title;?> </li>
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
              <div id="toolbar"> <strong><?php echo $widget_title;?></strong> </div>
            </div>
            <div class="pull-right search"> </div>
          </div>
          <div class="fixed-table-container" style="padding-bottom: 0px;">
            <div class="fixed-table-body">
              <table class="table">
                <thead>
                  <tr>
                    <th nowrap="nowrap"><a href="<?php echo base_url()?>admin/widget/<?php echo $type; ?>?field=widget_id&sort=<?php echo $sort; ?>&q=<?php  echo $q; ?>&page=<?php echo $page; ?>">
                      <?php 
									if($field == 'widget_id'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-desc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}
									}
									?>
                      ID</a></th>
                    <?php if($type == 'services'){?>
                    <th nowrap="nowrap"><a href="<?php echo base_url()?>admin/widget/<?php echo $type; ?>?field=icon&sort=<?php echo $sort; ?>&q=<?php  echo $q; ?>&page=<?php echo $page; ?>">
                      <?php 
									if($field == 'icon'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-desc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}
									}
									?>
                      Icon</a></th>
                    <?php }?>
                    <?php if($type == 'brands' || $type == 'mission' || $type == 'ourteam' || $type == 'gallery' || $type == 'slide'){?>
                    <th nowrap="nowrap"><a href="<?php echo base_url()?>admin/widget/<?php echo $type; ?>?field=thumbnail&sort=<?php echo $sort; ?>&q=<?php  echo $q; ?>&page=<?php echo $page; ?>">
                      <?php 
									if($field == 'thumbnail'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-desc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}
									}
									?>
                      Photo</a></th>
                    <?php }?>
                    <th nowrap="nowrap"><a href="<?php echo base_url()?>admin/widget/<?php echo $type; ?>?field=widget_title&sort=<?php echo $sort; ?>&q=<?php  echo $q; ?>&page=<?php echo $page; ?>">
                      <?php 
									if($field == 'widget_title'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-desc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}
									}
									?>
                      Title</a></th>
                    <th nowrap="nowrap"><a href="<?php echo base_url()?>admin/widget/<?php echo $type; ?>?field=widget_description&sort=<?php echo $sort; ?>&q=<?php  echo $q; ?>&page=<?php echo $page; ?>">
                      <?php 
									if($field == 'widget_description'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-desc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}
									}
									?>
                      Description</a></th>
                    <th><a href="<?php echo base_url()?>admin/widget/<?php echo $type; ?>?field=link&sort=<?php echo $sort; ?>&q=<?php  echo $q; ?>&page=<?php echo $page; ?>">URL</a></th>
                    <th nowrap="nowrap"><a href="<?php echo base_url()?>admin/widget/<?php echo $type; ?>?field=displayorder&sort=<?php echo $sort; ?>&q=<?php  echo $q; ?>&page=<?php echo $page; ?>">
                      <?php 
									if($field == 'displayorder'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-desc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}
									}
									?>
                      Display Order</a></th>
                    <th nowrap="nowrap"><a href="<?php echo base_url()?>admin/widget/<?php echo $type; ?>?field=widget_entered&sort=<?php echo $sort; ?>&q=<?php  echo $q; ?>&page=<?php echo $page; ?>">
                      <?php 
									if($field == 'widget_entered'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-desc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}
									}
									?>
                      Updated</a></th>
                    <th nowrap="nowrap"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                
								if(count($widget['rows']) == 0){
									echo '<tr>';
									echo '<td class="text-center" colspan="8"> Not Found</td>';
									echo '</tr>';
								}
								foreach($widget['rows'] as $index=>$value){
								?>
                  <tr>
                    <td><?php echo $value->widget_id; ?></td>
                    <?php if($type == 'services'){?>
                    <td><?php echo $value->icon; ?></td>
                    <?php }?>
                    <?php if($type == 'brands' || $type == 'mission' || $type == 'ourteam' || $type == 'gallery' || $type == 'slide'){?>
                    <td><?php if($value->thumbnail){ echo '<img src="'.base_url().'admin/thumbnail/'.$value->thumbnail.'">';} ?></td>
                    <?php }?>
                    <td><?php echo $value->widget_title; ?></td>
                    <td><?php echo $value->widget_description; ?></td>
                    <?php if($type == 'populartours'){?><td><?php echo $value->link; ?></td><?php }?>
                    <td><?php echo $value->displayorder; ?></td>
                    <td nowrap="nowrap"><?php echo $value->widget_updated; ?></td>
                    <td class="text-right" nowrap><?php 
								echo '<a href="'.base_url().'admin/widget/'.$type.'/edit?widget_id='.$value->widget_id.'">';
								echo '<i class="fa fa-fw fa-edit"></i>';
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
						$url = base_url().'admin/widget/'.$type.'?field='.$this->input->get('field').'&sort='.$this->input->get('sort').'&q='.$q;
						$url .= '&limit='.$this->input->get('limit');
						echo $this->Paginate->backend($url, $page, $widget['pages'], $widget['items']);
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