<?php
include("../includes/conexion_bd.php");
include("../includes/funciones_v2.php");
$bandera=$_GET['bandera'];
?>



<BODY BACKGROUND= "../imagenes/bac.png" ALT="Fondo">
<form name="test" action="diafestivo_update.php?bandera=<?php echo $bandera; ?>" method="POST">


<H1><img src="../imagenes/evento.png" alt="nuevo" width="72 " height="72" border="0" /> <b>(DIA FESTIVO) <br></H1>

<?php


		//$hora = $_GET['hora'];
		$fecha  = $_GET[orderdate];
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
			
			
			
			$mes_arreglo=array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');	
			
			//$fechaactual=  $dia."-". $mes."-". $anio;
			$fechaactual="$anio-$mes-$dia";
			
				if($fechaactual=='--')
						{ 
							//$busqueda=$fechaactual;
						$busqueda=date("Y-m-d");
						}
					else 
						{
							$busqueda = $fechaactual;
						}
		
		$consulta = "select * from tb_festivo where fecha_dia ='".$busqueda."'";

$Recurso=mysql_query($consulta,$cn);
$num_reg=mysql_num_rows($Recurso);

$arreglo=mysql_fetch_array($Recurso);

?>


<table border="0" cellspacing="5">


<tr><td valign="top"><font face="consola" size="4"><b>Fecha :</font></td><td>


<script type="text/javascript" src="calendarDateInput.js"></script>

<script>DateInput('orderdate', true, 'YYYY-MM-DD','<?php echo $busqueda ?>')</script>


</></tr> 
<!--DIA FESTIVO-->
<tr><td><font face="consola" size="4"><b>Día Festivo :</font></td><td><input type="text" size="50" name="dia_festivo" class="caja" maxlength="255" value="<?php echo $arreglo['dia_festivo'] ?>"></td></tr>

<input name="fecha_ant" type="hidden" value="<?php echo $busqueda ?>" />
<!-- Boton Guardar-->
<tr><td>&nbsp;</td><td><input type="submit" value="Guardar"  onclick="javascript:close();"><font face="consolas" size="1">&nbsp;&nbsp;&nbsp;&nbsp;</font>
&nbsp</td></tr>

</table> 
</form>

</BODY>