<?php
if(isset($video[0]->filepath)){
	$key = $property[0]->jwplayer;
?>
<div id="jwPlayer">Loading the player...</div>
<script src="<?php echo base_url(); ?>assets/plugins/jwplayer/jwplayer.js"></script>
<script>jwplayer.key="<?php echo $key;?>";</script>
<script>
var playerInstance = jwplayer("jwPlayer");
playerInstance.setup({
	image: "<?php echo base_url().$video[0]->filepath ;?>.jpg",
	file: "<?php echo base_url().$video[0]->filepath ;?>",
	width: '800',
	height: '450'
});
</script>
<?php
}
?>