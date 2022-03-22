<?php
header('Content-type: application/json; charset=utf-8');

require_once '../../../dbconnect/database.class.php';

$objDB = new DataBase;

$id = $_GET['id'];

$result = $objDB->Execute('DELETE FROM sol_incidente WHERE id_sol_incidente='.$id);
if($result){
	$arr = ['resultado' => true, 'mensaje' => 'Elemento eliminado' ];
}else{
	$arr = ['resultado' => false, 'mensaje' => $r['error']];
}
die(json_encode($arr));
?>
