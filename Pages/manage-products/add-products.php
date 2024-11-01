<?php include __DIR__.'/action.php'; ?>


<h1>Add New Product</h1>
<a href="?page=SOFB_demo_vid" style="font-size: 12px;color: red;">See Demo / Documentation</a>

<table style="width: 800px;" class="sofb-property-table" >   
<thead>
	<tr>
		<td></td>
		<td>Input Type</td>
		<td>Input Value</td>
	</tr>
</thead>
<tbody id="add-product-tab">
	<?php 

for($i=0;$i<sizeof($prop);$i++){
echo '
<tr>
<td>'.$prop[$i]['prop_name'].'</td>
<td>'.$prop[$i]['prop_type'].'</td>
<td default-name="'.$prop[$i]['default_name'].'">'.create_input_sofb($prop[$i]['prop_type'],$prop[$i]['prop_name']).'</td>
</tr>
';
}

	?>

</tbody>

</table>

<input type="hidden" name="UPDATE_PRODUCT" id="UPDATE_PRODUCT" value="-">

<button type="button" name="add-product" value="1"  class="kzr-btn kzr-green" style="margin-top: 20px;display: none;" onclick="sofb_addproduct()"> Add Product <i class="fas fa-plus-circle"></i></button>

<button type="button" onclick="sofb_pro_products()" id="add-product" class="kzr-btn kzr-green" style="margin-top: 20px;display: none_;"> Add Product <i class="fas fa-plus-circle"></i></button>

<button type="button" name="update-product" value="1" id="update-product" class="kzr-btn kzr-green kzr-update" style="margin-top: 20px;display: none;" onclick="sofb_addproduct()"> Update Product <i class="fas fa-sync-alt"></i></button>

<div style="height: 100px;">
	<p id="submit-msg-happs" class="status_sofb"></p>
</div>



<h1>All Product</h1>
<table style="width: 98%;" class="sofb-property-table">   
<thead>
	<tr>
		<?php 
$all_prop = $prop;
for($i=0;$i<sizeof($prop);$i++){
	echo '<td>'.$prop[$i]['prop_name'].'</td>';
}
		?>
		<td>Delete Product</td>
	</tr>
</thead>
<tbody id="sofb-all-products-list">
	<?php 
$all_products = AP_SOFB_GET_PRODUCTS();
for($i=0;$i<sizeof($all_products);$i++){
echo '<tr>';

for($j=0;$j<sizeof($prop);$j++){
	$property_name = $prop[$j]['prop_name'];
    // $product_data = $all_products[$i]["product_data"];
  $product_specs = str_replace('\n', 'LINEBBREAK_SOFB', $all_products[$i]["product_data"]);
	$product_specs = html_entity_decode( stripslashes ( $product_specs ) );
	$product_specs = json_decode($product_specs,true);

	    $product_data = 	json_encode($product_specs);

$name = $product_specs[$property_name]['name'];
$type = $product_specs[$property_name]['type'];
$value = $product_specs[$property_name]['value'];

$detail = create_element_sofb($name,$type,$value );

	echo '<td>'.$detail.'</td>';
}
$delete_product = '<span class="action-btns-sofb" product-del-id="'.$all_products[$i]['NO'].'"><i class="fas fa-trash-alt"></i></span>';
$edit = '<span class="action-btns-sofb" product-edit-id="'.$all_products[$i]['NO'].'"><i class="fas fa-edit"></i></span>';

echo '<td>'.
$delete_product.$edit.
'<textarea product-databox-id="'.$all_products[$i]['NO'].'" style="display:none;">'.$product_data.'</textarea>'.
'</td>';
echo '</tr>';
}

	?>

</tbody>

</table>


<div style="display: none;">
<form action="" method="post" >
	<input type="text" name="DEL_PRODUCT" id="DEL_PRODUCT" value="-">
	<button type="submit" name="DELETE_PRODUCT" id="confirm-del-product">submit</button>
</form>	
</div>





<style type="text/css">
	.sofb-property-table select,input{width: 100%;}
</style>


<div id="sofb-modal" class="modal" style="/*display: block*/;">
<center>
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h1>Unlock Full Power</h1>
    <div style="height:40px;"></div>
    
    <div style="font-size: 28px;">
    <p>Free version of <b>Stylish Form Builder</b> can add maximum of 05 products.</p>
    <p>Unlock full power - GO PRO</p>
    </div>

    <div style="height:40px;"></div>
    <a href="https://wppluginbox.com/en/stylish-order-form-builder-pro-pricing/" class="sofb-pro-btn">Go Pro</a>
  </div>
</center>
</div>
