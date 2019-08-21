<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<section id="main">
<?php include('page.sidebar.php');?>
<section id="content">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2>Slide<small>Javascript image slider for your website. This non-jQuery slideshow works beautifully.</small></h2>
        <ul class="actions">
          <li> <a href="<?php echo base_url(); ?>admin/slide/new"> <i class="zmdi zmdi-plus-circle"></i> </a> </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th nowrap><a href="<?php echo base_url(); ?>admin/slide?field=slide_id&sort=<?php echo $sort; ?>&q=<?php echo $q; ?>&page=<?php echo $page; ?>">
                  <?php 
								if($field == 'slide_id'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}
								}
								?>
                  ID</a></th>
                <th><a href="<?php echo base_url(); ?>admin/slide?field=upload_id&sort=<?php echo $sort; ?>&q=<?php echo $q; ?>&page=<?php echo $page; ?>">
                  <?php 
								if($field == 'upload_id'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}
								}
								?>
                  File</a></th>
                <th><a href="<?php echo base_url(); ?>admin/slide?field=slide_title&sort=<?php echo $sort; ?>&page=<?php echo $page; ?>">
                  <?php 
								if($field == 'slide_title'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}
								}
								?>
                  Title</a></th>
                <th><a href="<?php echo base_url(); ?>admin/slide?field=slide_description&sort=<?php echo $sort; ?>&page=<?php echo $page; ?>">
                  <?php 
								if($field == 'slide_description'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}
								}
								?>
                  Description</a></th>
                <th><a href="<?php echo base_url(); ?>admin/slide?field=slide_message&sort=<?php echo $sort; ?>&page=<?php echo $page; ?>">
                  <?php 
								if($field == 'slide_message'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}
								}
								?>
                  Message</a></th>
                <th><a href="<?php echo base_url(); ?>admin/slide?field=slide_label&sort=<?php echo $sort; ?>&page=<?php echo $page; ?>">
                  <?php 
								if($field == 'slide_label'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}
								}
								?>
                  Label</a></th>
                <th><a href="<?php echo base_url(); ?>admin/slide?field=url&sort=<?php echo $sort; ?>&page=<?php echo $page; ?>">
                  <?php 
								if($field == 'url'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}
								}
								?>
                  URL</a></th>
                <th><a href="<?php echo base_url(); ?>admin/slide?field=slide_updated&sort=<?php echo $sort; ?>&page=<?php echo $page; ?>">
                  <?php 
								if($field == 'slide_updated'){
									if($sort == 'ASC'){
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}else{
										echo '<i class="fa fa-sort-amount-asc"></i>';
									}
								}
								?>
                  Updated</a></th>
                <th nowrap></th>
              </tr>
            </thead>
            <tbody>
              <?php 
					
							if(count($slide['rows']) == 0){
								echo '<tr>';
								echo '<td class="" colspan="10"> Not found</td>';
								echo '</tr>';
							}	
							
							foreach($slide['rows'] as $index=>$value){						
							?>
              <tr>
                <td><?php echo $value->slide_id; ?></td>
                <td><img src="<?php echo base_url()?>admin/thumbnail/<?php echo $value->upload_id; ?>"></td>
                <td><?php echo $value->slide_title; ?></td>
                <td><?php echo $value->slide_description; ?></td>
                <td><?php echo $value->slide_message; ?></td>
                <td><?php echo $value->slide_label; ?></td>
                <td><?php echo $value->url; ?></td>
                <td nowrap="nowrap"><?php echo $value->slide_updated; ?></td>
                <td class="text-right" nowrap><?php 
									if(count($languages) > 1){
										echo '<ul class="list-inline">';
										foreach($languages as $i=>$v){
											
											list($c1, $c2) = explode('_',$v->code);
											$c2 = strtolower($c2);
											
											echo '<li>';
											if($v->code == $property[0]->lang){
												echo '<a href="'.base_url().'admin/slide/edit?slide_id='.$value->slide_id.'">';
												echo '<img src="'.base_url().'assets/backend/img/spacer.png" class="flag flag-'.$c2.'" height="32" width="32" />';
												echo '</a>';
											}else{
												echo '<a href="'.base_url().'admin/slide/'.$v->code.'/edit?slide_id='.$value->slide_id.'">';
												echo '<img src="'.base_url().'assets/backend/img/spacer.png" class="flag flag-'.$c2.'" height="32" width="32" />';
												echo '</a>';
											}
											echo '</li>';
										}
										echo '</ul>';										
									}else{
										echo '<a href="'.base_url().'admin/slide/edit?slide_id='.$value->slide_id.'">';
                  	echo '<i class="zmdi zmdi-edit"></i>';
										echo '</a>';
									}
									?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <?php
					if($slide['pages'] > 1){
						$url = base_url().'admin/slide?field='.$this->input->get('field').'&sort='.$this->input->get('sort').'&q='.$q;
						echo $this->Paginate->pages($url, $page, $slide['pages']);
					}
          
					?>
      </div>
    </div>
  </div>
</section>
<?php include('page.footer.php');?>
