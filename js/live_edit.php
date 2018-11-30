<?php
include_once("conexion.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {	
	$update_field='';
	if(isset($input['1'])) {
		$update_field.= "nro_req='".$input['1']."'";
	} else if(isset($input['2'])) {
		$update_field.= "fecha_entrega='".$input['2']."'";
	} else if(isset($input['3'])) {
		$update_field.= "area_of='".$input['3']."'";
	} else if(isset($input['4'])) {
		$update_field.= "detalle='".$input['4']."'";
	} else if(isset($input['5'])) {
		$update_field.= "ref='".$input['5']."'";
	} else if(isset($input['6'])) {
		$update_field.= "presu='".$input['6']."'";
	} else if(isset($input['7'])) {
		$update_field.= "costo='".$input['7']."'";
	} else if(isset($input['8'])) {
		$update_field.= "resp='".$input['8']."'";
	} else if(isset($input['9'])) {
		$update_field.= "estado='".$input['9']."'";
	} else if(isset($input['11'])) {
		$update_field.= "fecha_entregado='".$input['11']."'";
	} else if(isset($input['12'])) {
		$update_field.= "enviado='".$input['12']."'";
	} else if(isset($input['15'])) {
		$update_field.= "diseno='".$input['15']."'";
	} else if(isset($input['16'])) {
		$update_field.= "obs='".$input['16']."'";
	}	
	if($update_field && $input['id']) {
		$sql_query = "UPDATE request SET $update_field WHERE id='" . $input['id'] . "'";	
		mysqli_query($con, $sql_query) or die("database error:". mysqli_error($con));		
	}
}


