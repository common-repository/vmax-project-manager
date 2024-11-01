<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!-- Page title -->
<div class="col-lg-12" style="border-bottom: 1px solid #b4b6b7; margin-bottom:20px;">
	<h3><img src="<?php echo plugins_url( 'assets/icons/staff.png', dirname(__FILE__) );?>" style="height: 60px">Staff list</h3>
</div>
<!-- Staff table -->
<div class="col-lg-8 col-lg-offset-2">
	<div class="form-group">
		<a class="btn btn-success btn-xs" href="<?php echo admin_url();?>admin.php?page=vpm-staff&module=create_staff"><h4>Add a new staff</h4></a>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Staff</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover">
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				
				<?php
					global $wpdb;
					$staff_table	=	$wpdb->prefix. 'vpm_staff';
					$query_result = $wpdb->get_results("SELECT * FROM `$staff_table`", ARRAY_A);
					foreach($query_result as $row)
					{
				?>
						<tr>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['phone'];?></td>
							<td><?php echo $row['address'];?></td>
							<td><a href="<?php echo admin_url();?>admin.php?page=vpm-staff&module=edit_staff&vpm_staff_id=<?php echo $row['vpm_staff_id'];?>" class="btn btn-info btn-xs">Edit</a></td>
							<td><a href="<?php echo admin_url();?>admin.php?page=vpm-staff&module=delete_staff&vpm_staff_id=<?php echo $row['vpm_staff_id'];?>" class="btn btn-danger btn-xs">Delete</a></td>
						</tr>
				<?php
					}
				?>
			</table>
		</div>
	</div>
</div>
