

<?php
require_once '../../../dbconnect/database.class.php';
$objDB = new DataBase;
session_start();
$fk=$_SESSION['incx'];
$id = $_GET['id'];
if($id>0){
  $result = $objDB->Execute("SELECT * FROM 
  sol_problema WHERE id_sol_problema=$id");
  $incidente = $result->fetch_assoc();
}?>
  <form id="frmDetalle" class="form" >
    <input type="hidden" name="id" value="<?= $id ?>" />
    <label>
      Fecha   
    <input type="date" name="fecha" value="<?php if(isset($incidente)) echo $incidente['fecha'] ?>" required/>
    </label>
    <label>
      Hora   
      <input type="time" name="hora" value="<?php if(isset($incidente)) echo $incidente['hora'] ?>" required/>
    </label>
    <label>
      Observaciones    
      <input type="text" name="descripcion" value="<?php if(isset($incidente)) echo $incidente['descripcion'] ?>" required/>
    </label>
    <input type="hidden" name="fk_id_problema" value="<?= $fk ?>" />
    <button class="button" type="submit">Guardar datos</button>
  </form>
  <a class="hideForm" href="#">Cerrar</a>
