<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
header('Content-type: application/json; charset=utf-8');
require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;

$id = $_POST['id'];

$usuario_data = [
	'usuario' => $_POST['usuario'],
	'clave' => md5($_POST['clave']),
	'perfil' =>  $_POST['perfil'],
	'estado' => $_POST['estado']
];

if($id==0){ // Nuevo
	$r = $objDB->Insert('usuario', $usuario_data);
	if($r['result']){
		$arr = ['resultado' => true, 'mensaje' => 'Usuario añadido', 'id' => $r['insert_id'] ];
	}else{
		$arr = ['resultado' => false, 'mensaje' => $r['error']];
	}
}else{ // Update
	$r = $objDB->Update('usuario', $usuario_data, ["id" => $id]);
	if($r['result']){
		$arr = ['resultado' => true, 'mensaje' => 'Usuario Actualizado' ];
	}else{
		$arr = ['resultado' => false, 'mensaje' => $r['error']];
	}
}
die(json_encode($arr));
