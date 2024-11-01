<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
/**
 * All database query functions are performed in this file.
 */


// Adding a new project
function vpm_project_create() {
	
	$data['vpm_client_id']			=	sanitize_text_field($_POST['vpm_client_id']);
 	$data['title']					=	sanitize_text_field($_POST['title']);
 	$data['description']			=	sanitize_text_field($_POST['description']);
 	$data['start_timestamp']		=	strtotime(sanitize_text_field($_POST['start_timestamp']));
 	$data['end_timestamp']			=	strtotime(sanitize_text_field($_POST['end_timestamp']));
 	$data['status']					=	sanitize_text_field($_POST['status']);
 	$data['completion_percentage']	=	sanitize_text_field($_POST['completion_percentage']);

 	global $wpdb;
 	$wpdb->insert($wpdb->prefix . 'vpm_project', $data);
 }

// Deleting a project
function vpm_project_delete() {

	$vpm_project_id = sanitize_text_field($_POST['vpm_project_id']);

	global $wpdb;
	$wpdb->delete($wpdb->prefix . 'vpm_project', array('vpm_project_id' => $vpm_project_id));
}

// Updating a project
function vpm_project_edit() {
	$data['vpm_client_id']			=	sanitize_text_field($_POST['vpm_client_id']);
 	$data['title']					=	sanitize_text_field($_POST['title']);
 	$data['description']			=	sanitize_text_field($_POST['description']);
 	$data['start_timestamp']		=	strtotime(sanitize_text_field($_POST['start_timestamp']));
 	$data['end_timestamp']			=	strtotime(sanitize_text_field($_POST['end_timestamp']));
 	$data['status']					=	sanitize_text_field($_POST['status']);
 	$data['completion_percentage']	=	sanitize_text_field($_POST['completion_percentage']);

 	$vpm_project_id	=	sanitize_text_field($_POST['vpm_project_id']);

 	global $wpdb;
 	$wpdb->update($wpdb->prefix . 'vpm_project', $data, array('vpm_project_id' => $vpm_project_id));	
}

// Adding a payment
function vpm_payment_create() {
	$data['vpm_project_id']		=	sanitize_text_field($_POST['vpm_project_id']);
	$data['vpm_client_id']		=	sanitize_text_field($_POST['vpm_client_id']);
	$data['title']				=	sanitize_text_field($_POST['title']);
	$data['create_timestamp']	=	strtotime(sanitize_text_field($_POST['create_timestamp']));
	$data['payment_timestamp']	=	strtotime(sanitize_text_field($_POST['payment_timestamp']));
	$data['amount']				=	sanitize_text_field($_POST['amount']);
	$data['method']				=	sanitize_text_field($_POST['method']);
	$data['note']				=	sanitize_text_field($_POST['note']);
	$data['status']				=	sanitize_text_field($_POST['status']);

	global $wpdb;
	$wpdb->insert($wpdb->prefix . 'vpm_payment', $data);	 	
} 

// Updating a payment
function vpm_payment_edit() {
	$data['vpm_client_id']		=	sanitize_text_field($_POST['vpm_client_id']);
	$data['title']				=	sanitize_text_field($_POST['title']);
	$data['create_timestamp']	=	strtotime(sanitize_text_field($_POST['create_timestamp']));
	$data['payment_timestamp']	=	strtotime(sanitize_text_field($_POST['payment_timestamp']));
	$data['amount']				=	sanitize_text_field($_POST['amount']);
	$data['method']				=	sanitize_text_field($_POST['method']);
	$data['note']				=	sanitize_text_field($_POST['note']);
	$data['status']				=	sanitize_text_field($_POST['status']);
	
	$vpm_payment_id	=	sanitize_text_field($_POST['vpm_payment_id']);

	global $wpdb;
	$wpdb->update($wpdb->prefix . 'vpm_payment', $data, array('vpm_payment_id' => $vpm_payment_id));	 	
} 

// Delete a payment
function vpm_payment_delete() {

	$vpm_payment_id = sanitize_text_field($_POST['vpm_payment_id']);

	global $wpdb;
	$wpdb->delete($wpdb->prefix . 'vpm_payment', array('vpm_payment_id' => $vpm_payment_id));
}

// Adding a task
function vpm_task_create() {
	$data['vpm_project_id']	=	sanitize_text_field($_POST['vpm_project_id']);
	$data['vpm_staff_id']	=	sanitize_text_field($_POST['vpm_staff_id']);
	$data['title']			=	sanitize_text_field($_POST['title']);
 	$data['description']	=	sanitize_text_field($_POST['description']);
	$data['date']			=	strtotime(sanitize_text_field($_POST['date']));

	global $wpdb;
	$wpdb->insert($wpdb->prefix . 'vpm_task', $data);	 	
} 

// Updating a task
function vpm_task_edit() {
	$data['vpm_staff_id']	=	sanitize_text_field($_POST['vpm_staff_id']);
	$data['title']			=	sanitize_text_field($_POST['title']);
 	$data['description']	=	sanitize_text_field($_POST['description']);
	$data['date']			=	strtotime(sanitize_text_field($_POST['date']));

	$vpm_task_id	=	sanitize_text_field($_POST['vpm_task_id']);

	global $wpdb;
	$wpdb->update($wpdb->prefix . 'vpm_task', $data, array('vpm_task_id' => $vpm_task_id));	 	
} 

// Delete a task
function vpm_task_delete() {

	$vpm_task_id = sanitize_text_field($_POST['vpm_task_id']);

	global $wpdb;
	$wpdb->delete($wpdb->prefix . 'vpm_task', array('vpm_task_id' => $vpm_task_id));
}


// Adding a file
function vpm_file_create() {
	$data['vpm_project_id']	=	sanitize_text_field($_POST['vpm_project_id']);
	$data['file_name']		=	$_FILES['file_name']['name'];
	$data['note']			=	sanitize_text_field($_POST['note']);
	$upload_dir = wp_upload_dir();
    move_uploaded_file($_FILES['file_name']['tmp_name'], $upload_dir['basedir'] . '/vpm/project_file/' . $_FILES["file_name"]["name"]);

	global $wpdb;
	$wpdb->insert($wpdb->prefix . 'vpm_file', $data);	 	
} 

// Updating a file
function vpm_file_edit() {
	$data['file_name']		=	sanitize_text_field($_POST['file_name']);
	$data['note']			=	sanitize_text_field($_POST['note']);

	$vpm_file_id	=	sanitize_text_field($_POST['vpm_file_id']);

	global $wpdb;
	$wpdb->update($wpdb->prefix . 'vpm_file', $data, array('vpm_file_id' => $vpm_file_id));	 	
} 

// Delete a file
function vpm_file_delete() {

	$vpm_file_id = sanitize_text_field($_POST['vpm_file_id']);

	global $wpdb;
	$wpdb->delete($wpdb->prefix . 'vpm_file', array('vpm_file_id' => $vpm_file_id));
}

// Adding a new client
 function vpm_client_create() {
 	$data['name']		=	sanitize_text_field($_POST['name']);
 	$data['email']		=	sanitize_text_field($_POST['email']);
 	$data['phone']		=	sanitize_text_field($_POST['phone']);
 	$data['address']	=	sanitize_text_field($_POST['address']);

 	global $wpdb;
 	$wpdb->insert($wpdb->prefix . 'vpm_client', $data);
}

// Updating a client
function vpm_client_edit() {
 	$data['name']		=	sanitize_text_field($_POST['name']);
 	$data['email']		=	sanitize_text_field($_POST['email']);
 	$data['phone']		=	sanitize_text_field($_POST['phone']);
 	$data['address']	=	sanitize_text_field($_POST['address']);

 	$vpm_client_id	= sanitize_text_field($_POST['vpm_client_id']);

	global $wpdb;
	$wpdb->update($wpdb->prefix . 'vpm_client', $data, array('vpm_client_id' => $vpm_client_id));
}

// Delete a client
function vpm_client_delete() {

	$vpm_client_id = sanitize_text_field($_POST['vpm_client_id']);

	global $wpdb;
	$wpdb->delete($wpdb->prefix . 'vpm_client', array('vpm_client_id' => $vpm_client_id));
}

// Adding a new staff
function vpm_staff_create() {
 	$data['name']		=	sanitize_text_field($_POST['name']);
 	$data['email']		=	sanitize_text_field($_POST['email']);
 	$data['phone']		=	sanitize_text_field($_POST['phone']);
 	$data['address']	=	sanitize_text_field($_POST['address']);

 	global $wpdb;
 	$wpdb->insert($wpdb->prefix . 'vpm_staff', $data);
}

// Updating a staff
function vpm_staff_edit() {
 	$data['name']		=	sanitize_text_field($_POST['name']);
 	$data['email']		=	sanitize_text_field($_POST['email']);
 	$data['phone']		=	sanitize_text_field($_POST['phone']);
 	$data['address']	=	sanitize_text_field($_POST['address']);

 	$vpm_staff_id	= sanitize_text_field($_POST['vpm_staff_id']);

	global $wpdb;
	$wpdb->update($wpdb->prefix . 'vpm_staff', $data, array('vpm_staff_id' => $vpm_staff_id));
}

// Delete a staff
function vpm_staff_delete() {

	$vpm_staff_id = sanitize_text_field($_POST['vpm_staff_id']);

	global $wpdb;
	$wpdb->delete($wpdb->prefix . 'vpm_staff', array('vpm_staff_id' => $vpm_staff_id));
}

?>