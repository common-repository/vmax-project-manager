<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!-- Page title -->
<div class="col-lg-12" style="border-bottom: 1px solid #b4b6b7; margin-bottom:20px;">
	<h3><img src="<?php echo plugins_url( 'assets/icons/payment_list.png', dirname(__FILE__) );?>" style="height: 60px">Print Invoice</h3>
</div>

<?php
	$vpm_project_id = sanitize_text_field($_GET['vpm_project_id']);
	$vpm_payment_id = sanitize_text_field($_GET['vpm_payment_id']);
?>
<div class="col-lg-12 col-lg-offset-1">
	<div id="div_print">
		<div class="row">
			<div class="form-group">
				<div class="col-lg-6">

					<?php
						global $wpdb;
						$project_table	=	$wpdb->prefix . 'vpm_project';
						$query_result	=	$wpdb->get_results("SELECT * FROM `$project_table` WHERE vpm_project_id = '$vpm_project_id'", ARRAY_A);
						foreach($query_result as $row)
						{

							$client_id 		=	$row['vpm_client_id'];
							$client_table	=	$wpdb->prefix . 'vpm_client';
							$query_result1 	=	$wpdb->get_results("SELECT * FROM `$client_table` WHERE vpm_client_id = '$client_id'",ARRAY_A);
							foreach($query_result1 as $row1)
							{
								$name		=	$row1['name'];
								$address	=	$row1['address'];
								$phone		=	$row1['phone'];
							}
						}
					?>
						
					<h4>Bill to</h4>
					<h5>Client name:&nbsp;<?php echo $name;?><br><br>
						Client address:&nbsp;<?php echo $address;?><br><br>
						Phone:&nbsp;<?php echo $phone;?>
					</h5>
				</div>
			</div>

			<div class="form-group">
				<div class="col-lg-6"><br>
					<?php
						global $wpdb;
						$payment_table	=	$wpdb->prefix . 'vpm_payment';
						$query_result 	=	$wpdb->get_results("SELECT * FROM `$payment_table` WHERE vpm_payment_id = '$vpm_payment_id' ", ARRAY_A);
						foreach($query_result as $row2)
						{
							$date 	=	$row2['payment_timestamp'];
							$status =	$row2['status'];
							$title	=	$row2['title'];
							$amount =	$row2['amount'];
						}
					?>
					<h5>Invoice ID: &nbsp;<?php echo $vpm_payment_id;?><br><br>
						Date:&nbsp;<?php echo date("d M, Y" , $date);?><br><br>
						Status:&nbsp;<?php echo $status;?>
					</h5>
				</div>
			</div>

			<div class="form-group">
				<div class="col-lg-10">
					<table class="table table-striped table-hover" style="width:100%;border:1px solid #ccc;">
						<tr class="active">
							<th>Payment detail</th>
							<th>Amount</th>
						</tr>
						<tr>
							<td><?php echo $title;?></td>
							<td>$<?php echo $amount;?></td>
						</tr>
						<tr>
							<td style="text-align: right">Total</td>
							<td>$<?php echo $amount;?></td>
						</tr>
								 		
					</table>	
				</div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-9 col-lg-offset-3">
			<a class="btn btn-default" href="<?php echo admin_url();?>admin.php?page=vpm-project&module=manage_project&vpm_project_id=<?php echo $vpm_project_id;?>">Back</a>
			<button type="submit" class="btn btn-primary" onClick="printdiv('div_print');">Print</button>
		</div>
	</div>


</div>

<script>
function printdiv(div_print)
{
    var mywindow = window.open('', 'PRINT', 'height=600,width=600');

    mywindow.document.write('<html><head><title></title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write(document.getElementById(div_print).innerHTML);
    mywindow.document.write('</body></html>');

   // mywindow.document.close(); // necessary for IE >= 10
    //mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}

</script>