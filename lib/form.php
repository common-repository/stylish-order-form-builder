<?php 

$title= $active_form['form_title'];
$properties= $active_form['form_properties'];

$products= $active_form['form_products'];
$products = json_decode($products,true);

$all_products = AP_SOFB_GET_PRODUCTS(); // ALL Products from database
$prop = AP_SOFB_GET_PROP(); // ALL Properties from database
?>


<style type="text/css">
    :root{
        --sofb-head: #3f51b5; ?>/*#3f51b5*/; 
    }
</style>
<?php include 'style.php'; ?>
<div class="wpbox-sic-main wpbox-sic-card<?php echo $sofb_shadow;?>">
<form onsubmit="sofb_submit_order(this);return false;" id="SOFB-FORM-<?php echo $id; ?>" sofb-form-title="<?php echo $title; ?>">
<div class="sofb_responsive_table">	
<table style="width: 100%;min-width: 650px;" class="sofb-form-table">   
<thead class="sofb-head">
	<tr>
	<?php 
$all_properties = AP_SOFB_ARR2TEXT($properties,'prop');
$all_properties = explode(',', $all_properties);


for($i=0;$i<sizeof($all_properties);$i++){
	$all_properties[$i] = trim($all_properties[$i]);
}


for($j=0;$j<sizeof($prop);$j++){
	$property_name = $prop[$j]['prop_name'];
	if( in_array($property_name, $all_properties)  ){}else{continue;}
echo '<td><span data-sofb-collect-type="header">'.$property_name.'</span></td>';

}
?>
</tr>
</thead>
<tbody>
	<?php 


for($i=0;$i<sizeof($all_products);$i++){
$NO = $all_products[$i]['NO'];
if(in_array($NO, $products)){}else{continue;}
echo '<tr>';

for($j=0;$j<sizeof($prop);$j++){
	$property_name = $prop[$j]['prop_name'];
	
// 	if( in_array($property_name, $all_properties)  ){echo 'Found:'.$property_name.'<br>';}else{echo 'NOT_FOUND:'.$property_name.'<br>';continue;
// }

if( in_array($property_name, $all_properties)  ){}else{continue;}


    $product_specs = str_replace('\n', 'LINEBBREAK_SOFB', $all_products[$i]["product_data"]);
	$product_specs = html_entity_decode( stripslashes ( $product_specs ) );
	$product_specs = json_decode($product_specs,true);

    $product_data = 	json_encode($product_specs);

// print_r($product_specs);

$name = 'SOFB-'.date("his-mdY").'-'.rand(1,999);//$product_specs[$property_name]['name'];
$type = $product_specs[$property_name]['type'];
$value = $product_specs[$property_name]['value'];

$detail = create_element_sofb($name,$type,$value );

	echo '<td>'.$detail.'</td>';
}

echo '</tr>';
}

	?>

</tbody>

</table>
</div>

<center>
	<div style="height:80px;"></div>
	<div class="wpbox-sic-card" style="max-width: 800px;">
<table style="width: 100%;max-width:600px;" class="sofb-contact-form" id="CONTACT-SOFB-FORM-<?php echo $id; ?>">
	<tr>
		<td>Name*</td>
		<td><input type="text" sofb-contact-label="Name" name="sofb-name" id="sofb-name" value="" placeholder="Enter" required></td>
	</tr>

	<tr>
		<td>Email*</td>
		<td><input type="email" sofb-contact-label="Email" name="sofb-email" id="sofb-email" value="" placeholder="Enter (you@example.com)" required></td>
	</tr>

	<tr>
		<td>Phone (optional)</td>
		<td><input type="text" sofb-contact-label="Phone" name="sofb-phone" id="sofb-phone" value="" placeholder="Enter (+1 123 123 1234)"></td>
	</tr>

	<tr>
		<td>Message (optional)</td>
		<td><input type="text" sofb-contact-label="Message" name="sofb-msg" id="sofb-msg" value="" placeholder="Enter"></td>
	</tr>
</table>

<p id="sofb_submit_msg" style="text-align: center;"></p>
<center> <button type="submit" style="margin: 30px;" class="btn" id="sofb-submit-order-btn">Submit Order</button></center>
</div>

</center>


</form>
<div style="height: 50px;"></div>
</div>
<div style="height: 50px;"></div>

<script type="text/javascript">function sofb_get_admin_path(){return "<?php echo admin_url('admin-ajax.php'); ?>";}</script>

