<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;
if(isset($_GET['filtro']))
{ $filtro=$_GET['filtro'];
$result = $objDB->Execute('SELECT a.id_servicio, a.proveedor, a.frecuencia, a.descripcion, a.capacidad, 
b.nombre, a.fk_id_nodo FROM 
servicio a INNER JOIN nodo b ON (a.fk_id_nodo=b.id_nodo) WHERE a.fk_id_nodo='."'".$filtro."'");
while($servicio = $result->fetch_assoc()){
  ?>
  <tr>
    <td><?= $servicio['proveedor'] ?></td>
    <td><?= $servicio['frecuencia'] ?></td>
    <td><?= $servicio['descripcion'] ?></td>
    <td><?= $servicio['capacidad'] ?></td>
    <td><?= $servicio['nombre'] ?></td>
    <td>
      <a class="edit" data-id="<?= $servicio['id_servicio'] ?>" href="#">Editar</a>
      <a class="delete" data-id="<?= $servicio['id_servicio'] ?>" href="#">Eliminar</a>
    </td>
  </tr>
  <?php
}
}
?>
