<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<section id="main">
<?php include('page.sidebar.php');?>
<section id="content">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <form role="search" class="form-inline pull-right">
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control input-md" name="q" placeholder="Search" value="<?php echo $q; ?>">
              <span class="input-group-btn">
              <button class="btn btn-primary btn-md" type="submit"><i class="zmdi zmdi-search"></i></button>
              </span> </div>
          </div>
        </form>
        <h2>Comments <small>Member comments record</small></h2>
      </div>
      <div class="card-body card-padding">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th> <a href="<?php echo base_url()?>admin/comment?field=id&sort=<?php echo $sort;?>&page=<?php echo $page; ?>&q=<?php echo $q; ?>">
                  <?php 
									if($field == 'id'){
										if($sort == 'ASC'){
											echo '<i class="zmdi zmdi-amount-sort-desc"></i>';
										}else{
											echo '<i class="zmdi zmdi-amount-sort-asc"></i>';
										}
									}?>
                  ID</a></th>
                <th> <a href="<?php echo base_url()?>admin/comment?field=email&sort=<?php echo $sort;?>&page=<?php echo $page; ?>&q=<?php echo $q; ?>"> Member</a></th>
                <th> <a href="<?php echo base_url()?>admin/comment?field=message&sort=<?php echo $sort;?>&page=<?php echo $page; ?>&q=<?php echo $q; ?>"> Message</a></th>
                <th> <a href="<?php echo base_url()?>admin/comment?field=entered&sort=<?php echo $sort;?>&page=<?php echo $page; ?>&q=<?php echo $q; ?>"> Entered</a></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($comment['rows'] as $index=>$value){?>
              <tr>
                <td><?php echo $value->id; ?></td>
                <td><?php echo $value->email; ?></td>
                <td><?php if(strlen($value->message) > 155){echo htmlspecialchars(substr($value->message,0, 155)).'...';}else{ echo htmlspecialchars($value->message); }?></td>
                <td nowrap><?php echo $value->entered; ?></td>
                <td class="text-right"><a href="<?php echo base_url(); ?>admin/comment/info?id=<?php echo $value->id; ?>"><i class="zmdi zmdi-file-text"></i></a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <?php
					if($comment['pages'] > 1){
						$url = base_url().'admin/comment?field='.$this->input->get('field').'&sort='.$this->input->get('sort').'&q='.$q;
						echo $this->Paginate->pages($url, $page, $comment['pages']);
					}
          
					?>
      </div>
    </div>
  </div>
</section>
<?php include('page.footer.php');?>
