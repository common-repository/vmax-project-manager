<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!-- Page title -->
<div class="col-lg-12" style="border-bottom: 1px solid #b4b6b7; margin-bottom:20px;">
	<h3><img src="<?php echo plugins_url( 'assets/icons/active.png', dirname(__FILE__) );?>" style="height: 60px">Active projects</h3>
</div>

<!-- Active project table -->
<div class="col-lg-12">
	<?php
		global $wpdb;
		$project_table	=	$wpdb->prefix . 'vpm_project';
		$active_count	=	$wpdb->get_var("SELECT COUNT(*) FROM `$project_table` WHERE status = 'active'");
		$completed_count	=	$wpdb->get_var("SELECT COUNT(*) FROM `$project_table` WHERE status = 'completed'");
		
	?>
	<ul class="nav nav-tabs">
  		<li class=""><a href="<?php echo admin_url();?>admin.php?page=vpm-project&module=completed_project" data-toggle="tab" aria-expanded="false">Completed
  			<span class="badge"><?php echo $completed_count;?></span></a></li>
  		<li class="active"><a href="" data-toggle="tab" aria-expanded="true" >Active projects 
  			<span class="badge"><?php echo $active_count;?></span></a></li>
  	</ul>
  	<div class="tab-content">
  		<div class="tab-pane fade active in">		
			<!-- PROJECT PANEL LISTING -->
			<div class="row">
				<?php
					global $wpdb;
					$project_table	=	$wpdb->prefix . 'vpm_project';
					$query_result	=	$wpdb->get_results("SELECT * FROM `$project_table` WHERE status = 'active'", ARRAY_A);
					foreach($query_result as $row)
					{
				?>
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
						  <h3 class="panel-title"><?php echo $row['title'];?></h3>
						</div>
						<div class="panel-body">
				  			<div class="col-md-9" style="padding: 0px;"> 
								<div style="margin: 10px;"><b>Client : </b>
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
								</div>
								<div style="margin: 10px;"><b>Deadline : </b><?php echo date("d M, Y ", $row['end_timestamp']);?>
								</div>
			  				</div>
				  			<div class="col-md-3" style=" text-align: right; padding: 0px;">
								<div style="font-size: 30px; color: #c1c8ce;"><?php echo $row['completion_percentage'];?>%
								</div>
								done
				  			</div>
					  		
							
						</div>
						<hr style="margin:0px;"/>
						<div class="panel-body" style="text-align: center;">
						  <a href="<?php echo admin_url();?>admin.php?page=vpm-project&module=manage_project&vpm_project_id=<?php echo $row['vpm_project_id'];?>" class="btn btn-info btn-xs">Manage</a>
						  <a href="<?php echo admin_url();?>admin.php?page=vpm-project&module=delete_project&vpm_project_id=<?php echo $row['vpm_project_id'];?>" class="btn btn-danger btn-xs">Delete</a>
						</div>
					</div>
				</div>
			<?php }?>
			</div>
			
		</div>
  	</div>
</div>

