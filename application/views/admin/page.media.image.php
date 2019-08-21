<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<section id="main">
  <?php include('page.sidebar.php');?>
  <section id="content">
    <div class="container">
      <div class="card">
        <div class="card-header">
<form class="form-inline pull-right" method="get" >
          <div class="form-group">
            <select name="mm" class="form-control">
              <option value=""> - Month - </option>
              <?php 
					$i = 1;
					while($i <= 12){

							if($i == $mm){
								$selected = ' selected';
							}else{
								$selected = '';
							}
						
						echo '<option value="'.sprintf('%02d', $i).'" '.$selected.'>'.date('M', mktime(0,0,0,$i,1,date('Y'))).'</option>';
						$i++;
					}
					?>
            </select>
          </div>
          <div class="form-group">
            <select name="yy" class="form-control pull-right">
              <option value=""> - Year - </option>
              <?php 
							$year = 2016;
							while($year <= date('Y')+1){
								if($year == $yy){
									$selected = ' selected';
								}else{
									$selected = '';
								}
								?>
              <option value="<?php echo $year;?>"<?php echo $selected;?>><?php echo $year;?></option>
              <?php 
								$year++;
							}
							?>
            </select>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-search"></i></button>
          </div>
        </form>        
          <h2>Images <small>a binary representation of visual information such as pictures, graphs, logos, or individual video frames.</small></h2>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th width="50" nowrap="nowrap"><a href="<?php echo base_url(); ?>admin/media/image?field=upload_id&sort=<?php echo $sort; ?>&mm=<?php echo $mm; ?>&yy=<?php echo $yy; ?>&page=<?php echo $page; ?>">
                    <?php 
									if($field == 'upload_id'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}
									}
									?>
                    ID</a></th>
                  <th width="100" nowrap="nowrap"><a href="<?php echo base_url(); ?>admin/media/image?field=filepath&sort=<?php echo $sort; ?>&mm=<?php echo $mm; ?>&yy=<?php echo $yy; ?>&page=<?php echo $page; ?>">
									<?php 
									if($field == 'filepath'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}
									}
									?>

                  Path</a></th>
                  <th nowrap="nowrap"><a href="<?php echo base_url(); ?>admin/media/image?field=filecaption&sort=<?php echo $sort; ?>&mm=<?php echo $mm; ?>&yy=<?php echo $yy; ?>&page=<?php echo $page; ?>">
									<?php 
									if($field == 'filecaption'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}
									}
									?> 
                  Caption</a></th>
                  <th width="150" nowrap="nowrap"><a href="<?php echo base_url(); ?>admin/media/image?field=fileentered&sort=<?php echo $sort; ?>&mm=<?php echo $mm; ?>&yy=<?php echo $yy; ?>&page=<?php echo $page; ?>">
									<?php 
									if($field == 'fileentered'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}
									}
									?>                  
                  Entered</a></th>
                  <th width="80" nowrap="nowrap">&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                <?php 
					if(count($items['rows'])){
						foreach($items['rows'] as $index=>$value){
							?>
                <tr>
                  <td><?php echo $value->upload_id; ?></td>
                  <td>
                  <a href="<?php echo base_url().$value->filepath; ?>" class="image-popup" title="<?php echo $value->filecaption; ?>">
									<img src="<?php echo base_url().'admin/thumbnail/'.$value->upload_id; ?>">
                  </a></td>
                  <td><?php if($value->filecaption){ echo $value->filecaption; }else{ echo '-'; } ?></td>
                  <td nowrap="nowrap"><?php echo $value->fileentered; ?></td>
                  <td class="text-right" nowrap>
<?php 
									if(count($languages) > 1){
										echo '<ul class="list-inline">';
										foreach($languages as $i=>$v){
											
											list($c1, $c2) = explode('_',$v->code);
											$c2 = strtolower($c2);
											
											echo '<li>';
											if($v->code == $property[0]->lang){
												echo '<a href="'.base_url().'admin/media/edit?upload_id='.$value->upload_id.'">';
												echo '<img src="'.base_url().'assets/backend/img/spacer.png" class="flag flag-'.$c2.'" height="32" width="32" />';
												echo '</a>';
											}else{
												echo '<a href="'.base_url().'admin/media/'.$v->code.'/edit?upload_id='.$value->upload_id.'">';
												echo '<img src="'.base_url().'assets/backend/img/spacer.png" class="flag flag-'.$c2.'" height="32" width="32" />';
												echo '</a>';
											}
											echo '</li>';
										}
										echo '</ul>';										
									}else{
										echo '<a href="'.base_url().'admin/media/edit?upload_id='.$value->upload_id.'">';
                  	echo '<i class="zmdi zmdi-edit"></i>';
										echo '</a>';
									}
									?>                  
                  </td>
                </tr>
                <?php							
						}
					}else{
						?>
                <tr>
                  <td colspan="5" class="text-center">Not found</td>
                </tr>
                <?php 
					}
					?>
              </tbody>
            </table>
          </div>
                  <?php          
					if($items['pages'] > 1){
						$url = base_url().'admin/media/image?field='.$this->input->get('field').'&sort='.$this->input->get('sort').'&mm='.$mm.'&yy='.$yy;
						echo $this->Paginate->pages($url, $page, $items['pages']);
					}
?>

        </div>
      </div>
    </div>
  </section>
  <?php include('page.footer.php');?>
<script>
$('.image-popup').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-fade',
		gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1] 
		}
});
</script>
