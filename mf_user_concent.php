<?php

/**
 * Plugin Name:       User concent
 * Plugin URI:        https://mario-flores.com
 * Description:       Show a table with the user concent data
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.0
 * Author:            Mario Flores
 * Author URI:        https://mario-flores.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       mf_user_concent
 * Domain Path:       /languages
 */


add_action( 'admin_enqueue_scripts', 'mf_user_concent_enqueue' );
add_action( 'wp_enqueue_scripts', 'mf_user_concent_enqueue' );
function mf_user_concent_enqueue( ) {
    wp_enqueue_script(
        'data-tables',
        plugins_url( '/js/datatables.min.js', __FILE__ ),
        array( 'jquery' ),
        '1.0.0',
        true
    );

    wp_enqueue_style('data-tables-style', plugins_url('/css/datatables.min.css', __FILE__), '', '1.0.0', false);
    wp_enqueue_style('user-concent-style', plugins_url('/css/mf_main.css', __FILE__), '', '1.0.0', false);
}

add_action('admin_menu', 'mf_user_concent');
function mf_user_concent()
{
    add_menu_page(
        'User Concent List',
        'User Concent',
        'manage_options',
        'mf_user_concent',
        'mf_user_concent_list'
    );
}

function mf_user_concent_list(){
    global $wpdb;
    $concent = $wpdb->get_results("SELECT * FROM mail_log where message LIKE '%27856%' order by id DESC");
    $concent = mf_parse_user_concent($concent); 
    include(plugin_dir_path(__FILE__).'views/list.php'); 
}

function mf_parse_user_concent($concent){
    if(!empty($concent)){
        foreach($concent as $key => $c){
            $concent[$key]->user_data = json_decode($c->message); 
        }
    }
    return $concent; 
}

add_shortcode('mf_user_concent', 'mf_user_concet_shortcode'); 

function mf_user_concet_shortcode(){
    global $wpdb;
    $concent = $wpdb->get_results("SELECT * FROM mail_log where message LIKE '%27856%' order by id DESC");
    $concent = mf_parse_user_concent($concent); 
    ob_start();
    include(plugin_dir_path(__FILE__).'views/list.php'); 
    return  ob_get_clean();
}