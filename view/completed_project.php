<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!-- Page title -->
<div class="col-lg-12" style="border-bottom: 1px solid #b4b6b7; margin-bottom:20px;">
	<h3><img src="<?php echo plugins_url( 'assets/icons/completed.png', dirname(__FILE__) );?>" style="height: 60px">Completed projects</h3>
</div>

<!-- Completed project table -->
<div class="col-lg-12">
	<?php
		global $wpdb;
		$project_table	=	$wpdb->prefix . 'vpm_project';
		$active_count	=	$wpdb->get_var("SELECT COUNT(*) FROM `$project_table` WHERE status = 'active'");
		$completed_count	=	$wpdb->get_var("SELECT COUNT(*) FROM `$project_table` WHERE status = 'completed'");
		
	?>
	<ul class="nav nav-tabs">
  		<li class="active"><a href="" data-toggle="tab" aria-expanded="true">Completed
  			<span class="badge"><?php echo $completed_count;?></span></a></li>
  		<li class=""><a href="<?php echo admin_url();?>admin.php?page=vpm-project" data-toggle="tab" aria-expanded="false">Active projects
  			<span class="badge"><?php echo $active_count;?></span></a></li>
  	</ul>
  	<div class="tab-content">
  		<div class="tab-pane fade active in">
			<table class="table table-striped table-hover">
				<tr>
					<th>Title</th>
					<th>Client</th>
					<th>Manage</th>
				</tr>
				<?php
					global $wpdb;
					$project_table	=	$wpdb->prefix .'vpm_project';
					$query_result	=	$wpdb->get_results("SELECT * FROM `$project_table` WHERE status = 'completed'", ARRAY_A);
					foreach($query_result as $row)
					{
				?>
						<tr>
							<td><?php echo $row['title'];?></td>
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
							<td>
								<a href="<?php echo admin_url();?>admin.php?page=vpm-project&module=manage_project&vpm_project_id=<?php echo $row['vpm_project_id'];?>" class="btn btn-info btn-xs">Manage</a>
								<a href="<?php echo admin_url();?>admin.php?page=vpm-project&module=delete_project&vpm_project_id=<?php echo $row['vpm_project_id'];?>" class="btn btn-danger btn-xs">Delete</a>
							</td>
						</tr>
				<?php
					}
				?>

			</table>
		</div>
  	</div>
</div>