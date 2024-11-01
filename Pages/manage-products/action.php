<?php 

$msg = '';

if(isset($_POST['DELETE_PRODUCT'])){
 AP_SOFB_PRODUCTS_DEL(
 	 $_POST['DEL_PRODUCT']);
$msg = 'Product deleted successfully!';
}

?>

<?php 
function create_input_sofb($type,$name){
$html = '-';
$type = trim($type);

if($type == 'Label / Non-Editable Field'){
$html = '
<textarea data-name="'.$name.'" data-type="'.$type.'" placeholder="Enter Label" title="This label will not be editable by user on webpage" required></textarea>
';
}

if($type == 'Dropdown Option'){
$html = '
<textarea data-name="'.$name.'" data-type="'.$type.'" placeholder="option 1 &#10;option 2 &#10;option 3" title="Enter options (one per line)" required></textarea>
';
}

if($type == 'Text Field'){
$html = '
<textarea data-name="'.$name.'" data-type="'.$type.'" placeholder="Set Placeholder (optional)" title="Set placeholder for this input field"></textarea>
';
}

if($type == 'Image'){
$html = '
<textarea data-name="'.$name.'" data-type="'.$type.'" placeholder="Insert Image url (https://yourimageurl)" title="Set url for the image"></textarea>
';
}

if($type == 'Hyperlink'){
$html = '
<textarea data-name="'.$name.'" data-type="'.$type.'" placeholder="https://example.com | Your Link Label" title="Set url for the image"></textarea>
';
}

if($type == 'checkbox'){
$html = '
<select data-name="'.$name.'" data-type="'.$type.'" title="">
<option value="checked">By Default Checked</option>
<option value="">By Default Unchecked</option>
</select>
';
}


return $html;
}
?>

<?php 
$prop = AP_SOFB_GET_PROP();
// echo '<pre>';print_r($prop);echo '</pre>';
?>