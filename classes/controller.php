<?php

function airbrake_wordpress_admin_menu () {
    add_menu_page( AW_TITLE, 'Airbrake Wordpress', 'administrator', AW_SLUG, 'airbrake_wordpress_settings' );
}

function airbrake_wordpress_settings () {
    include AW_DOCROOT . '/views/settings.php';
}