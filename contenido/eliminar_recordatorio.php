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



    $fecha = $_GET['fecha'];
	$hora  = $_GET['hora'];


	
	$qryNvo_Usuario= "delete FROM recordatorio_tabla where fecha='".$fecha."' AND hora='".$hora."'";
	                   
	//f_trans_begin($cn);
	mysql_query($qryNvo_Usuario, $cn);   
	//f_trans_commit($cn);

echo "Evento Eliminado !!!";


    
//aqui hace la insercion de datos-->

?>
<input name="button" type="button" onclick="javascript:cerrar();" value="Cerrar esta ventana" /> 
 