<?php
include("../includes/conexion_bd.php");
include("../includes/funciones_v2.php");
$bandera=$_GET['bandera'];
?>


<BODY BACKGROUND= "../imagenes/bac.png" ALT="Fondo">
<form name="test" action="diafestivo_guardar.php?bandera=<?php echo $bandera; ?>" method="POST">


<H1><img src="../imagenes/evento.png" alt="nuevo" width="72 " height="72" border="0" /> <b>(DIA FESTIVO) <br></H1>

<?php
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
	
?>


<table border="0" cellspacing="5">

<tr><td valign="top"><font face="consola" size="4"><b>Fecha :</font></td><td>

<script type="text/javascript" src="calendarDateInput.js"></script>

<script>DateInput('orderdate', true, 'YYYY-MM-DD','<?php echo $busqueda ?>')</script>



<!-- Asunto-->
<tr><td><font face="consola" size="4"><b>Día Festivo :</font></td><td><input type="text" size="50" name="dia"  class="caja" maxlength="255"></td></tr>

<!-- Boton Guardar-->
<tr><td>&nbsp;</td><td><input type="submit" value="Guardar"  onclick="javascript:document.test.bandera.value='<?php echo $bandera ?>';document.test.submit();"><font face="consolas" size="1">&nbsp;&nbsp;&nbsp;&nbsp;</font>
&nbsp</td></tr>

</table> 

</form>

</BODY>