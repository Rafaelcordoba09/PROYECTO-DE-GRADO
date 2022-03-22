<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;
if(isset($_GET['filtro']))
{$filtro=$_GET['filtro'];
$result = $objDB->Execute('SELECT a.nombre, b.id_tramo, c.fecha, c.hora, c.observaciones, 
c.estado, d.usuario, c.id_incidente, c.tipo  FROM 
nodo a INNER JOIN tramo b ON (a.id_nodo=b.fk_id_nodo)
INNER JOIN incidente c ON (b.id=c.fk_id_tramo)
INNER JOIN usuario d ON (c.usuarioasig=d.id) WHERE a.id_nodo='."'".$filtro."'");

while($incidente = $result->fetch_assoc()){
  ?>
  <tr>
    <td><?= $incidente['nombre'] ?></td>
    <td><?= $incidente['id_tramo'] ?></td>
    <td><?= $incidente['fecha'] ?></td>
    <td><?= $incidente['hora'] ?></td>
    <td><?= $incidente['tipo'] ?></td>
    <td><?= $incidente['observaciones'] ?></td>
    <td><?= $incidente['estado'] ?></td>
    <td><?= $incidente['usuario'] ?></td>
    <td>
      <a class="edit" data-id="<?= $incidente['id_incidente'] ?>" href="#">Editar</a>
      <a class="delete" data-id="<?= $incidente['id_incidente'] ?>" href="#">Eliminar</a>
       <a class="" href="cdetalle/detalle_inc.php?id=<?= $incidente['id_incidente'] ?>">Observaciones</a>
       <?php if($incidente['estado']=="CERRADO")
       {
       echo('<a class="" href="cdetalle/detalle_cie.php?id='.$incidente['id_incidente'].'">Info Cierre</a>');
       }
       ?>
    </td>
  </tr>
  <?php
}
}
?>
