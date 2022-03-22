<?php
require_once '../../../dbconnect/database.class.php';

$objDB = new DataBase;

if(!isset($_SESSION['idxx']))
  {session_start();
  }
$incx= $_SESSION['idxx'];
$result = $objDB->Execute('SELECT * FROM cie_incidente WHERE fk_id_incidente='."'".$incx."'");

while($incidente = $result->fetch_assoc()){
  ?>
  <tr>
    <td><?= $incidente['fecha'] ?></td>
    <td><?= $incidente['hora'] ?></td>
    <td><?= $incidente['accion'] ?></td>
    <td><?= $incidente['tipo_falla'] ?></td>
    <td><?= $incidente['causa_falla'] ?></td>
    <td><?= $incidente['no_clientes'] ?></td>
    <td><a href="../../../operador/cactivos/cdetalle/<?= $incidente['adjunto'] ?>">Ver Adjunto</a></td>
  </tr>
  <?php
}
?>
