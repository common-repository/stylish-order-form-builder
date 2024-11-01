<?php 

$msg = '';

if(isset($_POST['add-prop'])){
 AP_SOFB_PROPERTY_ADD([
     $_POST['prop-index'],
 	 $_POST['prop-name'],
 	 $_POST['prop-type']
 	]);
$msg = 'Property created successfully!';
}


if(isset($_POST['update-prop'])){
 AP_SOFB_PROPERTY_UPDATE([
 	 $_POST['prop-name'],
 	 $_POST['prop-type'],
 	 $_POST['prop-no'],
     $_POST['prop-index']
 	]);
$msg = 'Property updated successfully!';
}


if(isset($_POST['DELETE_PROPERTY'])){
 AP_SOFB_PROPERTY_DEL(
 	 $_POST['DEL_PROP']);
$msg = 'Property deleted successfully!';
}

?>

<?php 
$prop = AP_SOFB_GET_PROP();
// echo '<pre>';print_r($prop);echo '</pre>';
?>