<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<title></title>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<style type="text/css">
	.header-row{background-color:#3f51b5;color: white;border: 1px solid white;}
	table ,td, tr {border: 1px solid black;text-align: center;}
	.print-btn{
		background-color: red;color: white;border: 1px solid white;padding: 12px;cursor: pointer;
	}

	@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>

<script type="text/javascript">
	function print_order() {
		$('.print-btn').hide();
		window.print();
		$('.print-btn').show();

	}
</script>
</head>
<body>

	<?php 
$ORDER_ID = $_GET['ORDER_ID'];
$submission_date = $_GET['submission_date'];
$form_title = $_GET['form_title'];
$order_data = $_GET['order_data'];
$contact_data = $_GET['contact_data'];
?>

<div style="margin:auto;width: 95%;font-family: monospace;font-size: 16px;">

<span><b>Order No:</b> <?php echo $ORDER_ID; ?></span><br>
<span><b>Form Title:</b><?php echo $form_title; ?></span><br>
<span><b>Submission Date:</b></span><script type="text/javascript">document.write( new Date("<?php echo $submission_date ;?>").toLocaleString() );</script></span>

<?php

function filter_ele($value,$type){
$html = $value;
if($type == 'image'){ $html = '<img src="'.$value.'" style="width:100%;max-width:100px;">';}
if($type == 'checkbox'){ $html = $value; if($html == 'false'){$html = '';}}

return stripslashes($html);
} 

$order_data = json_decode(base64_decode($order_data),true);
$contact_data = json_decode(base64_decode($contact_data),true);

// echo '<pre>';print_r($contact_data);echo '</pre>';


?>

<table style="width: 100%; border-collapse: collapse;margin-top: 40px;font-size: 16px;">
<?php 
for($i=0;$i<sizeof($order_data);$i++){
$columns = $order_data[$i];

if($i == '0'){$class_head = 'class="header-row"';}else{$class_head = '';}
echo '<tr '.$class_head.'>';

for($j=0;$j<sizeof($columns);$j++){
echo '<td>'.filter_ele($columns[$j]['value'],$columns[$j]['type']).'</td>';
}

echo '</tr>';


}
?>
</table>

<h2 style="margin-top: 40px;">Contact Details</h2>
<table style="width: 100%; max-width: 800px;border-collapse: collapse;font-size: 16px;">
<?php 
for($i=0;$i<sizeof($contact_data);$i++){
echo '<tr>';
echo '<td>'.$contact_data[$i][0]['type'].'</td>';
echo '<td>'.$contact_data[$i][0]['value'].'</td>';
echo '</tr>';


}
?>
</table>
<button type="button" class="btn no-print print-btn" style="margin:40px;" onclick="print_order()">Print this order</button>
</div>



</body>
</html>



