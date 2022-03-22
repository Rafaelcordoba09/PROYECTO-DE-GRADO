<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;

$id = $_GET['id'];
if($id>0){
  $result = $objDB->Execute("SELECT * FROM tramo WHERE id=$id");
  $tramo= $result->fetch_assoc();
}
echo('
  <form id="frmTramo" class="form">
    <input type="hidden" name="id" value="'.$id.'" />
    Nombre del Nodo
      <select name="fk_id_nodo">');  
   $objDB2 = new DataBase;
           $resulta = $objDB2->Execute("SELECT * FROM nodo");
           $contador=0;
           while($tramox = $resulta->fetch_assoc())
              {if(isset($tramo))
                {
                if($tramo['fk_id_nodo']==$tramox['id_nodo'])
                    {echo "<option value='".$tramox['id_nodo']."' selected>".$tramox['nombre']."</option>";
                    }
                else 
                    {echo "<option value='".$tramox['id_nodo']."'>".$tramox['nombre']."</option>";
                    }
                $contador++;
                }
                else
                {
                  if($contador==0)
                  echo "<option value='".$tramox['id_nodo']."' selected>".$tramox['nombre']."</option>";
                    else 
                  echo "<option value='".$tramox['id_nodo']."'>".$tramox['nombre']."</option>";
                    $contador++;
                }    
              }

   ?>   
      </select>  
    <label>
      Numero del Kilómetro
      <input type="text" name="id_tramo" value="<?php if(isset($tramo)) echo $tramo['id_tramo'] ?>" required />
    </label>
    <label>
      Latitud
      <input type="text" name="dir_origen_lat" value="<?php if(isset($tramo)) echo $tramo['dir_origen_lat'] ?>" required />
    </label>
    <label>
      Longitud
      <input type="text" name="dir_origen_lon" value="<?php if(isset($tramo)) echo $tramo['dir_origen_lon'] ?>" required />
    </label>
    <label>
      Distancia (Km)
      <input type="text" name="distancia_fibra" value="<?php if(isset($tramo)) echo $tramo['distancia_fibra'] ?>" required />
    </label>
    <label>
      Hilos
      <input type="text" name="cantidad_hilos" value="<?php if(isset($tramo)) echo $tramo['cantidad_hilos'] ?>" required />
    </label>
    
    <button class="button" type="submit">Guardar datos</button>
  </form>
  <a class="hideForm" href="#">Cerrar</a>
