
<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;

$id = $_GET['id'];
if($id>0){
  $result = $objDB->Execute("SELECT * FROM nodo WHERE id_nodo=$id");
  $nodo = $result->fetch_assoc();
}
?>

  <form id="frmNodo" class="form">
    <input type="hidden" name="id" value="<?= $id ?>" />
    <label>
      Nombre
      <input type="text" name="nombre" value="<?php if(isset($nodo)) echo $nodo['nombre'] ?>" required />
    </label>
    <label>
      Longitud
      <input type="text" name="longitud" value="<?php if(isset($nodo)) echo $nodo['longitud'] ?>" required />
    </label>
    <label>
      Latitud     
      <input type="text" name="latitud" value="<?php if(isset($nodo)) echo $nodo['latitud'] ?>" required/>
    </label>
    <button class="button" type="submit">Guardar datos</button>
  </form>
  <a class="hideForm" href="#">Cerrar</a>
