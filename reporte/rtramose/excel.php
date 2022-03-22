<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
header('Content-Type: text/html; charset=ISO-8859-1');
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=Tramos.xls');
require_once '../../dbconnect/database.class.php';
?>
<table border="1">
<tr>
    <th>Nombre</th>
    <th>Tramo</th>
    <th>Distancia Fibra</th>
    <th>Hilos</th>
    <th>Longitud</th>
    <th>Latitud</th>
</tr>
<?php
$objDB = new DataBase;

$resulta = $objDB->Execute("SELECT b.nombre, id_tramo, distancia_fibra,cantidad_hilos, dir_origen_lat, dir_origen_lon 
FROM tramo a INNER JOIN nodo b ON (a.fk_id_nodo=b.id_nodo) ORDER BY b.nombre,id_tramo");
while($row = $resulta->fetch_assoc())
{
echo('<tr>');
    echo('<td>');
    echo($row['nombre']);
    echo('</td>');
    
    echo('<td>');
    echo($row['id_tramo']);
    echo('</td>');

    echo('<td>');
    echo($row['distancia_fibra']);
    echo('</td>');
    
    echo('<td>');
    echo($row['cantidad_hilos']);
    echo('</td>');

    echo('<td>');
    echo($row['dir_origen_lat']);
    echo('</td>');

    echo('<td>');
    echo($row['dir_origen_lon']);
    echo('</td>');   
echo('</tr>');
}

?>
</table>