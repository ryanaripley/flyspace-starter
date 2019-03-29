<?php
/**
 * Custom settings for the Flyspace theme
 *
 * @package Flyspace
 */

function flyspace_theme_settings_page() { ?>
  <div class="wrap">
    <h1>Theme Panel</h1>
    <form method="post" action="options.php">
      <?php
      settings_fields("flyspace_options");
      do_settings_sections("theme-options");      
      submit_button(); 
      ?>          
    </form>
  </div>

<?php }

function flyspace_add_theme_menu_item()
{
  add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "flyspace_theme_settings_page", 'dashicons-thumbs-up
  ', 99);
}
add_action("admin_menu", "flyspace_add_theme_menu_item");

function flyspace_display_twitter_element() { ?>
  <input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
<?php }

function flyspace_display_facebook_element() { ?>
  <input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
<?php }

function flyspace_display_linkedin_element() { ?>
  <input type="text" name="linkedin_url" id="linkedin_url" value="<?php echo get_option('linkedin_url'); ?>" />
<?php }

function flyspace_display_phone_element() { ?>
  <input type="text" name="company_phone" id="company_phone" value="<?php echo get_option('company_phone'); ?>" />
<?php }

function flyspace_display_email_element() { ?>
  <input type="email" name="company_email" id="company_email" value="<?php echo get_option('company_email'); ?>" />
<?php }

function flyspace_display_theme_panel_fields() { 
	add_settings_section("flyspace_options", "All Settings", null, "theme-options");
	
	add_settings_field("twitter_url", "Twitter Profile Url", "flyspace_display_twitter_element", "theme-options", "flyspace_options");
  add_settings_field("facebook_url", "Facebook Profile Url", "flyspace_display_facebook_element", "theme-options", "flyspace_options");
  add_settings_field("linkedin_url", "LinkedIn Profile Url", "flyspace_display_linkedin_element", "theme-options", "flyspace_options");
  add_settings_field("company_phone", "Company Phone Number", "flyspace_display_phone_element", "theme-options", "flyspace_options");
  add_settings_field("company_email", "Company Email Address", "flyspace_display_email_element", "theme-options", "flyspace_options");

  register_setting("flyspace_options", "twitter_url");
  register_setting("flyspace_options", "facebook_url");
  register_setting("flyspace_options", "linkedin_url");
  register_setting("flyspace_options", "company_phone");
  register_setting("flyspace_options", "company_email");
}

add_action("admin_init", "flyspace_display_theme_panel_fields");