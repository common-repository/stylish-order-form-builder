<?php 

$msg = '';

if(isset($_POST['DELETE_FORM'])){
 AP_SOFB_FORM_DEL(
 	 $_POST['DEL_FORM']);
$msg = 'Product deleted successfully!';
}

?>



<?php 
$prop = AP_SOFB_GET_PROP();
// echo '<pre>';print_r($prop);echo '</pre>';
?>