<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!-- Page title -->
<div class="col-lg-12" style="border-bottom: 1px solid #b4b6b7; margin-bottom:20px;">
	<h3><img src="<?php echo plugins_url( 'assets/icons/create_task.png', dirname(__FILE__) );?>" style="height: 60px">Create task</h3>
</div>
<?php
	$vpm_project_id	=	sanitize_text_field($_GET['vpm_project_id']);
?>
<!-- Create task form -->
<div class="col-lg-8 col-lg-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Create a new task</h3>
		</div>
		<div class="panel-body">
			<form name="create_task" class="form-horizontal" method="post" action="<?php echo admin_url();?>admin-post.php" onsubmit="return validate()">

				<input type="hidden" name="action" value="vpm">
				<input type="hidden" name="task" value="create_task">
				<input type="hidden" name="vpm_project_id" value="<?php echo sanitize_text_field($_GET['vpm_project_id']);?>">

			    <div class="form-group">
					<label for="input_staff_name" class="col-lg-3 control-label">Staff name</label>
			    	<div class="col-lg-9">
			        	<select class="form-control" id="input_staff_name" name="vpm_staff_id">
			        		<option value="" disabled selected style="display: none;">Select staff</option>
	              			<?php
			        			global $wpdb;
			        			$staff_table	=	$wpdb->prefix . 'vpm_staff';
								$query_result = $wpdb->get_results("SELECT * FROM `$staff_table` ", ARRAY_A);
								foreach($query_result as $row)
								{
							?>
			                        <option value="<?php echo $row['vpm_staff_id'];?>">
			                            <?php echo $row['name'];?>
			                        </option>
							<?php
								}
							?>
						</select>
			     	</div>
			    </div>

			    <div class="form-group">
					<label for="inputTitle" class="col-lg-3 control-label">Title</label>
					<div class="col-lg-9">
				 		<input type="text" name="title" class="form-control" id="inputTiitle" placeholder="Title">
				 	</div>
				</div>

				<div class="form-group">
					<label for="inputDescription" class="col-lg-3 control-label">Description</label>
					<div class="col-lg-9">
				 		<input type="text" name="description" class="form-control" id="inputDescription" placeholder="Description">
				 	</div>
				</div>

				<div class="form-group">
				 	<label for="inputDate" class="col-lg-3 control-label">Date</label>
				 	<div class="col-lg-9">
				 		<input type="date" name="date" class="form-control" id="inputDate">
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

	var a = document.forms["create_task"]["vpm_staff_id"].value;
	if (a == "") {
		alert("Please select staff name");
		return false;
	}

	var b = document.forms["create_task"]["title"].value;
	if (b == "") {
		alert("Please enter title");
		return false;
	}
}
</script>