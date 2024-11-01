<?php 

function sofb_create_select($name,$value){
$value = trim($value);
$options = '';
$skip = 0;

if( (strpos($value, 'LINEBBREAK_SOFB') !== false)  ) { 

$split_type = 'new_line';$x = explode('LINEBBREAK_SOFB', $value); $skip = 1;//echo 'SKIP-X<br>';
//==========================================================================
    for($i=0;$i<sizeof($x);$i++){
        if(trim($x[$i]) == ''){continue;}
    $options .= '<option value="'.$x[$i].'">'.$x[$i].'</option>';
   
}
//==========================================================================

}else if( (strpos($value, '-') !== false)  ){
    $split_type = 'dash';
    $x = explode('-', $value);
    $start = floatval($x[0]);$end = floatval($x[1]); $skip = 1;//echo 'SKIP-Y<br>';
//==========================================================================
    for($i=$start ;$i<=$end;$i++){
    $options .= '<option value="'.$i.'">'.$i.'</option>';
}
//==========================================================================


}


if($skip == '1'){}else{
        $options .= '<option value="'.$value.'">'.$value.'</option>';

}



$html = '
<select class="sofb_khyzer_select" data-sofb-collect-type="select" name="'.$name.'" id="'.$name.'">'.$options.'</select>
';

return $html;
}


function sofb_create_input($name,$value){
    $value = str_replace(PHP_EOL, '', $value);
    $value = str_replace('LINEBBREAK_SOFB', '', $value);

$html = '
<input type="text" class="sofb_khyzer_select" data-sofb-collect-type="input" name="'.$name.'" id="'.$name.'" placeholder="'.$value.'">
';

return $html;

}

function sofb_create_image($name,$value){
    $value = str_replace(PHP_EOL, '', $value);
    $value = str_replace('LINEBBREAK_SOFB', '', $value);
    $value = str_replace(' ', '', $value);

$html = '
<img class="sofb_khyzer_img" id="'.$name.'" data-sofb-collect-type="image" src="'.$value.'" style="height:100%;max-height:120px;">
';

return $html;

}

function sofb_create_hyperlink($name,$value){
$value = str_replace(PHP_EOL, '', $value);
$value = str_replace('LINEBBREAK_SOFB', '', $value);
$value = str_replace(' ', '', $value);

if (strpos($value, '|') !== false) { 

$value = explode('|', $value);
$link = trim($value[0]);
$label = trim($value[1]);

}else{

$link = trim($value);
$label = trim($value);

}


$html = '<a class="sofb_khyzer_link" id="'.$name.'" data-sofb-collect-type="hyperlink" href="'.$link.'">'.$label.'</a>';
// $html = '';
return $html;

}


function sofb_create_checkbox($name,$value){
if($value == 'checked'){$checked = 'checked';}else{$checked = '';}    
$html = '<input type="checkbox" class="sofb_khyzer_checkbox" data-sofb-collect-type="checkbox" id="'.$name.'" name="'.$name.'" '.$checked.'>';
return $html;

}



function create_element_sofb($name,$type,$value){
    // echo $name.'<br>';
    if($type == "Label / Non-Editable Field"){
    
    $value = str_replace(PHP_EOL, '', $value);
    $value = str_replace('LINEBBREAK_SOFB', '', $value);
    return '<span data-sofb-collect-type="label">'.$value.'</span>';

    }
    if($type == "Dropdown Option"){return sofb_create_select($name,$value);}
    if($type == "Text Field"){return sofb_create_input($name,$value);}
    if($type == "Image"){return sofb_create_image($name,$value);}
    if($type == "Hyperlink"){return sofb_create_hyperlink($name,$value);}
    if($type == "checkbox"){return sofb_create_checkbox($name,$value);}

}


?>