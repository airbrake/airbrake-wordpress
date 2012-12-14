<?php

function airbrake_wordpress_install () {
  global $wpdb;
  add_option( 'airbrake_wordpress_setting_status', '0', '', 'yes' );	
  add_option( 'airbrake_wordpress_setting_apikey', '', '', 'yes' );	
  add_option( 'airbrake_wordpress_setting_timeout', '2', '', 'yes' );	
  add_option( 'airbrake_wordpress_setting_warrings', '0', '', 'yes' );	
  add_option( 'airbrake_wordpress_setting_async', '0', '', 'yes' );	
  add_option( 'airbrake_wordpress_setting_apiendpoint', '', '', 'yes' );	

}

function airbrake_wordpress_uninstall () {
  global $wpdb;
  delete_option( 'airbrake_wordpress_setting_status' );	
  delete_option( 'airbrake_wordpress_setting_apikey' );	
  delete_option( 'airbrake_wordpress_setting_timeout' );	
  delete_option( 'airbrake_wordpress_setting_warrings' );	
  delete_option( 'airbrake_wordpress_setting_async' );	
  delete_option( 'airbrake_wordpress_setting_apiendpoint' );	

}