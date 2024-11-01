<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!-- Page title -->
<div class="col-lg-12" style="border-bottom: 1px solid #b4b6b7; margin-bottom:20px;">
	<h3><img src="<?php echo plugins_url( 'assets/icons/manage_project.png', dirname(__FILE__) );?>" style="height: 60px">Manage project</h3>
</div>
<!-- manage project -->
<?php
	$vpm_project_id = sanitize_text_field($_GET['vpm_project_id']);
?>
<div class="col-lg-12">
	<a href="<?php echo admin_url();?>admin.php?page=vpm-project" 
		style="margin-bottom: 12px" class="btn btn-primary btn-xs">Back to project list</a>
	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Project detail</h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<div class="col-lg-12">
						<?php
							global $wpdb;
							$project_table	=	$wpdb->prefix . 'vpm_project';
							$query_result	=	$wpdb->get_results("SELECT * FROM `$project_table` WHERE vpm_project_id = '$vpm_project_id'", ARRAY_A);
							foreach($query_result as $row)
							{
						?>
								<table class="table table-striped table-hover">
									<tr>
						 				<th>Title</th>
						 				<td><?php echo $row['title'];?></td>
						 			</tr>
						 			<tr>
										<th>Description</th>
										<td><?php echo $row['description'];?></td>
									</tr>
									<tr>
										<th>Start date</th>
										<td><?php echo date("d M, Y" , $row['start_timestamp']);?></td>
									</tr>
									<tr>
										<th>End date</th>
										<td><?php echo date("d M, Y" , $row['end_timestamp']);?></td>
									</tr>
									<tr>
										<th>Client</th>
										<td>
											<?php
												global $wpdb;
												$client_table	=	$wpdb->prefix .'vpm_client';
												$client_id 		=	$row['vpm_client_id'];
												$query_result	=	$wpdb->get_results("SELECT * FROM `$client_table` WHERE vpm_client_id = '$client_id'", ARRAY_A);
												foreach($query_result as $row2)
												{
											?>
													<?php echo $row2['name'];?>

											<?php
												}
											?>
										</td>
									</tr>
									<tr>
										<th>Completed</th>
										<td><?php echo $row['completion_percentage'];?>%</td>
									</tr>
								</table>
							<div class="form-group">
								<div class="col-lg-6 col-lg col-lg-offset-10">
									<a href="<?php echo admin_url();?>admin.php?page=vpm-project&module=edit_project&vpm_project_id=<?php echo $row['vpm_project_id'];?>" class="btn btn-success btn-xs">Edit</a>
								</div>
							</div>

						<?php 
							}
						?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Payment</h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<div class="col-lg-offset-10">
							<a href="<?php echo admin_url();?>admin.php?page=vpm-project&module=create_payment&vpm_project_id=<?php echo $row['vpm_project_id'];?>" class="btn btn-primary btn-xs">Create</a>
						</div>
					</div>	
								
					<div class="form-group">
						<div class="col-lg-12">
							<table class="table table-striped table-hover">
								<tr>
									<th>Title</th>
									<th>Date</th>
									<th>Amount</th>
									<th>Status</th>
									<th>Option</th>
								</tr>

								<?php
									global $wpdb;
									$vpm_project_id	=	sanitize_text_field($_GET['vpm_project_id']);
									$payment_table	=	$wpdb->prefix . 'vpm_payment';
									$query_result 	=	$wpdb->get_results("SELECT * FROM `$payment_table` WHERE vpm_project_id = '$vpm_project_id' ", ARRAY_A);
									foreach($query_result as $row3)
									{
								?>
										<tr>
											<td><?php echo $row3['title'];?></td>
											<td><?php echo date("d M, Y" , $row3['create_timestamp']);?></td>
											<td><?php echo $row3['amount'];?></td>
											<td><?php echo $row3['status'];?></td>	
											<td>
												<a href="<?php echo admin_url();?>admin.php?page=vpm-project&module=print_payment&vpm_payment_id=<?php echo $row3['vpm_payment_id'];?>&vpm_project_id=<?php echo $vpm_project_id; ?>" class="btn btn-warning btn-xs">Print</a>
												<a href="<?php echo admin_url();?>admin.php?page=vpm-project&module=edit_payment&vpm_payment_id=<?php echo $row3['vpm_payment_id'];?>&vpm_project_id=<?php echo $vpm_project_id; ?>" class="btn btn-info btn-xs">Edit</a>
												<a href="<?php echo admin_url();?>admin.php?page=vpm-project&module=delete_payment&vpm_payment_id=<?php echo $row3['vpm_payment_id'];?>&vpm_project_id=<?php echo $vpm_project_id; ?>" class="btn btn-danger btn-xs">Delete</a>
											</td>

										</tr>

								<?php
									}
								?>
							</table>

						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Tasks</h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<div class="col-lg-offset-10">
							<a href="<?php echo admin_url();?>admin.php?page=vpm-project&module=create_task&vpm_project_id=<?php echo $row['vpm_project_id'];?>" class="btn btn-primary btn-xs">Create</a>
						</div>
					</div>	
								
					<div class="form-group">
						<div class="col-lg-12">
							<table class="table table-striped table-hover">
								<tr>
									<th>Title</th>
									<th>Description</th>
									<th>Date</th>
									<th>Staff name</th>
									<th>Option</th>
								</tr>

								<?php
									global $wpdb;
									$vpm_project_id	=	sanitize_text_field($_GET['vpm_project_id']);
									$task_table		=	$wpdb->prefix . 'vpm_task';
									$query_result 	= $wpdb->get_results("SELECT * FROM `$task_table` WHERE vpm_project_id = '$vpm_project_id' ", ARRAY_A);
									foreach($query_result as $row4)
									{
								?>
										<tr>
											<td><?php echo $row4['title'];?></td>
											<td><?php echo $row4['description'];?></td>
											<td><?php echo date("d M, Y" , $row4['date']);?></td>
											<td>
												<?php
													global $wpdb;
													$staff_table	=	$wpdb->prefix .'vpm_staff';
													$vpm_staff_id 	=	$row4['vpm_staff_id'];
													$query_result	=	$wpdb->get_results("SELECT * FROM `$staff_table` WHERE vpm_staff_id = '$vpm_staff_id'", ARRAY_A);
													foreach($query_result as $row5)
													{
												?>
											  			<?php echo $row5['name'];?>
												<?php
													}
												?>
											</td>
											<td>
												<a href="<?php echo admin_url();?>admin.php?page=vpm-project&module=edit_task&vpm_task_id=<?php echo $row4['vpm_task_id'];?>&vpm_project_id=<?php echo $vpm_project_id; ?>" class="btn btn-info btn-xs">Edit</a>
												<a href="<?php echo admin_url();?>admin.php?page=vpm-project&module=delete_task&vpm_task_id=<?php echo $row4['vpm_task_id'];?>&vpm_project_id=<?php echo $vpm_project_id;?>" class="btn btn-danger btn-xs">Delete</a>
											</td>

										</tr>

								<?php
									}
								?>
							</table>

						</div>	
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Files</h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<div class="col-lg-offset-10">
							<a href="<?php echo admin_url();?>admin.php?page=vpm-project&module=create_file&vpm_project_id=<?php echo $row['vpm_project_id'];?>" class="btn btn-primary btn-xs">Create</a>
						</div>
					</div>	
								
					<div class="form-group">
						<div class="col-lg-12">
							<table class="table table-striped table-hover">
								<tr>
									<th>File name</th>
									<th>Note</th>
									<th>Option</th>
								</tr>

								<?php
									global $wpdb;
									$upload_dir = wp_upload_dir();
									$file_table	=	$wpdb->prefix . 'vpm_file';
									$query_result = $wpdb->get_results("SELECT * FROM `$file_table` WHERE vpm_project_id = '$vpm_project_id' ", ARRAY_A);
									foreach($query_result as $row6)
									{
								?>
										<tr>
											<td><?php echo $row6['file_name'];?></td>
											<td><?php echo $row6['note'];?></td>
											<td>
												<a href="<?php echo $upload_dir['baseurl'] . '/vpm/project_file/' . $row6['file_name']; ?>" 
													class="btn btn-info btn-xs" target="_blank">Download</a>
												
												<a href="<?php echo admin_url();?>admin.php?page=vpm-project&module=edit_file&vpm_file_id=<?php echo $row6['vpm_file_id'];?>&vpm_project_id=<?php echo $vpm_project_id;?>" class="btn btn-info btn-xs">Edit</a>
												
												<a href="<?php echo admin_url();?>admin.php?page=vpm-project&module=delete_file&vpm_file_id=<?php echo $row6['vpm_file_id'];?>&vpm_project_id=<?php echo $vpm_project_id;?>" class="btn btn-danger btn-xs">Delete</a>
											</td>

										</tr>

								<?php
									}
								?>
							</table>

						</div>	
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>