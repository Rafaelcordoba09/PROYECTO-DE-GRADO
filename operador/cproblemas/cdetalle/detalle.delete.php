<?php
header('Content-type: application/json; charset=utf-8');

require_once '../../../dbconnect/database.class.php';

$objDB = new DataBase;

$id = $_GET['id'];

$result = $objDB->Execute('DELETE FROM sol_problema WHERE id_sol_problema='.$id);
if($result){
	$arr = ['resultado' => true, 'mensaje' => 'Elemento eliminado' ];
}else{
	$arr = ['resultado' => false, 'mensaje' => $r['error']];
}
die(json_encode($arr));
?>
