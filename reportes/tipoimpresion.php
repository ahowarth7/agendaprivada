<head>
  	  <script type="text/javascript" src="../javascript/calendarDateInput.js"></script>
<?php

include ("../includes/conexion_bd.php");
include ("../includes/funciones_v2.php");
//f_imprime_arreglo($_POST);
?>
</head>

<body background="../imagenes/fondo3.jpg">

<?php
if($_GET[opcion]=='')
{
?>
<form name="sel_rpt" method="POST" action="tipoimpresion.php">
<font color="White">
Seleccione el tipo de Reporte</font>

<pre>
<input type="submit" name="opcion" value="DIA" style="width:120px">
<input type="submit" name="opcion" value="SEMANA" style="width:120px">
<!--<input type="submit" name="opcion" value="MES" style="width:120px"> -->
</pre>
</form>
<?php
}
else 
{
  switch ($_GET[opcion]) {
  	case 'DIA':
  	  ?>
  	  <form name="sel_rpt" method="POST" action="rpt_dia.php">
  	  <script>DateInput('bus_fechaini',true,'YYYY-MM-DD')</script>
  	  <input type="submit">
  		</form>
  	  <?php
  		
  		break;
  		
  	case 'SEMANA':
  	  ?>
  	  <form name="sel_rpt" method="POST" action="rpt_semana.php">
  	  <font color=" White">Fecha Inicio</font>
  	  <script>DateInput('bus_fechaini',true,'YYYY-MM-DD')</script>
  	  <font color=" White">Fecha Final</font>
  	  <script>DateInput('bus_fechafin',true,'YYYY-MM-DD')</script>
  	  <br>
  	  <input type="submit" name="impresion" value="Media Carta" style="width:90px"> &nbsp;
  	   <input type="submit" name="impresion" value="Carta" style="width:90px">
  		</form>
  	  <?php
  		
  		break;
  
  	default:
  		break;
  }
}
?>

</body>