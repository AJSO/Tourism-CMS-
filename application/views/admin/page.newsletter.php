<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<section id="main">
<?php include('page.sidebar.php');?>
<section id="content">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2>Newsletter <small>A newsletter is a regularly distributed publication that is generally about one main topic of interest to its subscribers</small></h2>
        <ul class="actions">
          <li> <a href="<?php echo base_url(); ?>admin/newsletter/export"> <i class="zmdi zmdi-download"></i> </a> </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th><a href="<?php echo base_url();?>admin/newsletter?field=newsletter_id&page=<?php echo $page; ?>">ID</a></th>
                <th><a href="<?php echo base_url();?>admin/newsletter?field=email&page=<?php echo $page; ?>">Email</a></th>
                <th><a href="<?php echo base_url();?>admin/newsletter?field=unsubscribe&page=<?php echo $page; ?>">Unsubscribe</a></th>
                <th><a href="<?php echo base_url();?>admin/newsletter?field=newsletter_entered&page=<?php echo $page; ?>">Entered</a></th>
              </tr>
            </thead>
            <tbody>
              <?php
							if(count($newsletter['rows'])){
								foreach($newsletter['rows'] as $index=>$value){?>
              <tr>
                <td><?php echo $value->newsletter_id; ?></td>
                <td><?php echo $value->email; ?></td>
                <td><?php echo $value->unsubscribe; ?></td>
                <td><?php echo $value->newsletter_entered; ?></td>
              </tr>
              <?php 
								}
							}else{
								echo '<tr>';
								echo '<td class="" colspan="4"> Not found</td>';
								echo '</tr>';
							}
							?>
            </tbody>
          </table>
        </div>
        <?php 
					if($newsletter['pages'] > 1){
						$url = base_url().'admin/newsletter?field='.$this->input->get('field').'&sort='.$this->input->get('sort').'&q='.$q;
						echo $this->Paginate->pages($url, $page, $newsletter['pages']);
					}
			?>
      </div>
    </div>
  </div>
</section>
<?php include('page.footer.php');?>
