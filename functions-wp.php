<?php

function SOFB_scripts() {
global $post;

      //=========
    if( has_shortcode( $post->post_content, 'stylish-order-form-builder') ) {


//------------ PLAYER-----

wp_enqueue_script( 'script_p3', plugins_url('/lib/js/formatters.js', __FILE__) ); 
wp_enqueue_script( 'script_p5', plugins_url('/lib/js/script.js', __FILE__), array('jquery'),'2.1',1 ); 


wp_enqueue_style( 'style_p1', plugins_url('/lib/css/skin.css', __FILE__) );


//--------------------        


    }

      //=========
 }


 function AP_SOFB_GET_PROP(){
    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_properties";
    
$all_rows = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY prop_index");
$all_rows = json_decode(json_encode($all_rows), true);
return $all_rows;   
}

function AP_SOFB_GET_PRODUCTS(){
    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_products";
    
$all_rows = $wpdb->get_results( "SELECT * FROM $table_name");
$all_rows = json_decode(json_encode($all_rows), true);
return $all_rows;   
}

function AP_SOFB_GET_FORMS(){
    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_forms";
    
$all_rows = $wpdb->get_results( "SELECT * FROM $table_name");
$all_rows = json_decode(json_encode($all_rows), true);
return $all_rows;   
}

function AP_SOFB_GET_ORDERS(){
    global $wpdb;
    $table_name = $wpdb->prefix . "happs_SOFB_orders";
    
$all_rows = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY NO DESC");
$all_rows = json_decode(json_encode($all_rows), true);
return $all_rows;   
}



function AP_SOFB_GET_DETAIL($index,$table){
    global $wpdb;
    if($table == 'products'){$tb = 'happs_SOFB_products';}else{$tb = 'happs_SOFB_properties';}
    $table_name = $wpdb->prefix . $tb;
    // if($tb == 'happs_SOFB_properties'){$order_by = 'ORDER BY prop_index';}else{$order_by ='';}
    
$all_rows = $wpdb->get_results( "SELECT * FROM $table_name WHERE NO='$index' ");
$all_rows = json_decode(json_encode($all_rows), true);
return $all_rows;   
}



function AP_SOFB_ARR2TEXT($arr,$type){
       $indexes = json_decode($arr,true);
       // echo '<pre>'; print_r($indexes);echo '</pre>';
    $text_labels = [];
for($i=0;$i<sizeof($indexes);$i++){
//=================================
if($type == 'prop'){
    $text = AP_SOFB_GET_DETAIL($indexes[$i],'properties')[0]['prop_name'];
    if($text == ''){continue;} // in case if property is deleted by admin
    // echo 'XX='.$text.'<br>';
    array_push($text_labels, $text);
}
//==================================   
//=================================
if($type == 'prod'){
    $text = AP_SOFB_GET_DETAIL($indexes[$i],'products')[0]['product_title'];
    array_push($text_labels, $text);
}
//==================================   


}

$text_labels = implode(",\n",$text_labels);
return $text_labels;   
}

 

 function SOFB_initiate($atts, $content = null){

    extract(shortcode_atts(array(
      "id" => '1',    
   ), $atts));
   

//============= PLAYER CONTENT ==========
ob_start();
include 'lib/index.php';
$output = ob_get_clean();
return $output;
//====================================== 


   
}

?>