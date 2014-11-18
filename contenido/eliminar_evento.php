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
	$id = $_GET['id'];

	
		$qryNvo_Usuario= "delete FROM calendario_tabla where fecha='$fecha' AND hora='$hora' AND id!='$id'";               
		mysql_query($qryNvo_Usuario, $cn);   


?>
	<input name="button" type="button" onclick="javascript:cerrar();" value="Cerrar esta ventana" /> 