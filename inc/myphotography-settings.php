<?php
/**
 *  Theme settings in WP dashboard file
 * 
 * @package myphotography
 */

/**
 * This function to to display settings fields in settings page.
 */
function myphotography_theme_settings_page() {
	?>
		<div class="wrap">
		<h1><?php echo esc_html__( 'Theme Settings', 'myphotography' ); ?></h1>
		<form method="post" action="options.php">
	<?php
	settings_fields( 'myphotography-grp' );
	do_settings_sections( 'myphotography-theme-options' );      
	submit_button(); 
	?>
		</form>
		</div>
	<?php
}
/**
 * Function for creating theme settings page and menu item in WP Dashboard.
 */
function myphotography_add_theme_menu_item() {
	add_theme_page( __( 'Theme Settings', 'myphotography' ), __( 'Theme Settings', 'myphotography' ), 'manage_options', 'mp-theme-settings', 'myphotography_theme_settings_page', null, 99 );
}

	add_action( 'admin_menu', 'myphotography_add_theme_menu_item' );

/**
 * Function to display field for Twitter link
 */
function myphotography_display_twitter_element() {
	?>
<input type="url" name="mp_twitter_url" id="mp_twitter_url" value="<?php echo esc_url( get_option( 'mp_twitter_url' ) ); ?>" style="width: 400px;" maxlength="250"/>
	<?php
}

/**
 * Function to display field for Instagram link
 */
function myphotography_display_instagram_element() {
	?>
<input type="url" name="mp_instagram_url" id="mp_instagram_url" value="<?php echo esc_url( get_option( 'mp_instagram_url' ) ); ?>" style="width: 400px;" maxlength="250"/>
	<?php
}

/**
 * Function to display field for Facebook link
 */
function myphotography_display_facebook_element() {
	?>
<input type="url" name="mp_facebook_url" id="mp_facebook_url" value="<?php echo esc_url( get_option( 'mp_facebook_url' ) ); ?>"  style="width: 400px;" maxlength="250"/>
	<?php
}

/**
 * Function to display field for Linkedin link
 */
function myphotography_display_linkedin_element() {
	?>
<input type="url" name="mp_linkedin_url" id="mp_linkedin_url" value="<?php echo esc_url( get_option( 'mp_linkedin_url' ) ); ?>"  style="width: 400px;" maxlength="250"/>
	<?php
}

/**
 * Function to display checkbox to display comments or not.
 */
function myphotography_display_comments_element() {
	?>
<input type="checkbox" name="mp_display_comments" value="1" <?php checked( 1, get_option( 'mp_display_comments' ), true ); ?> /> 
	<?php
}

/**
 * Function to display field for 404 image url
 */
function myphotography_404_image_element() {
	?>
<input type="url" name="mp_404_image_url" id="mp_404_image_url" value="<?php echo esc_url( get_option( 'mp_404_image_url' ) ); ?>" style="width: 400px;" maxlength="250"/>
	<?php
}

/**
 * Function to display color input for primary link color
 */
function myphotography_primary_color_element() {
	$color = get_option( 'mp_primary_color' );
	$color = ( '' === $color ) ? '#6c757d' : $color;
	?>
<input type='color' name='mp_primary_color' value='<?php echo esc_attr( $color ); ?>' maxlength=20> Default: #6c757d
	<?php
}

/**
 * Function to display color input for secondary link color
 */
function myphotography_secondary_color_element() {
	$color = get_option( 'mp_secondary_color' );
	$color = ( '' === $color ) ? '#EDB2B2' : $color;
	?>
<input type='color' name='mp_secondary_color' value='<?php echo esc_attr( $color ); ?>' maxlength=20> Default: #EDB2B2
	<?php
}

/**
 * Function to define settings fields with the display fileds functions
 */
function myphotography_display_theme_settings_fields() {

	// Social Links section.

	add_settings_section( 'socialsection', 'Social Links', null, 'myphotography-theme-options' );


	add_settings_field( 'mp_twitter_url', __( 'Twitter Profile Url', 'myphotography' ), 'myphotography_display_twitter_element', 'myphotography-theme-options', 'socialsection' );
	add_settings_field( 'mp_facebook_url', __( 'Facebook Profile Url', 'myphotography' ), 'myphotography_display_facebook_element', 'myphotography-theme-options', 'socialsection' );
	add_settings_field( 'mp_instagram_url', __( 'Instagram Profile Url', 'myphotography' ), 'myphotography_display_instagram_element', 'myphotography-theme-options', 'socialsection' );
	add_settings_field( 'mp_linkedin_url', __( 'Linkedin Profile Url', 'myphotography' ), 'myphotography_display_linkedin_element', 'myphotography-theme-options', 'socialsection' );
	register_setting( 'myphotography-grp', 'mp_twitter_url' );
	register_setting( 'myphotography-grp', 'mp_facebook_url' );
	register_setting( 'myphotography-grp', 'mp_instagram_url' );
	register_setting( 'myphotography-grp', 'mp_linkedin_url' );

	// General Options section.

	add_settings_section( 'generalsection', __( 'General Options', 'myphotography' ), null, 'myphotography-theme-options' );

	add_settings_field( 'mp_display_comments', __( 'Do you want to activate comments in posts?', 'myphotography' ), 'myphotography_display_comments_element', 'myphotography-theme-options', 'generalsection' );
	add_settings_field( 'mp_primary_color', __( 'Select the primary color (links)', 'myphotography' ), 'myphotography_primary_color_element', 'myphotography-theme-options', 'generalsection' );
	add_settings_field( 'mp_secondary_color', __( 'Select the secondary color (links on mouseover)', 'myphotography' ), 'myphotography_secondary_color_element', 'myphotography-theme-options', 'generalsection' );
	add_settings_field( 'mp_404_image_url', __( '404 (Not Found) Image Url', 'myphotography' ), 'myphotography_404_image_element', 'myphotography-theme-options', 'generalsection' );
	register_setting( 'myphotography-grp', 'mp_display_comments' );
	register_setting( 'myphotography-grp', 'mp_primary_color' );
	register_setting( 'myphotography-grp', 'mp_secondary_color' );
	register_setting( 'myphotography-grp', 'mp_404_image_url' );

}

add_action( 'admin_init', 'myphotography_display_theme_settings_fields' );

