<table id="sofb-form-products">
<?php 
$all_products = AP_SOFB_GET_PRODUCTS();

for($i=0;$i<sizeof($all_products);$i++){
echo '
<tr>
<td><input sofb-add-product="'.$all_products[$i]['NO'].'" type="checkbox"  checked></td>
<td>'.$all_products[$i]['product_title'].'</td>
</tr>
';
}

?>
</table>