<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
header('Content-type: application/json; charset=utf-8');

require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;

$id = $_POST['id'];
$dataf=date_create($_POST['fecha']);
$fecha=date_format($dataf,"Y-m-d");
$incidente_data = [
	'fk_id_tramo' => $_POST['fk_id_tramo'],
	'fecha' => (string)$fecha,
	'hora' =>  $_POST['hora'],
	'tipo' =>  $_POST['tipo'],
	'observaciones' =>  $_POST['observaciones'],
	'estado' => $_POST['estado'],
	'usuarioasig' => $_POST['usuarioasig']
];

if($id==0)
{ 
}

else{ // Update
	$r = $objDB->Update('problema', $incidente_data, ["id_problema" => $id]);
	if($r['result']){
		$arr = ['resultado' => true, 'mensaje' => 'Incidente Actualizado' ];
	}else{
		$arr = ['resultado' => false, 'mensaje' => $r['error']];
	}
}
die(json_encode($arr));
