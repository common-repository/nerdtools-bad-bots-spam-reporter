<?php
/*
Plugin Name: NerdTools Bad Bots Spam Reporter
Plugin URI: http://www.nerdtools.co.uk/badbots/
Description: Automatically report spam comments to the NerdTools Bad Bots database. The authors IP address is sent anonymously to help understand and fight future spam. More information can be found at http://www.nerdtools.co.uk/badbots/ or in the readme.txt file.
Version: 1.3
Author: NerdTools
Author URI: http://www.nerdtools.co.uk/
License: GPL2
*/

// core script //
// variables //
$enable = get_option('enable_nerdtools_bad_bots_spam_reporter');

// check if enabled //
function nerdtools_bad_bots_spam_reporter_not_enabled() {
    ?>
    <div class="error">
        <p><?php _e( 'NerdTools Bad Bots Spam Reporter is installed but not enabled - click  <a href="/wp-admin/options-general.php?page=nerdtools_bad_bots_spam_reporter.php">here</a> to adjust the plugin settings', 'nerdtools_bad_bots_spam_reporter_not_enabled' ); ?>.</p>
    </div>
    <?php
}
if ($enable!="1"){
add_action( 'admin_notices', 'nerdtools_bad_bots_spam_reporter_not_enabled' );
}

function nerdtools_bad_bots_spam_reporter_core($comment_ID, $status) {
// variables // 
$vars = get_comment($comment_ID); 
$ip = $vars->comment_author_IP;
$path = plugin_dir_path( __FILE__ );
$log_last = "$path/last.txt";
$log_count = "$path/count.txt";
$time = current_time('H:i:s, d/m/Y');

// report authors IP address and log //
if ($status=="spam") {
$response = wp_remote_get("http://core.nerdtools.co.uk/badbot/wordpress/report.php?ip=$ip");
file_put_contents($log_last, "$ip at $time");
$total = file($log_count);
$total[0] ++;
$file = fopen($log_count , "w");
fputs($file , "$total[0]");
fclose($log_count);
}
}

// call above function //
if ($enable=="1") {
add_action('wp_set_comment_status', 'nerdtools_bad_bots_spam_reporter_core', 10, 2);
}
// core script //
// settings page //
function nerdtools_bad_bots_spam_reporter_menu() {
add_options_page('NerdTools Bad Bots Spam Reporter', 'NT BB Spam Reporter', 'manage_options', 'nerdtools_bad_bots_spam_reporter.php', 'nerdtools_bad_bots_spam_reporter_settings');
add_action( 'admin_init', 'register_nerdtools_bad_bots_spam_reporter_settings' );
}

function register_nerdtools_bad_bots_spam_reporter_settings() {
register_setting('nerdtools_badbots_spam_reporter_group', 'enable_nerdtools_bad_bots_spam_reporter');
} 

function nerdtools_bad_bots_spam_reporter_settings() {
$path = plugin_dir_path( __FILE__ );
$log_last = "$path/last.txt";
$log_count = "$path/count.txt";
?>
<div class="wrap">
<h2>NerdTools Bad Bots Spam Reporter</h2>
<p>Created for <a target="_blank" href="http://www.nerdtools.co.uk/">
NerdTools.co.uk</a> by <a target="_blank" href="http://www.nerdkey.co.uk/">
NerdKey</a>, this plugin automatically enables reporting of comments which are 
classed as spam to the
<a target="_blank" href="http://www.nerdtools.co.uk/badbots/">NerdTools Bad Bots 
database</a> to help understand and fight future spam.<br><br>
Several plugins have been created to work alongside and benefit from the Bad Bots database, please consider installing
<a target="_blank" href="http://www.wordpress.org/plugins/nerdtools-bad-bots-spam-defender/">NerdTools Bad Bots Spam Defender</a> or try the 
<a target="_blank" href="http://www.wordpress.org/plugins/nerdtools-comment-filter/">NerdTools Comment Filter</a>.</p>
<h3>Settings</h3>
<form method="post" action="options.php">
    <?php settings_fields('nerdtools_badbots_spam_reporter_group'); ?>
    <?php do_settings_sections('nerdtools_badbots_spam_reporter_group'); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Enable Spam Reporting?</th>
        <td><input type="checkbox" name="enable_nerdtools_bad_bots_spam_reporter" value="1" <?php $enabled = get_option('enable_nerdtools_bad_bots_spam_reporter'); if ($enabled=="1") { echo "checked"; } ?> /></td>
        </tr>
    </table>
    <?php submit_button(); ?>
</form>
<h3>Stats</h3>
<p><b>Last report:</b> <?php include $log_last; ?>
<br><b>Total reports:</b> <?php include $log_count; ?></p>
<iframe src="http://core.nerdtools.co.uk/badbot/wordpress/reporter-stats.php" height="600" width="600" scrolling="no" frameborder="0" style="border:none; overflow:hidden;" allowTransparency="true"></iframe>
</div>
<?php
}
// call above function //
add_action('admin_menu', 'nerdtools_bad_bots_spam_reporter_menu');
// settings page //
?>
