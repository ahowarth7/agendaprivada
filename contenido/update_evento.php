
<body onUnload="window.opener.location='../contenido/index2.php"> 


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
	$fecha_ant = $_POST['fecha_ant'];
	$hora_ant = $_POST['hora_ant'];
	$id = $_POST['id'];
	
	

	
	 $qryNvo_Usuario= "update calendario_tabla set fecha='".$fecha."', hora='".$hora."', asunto='".$asunto."', lugar='".$lugar."', asiste='".$asiste."', descripcion='".$descripcion."', infor='".$infor."', notas='".$notas."' where id='$id'" ;
		
		

	//f_trans_begin($cn);
		mysql_query($qryNvo_Usuario, $cn);   
	//f_trans_commit($cn);
?>
<script language="javascript">

window.opener.document.location.reload();
window.close();
	
</script>
 
                    
