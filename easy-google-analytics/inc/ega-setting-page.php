<?php
/**
*
* @package Easy Gooogle Analytics
**/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


add_settings_section( 'ega_setting_section','Easy Google Analyatics Settings', 'ega_setting_section_cb', 'easy-google-analytics-settings-page' );

add_settings_field( 'ega_setting_enable_checkbox', 'Enable Easy Google Analytics', 'ega_setting_enable_checkbox_cb', 'easy-google-analytics-settings-page', 'ega_setting_section');


add_settings_field( 'ega_setting_ga_id', 'Google Analyatics ID', 'ega_setting_ga_id_cb', 'easy-google-analytics-settings-page', 'ega_setting_section');

add_settings_field( 'ega_setting_minimal_or_tracking_ga_id', 'Minimal or Tracking Code', 'ega_setting_minimal_or_tracking_ga_id_cb', 'easy-google-analytics-settings-page', 'ega_setting_section');


add_settings_field( 'ega_setting_placed_in', 'Placed In Header / Footer', 'ega_setting_placed_in_cb', 'easy-google-analytics-settings-page', 'ega_setting_section');


register_setting( 'ega_setting_section', 'ega_setting_enable_checkbox');

register_setting( 'ega_setting_section', 'ega_setting_placed_in');

register_setting( 'ega_setting_section', 'ega_setting_ga_id');

register_setting( 'ega_setting_section', 'ega_setting_minimal_or_tracking_ga_id');



function ega_setting_section_cb() {

	echo '<h5>Developed By Kiran Kumar Sana and Joshuava Daniel</h5>';

}
function ega_setting_enable_checkbox_cb() {
	?>
	 <input type="checkbox" name="ega_setting_enable_checkbox" value="1" <?php checked(1, get_option('ega_setting_enable_checkbox'), true); ?> /> 

	<?php
}
function ega_setting_ga_id_cb() {
	?>
	<input type="text" name="ega_setting_ga_id" placeholder="UA-XXXXXXXX-1" value="<?php echo get_option('ega_setting_ga_id'); ?>" style="width: 150px;"/> 
	<?php
}

function ega_setting_placed_in_cb() {
	?>

<select name="ega_setting_placed_in" />
                   <option value="Head" <?php if( get_option('ega_setting_placed_in') == "Head" ): echo 'selected'; endif;?> >Head (Default)</option>
                   <option value="Footer" <?php if( get_option('ega_setting_placed_in') == "Footer" ): echo 'selected'; endif;?> >Footer</option>
</select>

<?php
}

function ega_setting_minimal_or_tracking_ga_id_cb() {
	?>

	<input type="radio" name="ega_setting_minimal_or_tracking_ga_id" value="Tracking Code" <?php if( get_option('ega_setting_minimal_or_tracking_ga_id') == "Tracking Code" ): echo 'checked'; endif;?>/> Tracking Code &nbsp;&nbsp;
    <input type="radio" name="ega_setting_minimal_or_tracking_ga_id" value="Minimal Code" <?php if( get_option('ega_setting_minimal_or_tracking_ga_id') == "Minimal Code" ): echo 'checked'; endif;?> /> Minimal Code
    <p style="font-size: 12px; font-style: italic;">Note: Check this link for more details: <a href="https://minimalanalytics.com/" target="_blank">Minimalanalytics.com</a></p>

    <?php
}


