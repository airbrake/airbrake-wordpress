<?php

/*
Plugin Name: airbrake-wordpress
Description: Airbrake Wordpress

Author: Airbrake.io
Author URI: https://github.com/airbrake/airbrake-wordpress

Description: Airbrake lets you discover errors and bugs in your Wordpress install.

Version: 0.2.1
License: GPL
*/

define('AW_TITLE', 'Airbrake Wordpress');
define('AW_SLUG', 'airbrake-wordpress');

if (!class_exists('Airbrake\Notifier')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

//------------------------------------------------------------------------------

register_activation_hook(__FILE__, 'airbrake_wordpress_install');
register_deactivation_hook(__FILE__, 'airbrake_wordpress_uninstall');

function airbrake_wordpress_install()
{
    add_option('airbrake_wordpress_setting_disabled', '1', '', 'yes');
    add_option('airbrake_wordpress_setting_project_id', 'FIXME', '', 'yes');
    add_option('airbrake_wordpress_setting_project_key', 'FIXME', '', 'yes');
}

function airbrake_wordpress_uninstall()
{
    delete_option('airbrake_wordpress_setting_disabled');
    delete_option('airbrake_wordpress_setting_project_id');
    delete_option('airbrake_wordpress_setting_project_key');
}

//------------------------------------------------------------------------------

add_action('admin_menu', 'airbrake_wordpress_admin_menu');

function airbrake_wordpress_admin_menu()
{
    add_menu_page(AW_TITLE, 'Airbrake', 'administrator', AW_SLUG, 'airbrake_wordpress_settings');
}

function airbrake_wordpress_settings()
{
    include __DIR__ . '/views/settings.php';
}

//------------------------------------------------------------------------------

if (get_option('airbrake_wordpress_setting_project_id') &&
    get_option('airbrake_wordpress_setting_project_key') &&
    !get_option('airbrake_wordpress_setting_disabled')) {
    $notifier = new Airbrake\Notifier([
        'projectId' => get_option('airbrake_wordpress_setting_project_id'),
        'projectKey' => get_option('airbrake_wordpress_setting_project_key'),
    ]);
    $notifier->addFilter(function ($notice) {
        $notice['params']['language'] = get_bloginfo('language');
        $notice['params']['wordpress'] = get_bloginfo('version');
        return $notice;
    });

    Airbrake\Instance::set($notifier);

    $handler = new Airbrake\ErrorHandler($notifier);
    $handler->register();
}
