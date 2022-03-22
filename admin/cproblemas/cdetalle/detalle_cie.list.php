<?php
require_once '../../../dbconnect/database.class.php';

$objDB = new DataBase;

if(!isset($_SESSION['idxxx']))
  {session_start();
  }
$incx= $_SESSION['idxxx'];
$result = $objDB->Execute('SELECT * FROM cie_problema WHERE fk_id_problema='."'".$incx."'");

while($incidente = $result->fetch_assoc()){
  ?>
  <tr>
    <td><?= $incidente['fecha'] ?></td>
    <td><?= $incidente['hora'] ?></td>
    <td><?= $incidente['accion'] ?></td>
    <td><?= $incidente['tipo_falla'] ?></td>
    <td><?= $incidente['causa_falla'] ?></td>
    <td><?= $incidente['no_clientes'] ?></td>
    <td><a href="../../../operador/cproblemas/cdetalle/<?= $incidente['adjunto'] ?>">Ver Adjunto</a></td>
  </tr>
  <?php
}
?>
