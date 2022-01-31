<?php
/*
	Plugin Name: Better Admin Bar
	Plugin URI: https://kubiq.sk
	Description: Better Admin Bar
	Version: 3.5
	Author: KubiQ
	Author URI: https://kubiq.sk
	Text Domain: better_admin_bar
	Domain Path: /languages
*/

if( ! class_exists('better_admin_bar') ){
	class better_admin_bar{
		var $plugin_admin_page;
		var $settings;

		function __construct(){
			add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
			add_action( 'admin_menu', array( $this, 'plugin_menu_link' ) );
			add_action( 'init', array( $this, 'plugin_init' ) );
			add_action( 'wp_head', array( $this, 'advanced_admin_bar' ), PHP_INT_MAX );
		}

		function plugins_loaded(){
			load_plugin_textdomain( 'better_admin_bar', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
		}

		function plugin_init(){
			$this->settings = get_option('admin_bar_settings');
			$this->settings['hide_below'] = isset( $this->settings['hide_below'] ) ? intval( $this->settings['hide_below'] ) : 0;
			$this->settings['inactive_opacity'] = isset( $this->settings['inactive_opacity'] ) ? intval( $this->settings['inactive_opacity'] ) : 30;
			$this->settings['active_opacity'] = isset( $this->settings['active_opacity'] ) ? intval( $this->settings['active_opacity'] ) : 100;
			$this->settings['hover_area'] = isset( $this->settings['hover_area'] ) ? intval( $this->settings['hover_area'] ) : 10;
			$this->settings['hover_delay'] = isset( $this->settings['hover_delay'] ) ? intval( $this->settings['hover_delay'] ) : 250;

			if( isset( $this->settings['show_admin'] ) ){
				if( ! current_user_can('administrator') && ! is_admin() ){
					add_action( 'get_header', array( $this, 'remove_admin_login_header' ) );
				}
			}else{
				if( isset( $this->settings['hide_admin_bar'] ) ){
					add_action( 'get_header', array( $this, 'remove_admin_login_header' ) );
				}
			}
		}

		function remove_admin_login_header(){
			remove_action( 'wp_head', '_admin_bar_bump_cb' );
		}

		function advanced_admin_bar(){
			if( ! is_user_logged_in() ) return;
			ob_start(); ?>
			<style type="text/css" media="screen">
				html,
				html body,
				* html body{
					margin-top: 0 !important
				}
				html #wpadminbar{
					opacity: <?php echo $this->settings['inactive_opacity'] / 100 ?>;
					-webkit-transition: all .3s ease;
					transition: all .3s ease;
				}
				html #wpadminbar:hover{
					opacity: <?php echo $this->settings['active_opacity'] / 100 ?>
				}
				<?php if( isset( $this->settings['autohide'] ) ){ ?>
				html #wpadminbar{
					top: -<?php echo ( 32 - $this->settings['hover_area'] ) ?>px !important;
					-webkit-transition-delay: <?php echo $this->settings['hover_delay'] ?>ms;
					transition-delay: <?php echo $this->settings['hover_delay'] ?>ms;
				}
				html #wpadminbar:hover{
					top: 0 !important
				}
				@media screen and (max-width: 782px){
					html #wpadminbar{
						top: -<?php echo ( 46 - $this->settings['hover_area'] ) ?>px !important;
						-webkit-transition-delay: 0;
						transition-delay: 0;
					}
				}
				@media (max-width: <?php echo ( $this->settings['hide_below'] - 1 ) ?>px){
					html #wpadminbar{
						display: none !important;
					}
				}
				<?php } ?>
				<?php if( isset( $this->settings['fix_multiline'] ) ){ ?>
				html #wp-toolbar,
				html #wp-toolbar > ul{
					display: flex;
					height: 100%;
					white-space: nowrap;
				}
				html #wp-toolbar > ul + ul{
					margin-left: auto;
				}
				html #wp-toolbar > ul > li > a{
					overflow: hidden;
					text-overflow: ellipsis;
				}
				html #wp-toolbar > ul > li:hover{
					flex-shrink: 0;
				}
				<?php } ?>
			</style><?php

			$style = ob_get_clean();

			if( isset( $this->settings['show_admin'] ) ){
				if( ! current_user_can('administrator') && ! is_admin() ){
					show_admin_bar( false );
				}else{
					echo $style;
				}
			}else{
				if( isset( $this->settings['hide_admin_bar'] ) ){
					show_admin_bar( false );
				}else{
					echo $style;
				}
			}
		}

		function filter_plugin_actions( $links, $file ){
			$settings_link = '<a href="options-general.php?page=' . basename( __FILE__ ) . '">' . __('Settings') . '</a>';
			array_unshift( $links, $settings_link );
			return $links;
		}

		function plugin_menu_link(){
			$this->plugin_admin_page = add_submenu_page(
				'options-general.php',
				__( 'Better Admin Bar', 'better_admin_bar' ),
				__( 'Better Admin Bar', 'better_admin_bar' ),
				'manage_options',
				basename( __FILE__ ),
				array( $this, 'admin_options_page' )
			);
			add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'filter_plugin_actions' ), 10, 2 );
		}

		function admin_options_page(){
			if( get_current_screen()->id != $this->plugin_admin_page ) return;
			if( isset( $_POST['plugin_sent'] ) && check_admin_referer('bab_general') ){
				$new_settings = array(
					'hide_below' => intval( $_POST['hide_below'] ),
					'inactive_opacity' => intval( $_POST['inactive_opacity'] ),
					'active_opacity' => intval( $_POST['active_opacity'] ),
					'hover_area' => intval( $_POST['hover_area'] ),
					'hover_delay' => intval( $_POST['hover_delay'] ),
				);
				if( isset( $_POST['fix_multiline'] ) ){
					$new_settings['fix_multiline'] = 'checked';
				}
				if( isset( $_POST['hide_admin_bar'] ) ){
					$new_settings['hide_admin_bar'] = 'checked';
				}
				if( isset( $_POST['show_admin'] ) ){
					$new_settings['show_admin'] = 'checked';
				}
				if( isset( $_POST['autohide'] ) ){
					$new_settings['autohide'] = 'checked';
				}
				$this->settings = $new_settings;
				update_option( 'admin_bar_settings', $this->settings );
			} ?>
			<div class="wrap">
				<h1><?php _e( 'Better Admin Bar', 'better_admin_bar' ) ?></h1>
				<?php if( isset( $_POST['plugin_sent'] ) ) echo '<div id="message" class="below-h2 updated"><p>' . __('Settings saved.') . '</p></div>' ?>
				<form method="post" action="<?php admin_url( 'options-general.php?page=' . basename( __FILE__ ) ) ?>">
					<?php wp_nonce_field('bab_general') ?>
					<input type="hidden" name="plugin_sent" value="1">
					<table class="form-table">
						<tr>
							<th>
								<label for="fix_multiline"><?php _e( 'Fix multiline admin bar', 'better_admin_bar' ) ?></label> 
							</th>
							<td>
								<input type="checkbox" name="fix_multiline" value="checked" id="fix_multiline" <?php echo isset( $this->settings['fix_multiline'] ) ? $this->settings['fix_multiline'] : "" ?>>
							</td>
						</tr>
						<tr>
							<th>
								<label for="hide_admin_bar"><?php _e( 'Hide admin bar for all users', 'better_admin_bar' ) ?></label> 
							</th>
							<td>
								<input type="checkbox" name="hide_admin_bar" value="checked" id="hide_admin_bar" <?php echo isset( $this->settings['hide_admin_bar'] ) ? $this->settings['hide_admin_bar'] : "" ?>>
							</td>
						</tr>
						<tr>
							<th>
								<label for="show_admin"><?php _e( 'Hide admin bar for all users except admin', 'better_admin_bar' ) ?></label> 
							</th>
							<td>
								<input type="checkbox" name="show_admin" value="checked" id="show_admin" <?php echo isset( $this->settings['show_admin'] ) ? $this->settings['show_admin'] : "" ?>>
							</td>
						</tr>
						<tr>
							<th>
								<label for="hide_below"><?php _e( 'Hide admin bar on screens smaller than', 'better_admin_bar' ) ?></label> 
							</th>
							<td>
								<input type="number" name="hide_below" placeholder="0" value="<?php echo $this->settings['hide_below'] ?>" id="hide_below"> px
							</td>
						</tr>
						<tr>
							<th>
								<label for="inactive_opacity"><?php _e( 'Admin bar opacity <br>(inactive)', 'better_admin_bar' ) ?></label> 
							</th>
							<td>
								<input type="text" size="5" name="inactive_opacity" placeholder="30" value="<?php echo $this->settings['inactive_opacity'] ?>" id="inactive_opacity"> %
							</td>
						</tr>
						<tr>
							<th>
								<label for="active_opacity"><?php _e( 'Admin bar opacity on hover <br>(active)', 'better_admin_bar' ) ?></label> 
							</th>
							<td>
								<input type="text" size="5" name="active_opacity" placeholder="100" value="<?php echo $this->settings['active_opacity'] ?>" id="active_opacity"> %
							</td>
						</tr>
						<tr>
							<th>
								<label for="autohide"><?php _e( 'Auto-hide admin bar <br>(show on hover)', 'better_admin_bar' ) ?></label> 
							</th>
							<td>
								<input type="checkbox" name="autohide" value="checked" id="autohide" <?php echo isset( $this->settings['autohide'] ) ? $this->settings['autohide'] : "" ?>>
							</td>
						</tr>
						<tr>
							<th>
								<label for="hover_area"><?php _e( 'Top hover area height <br>(if autohide)', 'better_admin_bar' ) ?></label> 
							</th>
							<td>
								<input type="number" size="5" name="hover_area" placeholder="10" value="<?php echo $this->settings['hover_area'] ?>" id="hover_area"> px
							</td>
						</tr>
						<tr>
							<th>
								<label for="hover_delay"><?php _e( 'Hover delay', 'better_admin_bar' ) ?></label> 
							</th>
							<td>
								<input type="number" size="5" name="hover_delay" placeholder="250" value="<?php echo $this->settings['hover_delay'] ?>" id="hover_delay"> ms
							</td>
						</tr>
					</table>
					<p class="submit">
						<input type="submit" class="button button-primary button-large" value="<?php _e('Save') ?>">
					</p>
				</form>
			</div><?php
		}
	}

	$better_admin_bar_var = new better_admin_bar();
}