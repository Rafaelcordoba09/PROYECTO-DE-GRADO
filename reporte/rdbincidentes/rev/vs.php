<?php
session_start();
if(!isset($_SESSION['perfil']))
    {
     header("location:rev/rediri.php");
    }
else
    {if($_SESSION['perfil']!='R')
        {
         header("location:rev/rediri.php");
        }
    }
?>