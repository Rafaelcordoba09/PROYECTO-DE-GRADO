
<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
header('Content-type: application/json; charset=utf-8');

require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;

$id = $_POST['id'];
session_start();
$usuario=$_SESSION['id_usuario'];
$nodo_data = [
	'nombre' => $_POST['nombre'],
	'latitud' => $_POST['latitud'],
	'longitud' =>  $_POST['longitud'],
	'fk_id_usuario' => $usuario
];

if($id==0){ // Nuevo
	$r = $objDB->Insert('nodo', $nodo_data);
	if($r['result']){
		$arr = ['resultado' => true, 'mensaje' => 'Nodo Adicionado', 'id_nodo' => $r['insert_id'] ];
	}else{
		$arr = ['resultado' => false, 'mensaje' => $r['error']];
	}
}else{ // Update
	$r = $objDB->Update('nodo', $nodo_data, ["id_nodo" => $id]);
	if($r['result']){
		$arr = ['resultado' => true, 'mensaje' => 'Nodo Actualizado' ];
	}else{
		$arr = ['resultado' => false, 'mensaje' => $r['error']];
	}
}
die(json_encode($arr));
