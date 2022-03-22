<?php
require_once '../../../dbconnect/database.class.php';

$objDB = new DataBase;

if(!isset($_SESSION['incx']))
  {session_start();
  }
$incx= $_SESSION['incx'];
$result = $objDB->Execute('SELECT * FROM sol_problema WHERE fk_id_problema='."'".$incx."'");

while($incidente = $result->fetch_assoc()){
  ?>
  <tr>
    <td><?= $incidente['fecha'] ?></td>
    <td><?= $incidente['hora'] ?></td>
    <td><?= $incidente['descripcion'] ?></td>
    <td>
      <a class="edit" data-id="<?= $incidente['id_sol_problema'] ?>" href="#">Editar</a>
      <a class="delete" data-id="<?= $incidente['id_sol_problema'] ?>" href="#">Eliminar</a>
    </td>
  </tr>
  <?php
}
?>
