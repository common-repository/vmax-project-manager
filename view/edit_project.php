<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!-- Page title -->
<div class="col-lg-12" style="border-bottom: 1px solid #b4b6b7; margin-bottom:20px;">
	<h3><img src="<?php echo plugins_url( 'assets/icons/edit.png', dirname(__FILE__) );?>" style="height: 60px">Update project</h3>
</div>
<!-- Edit project form -->
<?php
	$vpm_project_id	=	sanitize_text_field($_GET['vpm_project_id']);
?>
<div class="col-lg-8 col-lg-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Edit project</h3>
		</div>
		<div class="panel-body">
			<form name="edit_project" class="form-horizontal" method="post" action="<?php echo admin_url();?>admin-post.php" onsubmit="return validate()">

				<input type="hidden" name="action" value="vpm">
				<input type="hidden" name="task" value="edit_project">
				<input type="hidden" name="vpm_project_id" value="<?php echo $vpm_project_id;?>">

				<?php
					global $wpdb;
					$project_table	=	$wpdb->prefix . 'vpm_project';
					$query_result	=	$wpdb->get_results("SELECT * FROM `$project_table` WHERE vpm_project_id = '$vpm_project_id' ", ARRAY_A);
					foreach($query_result as $row)
					{
				?>

						<div class="form-group">
							<label for="inputClientid" class="col-lg-3 control-label"> Client Name</label>
					     	<div class="col-lg-9">
						      	<select class="form-control" id="inputClientid" name="vpm_client_id" value="<?php echo $row['vpm_client_id'];?>">
			              
				        			<?php
					        			global $wpdb;
					        			$client_table	=	$wpdb->prefix . 'vpm_client';
										$query_result = $wpdb->get_results("SELECT * FROM `$client_table` ", ARRAY_A);
										foreach($query_result as $row2)
										{
									?>
					                        <option value="<?php echo $row2['vpm_client_id'];?>" 
				                            <?php if($row['vpm_client_id'] == $row2['vpm_client_id']) echo 'selected';?>
				                            >
					                            <?php echo $row2['name'];?>
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
						 		<input type="text" name="title" value="<?php echo $row['title'];?>" class="form-control" id="inputTitle">
							</div>
						</div>

						<div class="form-group">
							<label for="inputDescription" class="col-lg-3 control-label">Description</label>
							<div class="col-lg-9">
						 		<textarea class="form-control" rows="4" name="description" id="inputDescription"><?php echo $row['description'];?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="inputStatus" class="col-lg-3 control-label">Status</label>
							<div class="col-lg-9">
							 	<select class="form-control" id="inputStatus" name="status" value="<?php echo $row['status'];?>">
						        	<option value="active" <?php if($row['status'] =='active') echo 'selected';?>>Active</option>
						        	<option value="completed" <?php if($row['status'] =='completed') echo 'selected';?>>Completed</option>
						        </select>
							</div>
						</div>

						<div class="form-group">
							<label for="inputCompletion" class="col-lg-3 control-label">Completion percentage</label>
							<div class="col-lg-9">
						 		<input type="number" name="completion_percentage" value="<?php echo $row['completion_percentage'];?>" class="form-control" id="inputCompletion">
							</div>
						</div>

						<div class="form-group">
							<label for="inputStartdate" class="col-lg-3 control-label">Start date</label>
							<div class="col-lg-9">
						 		<input type="date" name="start_timestamp" value="<?php echo date("Y-m-d" , $row['start_timestamp']);?>" class="form-control" id="inputStartdate">
						 
							</div>
						</div>

						<div class="form-group">
							<label for="inputEnddate" class="col-lg-3 control-label">End date</label>
							<div class="col-lg-9">
						 		<input type="date" name="end_timestamp" value="<?php echo date("Y-m-d" , $row['end_timestamp']);?>" class="form-control" id="inputEnddate">
							</div>
						</div>

						<div class="form-group">
					    	<div class="col-lg-9 col-lg-offset-3">
			      				<input type="hidden" name="nonce" value="<?php echo wp_create_nonce('vpm-project-manager');?>">
					    		<a class="btn btn-default" href="<?php echo admin_url();?>admin.php?page=vpm-project&module=manage_project&vpm_project_id=<?php echo $vpm_project_id;?>">Cancel</a>
					        	<button type="submit" class="btn btn-primary">Update project</button>
					    	</div>
					    </div>

				<?php
					}
				?>

			</form>
		</div>
	</div>
</div>

<script>
function validate() {

	var a = document.forms["edit_project"]["vpm_client_id"].value;
	if (a == "") {
		alert("Client name must be selected");
		return false;
	}
	
	var b = document.forms["create_project"]["title"].value;
	if (b == "") {
		alert("Title must be filled out");
		return false;
	}

	var c =document.forms["create_project"]["description"].value;
	if (c == "") {
		alert("Description must be filled out");
		return false;
	}
	
	var d =document.forms["create_project"]["status"].value;
	if (d == "") {
		alert("status must be selected");
		return false;
	}

	var e = document.forms["create_project"]["start_timestamp"].value;
	if (e == "") {
		alert("Start date must be filled out");
		return false;
	}

	var f = document.forms["create_project"]["end_timestamp"].value;
	if (f == "") {
		alert("End date must be filled out");
		return false;
	}
	
}
</script>