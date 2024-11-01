<?php
/**
 * Plugin Name: Vmax Project Manager Wordpress Plugin
 * Plugin URI: https://codecanyon.net/item/vmax-project-manager-wordpress-plugin/20422318
 * Description: This is a wordpress plugin to manage your projects, clients, team, payment, files
 * Version: 1.0
 * Author: Vmaxstudio
 * Author URI: https://vmax-studio.com
 * License: GPL2
 */


	// Prohibit direct file accessing
    defined( 'ABSPATH' ) or die( 'Access not allowed!' );


	// Directory constant values
	define( 'VPMDIR', __DIR__ );

	
	// Database installation and custom role creation during plugin activation.
    register_activation_hook( __FILE__, 'install_vpm_plugin' );		
    function install_vpm_plugin() {
        /*
        * Runs database table creation query.
        * Creates directory for project file upload.
        */
        include ( VPMDIR . '/plugin-installer.php' );
    }


	// Add project manager plugin in admin menu
	add_action( 'admin_menu', 'vpm_wp_plugin' );
	function vpm_wp_plugin() {

		// Add main menu
		$menu = add_menu_page('Vpm Project Manager', 'Project Manager', 'read', 'vpm-project', 'vpm_project' );

		// Add submenu for projects
		$project_menu = add_submenu_page('vpm-project', 'Project Management', 'Projects', 'read', 'vpm-project', 'vpm_project');

		// Add submenu for create project
		$create_project_menu = add_submenu_page('vpm-project', 'Create Project Management', 'Create project', 'read', 'vpm-create-project', 'vpm_create_project');

		// Add submenu for clients
		$client_menu = add_submenu_page('vpm-project', 'Client Management', 'Clients', 'read', 'vpm-client', 'vpm_client');

		// Add submenu for staff
		$staff_menu = add_submenu_page('vpm-project', 'Staff Management', 'Staff', 'read', 'vpm-staff', 'vpm_staff');

		// Add submenu for payment
		$payment_menu = add_submenu_page('vpm-project', 'Payment Management', 'Payment Report', 'read', 'vpm-payment', 'vpm_payment');

		// Css and javascript adding action to all pages of plugin.
        add_action( 'admin_enqueue_scripts',			'vpm_project_scripts' );

	}

    // Enqueue plugin js files
    function vpm_project_scripts($hook) {

    	// Define the top level & appearance pages of the plugin where the css & js files will be loaded.
    	if ( $hook == 'toplevel_page_vpm-project' || 
    			$hook == 'project-manager_page_vpm-client' || 
    				$hook == 'project-manager_page_vpm-create-project' || 
    					$hook == 'project-manager_page_vpm-staff' || 
    						$hook == 'project-manager_page_vpm-payment' || 
    							$hook == 'project-manager_page_vpm-create-project') {

    		// Javascript files enqued
	        wp_enqueue_script( 'bootstrap',		plugins_url( 'assets/bootstrap.min.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );

	        // Css files enqued
	        wp_enqueue_style( 'bootstrap',		plugins_url( 'assets/bootstrap.css', __FILE__ ) );
	        wp_enqueue_style( 'custom',			plugins_url( 'assets/custom.min.css', __FILE__ ) );
	        

        }
        
    }


	// Calling project page
	function vpm_project() {
		$body	=	'project';
		include( VPMDIR . '/view/index.php');
	}

	// Calling create project page
	function vpm_create_project() {
		$body	=	'create_project';
		include( VPMDIR . '/view/index.php');
	}

	// Calling client page
	function vpm_client() {
		$body	=	'client';
		include( VPMDIR . '/view/index.php');
	}

	// Calling staff page
	function vpm_staff() {
		$body	=	'staff';
		include( VPMDIR . '/view/index.php');
	}

	// Calling payment page 
	function vpm_payment() {
		$body	=	'payment';
		include( VPMDIR . '/view/index.php');
	}

    // Wordpress form submission post function
	add_action('admin_post_vpm', 'task');
	function task(){

		// Database query functions
		include ( VPMDIR . '/model/function.php');

		// Page redirection and function calling controller
		include ( VPMDIR . '/controller/controller.php');


	}
?>