<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php

	// Loads the selected module page from view on depending on the url GET variable.
	if(isset($_GET['module'])) {
		$body = sanitize_text_field($_GET['module']);
	}
	
	// Loads the body page for each specific menu/tasks inside the plugin.
	include $body.".php";

	// This is the div for create/edit/delete task notification showing.
	include 'notification.php';
?>