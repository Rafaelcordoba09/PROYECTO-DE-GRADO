<?php 
error_reporting(0);
include('rev/vs.php');?>

<?php
require_once '../../dbconnect/database.class.php';
$objDB = new DataBase;

$id = $_GET['id'];
if($id>0){
  $result = $objDB->Execute("SELECT a.nombre, b.id_tramo, c.fecha, c.hora, 
  c.observaciones, c.estado, d.id, a.id_nodo,c.tipo FROM 
  nodo a INNER JOIN tramo b ON (a.id_nodo=b.fk_id_nodo)
  INNER JOIN incidente c ON (b.id=c.fk_id_tramo)
  INNER JOIN usuario d ON (c.usuarioasig=d.id)
  WHERE id_incidente=$id");
  $incidente = $result->fetch_assoc();
}
echo('
  <form id="frmIncidente" class="form" >
    <input type="hidden" name="id" value="'.$id.'"  />
    <label>
      Nodo
      <select name="fk_id_nodo" onchange="gettramos(this)">');  
       $objDB2 = new DataBase;
           $resulta = $objDB2->Execute("SELECT * FROM nodo");
           $contador=0;
           while($incidentex = $resulta->fetch_assoc())
              {if($id<=0)
                {
                if($contador==0)
                    {$inicial=$incidentex['id_nodo'];
                     echo "<option value='".$incidentex['id_nodo']."' selected>".$incidentex['nombre']."</option>";
                    }
                else 
                    echo "<option value='".$incidentex['id_nodo']."'>".$incidentex['nombre']."</option>";
                $contador++;   
                } 
                else
                  {
                    if($incidente['id_nodo']==$incidentex['id_nodo'])
                   { echo "<option value='".$incidentex['id_nodo']."' selected>".$incidentex['nombre']."</option>";
                     $inicial=$incidentex['id_nodo'];
                   }
                    else 
                    echo "<option value='".$incidentex['id_nodo']."'>".$incidentex['nombre']."</option>";     
                  }
              }

  echo('   
      </select>  
    </label>
    <label>
      Tramo
      <select name="fk_id_tramo" id="tramo">');  
      $objDB2 = new DataBase;
           $resulta = $objDB2->Execute("SELECT * FROM tramo WHERE fk_id_nodo='".
           $inicial."'");
           $contador=0;
           while($incidentex = $resulta->fetch_assoc())
              {if($id<=0)
                {
                if($contador==0)
                {
                   
                    echo "<option value='".$incidentex['id']."' selected>".$incidentex['id_tramo']."</option>";
                }
                else 
                    echo "<option value='".$incidentex['id']."'>".$incidentex['id_tramo']."</option>";
                $contador++;   
                } 
                else
                  {
                    if($incidente['id_nodo']==$incidentex['id_nodo'])
                    echo "<option value='".$incidentex['id']."' selected>".$incidentex['id_tramo']."</option>";
                    else 
                    echo "<option value='".$incidentex['id']."'>".$incidentex['id_tramo']."</option>";     
                  }
              }

   echo(' 
      </select>  
    </label>
    <label>');
     
     if(isset($incidente))
     {echo('Fecha   
      <input type="date" name="fecha" value="'.$incidente['fecha']. '" required/>
    </label>
    <label>
      Hora   
      <input type="time" name="hora" value="'.$incidente['hora'].'" required/>
    </label>
    <label>
    <label>
      Tipo  
     <select name="tipo">');
     if($incidente['tipo']=="Caida de Fibra")
     {
       echo('<option value="Caida de Fibra" selected>Caida de Fibra</option>
       <option value="Mantenimiento de Fibra">Mantenimiento de Fibra</option>
       <option value="Atenuación de Fibra">Atenuación de Fibra</option>');
     }
     if($incidente['tipo']=="Mantenimiento de Fibra")
     {
       echo('<option value="Caida de Fibra">Caida de Fibra</option>
       <option value="Mantenimiento de Fibra" selected>Mantenimiento de Fibra</option>
       <option value="Atenuación de Fibra">Atenuación de Fibra</option>');
     }
     if($incidente['tipo']=="Atenuación de Fibra")
     {
       echo('<option value="Caida de Fibra">Caida de Fibra</option>
       <option value="Mantenimiento de Fibra">Mantenimiento de Fibra</option>
       <option value="Atenuación de Fibra" selected>Atenuación de Fibra</option>');
     }
      
      
     }
     else
     {
      echo('Fecha   
      <input type="date" name="fecha" value="" required>
    </label>
    <label>
      Hora   
      <input type="time" name="hora" value="" required/>
    </label>
    <label>
    <label>
      Tipo  
     <select name="tipo">
      <option value="Caida de Fibra">Caida de Fibra</option>
      <option value="Mantenimiento de Fibra">Mantenimiento de Fibra</option>
      <option value="Atenuación de Fibra">Atenuación de Fibra</option>');
     }

     
     
    ?>
    </select>
    </label>
    <label>
      Observaciones    
      <input type="text" name="observaciones" value="<?php if(isset($incidente)) echo $incidente['observaciones'] ?>" required/>
    </label>
    <label>
      Estado
      <select name="estado">    
      <?php
      if(isset($incidente))
        {if($incidente['estado']=="ABIERTO")
          {
            echo('<option value="ABIERTO" selected>Abierto</option>');
            echo('<option value="PROCESO">Proceso</option>');
            echo('<option value="CERRADO">Cerrado</option>');
          }
          if($incidente['estado']=="PROCESO")
          {
            echo('<option value="ABIERTO">Abierto</option>');
            echo('<option value="PROCESO" selected>Proceso</option>');
            echo('<option value="CERRADO">Cerrado</option>');
          }
          if($incidente['estado']=="CERRADO")
          {
            echo('<option value="ABIERTO">Abierto</option>');
            echo('<option value="PROCESO">Proceso</option>');
            echo('<option value="CERRADO" selected>Cerrado</option>');
          }
        }
      else
        {
            echo('<option value="ABIERTO" selected>Abierto</option>');
            echo('<option value="PROCESO">Proceso</option>');
            echo('<option value="CERRADO">Cerrado</option>');
        }  
      ?>
      </select>
          </label> 
    <label>
      Asignado A
      <select name="usuarioasig">  
   <?php   $objDB2 = new DataBase;
           $resulta = $objDB2->Execute("SELECT * FROM usuario");
           $contador=0;
           while($incidentex = $resulta->fetch_assoc())
              {if($id<=0)
                {
                if($contador==0)
                  echo "<option value='".$incidentex['id']."' selected>".$incidentex['usuario']."</option>";
                else 
                  echo "<option value='".$incidentex['id']."'>".$incidentex['usuario']."</option>";
                $contador++; 
                }   
                else
                 {
                  if($incidente['id']==$incidentex['id'])
                  echo "<option value='".$incidentex['id']."' selected>".$incidentex['usuario']."</option>";
                else 
                  echo "<option value='".$incidentex['id']."'>".$incidentex['usuario']."</option>";                
                 }
              }

   ?>   
      </select>  
    </label>
    <button class="button" type="submit">Guardar datos</button>
  </form>
  <a class="hideForm" href="#">Cerrar</a>
