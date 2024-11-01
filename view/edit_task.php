<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!-- Page title -->
<div class="col-lg-12" style="border-bottom: 1px solid #b4b6b7; margin-bottom:20px;">
	<h3><img src="<?php echo plugins_url( 'assets/icons/edit.png', dirname(__FILE__) );?>" style="height: 60px">Update task</h3>
</div>
<!-- Edit task form -->
<?php
	$vpm_task_id	=	sanitize_text_field($_GET['vpm_task_id']);
	$vpm_project_id	=	sanitize_text_field($_GET['vpm_project_id']);
?>
<div class="col-lg-8 col-lg-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Edit task</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" method="post" action="<?php echo admin_url();?>admin-post.php">

				<input type="hidden" name="action" value="vpm">
				<input type="hidden" name="task" value="edit_task">
				<input type="hidden" name="vpm_task_id" value="<?php echo $vpm_task_id;?>">
				<input type="hidden" name="vpm_project_id" value="<?php echo $vpm_project_id;?>">

				<?php
					global $wpdb;
					$task_table		=	$wpdb->prefix . 'vpm_task';
					$query_result	=	$wpdb->get_results("SELECT * FROM `$task_table` WHERE vpm_task_id = '$vpm_task_id' ", ARRAY_A);
					foreach ($query_result as $row)
					{
				?>

					    <div class="form-group">
							<label for="input_staff_name" class="col-lg-3 control-label">Staff name</label>
					    	<div class="col-lg-9">
					        	<select class="form-control" id="input_staff_name" name="vpm_staff_id" value="<?php echo $row['vpm_staff_id'];?>">
			              			<?php
					        			global $wpdb;
					        			$staff_table	=	$wpdb->prefix . 'vpm_staff';
										$query_result = $wpdb->get_results("SELECT * FROM `$staff_table` ", ARRAY_A);
										foreach($query_result as $row2)
										{
									?>
					                        <option value="<?php echo $row2['vpm_staff_id'];?>"
				                            <?php if($row['vpm_staff_id'] == $row2['vpm_staff_id']) echo 'selected';
											?>
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
							<label for="inputTitle" class="col-lg-3 control-label">Title</label>
							<div class="col-lg-9">
								<input type="text" name="title" value="<?php echo $row['title'];?>" class="form-control" id="inputTiitle">
							</div>
						</div>

						<div class="form-group">
							<label for="inputDescription" class="col-lg-3 control-label">Description</label>
							<div class="col-lg-9">
								<textarea class="form-control" rows="3" name="description" id="inputDescription"><?php echo $row['description'];?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="inputDate" class="col-lg-3 control-label">Date</label>
							<div class="col-lg-9">
								<input type="date" name="date" value="<?php echo date("Y-m-d" , $row['date']);?>" class="form-control" id="inputDate">
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