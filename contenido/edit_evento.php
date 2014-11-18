<?php
include("../includes/conexion_bd.php");
include("../includes/funciones_v2.php");
$bandera=$_GET['bandera'];
?>


<body background="../imagenes/bac.png" ALT="Fondo" onload="focus()">
<form name="test" action="../contenido/update_evento.php" method="POST">


<H1><img src="../imagenes/newdoc.ico" alt="nuevo" width="72 " height="72" border="0" /> <b>EDITAR EVENTO <br></H1>

<?php


		$hora = $_GET['hora'];
		$fecha  = $_GET['fecha'];
		$id = $_GET['id'];
		$consulta = "select * from calendario_tabla where id='$id'";

$Recurso=mysql_query($consulta,$cn);
$num_reg=mysql_num_rows($Recurso);

$arreglo=mysql_fetch_array($Recurso);



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

<?php
if( (substr($hora,3,2)) == '00' ){
		   	echo '<OPTION  selected="selected">00';
		   	echo '<OPTION>15';
		   	echo '<OPTION>30';
		   	echo '<OPTION>45';
    	}
    	else if( (substr($hora,3,2)) == '15' ){
    		echo '<OPTION>00';
		   	echo '<OPTION  selected="selected">15';
		   	echo '<OPTION>30';
		   	echo '<OPTION>45';
    	}
		else if( (substr($hora,3,2)) == '30' ){
			echo '<OPTION>00';
			echo '<OPTION>15';
		   	echo '<OPTION  selected="selected">30';
		   	echo '<OPTION>45';
    	}
    	else {  
    		echo '<OPTION>00';
    		echo '<OPTION>30';
    		echo '<OPTION>15';
		   	echo '<OPTION  selected="selected">45';
		   	
    	}
?>
	</SELECT>
	
</></tr> 
<!-- Asunto-->
<tr><td><font face="consola" size="4"><b>Asunto :</font></td><td><input type="text" size="40" name="asunto"  class="caja" value="<?php echo $arreglo['asunto'] ?>"></td></tr>

<!-- Lugar -->
<tr><td valign="top"><font face="consola" size="4"><b>Lugar :</font></td><td><input type="text" size="40" name="lugar" class="caja" value="<?php echo $arreglo['lugar'] ?>"></td></tr>

<!-- Descripcion -->
<tr><td valign="top"><font face="consola" size="4"><b>Descripción :</font></td><td><textarea name="descripcion" size="40" class="caja" rows="6" cols="30"><?php echo$arreglo['descripcion']?></textarea></td></tr>

<!-- Informacion requerida -->
<tr><td valign="top"><font face="consola" size="4"><b>Información Requerida :</font></td><td><input type="text" size="40" name="infor" value="<?php echo $arreglo['infor'] ?>"></td></tr>

<!-- Asiste -->
<tr><td valign="top"><font face="consola" size="4" class="estilo4"><b>Quien Asiste :</font></td><td><input type="text" size="40" name="asiste" class="caja" value="<?php echo $arreglo['asiste'] ?>"></textarea></td></tr>

<!-- Notas -->
<tr><td valign="top"><font face="consola" size="4"><b>Notas :</font></td><td><textarea name="notas" rows="6" cols="30"><?php echo $arreglo['notas'] ?></textarea></td></tr>
<input name="id" type="hidden" value="<?php echo $id ?>" />
<input name="fecha_ant" type="hidden" value="<?php echo $fecha ?>" />
<input name="$hora_ant" type="hidden" value="<?php echo $hora ?>" />
<!-- Boton Guardar-->
<tr><td>&nbsp;</td><td><input type="submit" value="Guardar"  onclick="javascript:close();"><font face="consolas" size="1">&nbsp;&nbsp;&nbsp;&nbsp;</font>
&nbsp</td></tr>

</table> 
</form>

</BODY>