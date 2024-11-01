<?php 

$all_forms = AP_SOFB_GET_FORMS();
// echo '<pre>';print_r($all_forms);echo '</pre>';
// $current_form = $all_forms[]

for($i=0;$i<sizeof($all_forms);$i++){
	if ($all_forms[$i]['NO'] == $id){$active_form = $all_forms[$i];break;}else{$active_form= '-';}
}

if($active_form == '-'){
	echo '<p style="text-align:center;color:red;font-weight:bold;">Form Not Found</p>';
}else{

include 'form.php';
}



?>


