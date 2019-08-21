<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<?php include('tpl.aside.php');?>
<div class="page-content">
  <div class="container-fluid">
<header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>SEO</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="<?php echo base_url();?>admin">Dashboard</a></li>
              <li class="active">SEO
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
              <div id="toolbar"> <strong>SEO</strong> </div>
            </div>
            <div class="pull-right search"> </div>
          </div>
          <div class="fixed-table-container" style="padding-bottom: 0px;">
            <div class="fixed-table-body">
              <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th><a href="<?php base_url();?>admin/seo?field=id">ID</a></th>
                <th><a href="<?php base_url();?>admin/seo?field=lang">Language</a></th>
                <th><a href="<?php base_url();?>admin/seo?field=title">Title</a></th>
                <th><a href="<?php base_url();?>admin/seo?field=description">Description</a></th>
                <th><a href="<?php base_url();?>admin/seo?field=keywords">Keywords</a></th>
                <th><a href="<?php base_url();?>admin/seo?field=updated">Updated</a></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php 
								
								if(count($seo) == false){
									echo '<tr>';
									echo '<td class="" colspan="7">Not found</td>';
									echo '</tr>';
								}
								
								foreach($seo as $index=>$value){?>
              <tr>
                <td><?php echo $value->id; ?></td>
                <td><?php echo $value->lang; ?></td>
                <td><?php echo $value->title; ?></td>
                <td><?php echo $value->description;	?></td>
                <td><?php echo $value->keywords; ?></td>
                <td nowrap><?php echo $value->updated; ?></td>
                <td class="text-right"><a href="<?php echo base_url();?>admin/seo/edit?id=<?php echo $value->id; ?>" class="btn btn-primary">Edit</a></td>
              </tr>
              <?php 
								}
								?>
            </tbody>
          </table>
        </div>
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