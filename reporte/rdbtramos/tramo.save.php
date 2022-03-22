<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
header('Content-type: application/json; charset=utf-8');

require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;

$id = $_POST['id'];
$tramo_data = [
	'id_tramo' => $_POST['id_tramo'],
	'dir_origen_lat' => $_POST['dir_origen_lat'],
	'dir_origen_lon' => $_POST['dir_origen_lon'],
	'distancia_fibra' =>  $_POST['distancia_fibra'],
	'cantidad_hilos' =>  $_POST['cantidad_hilos'],
	'fk_id_nodo' =>  $_POST['fk_id_nodo']

];

if($id==0){ // Nuevo
	$r = $objDB->Insert('tramo', $tramo_data);
	if($r['result']){
		$arr = ['resultado' => true, 'mensaje' => 'Tramo Adicionado', 'id_tramo' => $r['insert_id'] ];
	}else{
		$arr = ['resultado' => false, 'mensaje' => $r['error']];
	}
}else{ // Update
	$r = $objDB->Update('tramo', $tramo_data, ["id" => $id]);
	if($r['result']){
		$arr = ['resultado' => true, 'mensaje' => 'Tramo Actualizado' ];
	}else{
		$arr = ['resultado' => false, 'mensaje' => $r['error']];
	}
}
die(json_encode($arr));
