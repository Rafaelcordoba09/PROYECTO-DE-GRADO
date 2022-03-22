<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;
$resulta = $objDB->Execute("SELECT id, id_tramo FROM tramo WHERE fk_id_nodo='".$_GET['nodo']."'");   
while($opcion = $resulta->fetch_assoc())
        {
            echo('<option value="'.$opcion['id'].'">'.$opcion['id_tramo'].'</option>');
        }
?>
