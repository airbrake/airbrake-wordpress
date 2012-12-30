<?php

function airbrake_wordpress_admin_menu () {
    add_menu_page( AW_TITLE, 'Airbrake Wordpress', 'administrator', AW_SLUG, 'airbrake_wordpress_settings' );
}

function airbrake_wordpress_settings () {

    if ( ! function_exists( 'submit_button' ) ) {
	function submit_button() {
		echo '<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>';
        }
    }

    include AW_DOCROOT . '/views/settings.php';
}