<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;
if(isset($_GET['filtro']))
{ $filtro=$_GET['filtro'];
  $result = $objDB->Execute('SELECT a.id, a.id_tramo, 
  a.dir_origen_lat, a.dir_origen_lon, a.distancia_fibra, a.cantidad_hilos, b.id_nodo, b.nombre  FROM 
  tramo a INNER JOIN nodo b ON (a.fk_id_nodo=b.id_nodo) WHERE b.id_nodo='."'".$filtro."'");
  while($nodo = $result->fetch_assoc()){
    ?>
    <tr>
      <td><?= $nodo['nombre'] ?></td>
      <td><?= $nodo['id_tramo'] ?></td>
      <td><?= $nodo['dir_origen_lat'] ?></td>
      <td><?= $nodo['dir_origen_lon'] ?></td>
      <td><?= $nodo['distancia_fibra'] ?></td>
      <td><?= $nodo['cantidad_hilos'] ?></td>
      <td>
        <a class="edit" data-id="<?= $nodo['id'] ?>" href="#">Editar</a>
        <a class="delete" data-id="<?= $nodo['id'] ?>" href="#">Eliminar</a>
      </td>
    </tr>
    <?php
  }
}

?>
