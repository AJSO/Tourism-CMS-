<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
      <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Periods</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li class="active">Periods</li>
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
              <div id="toolbar"> <strong>Periods</strong> </div>
            </div>
            <div class="pull-right">
            	<form method="get">
            	<select name="destination_id" class="form-control" onChange="this.form.submit()">
              	<?php foreach($destination as $index=>$value) {?>
                	<option value="<?php echo $value->destination_id; ?>" <?php if($destination_id == $value->destination_id){ echo ' selected';}?>><?php echo $value->destination_name;?></option>
                <?php }?>
              </select>
              </form>            
            </div>
          </div>
          <div class="fixed-table-container" style="padding-bottom: 0px;">
            <div class="fixed-table-body">
                        <?php
        echo '<table class="table">';
				echo '<thead>';
				echo '<tr>';
				echo '<th>Season Name</th>';
				echo '<th>Period</th>';
				echo '<th></th>';
				echo '</thead>';
				echo '<tbody>';

      if(count($periods)){
				echo '</tr>';
        foreach($periods as $value){
            
          $url = base_url().'admin/period/edit';
          $url .= '?period_id='.$value->period_id;
          
          echo '<tr>';
          echo '<td>'.$value->period_name.'</td>';
          echo '<td>';
          echo date('d M', mktime(0,0,0,$value->mm1, $value->dd1, date('Y')));
          echo ' - ';
          echo date('d M', mktime(0,0,0,$value->mm2, $value->dd2, date('Y')));
          echo ' ';
          echo '</td>';
          echo '<td class="text-right">';
          echo '<a href="'.$url.'" class="btn btn-primary">Edit</a>';
          echo '</td>';
          echo '</tr>';
        }
      }else{
				echo '<tr>';
				echo '<td class="text-center" colspan="5"> Not Found </td>';
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