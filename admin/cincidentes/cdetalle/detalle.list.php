<?php
require_once '../../../dbconnect/database.class.php';

$objDB = new DataBase;

if(!isset($_SESSION['idxx']))
  {session_start();
  }
$incx= $_SESSION['idxx'];
$result = $objDB->Execute('SELECT * FROM sol_incidente WHERE fk_id_incidente='."'".$incx."'");

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
