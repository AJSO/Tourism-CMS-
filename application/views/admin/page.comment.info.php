<?php include('tpl.meta.php');?>
<?php include('tpl.header.php');?>
<section id="main">
<?php include('page.sidebar.php');?>
<section id="content">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2>Comments <small>Member comments record</small></h2>
      </div>
      <div class="card-body card-padding">
        <form class="form-horizontal" method="post">
          <div class="form-group">
            <label class="col-sm-4 control-label">Member</label>
            <div class="col-sm-8">
              <p class="m-t-5">
                <?php 
							 if(isset($comment[0]->id)){
							 	echo $comment[0]->firstname. ' '. $comment[0]->lastname ;
							 }
							 ?>
              </p>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Message</label>
            <div class="col-sm-8">
              <p class="m-t-5">
                <?php 
								if(isset($comment[0]->message)){ 
									$comment[0]->message = htmlspecialchars($comment[0]->message);
									echo nl2br($comment[0]->message); 
								} ?>
              </p>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
              <button type="submit" class="btn btn-danger btn-delete">Delete</button>
              <input type="hidden" name="id" value="<?php if(isset($comment[0]->id)){ echo $comment[0]->id; }?>">
              <input type="hidden" name="action" value="delete">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php include('page.footer.php');?>
<script>
$('.btn-delete').click(function(){
	if(confirm('Delete this comment')){
		return true;
	}else{
		return false;
	}
});
</script>