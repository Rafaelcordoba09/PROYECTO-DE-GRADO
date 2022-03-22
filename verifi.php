<?php
include('credenciales.php');
$usu=$_POST['usuario'];
$cla=$_POST['clave'];

$mysqli = new mysqli($server, $user, $password, $database, $port);
if($mysqli->connect_error) {
  exit('Error en la Conexión de la BD');
}

$query = "SELECT count(*),perfil,id,usuario FROM usuario
WHERE usuario='$usu' and clave=md5('$cla') and estado='A' GROUP BY perfil,id,usuario";
if ($result = $mysqli->query($query)) 
    {
        $row=$result->fetch_array();
        if($row[0]>0)
        {   
            session_start();
            $_SESSION['login']='ok';
            $_SESSION['id_usuario']=$row[2];
            $_SESSION['usuario']=$row[3];

            if($row[1]=='A')
            { $_SESSION['perfil']='A';
             header("location:admin/index.php");
            }
            if($row[1]=='R')
            {$_SESSION['perfil']='R';
             header("location:reporte/index.php");
            }
            if($row[1]=='O')
            {$_SESSION['perfil']='O';
             header("location:operador/index.php");
            }
        }
        else
        {   
            header("location:index.php");
        }
    }
else
{
   // echo("Ocurrió un error ". $mysqli->error);
   echo("Ocurrió un error ");
}
$mysqli->close();
?>