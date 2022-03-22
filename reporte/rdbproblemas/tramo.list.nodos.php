<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;

$resulta = $objDB->Execute('SELECT id_nodo, nombre FROM nodo');
echo('<option value="all" selected>Todos</option>');     
while($opcion = $resulta->fetch_assoc())
        {
            echo('<option value="'.$opcion['id_nodo'].'">'.$opcion['nombre'].'</option>');
        }
?>
