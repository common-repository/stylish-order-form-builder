<?php
function SOFB_ADMIN_CSS(){
$web_url =  sanitize_url( $_SERVER['REQUEST_URI'] );
if (strpos($web_url, '?page=SOFB') !== false) {
    
wp_enqueue_style( 'sofb_admin_style_1', plugins_url('Pages/admin-css.css?v=3.1', __FILE__) );


wp_enqueue_script('sofb_admin_script_1',plugins_url('Pages/manage-prop/re-order-js.js', __FILE__),1 ,1,1 );
wp_enqueue_script('sofb_admin_script_2',plugins_url('Pages/manage-products/add-product-js.js', __FILE__),1 ,1,1 );
wp_enqueue_script('sofb_admin_script_3',plugins_url('Pages/manage-forms/forms-js.js', __FILE__),1 ,1,1 );

wp_enqueue_script('sofb_admin_script_4',plugins_url('Pages/pro.js', __FILE__),1 ,1,1);

wp_enqueue_script('sofb_admin_script5',plugins_url('JS/pages.js', __FILE__),1 ,2,1 );
wp_enqueue_script('sofb_admin_script6',plugins_url('JS/ifresiz.js', __FILE__),1 ,2,1 );

}

}

function SOFB_home(){include 'Pages/activation.php';}
function SOFB_add_property() {include 'Pages/manage-prop/settings.php'; }
function SOFB_add_product() {include 'Pages/manage-products/settings.php';}
function SOFB_manage_forms() {include 'Pages/manage-forms/settings.php';}
function SOFB_manage_orders() {include 'Pages/manage-orders/settings.php';}
function SOFB_manage_settings() {include 'Pages/settings/settings.php';}
function SOFB_demo_vid() {include 'Pages/how-it-works.php';}
function SOFB_go_pro() {include 'Pages/pro.php';}




function SOFB_CSSJS() {
    wp_enqueue_style( 'sofb_style1', plugins_url('CSS/style.css?v=2.1', __FILE__) );
    wp_enqueue_style( 'sofb_style2', plugins_url('JS/tipx/jqu.css', __FILE__) );
    wp_enqueue_style( 'sofb_style3', plugins_url('JS/tipx/style.css', __FILE__) );
    wp_enqueue_script( 'jquery-ui-tooltip' );


     wp_enqueue_script('sofb_script1',plugins_url('JS/a81368914c.js', __FILE__),1 ,1,0 );
     wp_enqueue_script('sofb_script2',plugins_url('wpbox-admin.js', __FILE__),1 ,1,1 );
     wp_enqueue_script('sofb_script3',plugins_url('JS/feedback.js', __FILE__),1 ,2,1 );

  

}


function sofb_createForm(){
$properties = $_POST['properties'];
$products =   $_POST['products'];
$form_title = $_POST['form_title'];

$is_update = $_POST['update_form_id'];

// print_r($properties);return 0;

$properties= json_encode($properties);
$products= json_encode($products);

 $data = [$form_title,$properties,$products,$is_update];

 if($is_update == '-' || $is_update == ''){AP_SOFB_FORMS_ADD($data);}else{
    AP_SOFB_FORMS_UPDATE($data);
 }


wp_die();
}


function sofb_addproduct(){
$product_name = $_POST['product_name'];
$product_data =   $_POST['product_data'];
$is_update = $_POST['UPDATE'];

// print_r($product_name);

 $data = [$product_name,$product_data,$is_update];

 if($is_update == '-' || $is_update == ''){AP_SOFB_PRODUCTS_ADD($data);}else{
    AP_SOFB_PRODUCTS_UPDATE($data);
 }


wp_die();
}

function sofb_orderform_data(){
    $form_title =  $_POST['form_title'] ;
    $form_data =  json_encode($_POST['form_var']) ;
    $form_contact =  json_encode($_POST['form_contact']) ;
    $submit_date =  gmdate("Y-m-d\TH:i:s\Z") ; //console.log(new Date(time).toLocaleString()); // my timezone
    
    $arr = [$form_title,$form_data,$form_contact,$submit_date];
    
    // print_r($arr);

    AP_SOFB_ORDERS_ADD($arr);
    
    wp_die();
}



function sofb_re_order(){

$form_data =  $_POST['reorder'] ;
        // print_r($form_data);return 0;
 // AP_SOFB_PROPERTY_CLEAR_DEFAULTS();

        for($i=0;$i<sizeof($form_data);$i++){
      AP_SOFB_PROPERTY_REARRANGE_UPDATE($form_data[$i]);
    }
    // print_r($_POST);

    wp_die();

}



function SOFB_menu() {
  

  add_menu_page ( 'Menu', 'Stylish Order Form Builder Lite', 'manage_options', 'MAINMENUSOFB', 'SOFB_home', 'dashicons-cart' );
  add_submenu_page ( 'MAINMENUSOFB', 'SOFB_demo_vid', 'How it works?', 'manage_options','SOFB_demo_vid' ,'SOFB_demo_vid', '');

  add_submenu_page ( 'MAINMENUSOFB', 'SOFB_add_property', 'Manage Property', 'manage_options','SOFB_add_property' ,'SOFB_add_property', '');
  add_submenu_page ( 'MAINMENUSOFB', 'SOFB_add_products', 'Manage products', 'manage_options','SOFB_add_products' ,'SOFB_add_product', '');
  add_submenu_page ( 'MAINMENUSOFB', 'SOFB_manage_forms', 'Manage Forms', 'manage_options','SOFB_manage_forms' ,'SOFB_manage_forms', '');
  add_submenu_page ( 'MAINMENUSOFB', 'SOFB_manage_orders', 'Manage Orders', 'manage_options','SOFB_manage_orders' ,'SOFB_manage_orders', '');
  add_submenu_page ( 'MAINMENUSOFB', 'SOFB_manage_settings', 'Settings', 'manage_options','SOFB_manage_settings' ,'SOFB_manage_settings', '');

  add_submenu_page ( 'MAINMENUSOFB', 'SOFB_go_pro', 'Go Pro', 'manage_options','SOFB_go_pro' ,'SOFB_go_pro', '');



  

}?>