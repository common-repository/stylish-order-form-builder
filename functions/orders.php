<?php 

function AP_SOFB_ORDERS_DELDB(){

global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_orders";
     $sql = "DROP TABLE IF EXISTS $table_name";
     $wpdb->query($sql);

}

function AP_SOFB_ORDERS_ADD($arr){
    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_orders";
     // $arr[1] = '1';
    $wpdb->insert($table_name, array(

'form_title' => trim($arr[0]),
'order_data' => trim($arr[1]),
'contact_data' => trim($arr[2]),
'submission_date' => trim($arr[3])

));

    // echo $wpdb->print_error();
}





function AP_SOFB_ORDER_DEL($index){
    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_orders";
    $wpdb->delete( $table_name, array( 'NO' => $index 

));
}



function AP_SOFB_ORDERS_createDB(){
global $wpdb;
$table_name = $wpdb->prefix . "happs_SOFB_orders";

if ( $wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name ) {

    $sql = "CREATE TABLE $table_name (
 NO INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `form_title` VARCHAR(225) DEFAULT NULL,
 `order_data` LONGTEXT DEFAULT NULL,
 `contact_data` LONGTEXT DEFAULT NULL,
 `submission_date` VARCHAR(225) DEFAULT '-'

    );";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

}

// AP_SOFB_ORDERS_ADD_DEFAULTS();

}



?>