<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
header('Content-Type: text/html; charset=ISO-8859-1');
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=Eventos.xls');
require_once '../../dbconnect/database.class.php';
?>
<table border="1">
<tr>
    <th>Id Incidente</th>
    <th>Nodo</th>
    <th>Tramo</th>
    <th>Fecha Incidente</th>
    <th>Hora Incidente</th>
    <th>Tipo</th>
    <th>Observaciones</th>
    <th>Estado</th>
    <th>Fecha Cierre</th>
    <th>Hora Cierre</th>
    <th>Accion</th>
    <th>Tipo de Falla</th>
    <th>Causa de Falla</th>
    <th>No. de Clientes Afectados</th>
</tr>
<?php
$objDB = new DataBase;

$resulta = $objDB->Execute("SELECT a.id_incidente,c.nombre,b.id,a.fecha as fechai,a.hora as horai,a.tipo,a.observaciones,a.estado,
d.fecha as fechaf,d.hora as horaf,d.accion,d.tipo_falla,d.causa_falla, d.no_clientes
FROM incidente a INNER JOIN 
tramo b ON (a.fk_id_tramo=b.id) 
INNER JOIN nodo c ON (c.id_nodo= b.fk_id_nodo)
LEFT JOIN cie_incidente d ON (a.id_incidente=d.fk_id_incidente)
WHERE a.fecha BETWEEN '".$_GET['fi']."' AND '".$_GET['ff']."'");
while($row = $resulta->fetch_assoc())
{   echo('<tr>');
    echo('<td>');
    echo($row['id_incidente']);
    echo('</td>');
    
    echo('<td>');
    echo($row['nombre']);
    echo('</td>');

    echo('<td>');
    echo($row['id']);
    echo('</td>');
    
    echo('<td>');
    echo($row['fechai']);
    echo('</td>');

    echo('<td>');
    echo($row['horai']);
    echo('</td>');

    echo('<td>');
    echo(utf8_decode($row['tipo']));
    echo('</td>');

    echo('<td>');
    echo(utf8_decode($row['observaciones']));
    echo('</td>');

    echo('<td>');
    echo($row['estado']);
    echo('</td>');

    echo('<td>');
    echo($row['fechaf']);
    echo('</td>');

    echo('<td>');
    echo($row['horaf']);
    echo('</td>');

    echo('<td>');
    echo(utf8_decode($row['accion']));
    echo('</td>');

    echo('<td>');
    echo(utf8_decode($row['tipo_falla']));
    echo('</td>');

    echo('<td>');
    echo(utf8_decode($row['causa_falla']));
    echo('</td>');


    echo('<td>');
    echo($row['no_clientes']);
    echo('</td>');
echo('</tr>');
}

?>
</table>