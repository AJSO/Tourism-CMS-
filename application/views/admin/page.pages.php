<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<section id="main">
<?php include('page.sidebar.php');?>
<section id="content">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2>Pages <small>Pages are for content such as "About," "Contact," etc. </small></h2>
        <ul class="actions">
          <li> <a href="<?php echo base_url();?>admin/page/new"> <i class="zmdi zmdi-plus-circle"></i> </a> </li>
          <li class="dropdown"> <a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li> <a href="<?php echo base_url();?>admin/page">
                <?php if($page_status == false){?>
                <i class="zmdi zmdi-check-circle text-success"></i>
                <?php }?>
                All</a> </li>
              <li> <a href="<?php echo base_url();?>admin/page?page_status=1&q=<?php echo $q; ?>&field=<?php echo $field; ?>">
                <?php if($page_status == '1'){?>
                <i class="zmdi zmdi-check-circle text-success"></i>
                <?php }?>
                Publish</a> </li>
              <li> <a href="<?php echo base_url();?>admin/page?page_status=0&q=<?php echo $q; ?>&field=<?php echo $field; ?>">
                <?php if($page_status == '0'){?>
                <i class="zmdi zmdi-check-circle text-success"></i>
                <?php }?>
                Pending</a> </li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th width="80"><a href="<?php echo base_url(); ?>admin/page?field=page_id&sort=<?php echo $sort;?>&q=<?php echo $q; ?>&page=<?php echo $page;?>">
                  <?php 
								if($field == 'page_id'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}
								}
								?>
                  ID</a></th>
                <th><a href="<?php echo base_url(); ?>admin/page?field=page_menu&sort=<?php echo $sort;?>&q=<?php echo $q; ?>&page=<?php echo $page;?>">
                  <?php 
								if($field == 'page_menu'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}
								}
								?>
                  Menu</a></th>
                <th><a href="<?php echo base_url(); ?>admin/page?field=page_title&sort=<?php echo $sort;?>&q=<?php echo $q; ?>&page=<?php echo $page;?>">
                  <?php 
								if($field == 'page_title'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}
								}
								?>
                  Title</a></th>
                <th width="80" class=""><a href="<?php echo base_url(); ?>admin/page?field=page_display_order&sort=<?php echo $sort;?>&q=<?php echo $q; ?>&page=<?php echo $page;?>">
                  <?php 
								if($field == 'page_display_order'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}
								}
								?>
                  Order</a></th>
                <th width="150"><a href="<?php echo base_url(); ?>admin/page?field=page_status&sort=<?php echo $sort;?>&q=<?php echo $q; ?>&page=<?php echo $page;?>">
                  <?php 
								if($field == 'page_status'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}
								}
								?>
                  Status</a></th>
                <th width="150"><a href="<?php echo base_url(); ?>admin/page?field=page_date&sort=<?php echo $sort;?>&q=<?php echo $q; ?>&page=<?php echo $page;?>">
                  <?php 
								if($field == 'page_date'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}
								}
								?>
                  Date of publish</a></th>
                <th width="50"></th>
              </tr>
            </thead>
            <tbody>
              <?php 
							if(count($items['rows'])){
								foreach($items['rows'] as $index=>$value){
						?>
              <tr>
                <td><?php echo $value->page_id;?></td>
                <td><?php echo $value->page_menu;?></td>
                <td><?php echo $value->page_title;?></td>
                <td class=""><?php echo $value->page_display_order;?></td>
                <td><?php if($value->page_status == 1){ echo 'Publish';}else{ echo 'Pending';}?></td>
                <td nowrap="nowrap"><?php echo $value->page_date;?></td>
                <td class="text-right" nowrap><?php 
									if(count($languages) > 1){
										echo '<ul class="list-inline">';
										foreach($languages as $i=>$v){
											
											list($c1, $c2) = explode('_',$v->code);
											$c2 = strtolower($c2);
											
											echo '<li>';
											if($v->code == $property[0]->lang){
												echo '<a href="'.base_url().'admin/page/edit?page_id='.$value->page_id.'">';
												echo '<img src="'.base_url().'assets/backend/img/spacer.png" class="flag flag-'.$c2.'" height="32" width="32" />';
												echo '</a>';
											}else{
												echo '<a href="'.base_url().'admin/page/'.$v->code.'/edit?page_id='.$value->page_id.'">';
												echo '<img src="'.base_url().'assets/backend/img/spacer.png" class="flag flag-'.$c2.'" height="32" width="32" />';
												echo '</a>';
											}
											echo '</li>';
										}
										echo '</ul>';										
									}else{
										echo '<a href="'.base_url().'admin/page/edit?page_id='.$value->page_id.'">';
                  	echo '<i class="zmdi zmdi-edit"></i>';
										echo '</a>';
									}
									?></td>
              </tr>
              <?php 
					 			}
					 		}else{
							?>
              <tr>
                <td class="text-center" colspan="7"> Not found</td>
              </tr>
              <?php
							}
						?>
            </tbody>
          </table>
        </div>
        <?php 
					if($items['pages'] > 1){
						$url = base_url().'admin/pages?';
						$url .= 'page_status='.$this->input->get('page_status');
						$url .= '&q='.$this->input->get('q');
						$url .= '&field='.$this->input->get('field');
						$url .= '&sort='.$this->input->get('sort');
						$url .= '&article_status='.$this->input->get('article_status');
						echo $this->Paginate->pages($url, $page, $items['pages']); 
					}
					?>
      </div>
    </div>
  </div>
</section>
<?php include('page.footer.php');?>
