<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;

$result = $objDB->Execute('SELECT a.nombre, b.id_tramo, c.fecha, c.hora, c.observaciones, 
c.estado, d.usuario, c.id_problema as id_problema, c.tipo  FROM 
nodo a INNER JOIN tramo b ON (a.id_nodo=b.fk_id_nodo)
INNER JOIN problema c ON (b.id=c.fk_id_tramo)
INNER JOIN usuario d ON (c.usuarioasig=d.id) WHERE c.estado="ABIERTO" AND d.usuario='."'".$_SESSION['usuario']."'");

while($incidente = $result->fetch_assoc()){
  ?>
  <tr>
    <td><?= $incidente['id_problema'] ?></td>
    <td><?= $incidente['nombre'] ?></td>
    <td><?= $incidente['id_tramo'] ?></td>
    <td><?= $incidente['fecha'] ?></td>
    <td><?= $incidente['hora'] ?></td>
    <td><?= $incidente['tipo'] ?></td>
    <td><?= $incidente['observaciones'] ?></td>
    <td><?= $incidente['estado'] ?></td>
    <td>
      <a href=<?php echo('"'.'cdetalle/principal_detalle.php?inc='.$incidente['id_problema'].'"') ?>>Ingresar Informacion Caso</a>
    </td>
  </tr>
  <?php
}

?>

