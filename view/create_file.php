<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!-- Page title -->
<div class="col-lg-12" style="border-bottom: 1px solid #b4b6b7; margin-bottom:20px;">
	<h3><img src="<?php echo plugins_url( 'assets/icons/create_file.png', dirname(__FILE__) );?>" style="height: 60px">Create file</h3>
</div>
<?php
	$vpm_project_id	=	sanitize_text_field($_GET['vpm_project_id']);
?>
<!-- Create file form -->
<div class="col-lg-8 col-lg-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Create a new file</h3>
		</div>
		<div class="panel-body">
			<form name="create_file" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo admin_url();?>admin-post.php" onsubmit="return validate()">

				<input type="hidden" name="action" value="vpm">
				<input type="hidden" name="task" value="create_file">
				<input type="hidden" name="vpm_project_id" value="<?php echo sanitize_text_field($_GET['vpm_project_id']);?>">

				<div class="form-group">
					<label for="inputFilename" class="col-lg-3 control-label">Select file</label>
					<div class="col-lg-9">
				 		<input type="file" name="file_name" class="form-control" id="inputFilename" placeholder="File name">
					</div>
				</div>

				<div class="form-group">
					<label for="inputNote" class="col-lg-3 control-label">Note</label>
					<div class="col-lg-9">
				 		<textarea class="form-control" rows="3" name="note" id="inputNote" placeholder="Note"></textarea>
					</div>
				</div>

				<div class="form-group">
			    	<div class="col-lg-9 col-lg-offset-3">
			      		<input type="hidden" name="nonce" value="<?php echo wp_create_nonce('vpm-project-manager');?>">
			        	<a href="<?php echo admin_url();?>admin.php?page=vpm-project&module=manage_project&vpm_project_id=<?php echo $vpm_project_id; ?>" class="btn btn-default">Cancel</a>
			        	<button type="submit" class="btn btn-primary">Submit</button>
			    	</div>
			    </div>

			</form>
		</div>
	</div>
</div>

<script>
function validate() {

	var a = document.forms["create_file"]["file_name"].value;
	if (a == "") {
		alert("Please select a file");
		return false;
	}
}
</script>