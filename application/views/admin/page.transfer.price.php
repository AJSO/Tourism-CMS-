<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Transfer</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Transfer</a></li>
              <li><a href="<?php echo base_url();?>admin/transfer/car">Cars</a></li>
              <li class="active">Price</li>
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
              <div id="toolbar"> <strong>Transfer</strong> </div>
            </div>
            <div class="pull-right">
              <form class="form-inline">
                <div class="form-group">
                  <select name="brand" id="brand" class="form-control">
                    <?php 
									foreach($brands as $value){
										if($brand == $value->car_brand){
											$select = ' selected';
										}else{
											$select = '';
										}
										echo '<option value="'.$value->car_brand.'"'.$select.'>'.$value->car_brand.'</option>';
									}?>
                  </select>
                </div>
                <div class="form-group">
                  <select name="destination_id" id="destination_id" class="form-control">
                    <?php 
									foreach($destination as $index=>$value){
										if($value->destination_id == $destination_id){
											$select = ' selected';
										}else{
											$select = '';
										}
										echo '<option value="'.$value->destination_id.'" '.$select.'>'.$value->destination_name.'</option>';
                	}?>
                  </select>
                </div>
								<?php if(count($area)){?>
                <div class="form-group">
                  <select name="area_id" id="area_id" class="form-control">
                    <?php 
										foreach($area as $index=>$value){
											if($value->area_id == $area_id){
												$select = 'selected';
											}else{
												$select = '';
											}
											echo '<option value="'.$value->area_id.'" '.$select.'>'.$value->area_name.'</option>';
										}
									?>
                  </select>
                </div>
                <?php }?>
              </form>
              <script>
$('#brand').change(function(){
	window.location.href = "<?php echo base_url()?>admin/transfer/price?brand="+ encodeURI(this.value);
});
$('#destination_id').change(function(){
	var brand = $('#brand').val();
	window.location.href = "<?php echo base_url()?>admin/transfer/price?brand="+ encodeURI(brand) +"&destination_id="+this.value;
});
$('#area_id').change(function(){
	var brand = $('#brand').val();
	var destination_id = $('#destination_id').val();
	window.location.href = "<?php echo base_url()?>admin/transfer/price?brand="+ encodeURI(brand) +"&destination_id="+destination_id+'&area_id='+this.value;
});
</script> 
            </div>
          </div>
          <div class="fixed-table-container" style="padding-bottom: 0px;">
            <div class="fixed-table-body">
              <form method="post" id="from-price">
              	<div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Car</th>
                      <?php 
									if(count($area)){
										foreach($area as $index=>$value){
											if($value->area_id != $area_id){
												echo '<th nowrap>'.$value->area_name .'</th>';
											}
										}
									}else{
										echo '<th class="text-center"> No area found </th>';
									}
									?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
								foreach($car as $index=>$value){
									echo '<tr>';
									echo '<td nowrap>'.$value->car_model.' '.$value->car_year.'</td>';
									
									
									if(count($area)){
										foreach($area as $ii=>$vv){
											if($vv->area_id != $area_id){
												
												$car_id = $value->car_id;
												$area_id_2 = $vv->area_id;
												
												if(isset($rate[$car_id][$area_id][$area_id_2])){
													$price = $rate[$car_id][$area_id][$area_id_2];
												}else{
													$price = '';
												}
												
												echo '<td>';											
												echo '<input type="text" required name="price['.$value->car_id.']['.$vv->area_id.']" class="form-control" value="'.$price.'">';
												echo '</td>';
											}
									}
									}else{
										echo '<td></td>';
									}

									echo '</tr>';
								}
								?>
                    <tr>
                      <td></td>
                      <?php if(count($area) > 1){?>
                      <td colspan="<?php echo count($area)?>">
                      	<input name="save" type="submit" value="Save" class="btn btn-success">
                        <input name="reset" type="reset" value="Reset" class="btn btn-warning">
                        <input name="area_id" type="hidden" value="<?php if(isset($area_id)){ echo $area_id;}?>">
                        
                        </td>
                        <?php }?>
                    </tr>
                  </tbody>
                </table>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </section>
  </div>
</div>
<script>
$('#from-price').validate();
</script>
<?php include('tpl.footer.php');?>