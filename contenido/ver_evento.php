

<?php
include("../includes/conexion_bd.php");
include("../includes/funciones_v2.php");
$bandera=$_GET['bandera'];
?>


<BODY BACKGROUND= "../imagenes/bac.png" ALT="Fondo" onload="focus()">
<form name="test" action="../contenido/update_evento.php" method="POST">


<H1><img src="../imagenes/ver.png" alt="nuevo" width="72 " height="72" border="0" /> <b> VER EVENTO <br></H1>

<?php
		$hora = $_GET['hora'];
		$fecha  = $_GET['fecha'];
		
		$consulta = "select * from calendario_tabla where fecha ='".$fecha."' and hora='".$hora."'";

		$Recurso=mysql_query($consulta,$cn);
		$num_reg=mysql_num_rows($Recurso);

		$arreglo=mysql_fetch_array($Recurso);
?>


<table border="0" cellspacing="5">

<!-- fecha-->
<tr><td><font face="calabri" size="4"><b>Fecha :</font></td><td><input type="text" size="10" name="fecha"  class="caja" value="<?php echo $arreglo['fecha'] ?>" readonly="readonly"></td></tr>

<!-- Hora-->
<tr><td><font face="calabri" size="4"><b>Hora :</font></td><td><input type="text" size="10" name="hora"  class="caja" value="<?php echo $arreglo['hora'] ?>" readonly="readonly"></td></tr>

<!-- Asunto-->
<tr><td><font face="calabri" size="4"><b>Asunto :</font></td><td><input type="text" size="80" name="asunto"  class="caja" value="<?php echo $arreglo['asunto'] ?>" readonly="readonly"></td></tr>

<!-- Lugar -->
<tr><td valign="top"><font face="calabri" size="4"><b>Lugar :</font></td><td><input type="text" size="80" name="lugar" class="caja" value="<?php echo $arreglo['lugar'] ?>" readonly="readonly"></td></tr>

<!-- Descripcion -->
<tr><td valign="top"><font face="calabri" size="4"><b>Descripción :</font></td><td><textarea name="descripcion" size="80" class="caja" rows="4" cols="60" readonly="readonly" ><?php echo $arreglo['descripcion'] ?> </textarea></td></tr>

<!-- Informacion requerida -->
<tr><td valign="top"><font face="calabri" size="4"><b>Responsable :</font></td><td><input type="text" size="80" name="infor" value="<?php echo $arreglo['infor'] ?>" readonly="readonly"></td></tr>

<!-- Asiste -->
<tr><td valign="top"><font face="calabri" size="4" class="estilo4"><b>Quién Asiste :</font></td><td><input type="text" size="80" name="asiste" class="caja" value="<?php echo $arreglo['asiste'] ?>"readonly="readonly"></textarea></td></tr>

<!-- Notas -->
<tr><td valign="top"><font face="calabri" size="4"><b>Notas :</font></td><td><textarea name="notas" rows="4" cols="60"readonly="readonly"><?php echo $arreglo['notas'] ?></textarea></td></tr>
</tr>

</table> 
</form>

</BODY>