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



	
	$fecha   = $_POST['orderdate'];
	$diafestivo = $_POST ['dia'];


	 	$qryNvo_Usuario= "insert into tb_festivo (fecha_dia,dia_festivo) VALUES ('$fecha', '$diafestivo')";
		mysql_query($qryNvo_Usuario, $cn);   

		echo "Dia Festivo Almacenado";

    
//aqui hace la insercion de datos-->

?>
<input name="button" type="button" onclick="javascript:cerrar();" value="Cerrar esta ventana" /> 


