<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php
require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;

$id = $_GET['id'];
if($id>0){
  $result = $objDB->Execute("SELECT * FROM usuario WHERE id=$id");
  $usuario = $result->fetch_assoc();
}


    if(isset($usuario))
    { echo'
      <form id="frmUsuario" class="form">
        <input type="hidden" name="id" value="'.$id.'" />
        <label>
          Usuario
          <input type="text" name="usuario" value="'.$usuario['usuario'].'" required />
        </label>
        <label>
          Clave
          <input type="password" name="clave" value="'.$usuario['clave'].'" />
        </label>';
        
      echo('
      <label>
        Perfil
        <select name="perfil">');  
            if($usuario['perfil']=='A')
            {
                echo('<option value="A" selected>Administrador</option>');
                echo('<option value="R">Reporte</option>');
                echo('<option value="O">Operario</option>');
            }    
            if($usuario['perfil']=='R')
            {
                echo('<option value="A" >Administrador</option>');
                echo('<option value="R" selected>Reporte</option>');
                echo('<option value="O" >Operario</option>');
            }   
            if($usuario['perfil']=='O')
            {
                echo('<option value="A">Administrador</option>');
                echo('<option value="R">Reporte</option>');
                echo('<option value="O" selected>Operario</option>');
            }   
          
        echo ('</select>');
        
        echo('
        <label>
          Estado
          <select name="estado">');  
              if($usuario['estado']=='A')
              {
                  echo('<option value="A" selected>Activo</option>');
                  echo('<option value="I">Inactivo</option>');
              }    
              if($usuario['estado']=='I')
              {
                  echo('<option value="A" >Activo</option>');
                  echo('<option value="I" selected>Inactivo</option>');
              }   
             
            
          echo ('</select>');
    }
    else
    { echo'
      <form id="frmUsuario" class="form">
        <input type="hidden" name="id" value="$id" />
        <label>
          Usuario
          <input type="text" name="usuario" value="" required />
        </label>
        <label>
          Clave
          <input type="password" name="clave" value="" required />
        </label>';
        
      echo('
      <label>
        Perfil
        <select name="perfil">');  

                echo('<option value="A" selected>Administrador</option>');
                echo('<option value="R">Reporte</option>');
                echo('<option value="O">Operario</option>');   
          
        echo ('</select>');
        
        echo('
        <label>
          Estado
          <select name="estado">');  
                  echo('<option value="A" selected>Activo</option>');
                  echo('<option value="I">Inactivo</option>');    
          echo ('</select>');
    }
    ?>
    <button class="button" type="submit">Guardar datos</button>
  </form>
  <a class="hideForm" href="#">Cerrar</a>
