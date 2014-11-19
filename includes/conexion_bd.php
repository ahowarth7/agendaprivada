<?php
//************************************************************
// ASIGNACION DE LAS VARIABLES SEGUN SERVIDOR  ***************
//************************************************************

//$tipo_host = "localhost";	  // Database server
$tipo_host = "localhost";	  				

switch ($tipo_host)
{
   case "localhost":
            $database_server = "localhost";	
            $database_user = "root";			 // Database username
            $database_pass = "";					 // Database password
            $database_name = "calendario";			 // Database name
            $maxlifetime = "3600";				 // Cookie max life time in seconds
        break;
        
   case "servidor":
            $database_server = "conalepdireccion.db.7750832.hostedresource.com";	 // Database server
            $database_user = "conalepdireccion";				    // Database username
            $database_pass = "Conalep2011";					 // Database password
            $database_name = "conalepdireccion";			       // Database name
            $maxlifetime = "";				 // Cookie max life time in seconds
        break;
}

//************************************************************
// CONEXION A LA BASE DE DATOS Y SELECION DE BASE DE DATOS
//************************************************************



$cn = mysql_connect($database_server,$database_user,$database_pass);


if(!$cn)
{
echo "NO A SE A PODIDO REALIZAR LA CONEXION CON EL SISTEMA";
}
else 
{
  "Conectado a la base de datos </br>";
}

if(!@mysql_select_db($database_name))
{
echo "NO A SIDO POSIBLE CONECTARSE A LA BASE DE DATOS";  
}

?>
