<?php
header('Content-type: application/json; charset=utf-8');
require_once '../../../dbconnect/database.class.php';

if ( !(0 < $_FILES['adjunto']['error'] )) {
$id=0;
$fk_id_incidente= $_POST['fk_id_incidente'];
mkdir('img_cierre/'.$fk_id_incidente);
$path='img_cierre/'.$fk_id_incidente;
move_uploaded_file($_FILES['adjunto']['tmp_name'], $path."/" . $_FILES['adjunto']['name']);
$objDB = new DataBase;
$dataf=date_create($_POST['fecha']);
$fecha=date_format($dataf,"Y-m-d");
$incidente_data = [
	'fk_id_incidente' => $fk_id_incidente,
	'fecha' => (string)$fecha,
	'hora' =>  $_POST['hora'],
	'accion' =>  $_POST['accion'],
	'tipo_falla' =>  $_POST['tipo_falla'],
	'causa_falla' =>  $_POST['causa_falla'],
	'no_clientes' =>  $_POST['no_clientes'],
	'adjunto' =>  $path."/" . $_FILES['adjunto']['name']
];
	$r = $objDB->Insert('cie_incidente', $incidente_data);
}

