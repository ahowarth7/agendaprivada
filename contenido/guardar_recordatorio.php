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

//union de variable con los campos de la tabla

	$fecha   = $_POST['orderdate'];
	$hora  = $_POST['hora'].':'.$_POST['hora2'];
	$asunto = $_POST['asunto'];
	$lugar = $_POST['lugar'];
	$descripcion  = $_POST['descripcion'];
	$bandera= $_GET['bandera'];
	

//insert para almacenar los valores ne la base de datos.
 $sql="select * from recordatorio_tabla where hora='$hora' and fecha ='$fecha' ";
$result=mysql_query($sql);
 $registro=mysql_num_rows($result);
//if (mysql_num_rows($result) > 0){

	//echo "YA TIENE UN RECORDATORIO Para Ese Dia y Hora";

	//echo "Vuelve a Ingresar el RECORDATORIO en otra Hora o Otra Fecha";
	
//}else{
	
	 $qryNvo_Usuario= "insert into recordatorio_tabla (fecha,hora,asunto,lugar,descrip) VALUES ('$fecha','$hora','$asunto','$lugar','$descripcion')";
	                   
	//f_trans_begin($cn);
	mysql_query($qryNvo_Usuario, $cn);   
	//f_trans_commit($cn);

echo "RECORDATORIO Almacenado Felicidades!!!";
?>

<input name="button" type="button" onclick="javascript:cerrar();" value="Cerrar esta ventana" />