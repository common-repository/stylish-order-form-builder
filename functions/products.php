<?php 

function AP_SOFB_PRODUCTS_DELDB(){

global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_products";
     $sql = "DROP TABLE IF EXISTS $table_name";
     $wpdb->query($sql);

}

function AP_SOFB_PRODUCTS_ADD($arr){
    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_products";
  
  //============================
    $PLUGIN_VERSION = sizeof(AP_SOFB_GET_PRODUCTS());
    $mlt = (2 + 1 + 2);
    if($PLUGIN_VERSION >= $mlt){return 0;}
  //============================  

    $wpdb->insert($table_name, array(

'product_title' => trim($arr[0]),
'product_data' => trim($arr[1]),

));

    // echo $wpdb->print_error();

}




function AP_SOFB_PRODUCTS_UPDATE($arr){
    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_products";

    $wpdb->update($table_name, array(
    'product_title' => trim($arr[0]),
    'product_data' => trim($arr[1])
)

,array('NO'=> trim($arr[2]))


);
}


function AP_SOFB_PRODUCTS_DEL($index){
    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_products";
    $wpdb->delete( $table_name, array( 'NO' => $index 

));
}

function AP_SOFB_PRODUCTS_CLEAR_DEFAULTS(){

    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_products";
    $wpdb->query('TRUNCATE TABLE '.$table_name);

}

function AP_SOFB_PRODUCTS_ADD_DEFAULTS(){
    $default = [

['Nikee Shoes','{\"Product Title\":{\"type\":\"Label / Non-Editable Field\",\"value\":\"Nikee Shoes\"},\"Size\":{\"type\":\"Dropdown Option\",\"value\":\"XL\\nXXL\\nXXXL\\n\"},\"Quantity\":{\"type\":\"Dropdown Option\",\"value\":\"10\\n50\\n100\"},\"Discription\":{\"type\":\"Text Field\",\"value\":\"Message (optional)\"}}'],

["Nikee T shirt",'{\"Product Title\":{\"type\":\"Label / Non-Editable Field\",\"value\":\"Nikee T shirt\"},\"Size\":{\"type\":\"Dropdown Option\",\"value\":\"XL\\nXXL\\nXXXL\\n\"},\"Quantity\":{\"type\":\"Dropdown Option\",\"value\":\"1-1000\"},\"Discription\":{\"type\":\"Text Field\",\"value\":\"Message (optional)\"}}']

];

//-------------------------------------------------
    for($i=0;$i<sizeof($default);$i++){
      AP_SOFB_PRODUCTS_ADD($default[$i]);
    }
//-------------------------------------------------

}



function AP_SOFB_PRODUCTS_createDB(){
global $wpdb;
$table_name = $wpdb->prefix . "happs_SOFB_products";

if ( $wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name ) {

    $sql = "CREATE TABLE $table_name (
 NO INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `product_title` VARCHAR(255) DEFAULT NULL,
 `product_data` LONGTEXT DEFAULT NULL

    );";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

}

AP_SOFB_PRODUCTS_ADD_DEFAULTS();

}



?>