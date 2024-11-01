<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!-- Page title -->
<div class="col-lg-12" style="border-bottom: 1px solid #b4b6b7; margin-bottom:20px;">
	<h3><img src="<?php echo plugins_url( 'assets/icons/edit.png', dirname(__FILE__) );?>" style="height: 60px">Update staff</h3>
</div>
<!-- Edit staff form -->
<?php
	$vpm_staff_id = sanitize_text_field($_GET['vpm_staff_id']);
?>
<div class="col-lg-8 col-lg-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Edit staff</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" method="post" action="<?php echo admin_url();?>admin-post.php">

				<input type="hidden" name="action" value="vpm">
				<input type="hidden" name="task" value="edit_staff">
				<input type="hidden" name="vpm_staff_id" value="<?php echo $vpm_staff_id;?>">

				<?php
					global $wpdb;
					$query_result = $wpdb->get_results("SELECT * FROM `wp_vpm_staff` WHERE vpm_staff_id = '$vpm_staff_id' ", ARRAY_A);
					foreach ($query_result as $row)
					{
				?>

						<div class="form-group">
							<label for="inputName" class="col-lg-3 control-label">Name</label>
							<div class="col-lg-9">
								<input type="text" name="name" value="<?php echo $row['name'];?>" class="form-control" id="inputName" placeholder="Name">
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail" class="col-lg-3 control-label">Email</label>
							<div class="col-lg-9">
								<input type="text" name="email" value="<?php echo $row['email'];?>" class="form-control" id="inputEmail" placeholder="Email">
							</div>
						</div>

						<div class="form-group">
							<label for="inputPhone" class="col-lg-3 control-label">Phone</label>
							<div class="col-lg-9">
								<input type="text" name="phone" value="<?php echo $row['phone'];?>" class="form-control" id="inputPhone" placeholder="Phone">
							</div>
						</div>

						<div class="form-group">
							<label for="inputAddress" class="col-lg-3 control-label">Address</label>
							<div class="col-lg-9">
								<input type="text" name="address" value="<?php echo $row['address'];?>" class="form-control" id="inputAddress" placeholder="Address">
							</div>
						</div>

						<div class="form-group">
					    	<div class="col-lg-9 col-lg-offset-3">
			      				<input type="hidden" name="nonce" value="<?php echo wp_create_nonce('vpm-project-manager');?>">
					    		<a href="<?php echo admin_url();?>admin.php?page=vpm-staff" class="btn btn-default">Cancel</a>
					        	<button type="submit" class="btn btn-primary">Submit</button>
					    	</div>
					    </div>

			    <?php 
					}
				?>

			</form>
		</div>
	</div>
</div>