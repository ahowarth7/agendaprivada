<?php
include("../includes/conexion_bd.php");
include("../includes/funciones_v2.php");
$bandera=$_GET['bandera'];
?>


<BODY BACKGROUND= "../imagenes/bac.png" ALT="Fondo">
<form name="test" action="../contenido/guardar_recordatorio.php?bandera=<?php echo $bandera; ?>" method="POST">


<H1><img src="../imagenes/recordatorio.png" alt="nuevo" width="72 " height="72" border="0" /> <b>(RECORDATORIO)<br></H1>

<?php


$tipo='evento';


?>


<table border="0" cellspacing="5">


<tr><td valign="top"><font face="consola" size="4"><b>Fecha :</font></td><td>

<script type="text/javascript" src="calendarDateInput.js"></script>

<script>DateInput('orderdate', true, 'YYYY-MM-DD')</script>


<tr><td><font face="consola" size="4"><b>Hora :</font></td><td>
	<SELECT face="consola" NAME=hora class="estilo4">
		<OPTION>03
		<OPTION>04
		<OPTION>05
		<OPTION>06
		<OPTION>07
		<OPTION>08
		<OPTION>09
		<OPTION>10
		<OPTION>11
		<OPTION>12
		<OPTION>13
		<OPTION>14
		<OPTION>15
		<OPTION>16
		<OPTION>17
		<OPTION>18
		<OPTION>19
		<OPTION>20
		<OPTION>21
		<OPTION>22
		<OPTION>23
		<OPTION>24
		</SELECT>


<input type="text" size="1" name="hora2" maxlength="2" class="caja">
</tr> 
<!-- Asunto-->
<tr><td><font face="consola" size="4"><b>Asunto :</font></td><td><input type="text" size="40" name="asunto"  class="caja"></td></tr>

<!-- Lugar -->
<tr><td valign="top"><font face="consola" size="4"><b>Lugar :</font></td><td><input type="text" size="40" name="lugar" class="caja"></td></tr>

<!-- Descripcion -->
<tr><td valign="top"><font face="consola" size="4"><b>Descripción :</font></td><td><textarea name="descripcion" size="60" class="caja" rows="6" cols="30"></textarea></td></tr>


<!-- Boton Guardar-->
<tr><td>&nbsp;</td><td><input type="submit" value="Guardar"  onclick="javascript:document.test.bandera.value='<?php echo $bandera ?>';document.test.submit();"><font face="consolas" size="1">&nbsp;&nbsp;&nbsp;&nbsp;</font>
&nbsp</td></tr>

</table> 
</form>

</BODY>