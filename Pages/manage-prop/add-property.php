<?php include __DIR__.'/action.php'; ?>

<div style="display: none;">
<form action="" method="post" >
	<input type="text" name="DEL_PROP" id="DEL_PROP" value="-">
	<button type="submit" name="DELETE_PROPERTY" id="confirm-del-prop">submit</button>
</form>	
</div>


<table style="width: 800px;" class="sofb-property-table">   
<thead>
<tr>
	<td>Sr#</td>
	<td>Property Name</td>
	<td>Type</td>
	<td>Reorder Properties</td>
	<td>Action</td>
</tr>
</thead>

<tbody id="sofb-ordered-data">
	<?php 

for($i=0;$i<sizeof($prop);$i++){
	$def = $prop[$i]['default_name'];
	// echo $def;
	if($def == '-' || $def == ''){
		$del = '<span class="action-btns-sofb" property-del-id="'.$prop[$i]['NO'].'" title="Delete"><i class="fas fa-trash-alt"></i></span>';
		$default_name='-';
	}else{$del = '';$default_name= $def;}
echo '
<tr draggable="true" ondragstart="start_sofb()" ondragover="dragover_sofb()" default_name="'.$default_name.'">
<td>'.($i+1).'</td>
<td>'.$prop[$i]['prop_name'].'</td>
<td>'.$prop[$i]['prop_type'].'</td>
<td class="drag-sofb" style="color:black;">Drag <i class="fad fa-sort-alt"></i></td>
<td>
'.$del.'
<span class="action-btns-sofb" 
property-edit-id="'.$prop[$i]['NO'].'" 
data-p-name="'.$prop[$i]['prop_name'].'" 
data-p-type="'.$prop[$i]['prop_type'].'" 
title="Edit"><i class="fas fa-edit"></i>
</span>
</td>
</tr>

';
}

	?>

	
</tbody>
</table>

<button type="button" name="update-order" value="1" id="update-order" class="kzr-btn kzr-green" style="margin-top: 20px;display: none;" onclick="sofb_reorder()"> Save Configuration <i class="fas fa-sync-alt"></i></button>
<div style="height: 100px;">
	<p id="submit-msg-happs" class="status_sofb"></p>
</div>

<form method="post" action="" autocomplete="off">
<div>
	<table style="width:400px;">
		<tr>
			<td>Propert Name <i class="fas fa-info-circle" title="This will be column name on order form"></i></td>
			<td>
				<input type="text" class="khyzer" name="prop-name" id="prop-name" placeholder="Enter (Ex: Pack Size)" required>
				<input type="hidden" name="prop-no" id="prop-no">
			</td>
		</tr>

		<tr>
			<td>Propert Type <i class="fas fa-info-circle" title="This sets whether it will be a dropdown options , a text field for user to enter or a non-editable label like a product name."></i></td>
			<td>
				<input type="hidden" name="prop-index" id="prop-index" value="-">
				<select class="khyzer" name="prop-type" id="prop-type" required>
					<option value="Label / Non-Editable Field">Label / Non-Editable Field</option>
					<option value="Dropdown Option">Dropdown Option</option>
					<option value="Text Field">Text Field</option>
					<option value="Image">Image</option>
					<option value="Hyperlink">Hyperlink</option>
					<option value="checkbox">Checkbox</option>
				</select>
			</td>
		</tr>
	</table>
</div>


<p class="status_sofb"><?php echo $msg;?></p>
<button type="submit" name="add-prop" value="1" id="add-prop-real" class="kzr-btn kzr-green" style="margin-top: 20px;display: none;"> Add Property <i class="fas fa-plus-circle"></i></button>

<button type="button" onclick="sofb_pro_properties()" id="add-prop" class="kzr-btn kzr-green" style="margin-top: 20px;display: none_;"> Add Property <i class="fas fa-plus-circle"></i></button>



<button type="submit" name="update-prop" id="update-prop" value="1"  class="kzr-btn kzr-green kzr-update" style="margin-top: 20px;display: none;"> Update Property <i class="fas fa-sync-alt"></i></button>

</form>


<div id="sofb-modal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h1>Unlock Full Power</h1>
    <div style="height:40px;"></div>
    
    <div style="font-size: 28px;">
    <p>Free version of <b>Stylish Form Builder</b> can add maximum of 07 properties.</p>
    <p>Unlock full power - GO PRO</p>
    </div>

    <div style="height:40px;"></div>
    <a href="https://wppluginbox.com/en/stylish-order-form-builder-pro-pricing/" class="sofb-pro-btn">Go Pro</a>
  </div>

</div>




