<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Agenda Privada</title>

<!--cALENDARIO grANDE-->



<script language="JavaScript">
		function Abrir_ventana (pagina) {
		var opciones="toolbar=no,location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=508, height=365, top=85, left=140";
		window.open(pagina,"",opciones);
		}
</script> 

<script language="JavaScript">
		function form_evento(fecha,hora){
		var newwin = window.open("../contenido/form.php?fecha=" + fecha + "&hora=" + hora, "newwin", "width=700,height=800,menubar=no,scrollbar=auto,resizable=yes,left = 320,top = 30');,status=yes");
		}
</script>

<script language="JavaScript">
		function form_recordatorio(fecha,hora){
		var newwin = window.open("form_recordatorio.php?fecha=" + fecha + "&hora=" + hora, "newwin", "width=520,height=500,menubar=no,scrollbar=auto,resizable=yes,left = 320,top = 30');,status=yes");
		}
		
		function launch(X,Y){
		   //fecha=document.form1.orderdate.value;
		  // document.frames[X].location.href=Y+"?bus_fecha="+fecha;
		 
		   document.form1.submit();
		}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


<title>Documento sin t&iacute;tulo</title>


<script type="text/javascript" zsrc="stmenu.js"></script><script type="text/javascript" src="stmenu.js"></script>
</head>

<link href="../estilos/estilo.css" rel="stylesheet" type="text/css" />



<body background="../imagenes/fondo2.jpg" style="overflow:hidden;" onload="focus()">
<form method="POST" id="form1" name="form1" action="../contenido/index2.php">


<?php include("../includes/funciones_v2.php"); //f_imprime_arreglo($_POST); ?>
<!-- Tabla titulo -------------->
<table width="100%" border="0">
  <tr>
    <td>
    <script type="text/javascript">
		<!--
		stm_bm(["menu45ba",860,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand",""],this);
		stm_bp("p0",[0,4,0,0,3,4,16,0,100,"",-2,"",-2,50,2,3,"#999999","transparent","../imagenes/bluefireback.gif",1,0,0,"#A9CFDB #93C0CE #155E8C"]);
		stm_ai("p0i0",[0,"Evento","","",-1,-1,0,"javascript:form_evento();","_self","","","../imagenes/evento.png","../imagenes/evento.png",16,16,0,"","",0,0,0,0,1,"#FFFFF7",1,"#B5BED6",1,"","../imagenes/make.gif",3,0,0,0,"#FFFFF7","#000000","#FFFFFF","#FFFFFF","9pt Verdana","9pt Verdana",0,0],115,0);
		stm_aix("p0i1","p0i0",[0,"Recordatorio","","",-1,-1,0,"javascript:form_recordatorio();","_self","","","../imagenes/recordatorio.png","../imagenes/recordatorio.png"],125,0);
		stm_aix("p0i2","p0i0",[0,"HOY","","",-1,-1,0,"../contenido/index2.php","_self","","","../imagenes/home.png","../imagenes/home.png"],115,0);
		stm_aix("p0i3","p0i0",[0,"Mes","","",-1,-1,0,"../contenido/index3.php","_self","","","../imagenes/calendario.png","../imagenes/calendario.png",14,14],115,0);
		stm_ep();
		stm_em();
		//-->
</script>
    
    </td>
    <td align="right">
    <script type="text/javascript" src="calendarDateInput.js"></script>
		 <?php     
		      if($_POST[orderdate]!='')
		{
			?>
<script>DateInput('orderdate', true,'YYYY-MM-DD','<?php echo "$_POST[orderdate]" ?>')</script>
			<?php
		}
		else 
		{
			?>
	
<script>DateInput('orderdate', true,'YYYY-MM-DD')</script>
		<?php
		}
		?>
    </td>
    <td><input type="button" value="Aceptar" onclick="javascript:launch('central','form2.php')"></td>
  </tr>
  <tr>
   <td height="41" colspan="3" align="center" class="titulo">
   
 

<!---=======================================================================================================================-->
<script language="javascript" >
				var new_fecha=document.form1.orderdate.value;
            	var fechadate = new_fecha.split('-');
				var fecha=new Date(fechadate[0],fechadate[1],fechadate[2]);
				var diames=fechadate[2];
				var diasemana=fecha.getDay(fecha);
				var mes=parseFloat(fechadate[1]);
				var ano=fechadate[0];	
				var textosemana = new Array (6);
					textosemana[3]="Domingo";
					textosemana[4]="Lunes";
					textosemana[5]="Martes";
					textosemana[6]="Miercoles";
					textosemana[0]="Jueves";
					textosemana[1]="Viernes";
					textosemana[2]="Sabado";
						
				var textomes = new Array (13);
				  textomes[1]="Enero";
				  textomes[2]="Febrero";
				  textomes[3]="Marzo";
				  textomes[4]="Abril";
				  textomes[5]="Mayo";
				  textomes[6]="Junio";
				  textomes[7]="Julio";
				  textomes[8]="Agosto";
				  textomes[9]="Septiembre";
				  textomes[10]="Octubre";
				  textomes[11]="Noviembre";
				  textomes[12]="Diciembre";
			  
				document.write( textosemana[diasemana] + ", " + diames + " de " + textomes[mes] + " de " + ano + "<br>");
</script> 
<!-- =========================================================================================================================== -->

</td>
  </tr>
</table>


<!-- =========================================================================================================================== -->

</td>
</table>
<p></p>
        <!--frame aqui se coloca lo que es el tamaño-->
        
<?php 

if($_POST[orderdate]!='')
{
	?>
	<script language="javascript">
					var alto = screen.height-50;
					document.write('<iframe name = "central" width ="100%" src="formdia.php?bus_fecha=<?php echo $_POST[orderdate]; ?>" height ="'+alto+'" frameborder="0" background="imagenes/bac.png"></iframe>');
</script>
	<?php
}
else 
{
	?>
<script language="javascript">
					var alto = screen.height-50;
					document.write('<iframe name = "central" width ="100%" src="formdia.php" height ="'+alto+'" frameborder="0" background="../imagenes/bac.png"></iframe>');
</script>
	<?php
}
?>
        

		<!--Finaliza el Frame-->
		
		<p></p>    </tr>
</form>
</body>
</html>
