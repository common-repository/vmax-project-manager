<?php

$nonce 	=	sanitize_text_field($_POST['nonce']);
$task 	=	sanitize_text_field($_POST['task']);

$nonce_verify	=	wp_verify_nonce($nonce , 'vpm-project-manager');


// Only if nonce values submitted with post calls are verified, those db query functions will be executed
if ($nonce_verify == true) {

	if ($task		== 'create_project') {
		vpm_project_create();
		wp_redirect(admin_url(). 'admin.php?page=vpm-project&notify=project_create');
	}

	else if ($task	==	'delete_project') {
		vpm_project_delete();
		wp_redirect(admin_url(). 'admin.php?page=vpm-project&notify=project_delete');
	}

	else if($task	==	'edit_project') {
		vpm_project_edit();
		$vpm_project_id = sanitize_text_field($_POST['vpm_project_id']);
		wp_redirect(admin_url(). "admin.php?page=vpm-project&module=manage_project&vpm_project_id='$vpm_project_id'&notify=project_edit");
	}


	else if($task	==	'create_payment') {
		vpm_payment_create();
		$vpm_project_id = sanitize_text_field($_POST['vpm_project_id']);
		wp_redirect(admin_url(). "admin.php?page=vpm-project&module=manage_project&vpm_project_id='$vpm_project_id'&notify=payment_create");
	}

	else if($task	==	'edit_payment') {
		vpm_payment_edit();
		$vpm_project_id = sanitize_text_field($_POST['vpm_project_id']);
		wp_redirect(admin_url(). "admin.php?page=vpm-project&module=manage_project&vpm_project_id='$vpm_project_id'&notify=payment_edit");
	}

	else if ($task	==	'delete_payment') {
		vpm_payment_delete();
		$vpm_project_id	=	sanitize_text_field($_POST['vpm_project_id']);
		wp_redirect(admin_url(). "admin.php?page=vpm-project&module=manage_project&vpm_project_id='$vpm_project_id'&notify=payment_delete");
	}

	else if($task	==	'create_task') {
		vpm_task_create();
		
		$vpm_project_id = sanitize_text_field($_POST['vpm_project_id']);
		wp_redirect(admin_url(). "admin.php?page=vpm-project&module=manage_project&vpm_project_id='$vpm_project_id'&notify=task_create");
	}

	else if($task	==	'edit_task') {
		vpm_task_edit();
		$vpm_project_id	=	sanitize_text_field($_POST['vpm_project_id']);
		wp_redirect(admin_url(). "admin.php?page=vpm-project&module=manage_project&vpm_project_id='$vpm_project_id'&notify=task_edit");
	}

	else if ($task	==	'delete_task') {
		vpm_task_delete();
		$vpm_project_id	=	sanitize_text_field($_POST['vpm_project_id']);
		wp_redirect(admin_url(). "admin.php?page=vpm-project&module=manage_project&vpm_project_id='$vpm_project_id'&notify=task_delete");
	}

	else if($task	==	'create_file') {
		vpm_file_create();
		$vpm_project_id	=	sanitize_text_field($_POST['vpm_project_id']);
		wp_redirect(admin_url(). "admin.php?page=vpm-project&module=manage_project&vpm_project_id='$vpm_project_id'&notify=file_create");
	}

	else if($task	==	'edit_file') {
		vpm_file_edit();
		$vpm_project_id	=	sanitize_text_field($_POST['vpm_project_id']);
		wp_redirect(admin_url(). "admin.php?page=vpm-project&module=manage_project&vpm_project_id='$vpm_project_id'&notify=file_edit");
	}

	else if ($task	==	'delete_file') {
		vpm_file_delete();
		$vpm_project_id	=	sanitize_text_field($_POST['vpm_project_id']);
		wp_redirect(admin_url(). "admin.php?page=vpm-project&module=manage_project&vpm_project_id='$vpm_project_id'&notify=file_delete");
	}

	else if ($task	==	'create_client') {
		vpm_client_create();
		wp_redirect(admin_url(). 'admin.php?page=vpm-client&notify=client_create');
	}

	else if ($task	==	'edit_client') {
		vpm_client_edit();
		wp_redirect(admin_url(). 'admin.php?page=vpm-client&notify=client_edit');
	}

	else if ($task	==	'delete_client') {
		vpm_client_delete();
		wp_redirect(admin_url(). 'admin.php?page=vpm-client&notify=client_delete');
	}

	else if($task	==	'create_staff') {
		vpm_staff_create();
		wp_redirect(admin_url(). 'admin.php?page=vpm-staff&notify=staff_create');
	}

	else if ($task	==	'edit_staff') {
		vpm_staff_edit();
		wp_redirect(admin_url(). 'admin.php?page=vpm-staff&notify=staff_edit');
	}

	else if ($task	==	'delete_staff') {
		vpm_staff_delete();
		wp_redirect(admin_url(). 'admin.php?page=vpm-staff&notify=staff_delete');
	}
}



?>