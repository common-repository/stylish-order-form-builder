<?php include __DIR__.'/action.php'; ?>

<a href="?page=SOFB_demo_vid" style="font-size: 12px;color: red;">See Demo / Documentation</a>
<h1 class="sofb-heading__">Create New Form</h1>
<div></div>
<select id="sofb_bulk_action_forms">
	<option value="1">Select All Properties</option>
	<option value="2">Select All Products</option>
	<option value="3">Unselect All Properties</option>
	<option value="4">Unselect All Products</option>

</select>

<button type="button" class="btn sofb-apply-btn" onclick="sofb_bulk_action()">Apply Bulk Action</button>
<hr>

<p>
	Form Title (optional): <input type="text" name="sofb-form-title" id="sofb-form-title" placeholder="Enter Form title">
</p>
<table style="width: 800px;" class="create-form"> 
<thead>
<tr>
	<td>Choose Properties</td>
	<td>Choose Products</td>
</tr>
</thead>

<tbody>  
	<tr>
		<td><?php include __DIR__.'/includes/all-properties.php'; ?></td>
		<td><?php include __DIR__.'/includes/all-products.php'; ?></td>
	</tr>
</tbody>	
	
</table>

<input type="hidden" name="UPDATE_FORM_ID" id="UPDATE_FORM_ID" value="-">
<button type="button" name="add-form" value="1" id="add-form" class="kzr-btn kzr-green" style="margin-top: 20px;display: none_;" onclick="sofb_createForm()"> Create Form <i class="fas fa-plus-circle"></i></button>

<button type="button" name="update-form" value="1" id="update-form" class="kzr-btn kzr-green kzr-update" style="margin-top: 20px;display: none;" onclick="sofb_createForm()"> Update Form <i class="fas fa-sync-alt"></i></button>

<div style="height: 100px;">
	<p id="submit-msg-happs" class="status_sofb"></p>
</div>



<h1>All Forms</h1>
<table style="width: 1200px;" class="sofb-property-table">   
<thead>
	<tr>
		<td>Form Title</td>
		<td>Properties</td>
		<td>Products</td>
		<td>Short Code</td>
		<td>Action</td>
	</tr>
</thead>
<tbody>
<?php 
$all_forms = AP_SOFB_GET_FORMS();
// echo sizeof($all_forms);return 0;
for($i=0;$i<sizeof($all_forms);$i++){
$title= $all_forms[$i]['form_title'];
$properties= $all_forms[$i]['form_properties'];
$products= $all_forms[$i]['form_products'];

$delete = '<span class="action-btns-sofb" form-del-id="'.$all_forms[$i]['NO'].'"><i class="fas fa-trash-alt"></i></span>';
$edit = '
<span class="action-btns-sofb" 
form-edit-id="'.$all_forms[$i]['NO'].'" 
data-form-title="'.$all_forms[$i]['form_title'].'" 
data-prop="'.implode('##',json_decode($all_forms[$i]['form_properties']) ).'" 
data-produ="'.implode('##',json_decode($all_forms[$i]['form_products']) ).'" 
><i class="fas fa-edit"></i>
</span>';
echo '

<tr>
<td>'.$title.'</td>
<td><textarea>'.AP_SOFB_ARR2TEXT($properties,'prop').'</textarea></td>
<td><textarea>'.AP_SOFB_ARR2TEXT($products,'prod').'</textarea></td>
<td><xmp>[stylish-order-form-builder id="'.$all_forms[$i]['NO'].'"]</xmp></td>
<td>'.$delete.' '.$edit.'</td>
</tr>

';
}
?>	
</tbody>

</table>


<div style="display: none;">
<form action="" method="post" >
	<input type="text" name="DEL_FORM" id="DEL_FORM" value="-">
	<button type="submit" name="DELETE_FORM" id="confirm-del-form">submit</button>
</form>	
</div>


<style type="text/css">
	.create-form thead tr{background-color: #4caf50;color: white;}
	.create-form tr td{padding: 8px;vertical-align: top;text-align: left;}
.sofb-apply-btn,.sofb-apply-btn:hover{
    background-color: #3f51b5;
    color: white;
    padding: 4px;
    border: 1px solid #3f51b5;
    cursor: pointer;
    width: 157px;
    outline: none;
}


.sofb-heading {
    background-color: #4caf50;
    width: 100%;
    max-width: 300px;
    padding: 4px;
    color: white;
    margin: 20px 0;
    text-align: center;
}
</style>