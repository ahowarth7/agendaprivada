<?php
include("../includes/conexion_bd.php");
include("../includes/funciones_v2.php");
$bandera=$_GET['bandera'];
?>


<BODY BACKGROUND= "../imagenes/bac.png" ALT="Fondo">
<form name="test" action="guardar.php?bandera=<?php echo $bandera; ?>" method="POST">


<H1><img src="../imagenes/evento.png" alt="nuevo" width="72 " height="72" border="0" /> <b>(NUEVO EVENTO) <br></H1>

<?php


$tipo='evento';


?>


<table border="0" cellspacing="5">


<tr><td valign="top"><font face="consola" size="4"><b>Fecha :</font></td><td>

<script type="text/javascript" src="calendarDateInput.js"></script>

<script>DateInput('orderdate', true, 'YYYY-MM-DD')</script>


<tr><td><font face="consola" size="4"><b>Hora :</font></td><td>
	<SELECT face="consola" NAME=hora class="estilo4">
		
	
			<?php
			for($i=3;$i<=24;$i++)
			    {
			    	if( ((int) substr($hora,0,2)) == $i )
			    	{
			           if($i<10)	
					   	    echo '<OPTION  selected="selected">0'.$i;   
					   	else 
					   	    echo '<OPTION  selected="selected">'.$i;   
			    	}   	    
					else   	
					{
					   	if($i<10)
					   	    echo '<OPTION>0'.$i;   
					   	else 
					   	    echo '<OPTION>'.$i;   
					}  	    
			    }
			?>
		
	</SELECT>

	<SELECT NAME=hora2>

		   	<OPTION>00
		   	<OPTION>15
		   	<OPTION>30
		   	<OPTION>45
    	

	</SELECT>
	
	<!--<SELECT face="consola" NAME=tipo class="estilo4">

		<OPTION>Publico
		<OPTION>Privado
	
		</SELECT>
		-->

</></tr> 
<!-- Asunto-->
<tr><td><font face="consola" size="4"><b>Asunto :</font></td><td><input type="text" size="40" name="asunto"  class="caja" maxlength="250"></td></tr>

<!-- Lugar -->
<tr><td valign="top"><font face="consola" size="4"><b>Lugar :</font></td><td><input type="text" size="40" name="lugar" class="caja"></td></tr>

<!-- Descripcion -->
<tr><td valign="top"><font face="consola" size="4"><b>Descripci�n :</font></td><td><textarea name="descripcion" size="40" class="caja" rows="4" cols="50"></textarea></td></tr>

<!-- Informacion requerida -->
<tr><td valign="top"><font face="consola" size="4" class="estilo4"><b>Responsable :</font></td><td><textarea name="infor" "size="50" rows="2" cols="50"></textarea></td></tr>

<!-- Asiste -->
<tr><td valign="top"><font face="consola" size="4" class="estilo4"><b>Qui�n Asiste :</font></td><td><textarea name="asiste" "size="50" rows="2" cols="50"></textarea></td></tr>

<!-- Notas -->
<tr><td valign="top"><font face="consola" size="4"><b>Notas :</font></td><td><textarea name="notas" rows="6" cols="50"></textarea></td></tr>

<!-- Boton Guardar-->
<tr><td>&nbsp;</td><td><input type="submit" value="Guardar"  onclick="javascript:document.test.bandera.value='<?php echo $bandera ?>';document.test.submit();"><font face="consolas" size="1">&nbsp;&nbsp;&nbsp;&nbsp;</font>
&nbsp</td></tr>

</table> 
</form>

</BODY>