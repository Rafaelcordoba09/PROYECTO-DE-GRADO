

<?php
require_once '../../../dbconnect/database.class.php';
$objDB = new DataBase;
session_start();
$fk=$_SESSION['incx'];
?>
  <form id="frmDetalleC" class="form" enctype="multipart/form-data">
    <input type="hidden" name="fk_id_incidente" id="fk_id_incidente"  value="<?= $fk ?>" />
    <label>
      Fecha   
    <input type="date" name="fecha" id="fecha" value="" required/>
    </label>
    <label>
      Hora   
      <input type="time" name="hora" id="hora" value="" required/>
    </label>
    <label>
      Accion    
      <input type="text" name="accion" id="accion" value="" required/>
    </label>
    <label>
      Tipo Falla    
      <select name="tipo_falla" id="tipo_falla">
          <option value="VANDALISMO">Vandalismo</option>
          <option value="ERROR HUMANO">Error Humano</option>
          <option value="TÉCNICA">Técnica</option>
          <option value="FUERZA MAYOR">Fuerza Mayor</option>
      </select>
    </label>
    <label>
      Causa Falla    
      <select name="causa_falla" id="causa_falla">
       <option value="ATENUACION CAIDA OBJETO">Atenuación por Caida de Objeto </option>
       <option value="APERTURA POR PODA DE ARBOLES">Apertura por poda de árboles </option>
       <option value="APERTURA POR PASO DE VEHICULO DE GRAN TAMAÑO">Apertura por Paso de Vehículo </option>
       <option value="HURTO O VANDALISMO">Hurto o Vandalismo </option>
       <option value="ACCION DE TERCERO SOBRE LA FIBRA">Acción de Tercero Sobre la Fibra</option>
       <option value="INCENDIO RECÁMARAS">Incendio Recámaras</option>
       <option value="DERRUMBES">Derrumbes</option>
       <option value="CAIDA DE POSTE">Caida de Poste</option>
       <option value="OTRO">Otro</option>
      </select>
    </label>
    <label>
     Numero Clientes Afectados 
      <input type="text" name="no_clientes" id="no_clientes" value="" required/>
    </label>
    <label>
      Adjunto    
      <input type="file" name="adjunto" id="adjunto" required/>
    </label>
    <button class="button" type="submit">Guardar datos</button>
  </form>
  <a class="hideForm" href="#">Cerrar</a>
