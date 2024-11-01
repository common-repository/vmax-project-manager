<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<!-- Page title -->
<div class="col-lg-12" style="border-bottom: 1px solid #b4b6b7; margin-bottom:20px;">
	<h3><img src="<?php echo plugins_url( 'assets/icons/create_project.png', dirname(__FILE__) );?>" style="height: 60px">Create project</h3>
</div>
<!-- Create project form -->
<div class="col-lg-8 col-lg-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Create a new project</h3>
		</div>
		<div class="panel-body">
			<form name="create_project" class="form-horizontal" method="post" action="<?php echo admin_url();?>admin-post.php" onsubmit="return validate()">

				<input type="hidden" name="action" value="vpm">
				<input type="hidden" name="task" value="create_project">

				<div class="form-group">
					<label for="inputClientid" class="col-lg-3 control-label"> Client Name</label>
			     	<div class="col-lg-9">
				      	<select class="form-control" id="inputClientid" name="vpm_client_id">
	              			<option value="" disabled selected style="display: none;">Select Client</option>
		        			<?php
			        			global $wpdb;
			        			$client_table	=	$wpdb->prefix . 'vpm_client';
								$query_result = $wpdb->get_results("SELECT * FROM `$client_table` ", ARRAY_A);
								foreach($query_result as $row)
								{
							?>		
			                        <option value="<?php echo $row['vpm_client_id'];?>">
			                            <?php echo $row['name'];?>
			                        </option>
							<?php
								}
							?>
						</select>
                	</div>
			    </div>

				<div class="form-group">
					<label for="inputTitle" class="col-lg-3 control-label">Project title</label>
					<div class="col-lg-9">
				 		<input type="text" name="title" class="form-control" id="inputTitle" placeholder="Project title">
					</div>
				</div>

				<div class="form-group">
					<label for="inputDescription" class="col-lg-3 control-label">Description</label>
					<div class="col-lg-9">
				 		<textarea class="form-control" rows="4" name="description" id="inputDescription" placeholder="Description"></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="inputStatus" class="col-lg-3 control-label">Status</label>
					<div class="col-lg-9">
				 		<select class="form-control" id="inputStatus" name="status">
				 			<option value="" disabled selected style="display: none;">Select Status</option>
				        	<option value="active">Active</option>
				         	<option value="completed">Completed</option>
			        	</select>
					</div>
				</div>

				<div class="form-group">
					<label for="inputCompletion" class="col-lg-3 control-label">Completion percentage</label>
					<div class="col-lg-9">
				 		<input type="number" name="completion_percentage" class="form-control" id="inputCompletion" placeholder="Completion percentage" value="0">
					</div>
				</div>

				<div class="form-group">
					<label for="inputStartdate" class="col-lg-3 control-label">Start date</label>
					<div class="col-lg-9">
				 		<input type="date" name="start_timestamp" class="form-control" id="inputStartdate" placeholder="Start date">
				 
					</div>
				</div>

				<div class="form-group">
					<label for="inputEnddate" class="col-lg-3 control-label">End date</label>
					<div class="col-lg-9">
				 		<input type="date" name="end_timestamp" class="form-control" id="inputEnddate" placeholder="End date">
					</div>
				</div>

				<div class="form-group">
			    	<div class="col-lg-9 col-lg-offset-3">
			      		<input type="hidden" name="nonce" value="<?php echo wp_create_nonce('vpm-project-manager');?>">
			        	<button type="submit" class="btn btn-primary">Create project</button>
			    	</div>
			    </div>

			</form>
		</div>
	</div>
</div>

<script>
function validate() {

	var a = document.forms["create_project"]["vpm_client_id"].value;
	if (a == "") {
		alert("Client name must be selected");
		return false;
	}
	
	var b = document.forms["create_project"]["title"].value;
	if (b == "") {
		alert("Title must be filled out");
		return false;
	}
	
	var c =document.forms["create_project"]["status"].value;
	if (c == "") {
		alert("status must be selected");
		return false;
	}

}
</script>