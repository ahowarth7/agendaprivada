<body onUnload="window.opener.location='../contenido/index2.php"> 

<script language="javascript">
function cerrar()
{
window.opener.document.location.reload();
window.close();
	
}
</script>
<?php
include("../includes/conexion_bd.php");
include("../includes/funciones_v2.php");



	$fecha   = $_POST['username'];
	$hora  = $_POST['password'];
	$tipo = $_POST['tipo'];
	$nombre = $_POST['nombre'];
		
	 $qryNvo_Usuario= "update admin set username='".$username."', password='".$password."', tipo='".$tipo."', nombre='".$nombre."' where id_user='".$id_user."'";


	//f_trans_begin($cn);
	mysql_query($qryNvo_Usuario, $cn);   
	//f_trans_commit($cn);

echo "Evento Actualizado Felicidades!!!";

    
//aqui hace la insercion de datos-->

?>

 <input name="button" type="button" onclick="javascript:cerrar();" value="Cerrar esta ventana" /> 
 
                    
