<div class="wrap">
<h2>Airbrake Wordpress</h2>

<form method="post" action="options.php">
<?php wp_nonce_field( 'update-options' ); ?>

    <table class="form-table">
        <tr valign="top">
        <th scope="row">Status</th>
        <td>
		<select name="airbrake_wordpress_setting_status">
		  <option value="0"<?php echo ! get_option( 'airbrake_wordpress_setting_status' ) ? ' selected="selected"': '';?>>Disabled</option>
		  <option value="1"<?php echo get_option( 'airbrake_wordpress_setting_status' ) ? ' selected="selected"': '';?>>Enabled</option>
		</select>
	</td>
        </tr>
         
        <tr valign="top">
        <th scope="row">API Key</th>
        <td><input type="text" size="45" name="airbrake_wordpress_setting_apikey" value="<?php echo get_option( 'airbrake_wordpress_setting_apikey' ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Timeout</th>
        <td><input type="text" size="2" name="airbrake_wordpress_setting_timeout" value="<?php echo get_option( 'airbrake_wordpress_setting_timeout' ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Enable the logging of warning level messages</th>
        <td>
		<select name="airbrake_wordpress_setting_warrings">
		  <option value="0"<?php echo !get_option( 'airbrake_wordpress_setting_warrings' ) ? ' selected="selected"': '';?>>No</option>
		  <option value="1"<?php echo get_option( 'airbrake_wordpress_setting_warrings' ) ? ' selected="selected"': '';?>>Yes</option>
		</select>
	</td>
        </tr>

        <tr valign="top">
        <th scope="row">Asyncronous Notifications</th>
        <td>
		<select name="airbrake_wordpress_setting_async">
		  <option value="0"<?php echo !get_option( 'airbrake_wordpress_setting_async' ) ? ' selected="selected"': '';?>>No</option>
		  <option value="1"<?php echo get_option( 'airbrake_wordpress_setting_async' ) ? ' selected="selected"': '';?>>Yes</option>
		</select>
	</td>
        </tr>
    </table>
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="airbrake_wordpress_setting_status,airbrake_wordpress_setting_apikey,airbrake_wordpress_setting_timeout,airbrake_wordpress_setting_warrings,airbrake_wordpress_setting_async" />
    
    <?php submit_button(); ?>

</form>
</div>