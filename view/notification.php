<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php 
	if (sanitize_text_field($_GET['notify']) == 'project_create')
		$message = 'Project created';
	else if (sanitize_text_field($_GET['notify']) == 'project_edit')
		$message = 'Project updated';
	else if (sanitize_text_field($_GET['notify']) == 'project_delete')
		$message = 'Project deleted';
	else if (sanitize_text_field($_GET['notify']) == 'payment_create')
		$message = 'Payment created';
	else if (sanitize_text_field($_GET['notify']) == 'payment_edit')
		$message = 'Payment updated';
	else if(sanitize_text_field($_GET['notify']) == 'payment_delete')
		$message = 'Payment deleted';
	else if(sanitize_text_field($_GET['notify']) == 'task_create')
		$message = 'Task created';
	else if(sanitize_text_field($_GET['notify']) == 'task_edit')
		$message = 'Task updated';
	else if(sanitize_text_field($_GET['notify']) == 'task_delete')
		$message = 'Task deleted';
	else if(sanitize_text_field($_GET['notify']) == 'file_create')
		$message = 'File created';
	else if(sanitize_text_field($_GET['notify']) == 'file_edit')
		$message = 'File updated';
	else if(sanitize_text_field($_GET['notify']) == 'file_delete')
		$message = 'File deleted';
	else if(sanitize_text_field($_GET['notify']) == 'client_create')
		$message = 'Client created';
	else if(sanitize_text_field($_GET['notify']) == 'client_edit')
		$message = 'Client updated';
	else if(sanitize_text_field($_GET['notify']) == 'client_delete')
		$message = 'Client deleted';
	else if(sanitize_text_field($_GET['notify']) == 'staff_create')
		$message = 'Staff created';
	else if(sanitize_text_field($_GET['notify']) == 'staff_edit')
		$message = 'Staff updated';
	else if(sanitize_text_field($_GET['notify']) == 'staff_delete')
		$message = 'Staff deleted';

?>


<?php 
if ($message != "")
{
	?>
	<div class="col-lg-4 col-lg-offset-8" id="notification_box">
		<div class="alert alert-dismissible alert-success">
		  <button type="button" class="close" data-dismiss="alert" onClick="close_notification_box()">&times;</button>
		  
		  <?php echo $message;?>

		</div>
	</div>
<?php 
}
?>


<script>
	function close_notification_box()
	{
		document.getElementById("notification_box").style.display = 'none';
	}
</script>