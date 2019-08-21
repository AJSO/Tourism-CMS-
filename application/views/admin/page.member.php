<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<section id="main">
<?php include('page.sidebar.php');?>
<section id="content">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2>Members<small>Membership is officially here, giving you everything you need to create a robust membership experience for your website</small></h2>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th nowrap><a href="<?php echo base_url()?>admin/member?field=member_id&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q; ?>">
                    <?php 
									if($field == 'member_id'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';										
										}
									}
									?>
                    ID</a></th>
                  <th><a href="<?php echo base_url()?>admin/member?field=firstname&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q; ?>">
                    <?php 
									if($field == 'firstname'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';										
										}
									}
									?>
                    First name</a></th>
                  <th><a href="<?php echo base_url()?>admin/member?field=lastname&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q; ?>">
                    <?php 
									if($field == 'lastname'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';										
										}
									}
									?>                  
                  Last name</a></th>
                  <th><a href="<?php echo base_url()?>admin/member?field=address&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q; ?>">
                    <?php 
									if($field == 'address'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';										
										}
									}
									?>                  
                  Address</a></th>
                  <th><a href="<?php echo base_url()?>admin/member?field=country&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q; ?>">
                    <?php 
									if($field == 'country'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';										
										}
									}
									?>                                                                                          
                  Country</a></th>
                  <th><a href="<?php echo base_url()?>admin/member?field=email&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q; ?>">
                    <?php 
									if($field == 'email'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';										
										}
									}
									?>                  
                  Email</a></th>
                  <th><a href="<?php echo base_url()?>admin/member?field=member_entered&sort=<?php echo $sort;?>&page=<?php echo $page;?>&q=<?php echo $q; ?>">
                    <?php 
									if($field == 'member_entered'){
										if($sort == 'ASC'){
											echo '<i class="fa fa-sort-amount-asc"></i>';
										}else{
											echo '<i class="fa fa-sort-amount-asc"></i>';										
										}
									}
									?>                                    
                  Entered</a></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($member['rows'] as $index=>$value){?>
                <tr>
                  <td><?php echo $value->member_id;?></td>
                  <td><?php echo $value->firstname;?></td>
                  <td><?php echo $value->lastname;?></td>
                  <td><?php echo $value->address;?> <?php echo $value->city;?> <?php echo $value->state;?> <?php echo $value->zipcode;?></td>
                  <td><?php echo $value->country;?></td>
                  <td><?php echo $value->email;?></td>
                  <td><?php echo $value->member_entered;?></td>
                  <td class="text-right"><a href="<?php echo base_url();?>admin/member/edit?member_id=<?php echo $value->member_id; ?>"><i class="zmdi zmdi-edit"></i></a></td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div> 
      </div>
    </div>
  </div>
</section>
<?php include('page.footer.php');?>
