<?php

/*
Plugin Name: airbrake-wordpress
Description: Airbrake Wordpress

Author: Airbrake.io
Author URI: https://github.com/airbrake/airbrake-wordpress

Description: Airbrake lets you discover errors and bugs in your Wordpress install. 

Version: 0.1
License: GPL 
*/

global $wpdb;

define( 'AW_TITLE', 'Airbrake Wordpress' );
define( 'AW_SLUG', 'airbrake-wordpress' );

define( 'AW_DOCROOT', dirname( __FILE__ ) );
define( 'AW_WEBROOT', str_replace( getcwd(), home_url(), dirname(__FILE__) ) );


register_activation_hook( __FILE__, 'airbrake_wordpress_install' );
register_deactivation_hook( __FILE__, 'airbrake_wordpress_uninstall' );

add_action( 'admin_menu', 'airbrake_wordpress_admin_menu' );

include 'classes/install.php';
include 'classes/controller.php';

if ( get_option('airbrake_wordpress_setting_status') ) {
	require_once 'classes/phpbrake/src/Notifier.php';
	require_once 'classes/phpbrake/src/Instance.php';
	require_once 'classes/phpbrake/src/ErrorHandler.php';

	$notifier = new Airbrake\Notifier([
    	'projectId' => trim( get_option( 'airbrake_wordpress_setting_projectid' ) ),
    	'projectKey' => trim( get_option( 'airbrake_wordpress_setting_apikey' ) )
	]);

	throw new Exception(trim( get_option( 'airbrake_wordpress_setting_projectid' ) ));

	Airbrake\Instance::set($notifier);

	$handler = new Airbrake\ErrorHandler($notifier);
	$handler->register();

	set_error_handler([$this, 'onError'], error_reporting());
	set_exception_handler([$this, 'onException']);
	register_shutdown_function([$this, 'onShutdown']);
}

