<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php 
require_once '../../dbconnect/database.class.php';

$objDB = new DataBase;

$nodo=$_GET['idnodo'];

$result = $objDB->Execute("SELECT id, id_tramo FROM tramo 
WHERE fk_id_nodo='$nodo'");
$contador=0;
while($incidentex = $result->fetch_assoc())
{
    if($contador==0)
        echo "<option value='".$incidentex['id']."' selected>".$incidentex['id_tramo']."</option>";
    else 
        echo "<option value='".$incidentex['id']."'>".$incidentex['id_tramo']."</option>";
}
?>