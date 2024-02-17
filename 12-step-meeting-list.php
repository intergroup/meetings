<?php

/**
 * Plugin Name: 12 Step Meeting List
 * Plugin URI: https://wordpress.org/plugins/12-step-meeting-list/
 * Description: Manage a list of recovery meetings
 * Version: 3.14.32
 * Requires PHP: 5.6
 * Author: Code for Recovery
 * Author URI: https://github.com/code4recovery/12-step-meeting-list
 * Text Domain: 12-step-meeting-list
 */

//define constants
define('TSML_GROUP_CONTACT_COUNT', 3);

define('TSML_MEETING_GUIDE_APP_NOTIFY', 'appsupport@aa.org');

define('TSML_PATH', plugin_dir_path(__FILE__));

define('TSML_VERSION', '3.14.32');

define('TSML_MEETINGS_PERMISSION', 'edit_posts');

define('TSML_SETTINGS_PERMISSION', 'manage_options');

//defining externally-defined constant + function for php intelephense
if (false) {
    define('TSML_UI_PATH', '');
    function tsml_import_reformat()
    {
    }
}

//include these files first
include TSML_PATH . '/includes/filter_meetings.php';
include TSML_PATH . '/includes/functions.php';
include TSML_PATH . '/includes/variables.php';

//include public files
include TSML_PATH . '/includes/ajax.php';
include TSML_PATH . '/includes/init.php';
include TSML_PATH . '/includes/shortcodes.php';
include TSML_PATH . '/includes/widgets.php';
include TSML_PATH . '/includes/widgets_init.php';

//include admin files
if (is_admin()) {
    include TSML_PATH . '/includes/admin_import.php';
    include TSML_PATH . '/includes/admin_lists.php';
    include TSML_PATH . '/includes/admin_meeting.php';
    include TSML_PATH . '/includes/admin_menu.php';
    include TSML_PATH . '/includes/admin_region.php';
    include TSML_PATH . '/includes/admin_settings.php';
    include TSML_PATH . '/includes/save.php';
}

//these hooks need to be in this file
register_activation_hook(__FILE__, 'tsml_plugin_activation');
register_deactivation_hook(__FILE__, 'tsml_plugin_deactivation');
