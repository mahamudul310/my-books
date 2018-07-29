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


echo "<h1>",  MY_BOOK_PLUGIN_DIR_PATH; echo "</h1>";
 echo '<br/>';
echo "<h1>",  MY_BOOK_PLUGIN_URL; echo "</h1>";
