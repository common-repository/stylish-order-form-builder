<?php 

function AP_SOFB_PROPERTY_DELDB(){

global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_properties";
     $sql = "DROP TABLE IF EXISTS $table_name";
     $wpdb->query($sql);

}

function AP_SOFB_PROPERTY_ADD($arr){
    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_properties";

//============================
    $PLUGIN_VERSION = sizeof(AP_SOFB_GET_PROP());
    $mlt = (0.1+1+5+0.9);
    if($PLUGIN_VERSION >= $mlt){return 0;}
  //============================ 

    $wpdb->insert($table_name, array(
'prop_index' => trim($arr[0]),
'prop_name' => trim($arr[1]),
'prop_type' => trim($arr[2]),
'default_name' => trim($arr[3])

));
}




//===================================================================================
function AP_SOFB_PRODUCT_DATA_UPDATE($arr){
    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_products";

    $wpdb->update($table_name, array(
    'product_data' => trim($arr[0])
) ,array('NO'=> trim($arr[1]))
);
return 1;
}

function AP_SOFB_SEND_PRODUCTS_PROP_UPDATE($Previous_Name_Type,$New_Name_Type){
    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_products";
    
$all_rows = $wpdb->get_results( "SELECT * FROM $table_name");
$all_rows = json_decode(json_encode($all_rows), true);

$p_prop_name = $Previous_Name_Type[0]['prop_name'];
$p_prop_type = $Previous_Name_Type[0]['prop_type'];

$n_prop_name = $New_Name_Type[0];
$n_prop_type = $New_Name_Type[1];


for($i=0;$i<sizeof($all_rows);$i++){
    // echo '<pre>';print_r($all_rows[$i]['product_data']);echo '</pre>';
      $previous_data = $all_rows[$i]['product_data'];
      $find = '\"'.$p_prop_name.'\"';
      $replace = '\"'.$n_prop_name.'\"';

      if (strpos($previous_data, $find) !== false) { }else{continue;}
      
      $new_data = str_replace($find, $replace, $previous_data);
      
      $part1 = '\"'.$n_prop_name.'\":{\"type\":\"';
      $chunk1 = explode($part1, $new_data);
      $chunk2 = explode('\"', $chunk1[1]);
      $part2 =  $n_prop_type;//.implode('\"', $chunk2);
       
       $chunk2[0] = '';
       $chunk2 = implode('\"', $chunk2);
       // print_r($chunk2);
      $new_data = $chunk1[0].$part1.$part2.$chunk2;

    //================================= UPDATE =========
    $index = $all_rows[$i]['NO'];
    // echo '<br>INDEX:'.$index.'<br>';  
    $wpdb->update($table_name, array( 'product_data' => trim($new_data) ) ,array('NO'=> trim($index)) );
    //==================================================

}

// AP_SOFB_PRODUCT_DATA_UPDATE($arr); //[product_data,index];


// echo '<pre>';print_r([$p_prop_name,$p_prop_type]);echo '</pre>';
// echo '<pre>';print_r([$n_prop_name,$n_prop_type]);echo '</pre>';

return 1;
}
//===================================================================================
function AP_SOFB_GET_CURRENT_PROP_NAME_TYPE($index){
    global $wpdb;
    $table_name = $wpdb->prefix . "happs_sofb_properties";
    
$all_rows = $wpdb->get_results( "SELECT * FROM $table_name WHERE NO='$index' ");
$all_rows = json_decode(json_encode($all_rows), true);
return $all_rows;   
}


function AP_SOFB_PROPERTY_UPDATE($arr){
    // print_r($arr);
    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_properties";

//============ GET OLD PROPERTIES FROM INDEX  =================
$previous_data = AP_SOFB_GET_CURRENT_PROP_NAME_TYPE($arr[2]);
//=============================================================
// echo '-------- '.trim($arr[0]) .'------';

    $wpdb->update($table_name, array(        
    'prop_name' => trim($arr[0]),
    'prop_type' => trim($arr[1])
    // 'prop_index' => trim($arr[3]),

)

,array('NO'=> trim($arr[2]))
);

//============ UPDATE NEW PROPERTY IN PRODUCTS  =================
$current_data = AP_SOFB_SEND_PRODUCTS_PROP_UPDATE($previous_data,$arr);
//=============================================================

}

function AP_SOFB_PROPERTY_REARRANGE_UPDATE($arr){
    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_properties";


    $wpdb->update($table_name, array(        
    'prop_index' => trim($arr[0])
    // 'prop_name' => trim($arr[1]),
    // 'prop_type' => trim($arr[2]),
)

,array('prop_name'=> trim($arr[1]))
);



}


function AP_SOFB_PROPERTY_DEL($index){
    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_properties";
    $wpdb->delete( $table_name, array( 'NO' => $index 

));
}

function AP_SOFB_PROPERTY_CLEAR_DEFAULTS(){

    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_properties";
    $wpdb->query('TRUNCATE TABLE '.$table_name);

}

function AP_SOFB_PROPERTY_ADD_DEFAULTS(){
    $default = [

[1,"Product Title","Label / Non-Editable Field","product_title"],
[2,"Size","Dropdown Option",'-'],
[3,"Quantity","Dropdown Option",'-'],
[4,"Discription","Text Field",'-']
];

//-------------------------------------------------
    for($i=0;$i<sizeof($default);$i++){
      AP_SOFB_PROPERTY_ADD($default[$i]);
    }
//-------------------------------------------------

}



function AP_SOFB_PROPERTY_createDB(){
global $wpdb;
$table_name = $wpdb->prefix . "happs_SOFB_properties";

if ( $wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name ) {

    $sql = "CREATE TABLE $table_name (
 NO INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `prop_index` VARCHAR(255) DEFAULT NULL,
 `prop_name` VARCHAR(255) DEFAULT NULL,
 `prop_type` VARCHAR(255) DEFAULT NULL,
 `default_name` VARCHAR(255) DEFAULT '-'

    );";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

}

AP_SOFB_PROPERTY_ADD_DEFAULTS();

}


?>