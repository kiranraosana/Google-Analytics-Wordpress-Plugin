<?php
/**
*
* @package Easy Gooogle Analytics
**/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

$options_checkbox = get_option( 'ega_setting_enable_checkbox' );

$ega_tracking_code = get_option('ega_setting_minimal_or_tracking_ga_id', 'Tracking Code');

$ega_minimal_code = get_option('ega_setting_minimal_or_tracking_ga_id', 'Minimal Code');

$ega_header = get_option('ega_setting_placed_in', 'Head');

$ega_footer = get_option('ega_setting_placed_in', 'Footer');


 
if ( ! empty( $options_checkbox )  && ( $ega_tracking_code == "Tracking Code" )  ) {

            	if ( $ega_header == "Head"){

           			 add_action('wp_head', array( 'EassyGoogleAnalytics', 'ega_analytics_tracking_code' ) );

            	}
            	if ( $ega_header == "Footer" ){

           			 add_action('wp_footer', array( 'EassyGoogleAnalytics', 'ega_analytics_tracking_code' ) );

            	}

		   
}


if ( ! empty( $options_checkbox ) && ( $ega_minimal_code == "Minimal Code" ) ) {

            	if ( $ega_header == "Head"){

           			 add_action('wp_head', array( 'EassyGoogleAnalytics', 'ega_minimal_code' ) );

            	}
            	if ( $ega_header == "Footer" ){

           			 add_action('wp_footer', array( 'EassyGoogleAnalytics', 'ega_minimal_code' ) );

            	}

		   
	}