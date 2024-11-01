<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!-- Page title -->
<div class="col-lg-12" style="border-bottom: 1px solid #b4b6b7; margin-bottom:20px;">
	<h3><img src="<?php echo plugins_url( 'assets/icons/delete.png', dirname(__FILE__) );?>" style="height: 60px">Delete staff?</h3>
</div>
<?php
	$vpm_staff_id = sanitize_text_field($_GET['vpm_staff_id']);
?>

<form method="post" action="<?php echo admin_url();?>admin-post.php">

	<input type="hidden" name="action" value="vpm">
	<input type="hidden" name="task" value="delete_staff">
	<input type="hidden" name="vpm_staff_id" value="<?php echo $vpm_staff_id;?>">

	<div class="form-group">
		<div class="col-lg-10 col-lg-offset-2">
			<input type="hidden" name="nonce" value="<?php echo wp_create_nonce('vpm-project-manager');?>">
			<button type="submit" class="btn btn-primary">Confirm</button>
			<a class="btn btn-default" href="<?php echo admin_url();?>admin.php?page=vpm-staff">Cancel</a>
			
		</div>
	</div>
	
	
</form>