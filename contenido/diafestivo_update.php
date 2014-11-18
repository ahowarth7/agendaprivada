
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



	$fecha   = $_POST['orderdate'];
	$dia  = $_POST['dia_festivo'];

	 $qryNvo_Usuario= "update tb_festivo set fecha_dia='".$fecha."', dia_festivo='".$dia."' where fecha_dia='".$fecha."'" ;


	//f_trans_begin($cn);
		mysql_query($qryNvo_Usuario, $cn);   
	//f_trans_commit($cn);

echo "Dia festivo Actualizado Felicidades!!!";

    
//aqui hace la insercion de datos-->

?>

 <input name="button" type="button" onclick="javascript:cerrar();" value="Aceptar" /> 