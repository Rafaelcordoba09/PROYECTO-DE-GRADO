
<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;

$result = $objDB->Execute('SELECT * FROM nodo');

while($nodo = $result->fetch_assoc()){
  ?>
  <tr>
    <td><?= $nodo['nombre'] ?></td>
    <td><?= $nodo['longitud'] ?></td>
    <td><?= $nodo['latitud'] ?></td>
    <td>
      <a class="edit" data-id="<?= $nodo['id_nodo'] ?>" href="#">Editar</a>
      <a class="delete" data-id="<?= $nodo['id_nodo'] ?>" href="#">Eliminar</a>
      <a class="" href="nodo.mapa.php?id=<?=$nodo['id_nodo']?>" target="_blank">Ver Mapa</a>
    </td>
  </tr>
  <?php
}
?>
