<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!-- Page title -->
<div class="col-lg-12" style="border-bottom: 1px solid #b4b6b7; margin-bottom:20px;">
	<h3><img src="<?php echo plugins_url( 'assets/icons/edit.png', dirname(__FILE__) );?>" style="height: 60px">Update file</h3>
</div>
<!-- Edit file form -->
<?php
	$vpm_file_id	=	sanitize_text_field($_GET['vpm_file_id']);
	$vpm_project_id	=	sanitize_text_field($_GET['vpm_project_id']);
?>
<div class="col-lg-8 col-lg-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Edit file</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" method="post" action="<?php echo admin_url();?>admin-post.php">

				<input type="hidden" name="action" value="vpm">
				<input type="hidden" name="task" value="edit_file">
				<input type="hidden" name="vpm_file_id" value="<?php echo $vpm_file_id;?>">
				<input type="hidden" name="vpm_project_id" value="<?php echo $vpm_project_id;?>">

				<?php
					global $wpdb;
					$file_table		=	$wpdb->prefix . 'vpm_file';
					$query_result	=	$wpdb->get_results("SELECT * FROM `$file_table` WHERE vpm_file_id = '$vpm_file_id' ", ARRAY_A);
					foreach ($query_result as $row)
					{
				?>

						<div class="form-group">
							<label for="inputFilename" class="col-lg-3 control-label">File name</label>
							<div class="col-lg-9">
						 		<input type="text" name="file_name" value="<?php echo $row['file_name'];?>" class="form-control" id="inputFilename">
							</div>
						</div>

						<div class="form-group">
							<label for="inputNote" class="col-lg-3 control-label">Note</label>
							<div class="col-lg-9">
						 		<textarea class="form-control" rows="3" name="note" id="inputNote"><?php echo $row['note'];?></textarea>
							</div>
						</div>

						<div class="form-group">
					    	<div class="col-lg-9 col-lg-offset-3">
			      				<input type="hidden" name="nonce" value="<?php echo wp_create_nonce('vpm-project-manager');?>">
					        	<a href="<?php echo admin_url();?>admin.php?page=vpm-project&module=manage_project&vpm_project_id=<?php echo $vpm_project_id; ?>" class="btn btn-default">Cancel</a>
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