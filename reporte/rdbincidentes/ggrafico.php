<?php 
error_reporting(0);
include('rev/vs.php');?>
<?php

require_once '../../dbconnect/database.class.php';

if(isset($_GET['fi'])&&isset($_GET['ff'])&&isset($_GET['ti'])&&isset($_GET['ti2']))
{   $fi=$_GET['fi'];
    $ff=$_GET['ff'];
    $ti=$_GET['ti'];
    $ti2=$_GET['ti2'];


    if($ti2=='r')
    {switch($ti)
        {
        case "all":
            $objDB = new DataBase;
            $resulta = $objDB->Execute("SELECT a.fecha AS nombre, COUNT(*) AS valor 
            FROM incidente a INNER JOIN 
            tramo b ON (a.fk_id_tramo=b.id) 
            INNER JOIN nodo c ON (c.id_nodo= b.fk_id_nodo)
            WHERE a.fecha BETWEEN'".$fi."' AND '". $ff."' 
            GROUP BY a.fecha"); 
            $data = array();  
            foreach($resulta as $row)
                {
                $data[] = $row;
                }
            $resulta->close();
        break;
        default:
            $objDB = new DataBase;
            $resulta = $objDB->Execute("SELECT a.fecha AS nombre, COUNT(*) AS valor 
            FROM incidente a INNER JOIN 
            tramo b ON (a.fk_id_tramo=b.id) 
            INNER JOIN nodo c ON (c.id_nodo= b.fk_id_nodo)
            WHERE a.fecha BETWEEN'".$fi."' AND '". $ff."' 
            AND c.id_nodo=".$ti." 
            GROUP BY a.fecha"); 
            $data = array();  
            foreach($resulta as $row)
                {
                $data[] = $row;
                }
            $resulta->close();
        break;        

            }
    }

    if($ti2=='n')
    {switch($ti)
        {
        case "all":
            $objDB = new DataBase;
            $resulta = $objDB->Execute("SELECT c.nombre AS nombre, COUNT(*) AS valor 
            FROM incidente a INNER JOIN 
            tramo b ON (a.fk_id_tramo=b.id) 
            INNER JOIN nodo c ON (c.id_nodo= b.fk_id_nodo)
            WHERE a.fecha BETWEEN'".$fi."' AND '". $ff."' 
            GROUP BY c.nombre"); 
            $data = array();  
            foreach($resulta as $row)
                {
                $data[] = $row;
                }
            $resulta->close();
        break;
        default:
            $objDB = new DataBase;
            $resulta = $objDB->Execute("SELECT c.nombre AS nombre, COUNT(*) AS valor 
            FROM incidente a INNER JOIN 
            tramo b ON (a.fk_id_tramo=b.id) 
            INNER JOIN nodo c ON (c.id_nodo= b.fk_id_nodo)
            WHERE a.fecha BETWEEN'".$fi."' AND '". $ff."' 
            AND c.id_nodo=".$ti." 
            GROUP BY c.nombre"); 
            $data = array();  
            foreach($resulta as $row)
                {
                $data[] = $row;
                }
            $resulta->close();
        break;        

            }
    }

    if($ti2=='e')
    {switch($ti)
        {
        case "all":
            $objDB = new DataBase;
            $resulta = $objDB->Execute("SELECT a.estado AS nombre, COUNT(*) as valor 
            FROM incidente a INNER JOIN 
            tramo b ON (a.fk_id_tramo=b.id) 
            INNER JOIN nodo c ON (c.id_nodo= b.fk_id_nodo)
            WHERE a.fecha BETWEEN'".$fi."' AND '". $ff."' 
            GROUP BY a.estado"); 
            $data = array();  
            foreach($resulta as $row)
                {
                $data[] = $row;
                }
            $resulta->close();
        break;
        default:
            $objDB = new DataBase;
            $resulta = $objDB->Execute("SELECT a.estado AS nombre, COUNT(*) as valor 
            FROM incidente a INNER JOIN 
            tramo b ON (a.fk_id_tramo=b.id) 
            INNER JOIN nodo c ON (c.id_nodo= b.fk_id_nodo)
            WHERE a.fecha BETWEEN'".$fi."' AND '". $ff."' 
            AND c.id_nodo=".$ti." 
            GROUP BY a.estado"); 
            $data = array();  
            foreach($resulta as $row)
                {
                $data[] = $row;
                }
            $resulta->close();
        break;        

            }
            
    }
    if($ti2=='t')
    {switch($ti)
        {
        case "all":
            $objDB = new DataBase;
            $resulta = $objDB->Execute("SELECT concat(CASE WHEN TIMESTAMPDIFF(hour,CONCAT(b.fecha,' ',b.hora), CONCAT (c.fecha,' ',c.hora))<0
            THEN TIMESTAMPDIFF(hour,CONCAT(b.fecha,' ',b.hora), CONCAT (c.fecha,' ',c.hora))*-1 
            ELSE
            TIMESTAMPDIFF(hour,CONCAT(b.fecha,' ',b.hora), CONCAT (c.fecha,' ',c.hora))
            END,' horas') as nombre, COUNT(*) as valor FROM 
            tramo a INNER JOIN incidente b ON (a.id=b.fk_id_tramo)
            INNER JOIN cie_incidente c ON (b.id_incidente=c.fk_id_incidente) 
            INNER JOIN nodo d ON (d.id_nodo=a.fk_id_nodo)
            WHERE estado='CERRADO' AND b.fecha BETWEEN'".$fi."' AND '". $ff."' 
            GROUP BY CASE 
            WHEN TIMESTAMPDIFF(hour,CONCAT(b.fecha,' ',b.hora), CONCAT (c.fecha,' ',c.hora))<0
            THEN TIMESTAMPDIFF(hour,CONCAT(b.fecha,' ',b.hora), CONCAT (c.fecha,' ',c.hora))*-1 
            ELSE
            TIMESTAMPDIFF(hour,CONCAT(b.fecha,' ',b.hora), CONCAT (c.fecha,' ',c.hora))
            END"); 
            $data = array();  
            foreach($resulta as $row)
                {
                $data[] = $row;
                }
            $resulta->close();
        break;
        default:
            $objDB = new DataBase;
            $resulta = $objDB->Execute("SELECT concat(CASE WHEN TIMESTAMPDIFF(hour,CONCAT(b.fecha,' ',b.hora), CONCAT (c.fecha,' ',c.hora))<0
            THEN TIMESTAMPDIFF(hour,CONCAT(b.fecha,' ',b.hora), CONCAT (c.fecha,' ',c.hora))*-1 
            ELSE
            TIMESTAMPDIFF(hour,CONCAT(b.fecha,' ',b.hora), CONCAT (c.fecha,' ',c.hora))
            END,' horas') as nombre, COUNT(*) as valor FROM 
            tramo a INNER JOIN incidente b ON (a.id=b.fk_id_tramo)
            INNER JOIN cie_incidente c ON (b.id_incidente=c.fk_id_incidente) 
            INNER JOIN nodo d ON (d.id_nodo=a.fk_id_nodo)
            WHERE estado='CERRADO' AND b.fecha BETWEEN'".$fi."' AND '". $ff."' 
            AND d.id_nodo='".$ti."'              
            GROUP BY CASE 
            WHEN TIMESTAMPDIFF(hour,CONCAT(b.fecha,' ',b.hora), CONCAT (c.fecha,' ',c.hora))<0
            THEN TIMESTAMPDIFF(hour,CONCAT(b.fecha,' ',b.hora), CONCAT (c.fecha,' ',c.hora))*-1 
            ELSE
            TIMESTAMPDIFF(hour,CONCAT(b.fecha,' ',b.hora), CONCAT (c.fecha,' ',c.hora))
            END"); 
            $data = array();  
            foreach($resulta as $row)
                {
                $data[] = $row;
                }
            $resulta->close();
        break;        
            }
        }
 // Mostramos los datos en formato JSON
    print json_encode($data);
}
?>