<?php
		include("../includes/conexion_bd.php");
		include("../includes/funciones_v2.php");
		
		$hora = $_GET['hora'];
		$fecha  = $_GET['fecha'];
		
		?>
		
		
<link href="../estilos/estilo.css" rel="stylesheet" type="text/css" />
<script language="JavaScript">
function eliminar(fecha,hora){
var newwin = window.open("../contenido/eliminar_recordatorio.php?fecha=" + fecha + "&hora=" + hora, "newwin", "width=220,height=250,menubar=no,scrollbar=auto,resizable=yes,top=50,left=200,status=yes");
}

</script>


<div style="width:100%;height:60;overflow:auto;" align="center" id="background" >
<table width="100%"px" border="0" cellpadding="2" cellspacing="1" class="estiloback" align="center">
		<tr >
		
		<th width="5%">Hora</th>
		<th width="30%">Asunto</th>
		<th width="20%">Lugar</th>
		<th width="40%">Descripción</th>	
		<th width="5%"><img src="../imagenes/edit.png" width="12" height="12"></th>
		<th width="5%"><img src="../imagenes/eliminar.png" width="12" height="12"></th>
		</tr>
		</table>

</div>

<?php
//$consulta = "select * from calendario_tabla  where fecha = CURDATE()";

$consulta = "select * from recordatorio_tabla where fecha ='".$fecha."' and hora='".$hora."'";

$Recurso=mysql_query($consulta,$cn);
$num_reg=mysql_num_rows($Recurso);
?>

<?php 
$contador=0;
if ($num_reg >0)
{
?>
	
	<div  style="width:100%;height:100%;overflow:auto" align="center">
	<table width="100%px" border="0" cellpadding="0" cellspacing="1" >

<?php 
		while ($arreglo=mysql_fetch_array($Recurso) )
		{
		if($color == 0)
		      {
		         echo '<tr bgcolor="#FFFFFF">'; 
		         $color=1;
		      }
		      else
		      { 
		         echo '<tr bgcolor="#C0C0C0">';
		         $color=0;
		      }
		 
		?>
				
				<th width="5%"%" class="estilorecordatorio" align="justify"><?php echo $arreglo['hora'] ?></th>
				<th width="30%" class="estilorecordatorio" align="justify"><?php echo $arreglo['asunto'] ?></th>
				<th width="20%" class="estilorecordatorio" align="justify"><?php echo $arreglo['lugar'] ?></th>
				<th width="40%" class="estilorecordatorio" align="justify"><?php echo $arreglo['descrip'] ?></th>
				<th width="40%" class="estilorecordatorio" align="justify">
				<?php
				if($arreglo['asunto'] == ""){
									
									echo '&nbsp';
							}
			
							else{
									echo '<p align="center"><a href="javascript:eliminar(\''.$arreglo['fecha'].'\',\''.$arreglo['hora'].'\')"><img style="border:0;" src="../imagenes/eliminar.png" width="14" height="14"></a>';
									
							}
							
							?>
				
				
				</th>
		

<?php 
		} //Cierra el while
		?>
</table>

</div>

<?php
}
else 
{
	echo "No existe ningun evento";
}
?>