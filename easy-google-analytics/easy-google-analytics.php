<?php
/**
* Plugin Name: Easy Google Analytics
* Plugin URI: https://unmyne.com
* Description: Handle the basics with this plugin.
* Version: 1.0.0
* Author: Kiran Kumar
* Author URI: https://kirankumar.com
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
**/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if( ! class_exists('EassyGoogleAnalytics') ){

	define( 'EGA_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

	class EassyGoogleAnalytics {

		public static function ega_hooks_register(){
            
            add_action( 'admin_menu', array( 'EassyGoogleAnalytics', 'ega_admin_menu_register' ) );

            add_action( 'admin_init', array( 'EassyGoogleAnalytics', 'ega_register_options' ) );

            /* Setting options **/

			include_once( EGA_PLUGIN_PATH . 'inc/ega-setting-conditions.php');



		}
		
		function ega_activate(){
            
            EassyGoogleAnalytics::ega_hooks_register();

		}
		function ega_deactivate(){
			flush_rewrite_rules();
		}

		function ega_admin_menu_register() {

             add_options_page('Easy Google Analytics Settings','Easy Google Analytics', 'manage_options', 'easy-google-analytics-settings-page', array('EassyGoogleAnalytics', 'ega_setting_page'));
   
		}

		function ega_setting_page() {
          echo '<div class="wrap">
	      <div id="icon-options-general" class="icon32"></div>
          <h1>Theme Options</h1>
          <form method="post" action="options.php">';

			settings_fields("ega_setting_section");

			do_settings_sections("easy-google-analytics-settings-page");

			submit_button(); 

			echo '</form>
		          </div>';
		}

		/* Setting API Calls */
		function ega_register_options() {

			include_once( EGA_PLUGIN_PATH . 'inc/ega-setting-page.php');

		}

		/* End Setting API Calls */

		function ega_analytics_tracking_code() {
		  $ega_google_ga_id = get_option('ega_setting_ga_id');
		?>
		  <!-- Global site tag (gtag.js) - Google Analytics -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ega_google_ga_id; ?>"></script>
			<script>
			  window.dataLayer = window.dataLayer || [];
			  function gtag(){dataLayer.push(arguments);}
			  gtag('js', new Date());

			  gtag('config', '<?php echo $ega_google_ga_id; ?>');
			</script>

		<?php
		}


		function ega_minimal_code() {

			include_once( EGA_PLUGIN_PATH . 'inc/minimal-google-analytics.php');

		}





		
	}
	   	
	   	$ega_gloabal = new EassyGoogleAnalytics();

	    $ega_gloabal->ega_hooks_register();

	    //activate
		register_activation_hook( __FILE__, array('EassyGoogleAnalytics', 'EGA_activate'));

		//deactivate
		register_deactivation_hook( __FILE__, array('EassyGoogleAnalytics', 'EGA_deactivate'));
	
    

}