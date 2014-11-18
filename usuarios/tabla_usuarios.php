<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Agenda Privada</title>

<!--cALENDARIO grANDE-->

	<?php
		include("../includes/conexion_bd.php");
		//include("../includes/funciones_v2.php");
		
		//f_imprime_arreglo($_GET);
	?>
<!--===========================================================================================================-->
<script language="JavaScript">
		function Abrir_ventana (pagina) {
		var opciones="toolbar=no,location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=508, height=365, top=85, left=140";
		window.open(pagina,"",opciones);
		}
</script> 

<script language="JavaScript">
		function form_evento(fecha,hora){
		var newwin = window.open("../contenido/form.php?fecha=" + fecha + "&hora=" + hora, "newwin", "width=520,height=650,menubar=no,scrollbar=auto,resizable=yes,left = 320,top = 30');,status=yes");
		}
</script>

<script language="JavaScript">
		function form_recordatorio(fecha,hora){
		var newwin = window.open("../contenido/form_recordatorio.php?fecha=" + fecha + "&hora=" + hora, "newwin", "width=520,height=500,menubar=no,scrollbar=auto,resizable=yes,left = 320,top = 30');,status=yes");
		}
		
		function launch(X,Y){
		   //fecha=document.form1.orderdate.value;
		  // document.frames[X].location.href=Y+"?bus_fecha="+fecha;
		 
		   document.form1.submit();
		}
</script>
<script language="JavaScript">
		function edit_usuario(username,password){
		var newwin = window.open("../usuarios/edit_usuario.php?username=" + username + "&password=" + password, "newwin", "width=450,height=350,menubar=no,scrollbar=auto,resizable=yes,left = 320,top = 30');,status=yes");
		}
</script>
<!--===========================================================================================================-->



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


<title>Documento sin t&iacute;tulo</title>


<script type="text/javascript" zsrc="../contenido/stmenu.js"></script><script type="text/javascript" src="../contenido/stmenu.js"></script>
</head>

<link href="../estilos/estilo.css" rel="stylesheet" type="text/css" />



<body background="../imagenes/back_in2.jpg" style="overflow:hidden;" onload="focus()">
<form method="POST" id="form1" name="form1" action="../contenido/index2.php">


<?php include("../includes/funciones_v2.php"); //f_imprime_arreglo($_POST); ?>
<!-- Tabla titulo -------------->
<table width="100%" border="0">

  <tr>
    <td height="30">
    
   
<!-- MENU SUPERIOR-->   
<script type="text/javascript">
		<!--
		stm_bm(["menu45ba",860,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand",""],this);
		stm_bp("p0",[0,4,0,0,3,4,16,0,100,"",-2,"",-2,50,2,3,"#999999","transparent","../imagenes/bluefireback.gif",1,0,0,"#A9CFDB #93C0CE #155E8C"]);
		stm_ai("p0i0",[0,"Evento","","",-1,-1,0,"javascript:form_evento();","_self","","","../imagenes/evento.png","../imagenes/evento.png",16,16,0,"","",0,0,0,0,1,"#FFFFF7",1,"#B5BED6",1,"","../imagenes/make.gif",3,0,0,0,"#FFFFF7","#000000","#FFFFFF","#FFFFFF","9pt Verdana","9pt Verdana",0,0],115,0);
		stm_aix("p0i1","p0i0",[0,"Recordatorio","","",-1,-1,0,"javascript:form_recordatorio();","_self","","","../imagenes/recordatorio.png","../imagenes/recordatorio.png"],125,0);
		stm_aix("p0i2","p0i0",[0,"HOY","","",-1,-1,0,"../contenido/index2.php","_self","","","../imagenes/home.png","../imagenes/home.png"],115,0);
		stm_aix("p0i3","p0i0",[0,"Mes","","",-1,-1,0,"../contenido/formdia.php","_self","","","../imagenes/calendario.png","../imagenes/calendario.png",14,14],115,0);
		stm_ep();
		stm_em();
		//-->
</script>






   </td>
    <td height="60"  align="left">
    
      <script type="text/javascript" src="../contenido/calendarDateInput.js"></script>
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
      
      
      <input type="button" value="Buscar" onclick="javascript:launch('central','form2.php')">
    </td>
  </tr>
  <td height="41" colspan="2" align="center" class="titulo">
  
  <!--===================================================================================-->
  <!--INICIA FECHA EN LETRAS Y INICIA SCRIPT-->
  
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
						
				var textomes = new Array (12);
				  textomes[0]="Enero";
				  textomes[1]="Febrero";
				  textomes[2]="Marzo";
				  textomes[3]="Abril";
				  textomes[4]="Mayo";
				  textomes[5]="Junio";
				  textomes[6]="Julio";
				  textomes[7]="Agosto";
				  textomes[8]="Septiembre";
				  textomes[9]="Octubre";
				  textomes[10]="Noviembre";
				  textomes[11]="Diciembre";
			  
				document.write( textosemana[diasemana] + ", " + diames + " de " + textomes[mes] + " de " + ano + "<br>");
</script>  
<!-- FINALIZA SCRIPT-->

</td>
</table>
<p></p>




<!--=========================================================================================================-->
<!--Inicia la cracion de la tabla-->
<div style="width:100%;height:50 ;overflow:auto;" align="center" id="background" >
<table width="100%"px" border="0" cellpadding="2" cellspacing="1" class="estiloback" align="center">
		<tr >
		<th width="20%"%">Usuario</th>
		<th width="20%"%">Contraseña</th>
		<th width="20%"%">Tipo</th>
		<th width="20%"%">Nombre</th>
		<th width="20%"%">Eliminar</th>
		<!-- <th width="1%"></th> -->
		</tr>
		</table>

</div>
<!--=========================================================================================================-->

<?php
//$consulta = "select * from calendario_tabla  where fecha = CURDATE()";
if($_GET[bus_fecha]!='')
	{
		$busqueda="'$_GET[bus_fecha]'";
	}
else 
	{
		$busqueda="CURDATE()";
	}
	$consulta = "select * from admin";

$Recurso=mysql_query($consulta,$cn);
$num_reg=mysql_num_rows($Recurso);
?>

<?php 
$contador=0;
if ($num_reg >0)
{
?>
	
<div  style="width:100%;height:580;overflow:auto" align="center">

<?php 
	$dia_ant='';
	
	echo '<table width="100%" border="0" cellpadding="0" cellspacing="1">'; //Ocultar para separar los dias por tablas

while ($arreglo=mysql_fetch_array($Recurso) )
{	
//======================================================================		
//Habilitar si se requiere que aparezcan separados por tablas los dias
if($dia_ant != $arreglo['dia'])
  {
    if($dia_ant != '')
  	   echo '</table><p></p>';
    echo '<table width="100%" border="0" cellpadding="0" cellspacing="0">';
  }
			      echo ' <tr >';
			      
			      if($dia_ant != $arreglo['dia'])
			      
			      		//Dia de cuadro
					  	echo ' <td width="20%" bgcolor="#C0C0C0" rowspan="'.$arreglo['num_eventos'] .'" ><div align="center" >Dia '.$arreglo['dia'] .'</div></td>';
//======================================================================					  	
//coloca los colores de gris y blanco
			if($color == 0)
		      {
		        echo  '<tr class="linea">';
		         $color=1;
		      }
		      else
		      { 
			echo	'<tr bgcolor="#FFFFFF" >'; 
		         $color=0;
		      }
//======================================================================= 	
	
//=======================================================================
//Informacion de la tabla
						echo ' <td width="20%"><a href="javascript:edit_usuario(\''.$arreglo['username'].'\',\''.$arreglo['password'].'\')">'.(($arreglo['username'] == '') ? '&nbsp;' :  $arreglo['username']).'</a></td>';
						echo ' <td width="20%">&nbsp;'.(($arreglo['password'] == '') ? '&nbsp;' :  $arreglo['password']).'</td>';
					    echo ' <td width="20%">'.(($arreglo['tipo'] == '') ? '&nbsp;' :  $arreglo['tipo']).'</td>';
						echo ' <td width="20%"></td>';
						echo ' <td width="20%"></td>';
					    echo ' </tr>';
//=======================================================================
		    		
}//Cierra el while
    	echo '</table>';
 ?>
</div>
<?php
}
else 
{
	echo "No existe ningun evento";
}
?>

<!--Aqui finaliza la tabla -->