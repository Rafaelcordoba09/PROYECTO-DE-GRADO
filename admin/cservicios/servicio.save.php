<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
header('Content-type: application/json; charset=utf-8');

require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;

$id = $_POST['id'];
$servicio_data = [
	'proveedor' => $_POST['proveedor'],
	'frecuencia' => $_POST['frecuencia'],
	'descripcion' =>  $_POST['descripcion'],
	'capacidad' =>  $_POST['capacidad'],
	'fk_id_nodo' => $_POST['fk_id_nodo']
];

if($id==0){ // Nuevo
	$r = $objDB->Insert('servicio', $servicio_data);
	if($r['result']){
		$arr = ['resultado' => true, 'mensaje' => 'Servicio Adicionado', 'id_servicio
		' => $r['insert_id'] ];
	}else{
		$arr = ['resultado' => false, 'mensaje' => $r['error']];
	}
}else{ // Update
	$r = $objDB->Update('servicio', $servicio_data, ["id_servicio" => $id]);
	if($r['result']){
		$arr = ['resultado' => true, 'mensaje' => 'Servicio Actualizado' ];
	}else{
		$arr = ['resultado' => false, 'mensaje' => $r['error']];
	}
}
die(json_encode($arr));
