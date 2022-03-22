<?php
header('Content-type: application/json; charset=utf-8');

require_once '../../../dbconnect/database.class.php';

$objDB = new DataBase;
$id = $_POST['id'];
$dataf=date_create($_POST['fecha']);
$fecha=date_format($dataf,"Y-m-d");
$incidente_data = [
	'fk_id_incidente' =>  $_POST['fk_id_incidente'],
	'fecha' => (string)$fecha,
	'hora' =>  $_POST['hora'],
	'descripcion' =>  $_POST['descripcion']
];

if($id==0){ // Nuevo
	$r = $objDB->Insert('sol_incidente', $incidente_data);
	if($r['result']){
		$arr = ['resultado' => true, 'mensaje' => 'Detalle Creado', 'id_sol_incidente' => $r['insert_id'] ];
	}else{
		$arr = ['resultado' => false, 'mensaje' => $r['error']];
	}
}else{ // Update
	$r = $objDB->Update('incidente', $incidente_data, ["id_sol_incidente" => $id]);
	if($r['result']){
		$arr = ['resultado' => true, 'mensaje' => 'Detalle Actualizado' ];
	}else{
		$arr = ['resultado' => false, 'mensaje' => $r['error']];
	}
}
die(json_encode($arr));
