<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;

$result = $objDB->Execute('SELECT * FROM usuario');

while($usuario = $result->fetch_assoc()){
  ?>
  <tr>
    <td><?= $usuario['usuario'] ?></td>
    <td><?= $usuario['clave'] ?></td>
    <td><?= $usuario['perfil'] ?></td>
    <td><?= $usuario['estado'] ?></td>
    <td>
      <a class="edit" data-id="<?= $usuario['id'] ?>" href="#">Editar</a>
      <a class="delete" data-id="<?= $usuario['id'] ?>" href="#">Eliminar</a>
    </td>
  </tr>
  <?php
}
?>
