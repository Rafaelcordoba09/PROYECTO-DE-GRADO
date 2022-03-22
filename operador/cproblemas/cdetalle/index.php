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
      <a class="button showForm" href="#">Nuevo Detalle</a>
      <a class="button showFormy" href="#">Cerrar Problema</a>
      <table id="table" class="tables">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </thead>
        <tbody class="listDetalles">
          <?php 
          // session_start();
          include_once 'detalle.list.php';?>
        </tbody>
      </table>
    </div>
    <div class="modalFrmDetalle"></div>
    <div class="modalFrmDetalleC"></div>
  </body>
  <script src="funcs.js"></script>
</html>
