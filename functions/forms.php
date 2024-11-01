<?php 

function AP_SOFB_FORMS_DELDB(){

global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_forms";
     $sql = "DROP TABLE IF EXISTS $table_name";
     $wpdb->query($sql);

}

function AP_SOFB_FORMS_ADD($arr){
    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_forms";
     // $arr[1] = '1';
    $wpdb->insert($table_name, array(

'form_title' => trim($arr[0]),
'form_properties' => trim($arr[1]),
'form_products' => trim($arr[2])

));

    // echo $wpdb->print_error();
}



function AP_SOFB_FORMS_UPDATE($arr){
    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_forms";

    $wpdb->update($table_name, array(
    'form_title' => trim($arr[0]),   
    'form_properties' => trim($arr[1]),
    'form_products' => trim($arr[2])
)

,array('NO'=> trim($arr[3]))


);
}


function AP_SOFB_FORM_DEL($index){
    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_forms";
    $wpdb->delete( $table_name, array( 'NO' => $index 

));
}

function AP_SOFB_FORMS_CLEAR_DEFAULTS(){

    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_forms";
    $wpdb->query('TRUNCATE TABLE '.$table_name);

}

function AP_SOFB_FORMS_ADD_DEFAULTS(){
    $default = [

['TEST FORM 1','["1","2","3"]','["1","2","3"]'],
['TEST FORM 2','["1","2","3"]','["1","2"]']

];

//-------------------------------------------------
    for($i=0;$i<sizeof($default);$i++){
      AP_SOFB_FORMS_ADD($default[$i]);
    }
//-------------------------------------------------

}



function AP_SOFB_FORMS_createDB(){
global $wpdb;
$table_name = $wpdb->prefix . "happs_SOFB_forms";

if ( $wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name ) {

    $sql = "CREATE TABLE $table_name (
 NO INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `form_title` VARCHAR(22) DEFAULT NULL,
 `form_properties` LONGTEXT DEFAULT NULL,
 `form_products` LONGTEXT DEFAULT NULL

    );";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

}

AP_SOFB_FORMS_ADD_DEFAULTS();

}



?>