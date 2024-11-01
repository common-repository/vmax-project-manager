<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!-- Page title -->
<div class="col-lg-12" style="border-bottom: 1px solid #b4b6b7; margin-bottom:20px;">
	<h3><img src="<?php echo plugins_url( 'assets/icons/payment_list.png', dirname(__FILE__) );?>" style="height: 60px">Payment Report</h3>
</div>
<!-- payment table -->
<div class="row" style="margin-bottom:14px">
	<div class="col-lg-12 col-lg-offset-1">
		<div class="form-group">
			<label for="inputYear" class="col-lg-1 control-label">Year</label>
			<div class="col-lg-3">
				<?php 
				if (isset($_GET['year']) && $_GET['year'] != "")
					$year = sanitize_text_field($_GET['year']);
				else 
					$year = date("Y");
				?>
				<select class="form-control" id="inputYear" name="year">
					<option value="2017" <?php if($year == '2017')echo 'selected';?>>2017</option>
					<option value="2016" <?php if($year == '2016')echo 'selected';?>>2016</option>
					<option value="2015" <?php if($year == '2015')echo 'selected';?>>2015</option>
				</select>
			</div>
		
			<label for="inputMonth" class="col-lg-1 control-label">Month</label>
			<div class="col-lg-3">
				<?php 
				if (isset($_GET['month']) && $_GET['month'] != "")
					$month = sanitize_text_field($_GET['month']);
				else 
					$month = date("F");
				?>
				<select class="form-control" id="inputMonth" name="Month" onChange="change_month(this.value)">
					<option value="January" 	<?php if($month == 'January')echo 'selected';?>>January</option>
					<option value="February" 	<?php if($month == 'February')echo 'selected';?>>February</option>
					<option value="April" 		<?php if($month == 'March')echo 'selected';?>>March</option>
					<option value="May" 		<?php if($month == 'May')echo 'selected';?>>May</option>
					<option value="June" 		<?php if($month == 'June')echo 'selected';?>>June</option>
					<option value="July" 		<?php if($month == 'July')echo 'selected';?>>July</option>
					<option value="August" 		<?php if($month == 'August')echo 'selected';?>>August</option>
					<option value="September" 	<?php if($month == 'September')echo 'selected';?>>September</option>
					<option value="October" 	<?php if($month == 'October')echo 'selected';?>>October</option>
					<option value="November" 	<?php if($month == 'November')echo 'selected';?>>November</option>
					<option value="December" 	<?php if($month == 'December')echo 'selected';?>>December</option>
				</select>
			</div>
		
			<div class="col-lg-4">
				<button type="submit" class="btn btn-primary btn-xs" onClick="submit()">Filter</button>
			</div>
			
			<script>
				function submit()
				{
					year  = document.getElementById("inputYear").value;
					month = document.getElementById("inputMonth").value;
					window.location = "<?php echo admin_url();?>admin.php?page=vpm-payment&year=" + year + "&month=" + month;
				}
			</script>
		</div>
	</div>
</div>
<div class="col-lg-8 col-lg-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Payment</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover">
				<tr>
					<th>Title</th>
					<th>Date</th>
					<th>Amount</th>
					<th>Status</th>
				</tr>
				
				<tr>
					<td colspan="4" style="text-align: center;">
						<div class="col-lg-12" id="notification_box">
							<div class="alert alert-dismissible alert-success">
							  Get the full version and unlock the report functionalities.
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="4" style="text-align: center;">						
						<a href="https://codecanyon.net/item/vmax-project-manager-wordpress-plugin/20422318" class="btn btn-info" target="_blank">
							Download premium version</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>

