<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.optimizepress.com/
 * @since             1.0.0
 * @package           Op_FancyBoxForWordpress_Fix
 *
 * @wordpress-plugin
 * Plugin Name:       OptimizePress Fancybox for Wordpress fix
 * Plugin URI:        http://www.optimizepress.com/
 * Description:       Removes fancybox from OptimizePress on regular pages
 * Version:           1.0.0
 * Author:            OptimizePress
 * Author URI:        http://www.optimizepress.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       op-fancyboxforwordpress-fix
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}
add_action('wp_print_scripts' , 'op_fancybox_remove', 99);

function op_fancybox_remove(){
    if (function_exists('is_le_page')){
        if ( !is_le_page() && !defined('OP_LIVEEDITOR')){
            wp_dequeue_script(OP_SN.'-fancybox');
        } else{
            wp_dequeue_script( 'fancybox' );
        }
    }
}