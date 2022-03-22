<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;

$id = $_GET['id'];
if($id>0){
  $result = $objDB->Execute("SELECT * FROM servicio WHERE id_servicio=$id");
  $servicio = $result->fetch_assoc();
}
echo(' <form id="frmServicio" class="form">
<input type="hidden" name="id" value="'.$id.'" />
<label>
      Asignado A
      <select name="fk_id_nodo">');  
     $objDB2 = new DataBase;
           $resultad = $objDB2->Execute("SELECT * FROM nodo");
           $contador=0;
           while($serviciox = $resultad->fetch_assoc())
              {if(!isset($servicio))
                {
                  if($contador==0)
                  echo "<option value='".$serviciox['id_nodo']."' selected>".$serviciox['nombre']."</option>";
                else 
                  echo "<option value='".$serviciox['id_nodo']."'>".$serviciox['nombre']."</option>";
                $contador++;  
                }
                else
                {
                if($servicio['fk_id_nodo']==$serviciox['id_nodo'])
                echo "<option value='".$serviciox['id_nodo']."' selected>".$serviciox['nombre']."</option>";
              else 
                echo "<option value='".$serviciox['id_nodo']."'>".$serviciox['nombre']."</option>";
                }
              }

   ?>   
      </select>    
    </label>
    <label>
      Proveedor λ
      <input type="text" name="proveedor" value="<?php if(isset($servicio)) echo $servicio['proveedor'] ?>" required />
    </label>
    <label>
      Frecuencia λ
      <input type="text" name="frecuencia" value="<?php if(isset($servicio)) echo $servicio['frecuencia'] ?>" required />
    </label>
    <label>
      Descripcion    
      <input type="text" name="descripcion" value="<?php if(isset($servicio)) echo $servicio['descripcion'] ?>" required/>
    </label>
    <label>
      Capacidad BW λ    
      <input type="text" name="capacidad" value="<?php if(isset($servicio)) echo $servicio['capacidad'] ?>" required/>
    </label>
    <button class="button" type="submit">Guardar datos</button>
  </form>
  <a class="hideForm" href="#">Cerrar</a>
