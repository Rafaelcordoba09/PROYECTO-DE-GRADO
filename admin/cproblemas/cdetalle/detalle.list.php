<?php
require_once '../../../dbconnect/database.class.php';

$objDB = new DataBase;

if(!isset($_SESSION['idxxx']))
  {session_start();
  }
$incx= $_SESSION['idxxx'];
$result = $objDB->Execute('SELECT * FROM sol_problema WHERE fk_id_problema='."'".$incx."'");

while($incidente = $result->fetch_assoc()){
  ?>
  <tr>
    <td><?= $incidente['fecha'] ?></td>
    <td><?= $incidente['hora'] ?></td>
    <td><?= $incidente['descripcion'] ?></td>
  </tr>
  <?php
}
?>
