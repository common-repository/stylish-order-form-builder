<table id="sofb-form-properties">
<?php 

for($i=0;$i<sizeof($prop);$i++){
echo '
<tr>
<td><input sofb-add-property="'.$prop[$i]['NO'].'"  type="checkbox"  checked></td>
<td>'.$prop[$i]['prop_name'].'</td>
</tr>
';
}

?>
</table>

