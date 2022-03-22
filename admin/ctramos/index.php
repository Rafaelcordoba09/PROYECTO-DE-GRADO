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

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
  	<script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  </head>
  <body>
    <div class="bg"></div>
    <div class="block">
      <a class="button showForm" href="#">Nuevo Tramo</a>
      <table id="table" class="tables">
      
        <thead>
          <tr id="listax"> 
              <label for="filtrox">Nodos &nbsp;&nbsp;</label>
              <select name="filtrox" id="filtrox">
                  <?php
                    include_once('tramo.list.nodos.php');
                  ?>
              </select>
          </tr>
          <tr>
            <th>Nombre del Nodo</th>
            <th>Kilometro</th>
            <th>Latitud</th>
            <th>Longitud</th>
            <th>Distancia (Km)</th>
            <th>Hilos</th>
            <th>Acciones</th>
        </thead>
        <tbody class="listTramos">
          <?php include_once 'tramo.list.php' ?>
        </tbody>
      </table>
    </div>
    <div class="modalFrmTramo"></div>
  </body>
  <script src="funcs.js"></script>
</html>
