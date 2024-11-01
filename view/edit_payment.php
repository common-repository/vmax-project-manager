<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!-- Page title -->
<div class="col-lg-12" style="border-bottom: 1px solid #b4b6b7; margin-bottom:20px;">
	<h3><img src="<?php echo plugins_url( 'assets/icons/edit.png', dirname(__FILE__) );?>" style="height: 60px">Update payment</h3>
</div>
<!-- Edit payment form -->
<?php
	$vpm_payment_id	=	sanitize_text_field($_GET['vpm_payment_id']);
	$vpm_project_id	=	sanitize_text_field($_GET['vpm_project_id']);
?>
<div class="col-lg-8 col-lg-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Edit payment</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" method="post" action="<?php echo admin_url();?>admin-post.php">

				<input type="hidden" name="action" value="vpm">
				<input type="hidden" name="task" value="edit_payment">
				<input type="hidden" name="vpm_payment_id" value="<?php echo $vpm_payment_id;?>">
				<input type="hidden" name="vpm_project_id" value="<?php echo $vpm_project_id;?>">

				<?php
					global $wpdb;
					$payment_table	=	$wpdb->prefix . 'vpm_payment';
					$query_result	=	$wpdb->get_results("SELECT * FROM `$payment_table` WHERE vpm_payment_id = '$vpm_payment_id'", ARRAY_A);
					foreach($query_result as $row)
					{
				?>

						<div class="form-group">
							<label for="input_client_name" class="col-lg-3 control-label">Client</label>
					    	<div class="col-lg-9">
						    	<?php
									global $wpdb;
									$project_table	=	$wpdb->prefix . 'vpm_project';
									$query_result 	= 	$wpdb->get_results("SELECT * FROM `$project_table` WHERE vpm_project_id = '$vpm_project_id' ", ARRAY_A);
									foreach($query_result as $row2)
									{
										$vpm_client_id	=	$row2['vpm_client_id'];

										global $wpdb;
										$client_table	=	$wpdb->prefix . 'vpm_client';
										$query_result 	=	$wpdb->get_results("SELECT * FROM `$client_table` WHERE vpm_client_id = '$vpm_client_id'", ARRAY_A);
										foreach($query_result as $row3)
										{
					                        $client_name = $row3['name'];
										}
									}
								?>
					        	<input type="text" class="form-control"  disabled="disabled" value="<?php echo $client_name;?>">
					        	<input type="hidden" name="vpm_client_id" value="<?php echo $vpm_client_id;?>">
					     	</div>
					    </div>

					    <div class="form-group">
							<label for="inputTitle" class="col-lg-3 control-label">Title</label>
							<div class="col-lg-9">
								<input type="text" name="title" value="<?php echo $row['title'];?>" class="form-control" id="inputTiitle">
							</div>
						</div>

						<div class="form-group">
							<label for="input_create_timestamp" class="col-lg-3 control-label">Create timestamp</label>
							<div class="col-lg-9">
						 		<input type="date" name="create_timestamp" value="<?php echo date("Y-m-d" , $row['create_timestamp']);?>" class="form-control" id="input_create_timestamp">
							</div>
						</div>

						<div class="form-group">
							<label for="input_payment_timestamp" class="col-lg-3 control-label">Payment timestamp</label>
							<div class="col-lg-9">
								<input type="date" name="payment_timestamp" value="<?php echo date("Y-m-d" , $row['payment_timestamp']);?>" class="form-control" id="input_payment_timestamp">
							</div>
						</div>

						<div class="form-group">
							<label for="inputAmount" class="col-lg-3 control-label">Amount</label>
							<div class="col-lg-9">
								<input type="text" name="amount" value="<?php echo $row['amount'];?>" class="form-control" id="inputAmount">
							</div>
						</div>

						<div class="form-group">
							<label for="inputMethod" class="col-lg-3 control-label">Method</label>
							<div class="col-lg-9">
								<input type="text" name="method" value="<?php echo $row['method'];?>" class="form-control" id="inputMethod">
							</div>
						</div>

						<div class="form-group">
							<label for="inputStatus" class="col-lg-3 control-label">Status</label>
							<div class="col-lg-9">
								<select class="form-control" id="inputStatus" name="status" value="<?php echo $row['status'];?>">
					        		<option value="paid" <?php if($row['status'] == 'paid') echo 'selected';?>>Paid</option>
					    			<option value="unpaid" <?php if($row['status'] == 'unpaid') echo 'selected';?>>Unpaid</option>
					        	</select>
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