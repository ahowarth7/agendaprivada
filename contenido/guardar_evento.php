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
	$hora  = $_POST['hora'].':'.$_POST['hora2'];
	$asunto = $_POST['asunto'];
	$lugar = $_POST['lugar'];
	$asiste   = $_POST['asiste'];
	$descripcion  = $_POST['descripcion'];
	$infor = $_POST['infor'];
	$notas = $_POST['notas'];
	$bandera= $_GET['bandera'];
	


 $sql="select * from calendario_tabla where hora='$hora' and fecha ='$fecha' ";
$result=mysql_query($sql);
 $registro=mysql_num_rows($result);

	 	$qryNvo_Usuario= "insert into calendario_tabla (fecha,hora,asunto,lugar,asiste,descripcion,infor,notas) VALUES ('$fecha', '$hora', '$asunto','$lugar', '$asiste', '$descripcion', '$infor', '$notas')";      
		mysql_query($qryNvo_Usuario, $cn);   

?>
<script language="javascript">

window.opener.document.location.reload();
window.close();
</script> 


