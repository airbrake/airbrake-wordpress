<div class="wrap">
  <img style="float:left; padding:4px; padding-top:8px; padding-right:12px" src="<?php echo plugin_dir_url(__FILE__); ?>../plugin/images/icon.png"></img>
  <h2>Airbrake</h2>

  <p>Airbrake is a tool that collects and aggregates errors for webapps. This Plugin makes it simple to track PHP errors in your Wordpress install. Once installed it'll collect all errors with the Wordpress Core and Wordpress Plugins.</p>

  <p>This plugin requires an Airbrake account. Sign up for an <a href="https://airbrake.io/pricing">account</a>.</p>

  <form method="post" action="options.php">
    <?php wp_nonce_field('update-options'); ?>

    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="airbrake_wordpress_setting_disabled,airbrake_wordpress_setting_project_id,airbrake_wordpress_setting_project_key" />

    <table class="form-table">
      <tr valign="top">
        <th scope="row">Disabled</th>
        <td>
          <select name="airbrake_wordpress_setting_disabled">
            <option value="1"<?php echo get_option('airbrake_wordpress_setting_disabled') ? ' selected="selected"' : ''; ?>>Yes</option>
            <option value="0"<?php echo !get_option('airbrake_wordpress_setting_disabled') ? ' selected="selected"' : ''; ?>>No</option>
          </select>
        </td>
      </tr>

      <tr valign="top">
        <th scope="row">Project ID</th>
        <td><input type="text" size="45" name="airbrake_wordpress_setting_project_id" value="<?php echo get_option('airbrake_wordpress_setting_project_id'); ?>" /></td>
      </tr>

      <tr valign="top">
        <th scope="row">Project key</th>
        <td><input type="text" size="45" name="airbrake_wordpress_setting_project_key" value="<?php echo get_option('airbrake_wordpress_setting_project_key'); ?>" /></td>
      </tr>
    </table>

    <?php submit_button(); ?>
  </form>
</div>
