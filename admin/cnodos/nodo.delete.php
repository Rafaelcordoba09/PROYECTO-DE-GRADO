
<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
header('Content-type: application/json; charset=utf-8');

require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;

$id = $_GET['id'];

$result = $objDB->Execute('DELETE FROM nodo WHERE id_nodo='.$id);
if($result){
	$arr = ['resultado' => true, 'mensaje' => 'Elemento eliminado' ];
}else{
	$arr = ['resultado' => false, 'mensaje' =>'El nodo tiene elementos asociados no se puede eliminar'];
}
die(json_encode($arr));
?>
