		<?php
		
		include("../includes/conexion_bd.php");
		include("../includes/funciones_v2.php");
		//f_imprime_arreglo($_POST);

		
		
		
		
			
			$dia ='';
			$mes='';
			$cadena='';
			for($cont=0;$cont<(strlen($_GET["orderdate"]));$cont++)
			{
				if( ($_GET["orderdate"][$cont]=='-') AND ($dia == '') ){
					$cont++;
					$dia=$cadena;
					$cadena='';
				}
				elseif( ($_GET["orderdate"][$cont]=='-') AND ($dia != '') ){
					$cont++;
					$mes=$cadena;
					break;
				}
  			    $cadena = $cadena .$_GET["orderdate"][$cont];
			}
			
			$anio= substr($_GET["orderdate"],strlen($_GET["orderdate"])-4,4);
			
				$fechaactual= $anio ."-". $mes ."-". $dia;
					
		
		
		?>
	
<link href="../estilos/estilo.css" rel="stylesheet" type="text/css" />

<script language="JavaScript">
function ver_recordatorios(fecha,hora){
var newwin = window.open("../contenido/tabla_recordatorios.php?fecha=" + fecha + "&hora=" + hora, "newwin", "width=900,height=300,menubar=no,scrollbar=auto,resizable=yes,top=100,left=100,status=yes");
}
function elejir_recordatorio(fecha,hora){
var newwin = window.open("../contenido/elejir_recordatorio.php?fecha=" + fecha + "&hora=" + hora, "newwin", "width=950,height=600,menubar=no,scrollbar=auto,resizable=yes,top=20,left=100,status=yes");
}
function edit_evento(fecha,hora,id){
var newwin = window.open("../contenido/edit_evento.php?fecha=" + fecha + "&hora=" + hora + "&id=" + id, "newwin", "width=650,height=700,menubar=no,scrollbar=auto,resizable=yes,top=20,left=200,status=yes");
}
function eliminar(fecha,hora,id){
var newwin = window.open("../contenido/eliminar_guardar.php?fecha=" + fecha + "&hora=" + hora + "&id=" + id, "newwin", "width=300,height=300,menubar=no,scrollbar=auto,resizable=yes,top=200,left=300,status=yes");
}

function ver_evento(fecha,hora){
var newwin = window.open("../contenido/ver_evento.php?fecha=" + fecha + "&hora=" + hora, "newwin", "width=850,height=540,menubar=no,scrollbar=auto,resizable=yes,top=20,left=100,status=yes");
}

function evento(fecha,hora){
var newwin = window.open("../contenido/form_evento.php?fecha=" + fecha + "&hora=" + hora, "newwin", "width=700,height=650,menubar=no,scrollbar=auto,resizable=yes,top=20,left=200,status=yes");
}

</script>



<div style="width:100%;height:30px ;overflow:auto;" align="center" id="background" >
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="estiloback" align="left">
		<tr>
		<th width="4%"></th>
		<th width="5%">Hora</th>
		<th width="25%">Asunto</th>
		<th width="25%">Lugar</th>
		<th width="35%">Descripción</th>
		<th width="3%"><img src="../imagenes/edit.png" width="12" height="12"></th>
		<th width="3%"><img src="../imagenes/eliminar.png" width="12" height="12"></th>
		
		
		</tr>
		</table>

</div>

<?php
		//$consulta = "select * from calendario_tabla  where fecha = CURDATE()";
		if($fechaactual!='')
						{ 
							$busqueda=$fechaactual;
						}
					else 
						{
							$temp="CURDATE()";
							$dia = substr($temp,0,2);
							$mes = substr($temp,3,2);
							$anio = substr($temp,6,4);
							$busqueda = $anio ."-". $mes ."-". $dia;
							
						}
			
			//----------------------------------------
			// sql secuencia
			//----------------------------------------
//$consulta = "Select tabla_final.*, tabla_recordatorio.total_recordatorios
//							FROM
//							(
//							select tabla_guia.fecha, tabla_guia.hora, calendario_tabla.id, calendario_tabla.asunto, calendario_tabla.lugar,calendario_tabla.asiste, 
//							calendario_tabla.descripcion,  calendario_tabla.infor, calendario_tabla.notas 
//							from 
//							(select '$busqueda' as fecha, hora from cat_horario) as tabla_guia left join calendario_tabla
//							ON
//							tabla_guia.fecha = calendario_tabla.fecha and tabla_guia.hora = calendario_tabla.hora order by tabla_guia.fecha, tabla_guia.hora
//							) as tabla_final
//							
//							LEFT JOIN
//							
//							(select min(fecha) as fecha_recordatorio, min(hora) as hora_recordatorio, count(fecha) as total_recordatorios 
//							 from recordatorio_tabla group by fecha, hora) as tabla_recordatorio
//							
//							ON tabla_final.fecha = tabla_recordatorio.fecha_recordatorio
//							and
//							tabla_final.hora = tabla_recordatorio.hora_recordatorio";
			
						
echo $consulta = "select  min(fecha) as fecha, min(hora) as hora, min(total_recordatorios) as total_recordatorios,
min(total_eventos) as total_eventos,
min(id) as id, min(asunto)as asunto, min(lugar) as lugar, min(asiste) as asiste,
min(descripcion) as descripcion, min(infor) as infor, min(notas) as notas

FROM
(
    Select tabla_final.*, tabla_recordatorio.total_recordatorios
    FROM
    (
    select tabla_guia.fecha, tabla_guia.hora, calendario_tabla.id,calendario_tabla.asunto, calendario_tabla.lugar,calendario_tabla.asiste, 
    calendario_tabla.descripcion,  calendario_tabla.infor, calendario_tabla.notas 
    from 
    (select '$busqueda' as fecha, hora from cat_horario) as tabla_guia left join calendario_tabla
    ON
    tabla_guia.fecha = calendario_tabla.fecha and tabla_guia.hora = calendario_tabla.hora order by tabla_guia.fecha, tabla_guia.hora
    ) as tabla_final
    
    LEFT JOIN
    
    (select min(fecha) as fecha_recordatorio, min(hora) as hora_recordatorio, count(fecha) as total_recordatorios 
     from recordatorio_tabla group by fecha, hora) as tabla_recordatorio
    
    ON tabla_final.fecha = tabla_recordatorio.fecha_recordatorio
    and
    tabla_final.hora = tabla_recordatorio.hora_recordatorio
) as consulta_final

left join

(
    select min(fecha) as fecha_evento, min(hora) as hora_evento, count(fecha) as total_eventos 
     from calendario_tabla group by fecha, hora
) as tabla_eventos
ON 
consulta_final.fecha = tabla_eventos.fecha_evento AND consulta_final.hora = tabla_eventos.hora_evento 
GROUP BY fecha, hora";

						$Recurso=mysql_query($consulta,$cn);
						$num_reg=mysql_num_rows($Recurso);
?>
	
<?php 
		$contador=0;
	if ($num_reg >0)
		{
?>
	
	<div  style="width:100%;height:400;overflow:scroll" align="center">
	<table height="600px" width="100%px" border="0" cellpadding="0" cellspacing="1" align="left" >

<?php 
		while ($arreglo=mysql_fetch_array($Recurso) )
		{
		if($color == 0)
		      {
?>
		         <tr class="linea">
<?php
		         $color=1;
		      }
		      else
		      { 
?>
				<tr bgcolor="#FFFFFF" > 
		         
<?php
		         $color=0;
		      }
		 
?>
			
		
				
				
					<th width="4%" class="estilo3">
 					<?php
 					if ($arreglo['total_recordatorios'] > 0){
echo '<table border="0" cellspacing="5"><tr> <td height"20px">'.$arreglo['total_recordatorios'].'</td><td height"20px><p align="center"><a href="javascript:ver_recordatorios(\''.$arreglo['fecha'].'\',\''.$arreglo['hora'].'\')"><img style="border:0;" src="../imagenes/recordatorio.png" width="20" height="20"></a></td></tr></table>';
 
 					}else {
 						echo '&nbsp;';
 					}
 					?>
				</th>
				
				<th width="5%"  class="hora" align="center"><?php echo'<a href="javascript:evento(\''.$arreglo['fecha'].'\',\''.$arreglo['hora'].'\')">'?><?php echo $arreglo['hora'] ?></th>
		
		
				<th width="25%"  class="contenidotabla2" align="left">
				<?php 
		
				if($arreglo['total_eventos'] > 1){
						echo '<a href="javascript:elejir_recordatorio(\''.$arreglo['fecha'].'\',\''.$arreglo['hora'].'\')"><img style="border:0;" src="../imagenes/rojo.png" width="20" height="20"></a>';
						echo '</th>';
						echo '<th width="25%"  class="contenidotabla2" align="center">&nbsp;</th>';
						echo '<th width="36%" class="contenidotabla2" align="left">&nbsp;</th>';
						echo '<th width="2%" class="contenidotabla" align="left">';
				}

				else{
						echo '<a href="javascript:ver_evento(\''.$arreglo['fecha'].'\',\''.$arreglo['hora'].'\')">'?> <?php echo $arreglo['asunto'];
						echo '</th>';
						echo '<th width="25%"  class="contenidotabla2" align="center">'. $arreglo['lugar'] .'</th>';
						echo '<th width="36%" class="contenidotabla2" align="left">'. $arreglo['descripcion'] .'</th>';
						echo '<th width="2%" class="contenidotabla" align="left">';
				}
		
				if( ($arreglo['asunto'] == "") || ($arreglo['total_eventos'] > 1) ){
						echo '&nbsp';
				}

				else{
						echo '<p align="center"><a href="javascript:edit_evento(\''.$arreglo['fecha'].'\',\''.$arreglo['hora'].'\',\''.$arreglo['id'].'\')"><img style="border:0;" src="../imagenes/edit.png" width="14" height="14"></a>';
				}
				
				?></th>
				
				<th width="2%" class="contenidotabla" align="left">
				
				<?php 
				if( ($arreglo['asunto'] == "") || ($arreglo['total_eventos'] > 1) ){
						echo '&nbsp';
				}

				else{
						echo '<p align="center"><a href="javascript:eliminar(\''.$arreglo['fecha'].'\',\''.$arreglo['hora'].'\',\''.$arreglo['id'].'\')"><img style="border:0;" src="../imagenes/eliminar.png" width="14" height="14"></a>';
				}
				
				?></th>
				
				
				</tr>
		

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

<!--Aqui finaliza la tabla -->