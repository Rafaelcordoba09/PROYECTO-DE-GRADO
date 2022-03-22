<?php 
error_reporting(0);
include('rev/vs.php');?>
<html>
  <head>
	<link href="../cmodelo/css/bootstrap.min.css" rel="stylesheet">
	<link href="../cmodelo/css/font-awesome.min.css" rel="stylesheet">
	<link href="../cmodelo/css/datepicker3.css" rel="stylesheet">
	<link href="../cmodelo/css/styles.css" rel="stylesheet">
	<link rel='shortcut icon' type='image/x-icon' href='../cmodelo/images/favicon.ico'/>

	  
	<script src="../cmodelo/js/jquery-3.4.1.min.js"></script>
	<script src="../cmodelo/js/bootstrap.min.js"></script>
	<script src="../cmodelo/js/chart.min.js"></script>
	<script src="../cmodelo/js/chart-data.js"></script>
	<script src="../cmodelo/js/easypiechart.js"></script>
	<script src="../cmodelo/js/easypiechart-data.js"></script>
	<script src="../cmodelo/js/bootstrap-datepicker.js"></script>
	<script src="../cmodelo/js/custom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
  	<script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  </head>
  <body>
    <div class="bg"></div>
    <div class="block">
       <a class="button graficax1" href="#">Resumen(Fecha)</a>
       <a class="button graficax2" href="#">Numero</a>
       <a class="button graficax3" href="#">Estado</a>
       <a class="button graficax4" href="#">Tiempo de Solucion</a>
       </div>
      <table id="table" class="tables">
      
        <thead>
          <tr id="listax"> 
              <label for="filtrox">Nodo &nbsp;&nbsp;</label>
              <select name="filtrox" id="filtrox">
              <option value="none" selected>Seleccione un Nodo</option>
                  <?php
                    include_once('tramo.list.nodos.php');
                  ?>
              </select>&nbsp;
          </tr>
          <tr id="listay"> 
              <label for="filtroy">Tramo &nbsp;&nbsp;</label>
              <select name="filtroy" id="filtroy">
              </select>&nbsp;
          </tr>
          <tr>
              <label for="finicial">F. Inicial &nbsp;&nbsp;</label>
              <input type="date" name="finicial" id="finicial">&nbsp;
          </tr> 
          <tr>
              <label for="ffinal">F. Final &nbsp;&nbsp;</label>
              <input type="date" name="ffinal" id="ffinal">&nbsp;
          </tr>
          <tr>
              <label for="tipograf">Tipo Grafica &nbsp;&nbsp;</label>
                <select id="tipograf">
                    <option value="barras" selected>barras</option>
                    <option value="lineas">lineas</option>
                    <option value="pastel">pastel</option>
                    <option value="radar">radar</option>
                </select>
          </tr>
          </thead>
  </table> 
  <div class="row">
   <div id="contenedor" class="col-md-12" >
       <canvas id="miGrafico" height="400%">

       </canvas> 
   </div>
</div>	
<script src="graficos.js"></script>
<script src="funcs.js"></script>
</body>

