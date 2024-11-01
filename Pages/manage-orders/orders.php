<h1>All Orders (View / Print)</h1>
<hr>

<table style="width: 1200px;" class="sofb-property-table">   
<thead>
	<tr>
		<td>Submission Date</td>
		<td>Form Title</td>
		<td>View  / Print</td>	
	</tr>
</thead>
<tbody>
<?php 
$all_orders = AP_SOFB_GET_ORDERS();

for($i=0;$i<sizeof($all_orders);$i++){
echo '<tr>';	
$submission_date = $all_orders[$i]['submission_date'];
$form_title = $all_orders[$i]['form_title'];
$order_data = ( $all_orders[$i]['order_data'] );
$contact_data = ( $all_orders[$i]['contact_data'] );
$order_no = $all_orders[$i]['NO'];
$targ_link = plugins_url('/view.php',__FILE__);

$view_link = '?page=SOFB_manage_orders&SOFB_ORDER_ID='.$order_no;


echo '
<td><script type="text/javascript">document.write( new Date("'.$submission_date.'").toLocaleString() );</script></td>
<td>'.$form_title.'</td>
<td>

<form action="'.$targ_link.'" method="get" target="_blank">
	<input type="hidden" name="ORDER_ID" id="ORDER_ID" value="'.$order_no.'">
	<input type="hidden" name="submission_date" id="submission_date" value="'.$submission_date.'">
	<input type="hidden" name="form_title" id="form_title" value="'.$form_title.'">
	<input type="hidden" name="order_data" id="order_data" value="'.base64_encode($order_data).'">
	<input type="hidden" name="contact_data" id="contact_data" value="'.base64_encode($contact_data).'">
    <button type="submit" class="btn">View / Print</button>
</form>

</td>	
';
echo '</tr>';

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
	.create-form thead tr{background-color: black;color: white;}
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