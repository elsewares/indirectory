<?php
/**
 * Install plugin administration panel.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** WordPress Administration Bootstrap */
require_once('./admin.php');

$wp_list_table = get_list_table('plugin-install');
$wp_list_table->check_permissions();
$wp_list_table->prepare_items();

$title = __('Install Plugins');
$parent_file = 'plugins.php';

wp_enqueue_style( 'plugin-install' );
wp_enqueue_script( 'plugin-install' );
if ( 'plugin-information' != $tab )
	add_thickbox();

$body_id = $tab;

do_action('install_plugins_pre_' . $tab); //Used to override the general interface, Eg, install or plugin information.

add_contextual_help($current_screen,
	'<p>' . sprintf(__('Plugins hook into WordPress to extend its functionality with custom features. Plugins are developed independently from WordPress core by thousands of developers all over the world. All plugins in the official <a href="%s" target="_blank">WordPress.org Plugin Directory</a> are compatible with the WordPress GPL v2 license. You can find new plugins to install by searching or browsing the Directory right here in your own Plugins section.'), 'http://wordpress.org/extend/plugins/') . '</p>' .
	'<p>' . __('If you know what you&#8217;re looking for, Search is your best bet. The Search screen has options to search the WordPress.org Plugin Directory for a particular Term, Author, or Tag. You can also search the directory by selecting a popular tags. Tags in larger type mean more plugins have been labeled with that tag.') . '</p>' .
	'<p>' . __('If you just want to get an idea of what&#8217;s available, you can browse Featured, Popular, Newest, and Recently Updated plugins by using the links in the upper left of the screen. These sections rotate regularly.') . '</p>' .
	'<p>' . __('If you want to install a plugin that you&#8217;ve downloaded elsewhere, click Upload in the upper left. You will be prompted to upload the .zip package, and once uploaded, you can activate the new plugin.') . '</p>' .
	'<p><strong>' . __('For more information:') . '</strong></p>' .
	'<p>' . __('<a href="http://codex.wordpress.org/Plugins_Add_New_SubPanel" target="_blank">Documentation on Installing Plugins</a>') . '</p>' .
	'<p>' . __('<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>') . '</p>'
);

include('./admin-header.php');
?>
<div class="wrap">
<?php screen_icon(); ?>
<h2><?php echo esc_html( $title ); ?></h2>

<?php $wp_list_table->views(); ?>

<br class="clear" />
<?php do_action('install_plugins_' . $tab, $paged); ?>
</div>
<?php
include('./admin-footer.php');

