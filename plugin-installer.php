<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php 
    
    // Create file upload directories.
    $upload_dir = wp_upload_dir();
    $path[0]    = $upload_dir['basedir'] . '/vpm/';
    $path[1]    = $upload_dir['basedir'] . '/vpm/project_file/';
    

    // Giving the directory write permission.
    foreach ($path as $dir) {
        if ( !is_dir($dir) ) {
            wp_mkdir_p($dir, 0777);
        }
    }
	

	// Defining the database table names.
    global $wpdb;
	$vpm_client      	= $wpdb->prefix . 'vpm_client';
	$vpm_file      		= $wpdb->prefix . 'vpm_file';
	$vpm_invoice      	= $wpdb->prefix . 'vpm_invoice';
	$vpm_payment      	= $wpdb->prefix . 'vpm_payment';
	$vpm_project      	= $wpdb->prefix . 'vpm_project';
	$vpm_staff      	= $wpdb->prefix . 'vpm_staff';
	$vpm_task      		= $wpdb->prefix . 'vpm_task';


	// sql queries for database table creation during plugin activation.
    $sql1   =   "CREATE TABLE IF NOT EXISTS $vpm_client (
					`vpm_client_id` int(11) NOT NULL AUTO_INCREMENT,
					`name` varchar(50) NOT NULL,
					`email` varchar(30) NOT NULL,
					`phone` varchar(20) NOT NULL,
					`address` varchar(50) NOT NULL,
                    PRIMARY KEY (`vpm_client_id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";

    $sql2   =   "CREATE TABLE IF NOT EXISTS $vpm_file (
					`vpm_file_id` int(11) NOT NULL AUTO_INCREMENT,
					`vpm_project_id` int(11) NOT NULL,
					`file_name` longtext NOT NULL,
					`note` longtext NOT NULL,
                    PRIMARY KEY (`vpm_file_id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";

    $sql3   =   "CREATE TABLE IF NOT EXISTS $vpm_invoice (
					`vpm_invoice_id` int(11) NOT NULL AUTO_INCREMENT,
					`vpm_project_id` int(11) NOT NULL,
					`client_wp_id` int(11) NOT NULL,
					`title` int(11) NOT NULL,
					`amount` int(11) NOT NULL,
					`status` varchar(20) NOT NULL,
					`create_timestamp` longtext NOT NULL,
					`due_timestamp` longtext NOT NULL,
                    PRIMARY KEY (`vpm_invoice_id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";

    $sql4   =   "CREATE TABLE IF NOT EXISTS $vpm_payment (
					`vpm_payment_id` int(11) NOT NULL AUTO_INCREMENT,
					`vpm_project_id` int(11) NOT NULL,
					`vpm_client_id` int(11) NOT NULL,
					`title` longtext NOT NULL,
					`create_timestamp` int(11) NOT NULL,
					`payment_timestamp` int(11) NOT NULL,
					`amount` int(11) NOT NULL,
					`method` longtext NOT NULL,
					`note` longtext NOT NULL,
					`status` varchar(15) NOT NULL,
                    PRIMARY KEY (`vpm_payment_id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";

    $sql5   =   "CREATE TABLE IF NOT EXISTS $vpm_project (
					`vpm_project_id` int(11) NOT NULL AUTO_INCREMENT,
					`vpm_client_id` int(11) NOT NULL,
					`title` longtext NOT NULL,
					`description` longtext NOT NULL,
					`start_timestamp` longtext NOT NULL,
					`end_timestamp` longtext NOT NULL,
					`status` varchar(20) NOT NULL,
					`completion_percentage` int(11) NOT NULL DEFAULT '0',
                    PRIMARY KEY (`vpm_project_id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";

    $sql6   =   "CREATE TABLE IF NOT EXISTS $vpm_staff (
					`vpm_staff_id` int(11) NOT NULL AUTO_INCREMENT,
					`name` varchar(30) NOT NULL,
					`email` varchar(30) NOT NULL,
					`phone` varchar(20) NOT NULL,
					`address` varchar(30) NOT NULL,
                    PRIMARY KEY (`vpm_staff_id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";

    $sql7   =   "CREATE TABLE IF NOT EXISTS $vpm_task (
					`vpm_task_id` int(11) NOT NULL AUTO_INCREMENT,
					`vpm_project_id` int(11) NOT NULL,
					`vpm_staff_id` int(11) NOT NULL,
					`title` longtext NOT NULL,
					`description` longtext NOT NULL,
					`date` longtext NOT NULL,
                    PRIMARY KEY (`vpm_task_id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";


	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    // running the database table creation queries.
    dbDelta($sql1);
    dbDelta($sql2);
    dbDelta($sql3);
    dbDelta($sql4);
    dbDelta($sql5);
    dbDelta($sql6);
    dbDelta($sql7);


?>