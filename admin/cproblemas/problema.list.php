<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;
if(isset($_GET['filtro']))
{$filtro=$_GET['filtro'];
$result = $objDB->Execute('SELECT a.nombre, b.id_tramo, c.fecha, c.hora, c.observaciones, 
c.estado, d.usuario, c.id_problema, c.tipo  FROM 
nodo a INNER JOIN tramo b ON (a.id_nodo=b.fk_id_nodo)
INNER JOIN problema c ON (b.id=c.fk_id_tramo)
INNER JOIN usuario d ON (c.usuarioasig=d.id) WHERE a.id_nodo='."'".$filtro."'");

while($problema = $result->fetch_assoc()){
  ?>
  <tr>
    <td><?= $problema['nombre'] ?></td>
    <td><?= $problema['id_tramo'] ?></td>
    <td><?= $problema['fecha'] ?></td>
    <td><?= $problema['hora'] ?></td>
    <td><?= $problema['tipo'] ?></td>
    <td><?= $problema['observaciones'] ?></td>
    <td><?= $problema['estado'] ?></td>
    <td><?= $problema['usuario'] ?></td>
    <td>
    <a class="edit" data-id="<?= $problema['id_problema'] ?>" href="#">Editar</a>
      <a class="delete" data-id="<?= $problema['id_problema'] ?>" href="#">Eliminar</a>
       <a class="" href="cdetalle/detalle_inc.php?id=<?= $problema['id_problema'] ?>">Observaciones</a>
       <?php if($problema['estado']=="CERRADO")
       {
       echo('<a class="" href="cdetalle/detalle_cie.php?id='.$problema['id_problema'].'">Info Cierre</a>');
       }
       ?>
    </td>
  </tr>
  <?php
}
}
?>
