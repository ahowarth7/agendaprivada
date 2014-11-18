<link href="../estilos/estilo.css" rel="stylesheet" type="text/css" />
<link href="../estilos/ano.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php print @$_GET['css'] ?>" />		

<?php
			include("../includes/conexion_bd.php");
			include("../includes/funciones_v2.php");
			
			
				//f_imprime_arreglo($_POST);	
				//f_imprime_arreglo($_GET);


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
  			    $cadena = $cadena . $_GET["orderdate"][$cont];
			}
			
			$anio= substr($_GET["orderdate"],strlen($_GET["orderdate"])-4,4);
			
				$fechaactual= $anio ."-". $mes ."-". $dia;
			
?>	


<script language="JavaScript">
function evento(fecha,hora){
var newwin = window.open("../contenido/form_evento.php?fecha=" + fecha + "&hora=" + hora, "newwin", "width=700,height=650,menubar=no,scrollbar=auto,resizable=yes,top=50,left=200,status=yes");
}

function ver_evento(fecha,hora){
var newwin = window.open("../contenido/ver_evento.php?fecha=" + fecha + "&hora=" + hora, "newwin", "width=850,height=540menubar=no,scrollbar=auto,resizable=yes,top=100,left=100,status=yes");
}

</script>

<script language="JavaScript">
function ver_recordatorios(fecha,hora){
var newwin = window.open("../contenido/tabla_recordatorios.php?fecha=" + fecha + "&hora=" + hora, "newwin", "width=1100,height=300,menubar=no,scrollbar=auto,resizable=yes,top=100,left=100,status=yes");
}

function edit_evento(fecha,hora){
var newwin = window.open("../contenido/edit_evento.php?fecha=" + fecha + "&hora=" + hora, "newwin", "width=520,height=650,menubar=no,scrollbar=auto,resizable=yes,top=50,left=200,status=yes");
}
</script>

<script language="JavaScript">
  function eliminar(fecha,hora)
  {
  var newwin = window.open("../contenido/eliminar_guardar.php?fecha=" + fecha + "&hora=" + hora, "newwin", "width=300,height=150,menubar=no,scrollbar=auto,resizable=yes,top=50,left=500,status=yes");

  }
</script>




<table width="100%" height="30" border="0">
  <tr>
    <td width="25%" height="75%" valign="top" >
   
		<div align="center">    
			<?php
							$consulta = "SELECT distinct(fecha)as fecha from calendario_tabla";
							$Recurso=mysql_query($consulta,$cn);
							$num_reg=mysql_num_rows($Recurso);
			
					require_once("../source/activecalendar2.php");
					$myurl=$_SERVER['PHP_SELF']."?css=../estilos/default.css"; // the links url is this page
					//echo $myurl;
					$yearID=false; // init false to display current year
					$monthID=false; // init false to display current month
					$dayID=false; // init false to display current day
					extract($_GET); // get the new values (if any) of $yearID,$monthID,$dayID
					$arrowBack="<img src=\"../imagenes/back.png\" border=\"0\" alt=\"&lt;&lt;\" />"; // use png arrow back
					$arrowForw="<img src=\"../imagenes/forward.png\" border=\"0\" alt=\"&gt;&gt;\" />"; // use png arrow forward
					if($_GET["monthID"] == '')
 					   $cal = new activeCalendar($anio,$mes,$dayID);
					else  
					   $cal = new activeCalendar($_GET["yearID"],$_GET["monthID"],$dayID);
					
					$cal->enableMonthNav($myurl,$arrowBack,$arrowForw); // enables navigation controls
					$cal->enableDatePicker(2000,2010,$myurl); // enables date picker (year range 2000-2010)
					$cal->enableDayLinks($myurl); // enables day links
					while ($arreglo=mysql_fetch_array($Recurso) ){
						$vardia = substr($arreglo["fecha"],8,2)."-".substr($arreglo["fecha"],5,2)."-".substr($arreglo["fecha"],0,4);
						//substr($arreglo["fecha"],5,2)
						//substr($arreglo["fecha"],8,2)
					$cal->setEvent(substr($arreglo["fecha"],0,4),substr($arreglo["fecha"],5,2),substr($arreglo["fecha"],8,2));
					}
					//$cal->enableWeekNum("Sem",$myurl); // enables week number column with linkable week numbers
					
			?> 
				    
			<?php print $cal->showMonth(); ?>
		</div>
    
    
    </td>
    <td width="75%" rowspan="2">
<!--=============================================================================================-->

			<div style="width:100%;height:35 ;overflow:auto;" align="center" id="background" >
			<table width="100%"px" border="0" cellpadding="2" cellspacing="1" class="estiloback" align="left">
					<tr>
					<th width="5%"></th>
					<th width="6%">Hora</th>
					<th width="55%">Asunto</th>
					<th width="5%"><img src="../imagenes/new.png" width="12" height="12"></th>
					<th width="5%"><img src="../imagenes/edit.png" width="12" height="12"></th>
					<th width="5%"><img src="../imagenes/eliminar.png" width="12" height="12"></th>		
					</tr>
					</table>
			
			</div>
			
			<?php
	
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
							$consulta = "Select tabla_final.*, tabla_recordatorio.total_recordatorios
							FROM
							(
							select tabla_guia.fecha, tabla_guia.hora, calendario_tabla.id, calendario_tabla.asunto, calendario_tabla.lugar,calendario_tabla.asiste, 
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
							tabla_final.hora = tabla_recordatorio.hora_recordatorio";
							$Recurso=mysql_query($consulta,$cn);
							$num_reg=mysql_num_rows($Recurso);
			?>
				
			<?php 
					$contador=0;
				if ($num_reg >0)
					{
			?>
				
				<div  style="width:100%;height:870;overflow:auto" align="center">
				<table height="1900px" width="100%px" border="0" cellpadding="2" cellspacing="1" align="left" >
			
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
								
							<th width="5%" class="estilo3">
			 					<?php
			 					if ($arreglo['total_recordatorios'] > 0){
			echo '<table border="0" cellspacing="5"><tr> <td height"20px">'.$arreglo['total_recordatorios'].'</td><td height"20px><p align="center"><a href="javascript:ver_recordatorios(\''.$arreglo['fecha'].'\',\''.$arreglo['hora'].'\')"><img src="../imagenes/recordatorio.png" width="12" height="12"></a></td></tr></table>';
			 
			 					}
			 					else {
			 						echo '&nbsp;';
			 					}
			 					?>
							</th>
							
							<th width="7%"  class="hora" align="center"><?php echo $arreglo['hora'] ?></th>
					
					
							<th width="55%"  class="contenidotabla2" align="left"><?php echo '<a href="javascript:ver_evento(\''.$arreglo['fecha'].'\',\''.$arreglo['hora'].'\')">'?> <?php echo $arreglo['asunto'] ?></th>
			
							<th width="5%" class="contenidotabla" align="left">
							
							<?php 
					
							if($arreglo['asunto'] == ""){
									echo '<p align="center"><a href="javascript:evento(\''.$arreglo['fecha'].'\',\''.$arreglo['hora'].'\')"><img src="../imagenes/new.png" width="14" height="14"></a>';
									
							}
			
							else{
									echo '&nbsp';
							}
							
							?></th>
							
							<th width="5%" class="contenidotabla" align="left">
							
							<?php 
					
							if($arreglo['asunto'] == ""){
									echo '&nbsp';
							}
			
							else{
									echo '<p align="center"><a href="javascript:edit_evento(\''.$arreglo['fecha'].'\',\''.$arreglo['hora'].'\')"><img src="../imagenes/edit.png" width="14" height="14"></a>';
							}
							
							?></th>
							
							<th width="4%" class="contenidotabla" align="left">
							
							<?php 
							if($arreglo['asunto'] == ""){
									echo '&nbsp';
							}
			
							else{
									echo '<p align="center"><a href="javascript:eliminar(\''.$arreglo['fecha'].'\',\''.$arreglo['hora'].'\')"><img src="../imagenes/eliminar.png" width="14" height="14"></a>';
							}
							
							?></th>
							
							
							</tr>
			
							<?php 
									} //Cierra el while
							?>
			</table>

</div></td>
  </tr>
  <tr>
  	<!--semana-->
    <td valign="top" bgcolor="Silver" height="25%">
    
    </td>
  </tr>
</table>

</form>
<?php
}
else 
{
	echo "No existe ningun evento";
}
?>

