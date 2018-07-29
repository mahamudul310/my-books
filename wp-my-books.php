<?php  
/*
 * Plugin Name: Book Library
 * Plugin URI: https://hasantechbd.com/plugins
 * Description: This is my custom plugin which basically make use of books library.
 * Author: Mahamudul
 * Authro URI: http://hasantechbd.com
 * License: GPLv2 or later
 * Text Domain: my-book
 * Version: 1.0.0
 * 
 */

if(!defined("ABSPATH"))
    exit;
if(!defined("MY_BOOK_PLUGIN_DIR_PATH"))
    define ("MY_BOOK_PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));

if(!defined("MY_BOOK_PLUGIN_URL"))
    define ("MY_BOOK_PLUGIN_URL", plugins_url()."/my-books");

function my_book_include_assets(){
    // All Style 
    wp_enqueue_style("bootstrap", MY_BOOK_PLUGIN_URL."/assets/css/bootstrap.min.css",'');
    wp_enqueue_style("datatable", MY_BOOK_PLUGIN_URL."/assets/css/jquery.dataTables.min.css",'');
    wp_enqueue_style("notifybar", MY_BOOK_PLUGIN_URL."/assets/css/jquery.notifyBar.css",'');
    wp_enqueue_style("style", MY_BOOK_PLUGIN_URL."/assets/css/style.css",'');
    
    //Scripts
    wp_enqueue_script("jquery");
    wp_enqueue_script("bootstrap.min.js", MY_BOOK_PLUGIN_URL."/assets/js/bootstrap.min.js","", true);
    wp_enqueue_script("validation.min.js", MY_BOOK_PLUGIN_URL."/assets/js/jquery.validate.min.js","", true);
    wp_enqueue_script("datatable.min.js", MY_BOOK_PLUGIN_URL."/assets/js/jquery.dataTables.min.js","", true);
    wp_enqueue_script("jquery.min.js", MY_BOOK_PLUGIN_URL."/assets/js/jquery.min.js","", true);
    wp_enqueue_script("jquery.notifyBar.js", MY_BOOK_PLUGIN_URL."/assets/js/jquery.notifyBar.js","", true);
    wp_enqueue_script("script.js", MY_BOOK_PLUGIN_URL."/assets/js/script.js","", true);
    wp_localize_script("script.js","mybookajaxurl",admin_url("admin-ajax.php"));
}

add_action("init","my_book_include_assets");

function my_book_plugin_menus(){
    add_menu_page("My Book","My Book","manage_options","book-list","my_book_list","dashicons-book-alt",30);
    add_submenu_page("book-list","Book List","Book List","manage_options","book-list","my_book_list");
    add_submenu_page("book-list","Add New","Add New","manage_options","add-new","my_book_add");
}
add_action("admin_menu","my_book_plugin_menus");

function my_book_list() {
    include_once MY_BOOK_PLUGIN_DIR_PATH."/views/book-list.php";
}

function my_book_add() {
    include_once MY_BOOK_PLUGIN_DIR_PATH."/views/book-add.php";
}


function my_book_table() {
    global $wpdb;
    return $wpdb->prefix."my_books";
}

function my_book_generates_table_script() {
    
    global $wpdb;
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    $sql = "CREATE TABLE `" . my_book_table() . "` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) DEFAULT NULL,
            `author` varchar(255) DEFAULT NULL,
            `about` text,
            `book_image` text,
            `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
           ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
    
    dbDelta($sql);
    
}
register_activation_hook(__FILE__,"my_book_generates_table_script");