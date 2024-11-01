<?php
/**
 * Hayat Developers
 *
 * @package     Stylish Order Form Builder
 * @author      Hayat Developers
 * @copyright   2021 Stylish Order Form Builder
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Stylish Order Form Builder Lite
 
 * Description: Stylish Order Form Builder is the easy-to-use WordPress 'Get Quote' form builder plugin for ecommerce websites. It’s the easiest way to create order forms with custom options to set product sizes (XL, XLL or other custom size options etc.), product quantities (Pack of, bundle of, or simple numbered quantities)

 * Version:     1.0
 * Author:      Hayat Developers | Stylish Order Form Builder - Made for WordPress
 * Author URI:  https://hayyatapps.com
 * Text Domain: Stylish Order Form Builder 
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

include __DIR__.'/functions-ele.php';
include __DIR__.'/functions-admin.php';
include __DIR__.'/functions-wp.php';

include __DIR__.'/functions/properties.php';
include __DIR__.'/functions/products.php';
include __DIR__.'/functions/forms.php';
include __DIR__.'/functions/orders.php';


$short_code = 'stylish-order-form-builder';


register_activation_hook(__File__, 'AP_SOFB_PROPERTY_createDB');
register_activation_hook(__File__, 'AP_SOFB_PRODUCTS_createDB');
register_activation_hook(__File__, 'AP_SOFB_FORMS_createDB');
register_activation_hook(__File__, 'AP_SOFB_ORDERS_createDB');


register_deactivation_hook(__FILE__, 'AP_SOFB_PROPERTY_DELDB');
register_deactivation_hook(__FILE__, 'AP_SOFB_PRODUCTS_DELDB');
register_deactivation_hook(__FILE__, 'AP_SOFB_FORMS_DELDB');
register_deactivation_hook(__FILE__, 'AP_SOFB_ORDERS_DELDB');


add_action( 'admin_enqueue_scripts', 'SOFB_CSSJS' ,111);
add_action( 'admin_enqueue_scripts', 'SOFB_ADMIN_CSS' ,111);


add_action('admin_menu', 'SOFB_menu');
add_action('wp_enqueue_scripts', 'SOFB_scripts',111);

add_action( "wp_ajax_sofb_re_order", "sofb_re_order" );//for loggedin users
add_action( "wp_ajax_sofb_addproduct", "sofb_addproduct" );//for loggedin users
add_action( "wp_ajax_sofb_createForm", "sofb_createForm" );//for loggedin users


add_action( "wp_ajax_nopriv_sofb_orderform_data", "sofb_orderform_data" );//for non-loggedin users
add_action( "wp_ajax_sofb_orderform_data", "sofb_orderform_data" );//for loggedin users

$web_url =  sanitize_url( $_SERVER['REQUEST_URI'] );

$filter_w = 'wp-admin';
if(strpos($web_url, $filter_w) !== false){return 0;} else {
add_shortcode($short_code, 'SOFB_initiate');
}

?>