
<?php 
error_reporting(0);
include('rev/vs.php');?>
<!DOCTYPE html>
<?php require_once '../../dbconnect/database.class.php';
$objDB = new DataBase;
$result = $objDB->Execute("SELECT * FROM tramo");
$result2= $objDB->Execute("SELECT AVG(dir_origen_lat) as lat, AVG(dir_origen_lon) AS lon FROM tramo");
$co=$result2->fetch_assoc();
?>
<html style="height:100%">
  <head>
    <title>Mapa del Nodo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
      html, body{
        height:100%;
        margin: 0px;
      }
      #googleMap{
        width:100%;
        height:100%;
      }
    </style>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
      function initialize() {

      // Configuración del mapa
      var mapProp = {
       zoom: 11,
      center: {lat: <?=$co['lat'];?>, lng: <?=$co['lon']; ?>},
      mapTypeId: google.maps.MapTypeId.TERRAIN
      };
      // Agregando el mapa al tag de id googleMap
      var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        
      var flightPlanCoordinates = [
          <?php while($coord=$result->fetch_assoc())
          {
           ?> {lat: <?=$coord['dir_origen_lat']?>, lng: <?=$coord['dir_origen_lon']?>},
          <?php }?>
        
      ];
       
      // Información de la ruta (coordenadas, color de línea, etc...)
      var flightPath = new google.maps.Polyline({
        path: flightPlanCoordinates,
        geodesic: true,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 2
      });
       
      // Creando la ruta en el mapa
      flightPath.setMap(map);
      }
        
      // Inicializando el mapa cuando se carga la página
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <div id="googleMap"></div>
  </body>
</html>