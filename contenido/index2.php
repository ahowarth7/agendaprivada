<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Agenda Privada</title>

<link href="../estilos/estilo.css" rel="stylesheet" type="text/css" />
<link href="../estilos/default.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php print @$_GET['css'] ?>" />	

<?php

include("../includes/conexion_bd.php");

if($_POST["orderdate"]==''){
   $_POST["orderdate"] = $_GET["orderdate"];
}
if($_POST["tipo"]==''){
   $_POST["tipo"] = $_GET["tipo"];
}

?>


<style>
body{;
  background: #007d68;

}

</style>

<!--=================================FUNCIONES DEL CALENDARIO========================================-->


<script language="JavaScript">
		function Abrir_ventana (pagina) {
		var opciones="toolbar=no,location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=508, height=365, top=85, left=140";
		window.open(pagina,"",opciones);
		}
		
		function Abrir_ventana (pagina) {
		var opciones="toolbar=no,location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=508, height=365, top=85, left=140";
		window.open(pagina,"",opciones);
		}
		
		function form_evento(fecha,hora){
		var newwin = window.open("../contenido/form.php?fecha=" + fecha + "&hora=" + hora, "newwin", "width=700,height=800,menubar=no,scrollbar=auto,resizable=yes,left = 320,top = 30');,status=yes");
		}
		function dia(DIA){
		var newwin = window.open("../reportes/tipoimpresion.php?opcion=DIA", "newwin", "width=400,height=200,menubar=no,scrollbar=auto,resizable=yes,left = 320,top = 30');,status=yes");
		}
		function semana(){
		var newwin = window.open("../reportes/tipoimpresion.php?opcion=SEMANA", "newwin", "width=400,height=200,menubar=no,scrollbar=auto,resizable=yes,left = 320,top = 30');,status=yes");
		}
		
		function form_recordatorio(fecha,hora){
		var newwin = window.open("form_recordatorio.php?fecha=" + fecha + "&hora=" + hora, "newwin", "width=520,height=500,menubar=no,scrollbar=auto,resizable=yes,left = 320,top = 30');,status=yes");
		}
		
		function launch(X,Y){
		   //fecha=document.form1.orderdate.value;
		  // document.frames[X].location.href=Y+"?orderdate="+fecha;
		 
		  document.form1.tipo.value = "hoy";
		   document.form1.submit();
		}

		
		function muestra_mes(X,Y){
		   //fecha=document.form1.orderdate.value;
		  // document.frames[X].location.href=Y+"?orderdate="+fecha;
		 
		  document.form1.tipo.value = "mes";
		   document.form1.submit();
		}
		function muestra_ano(X,Y){
		   //fecha=document.form1.orderdate.value;
		  // document.frames[X].location.href=Y+"?orderdate="+fecha;
		 
		  document.form1.tipo.value = "ano";
		   document.form1.submit();
		}
		
		function diafestivo(orderdate){
		var newwin = window.open("../contenido/diafestivo.php?orderdate=" + orderdate, "newwin", "width=420,height=250,menubar=no,scrollbar=auto,resizable=yes,left = 320,top = 30');,status=yes");
		}
		function edit_diafestivo(orderdate){
		var newwin = window.open("../contenido/update_diafestivo.php?orderdate=" + orderdate, "newwin", "width=420,height=250,menubar=no,scrollbar=auto,resizable=yes,left = 320,top = 30');,status=yes");
		}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


<title>Documento sin t&iacute;tulo</title>


<script type="text/javascript" zsrc="stmenu.js"></script><script src="functions.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="stmenu.js"></script></head>


<!--=======================================================================================================================-->

<body style="overflow:hidden;" onload="focus()" >
<form method="POST" id="form1" name="form1" action="../contenido/index2.php">
<input type="hidden" name="cadena_fecha" value="">

<table width="100%" border="0">
  <tr>
    <td align="left">
    <!--========================Barra de menu============================-->
    <div>

<script type="text/javascript">
			<!--
			stm_bm(["menu45ba",860,"","",0,"","",0,0,250,0,1000,1,0,0,"","",0,0,1,2,"default","hand",""],this);
			stm_bp("p0",[0,4,0,0,2,6,18,9,100,"",-2,"",-2,50,2,3,"#999999","transparent","../imagenes/bluefireback.png",1,1,1,"#000000 #666666 #B4C8B4"]);
			stm_ai("p0i0",[0,"Evento","","",-1,-1,0,"javascript:form_evento();","_self","","","../imagenes/evento.png","../imagenes/evento.png",16,16,0,"","",0,0,0,0,1,"#FFFFF7",1,"#B5BED6",1,"","../imagenes/make.gif",3,0,0,0,"#FFFFF7","#000000","#FFFFFF","#FFFFFF","9pt Verdana","9pt Verdana",0,0],115,0);
			stm_aix("p0i1","p0i0",[0,"Recordatorio","","",-1,-1,0,"javascript:form_recordatorio()","_self","","","../imagenes/recordatorio.png","../imagenes/recordatorio.png"],90,0);
			stm_aix("p0i2","p0i0",[0,"Hoy","","",-1,-1,0,"../contenido/index2.php","_self","","","../imagenes/home.png","../imagenes/home.png"],90,0);
			stm_aix("p0i3","p0i0",[0,"Imprimir","","",-1,-1,0,"#","_self","","","../imagenes/calendario.png","../imagenes/calendario.png",18,16,0,"","",9,7,0,0,1,"#00CCFF"],90,0);
			stm_bp("p1",[1,4,0,0,5,5,16,0,85,"",-2,"",-2,50,2,3,"#999999","#333333","",0,1,1,"#B4C8B4"]);
			stm_aix("p1i0","p0i0",[0,"Día","","",-1,-1,0,"javascript:dia();","_self","","","../imagenes/ano.png","../imagenes/ano.png",16,16,0,"","",0,0,0,0,1,"#00CCFF",1,"#B4C8B4",0,"","",3,0,0,0,"#FFFFF7","#000000","#FFFFFF","#000000","8pt Verdana","8pt Verdana"]);
			stm_aix("p1i1","p1i0",[0,"Semana","","",-1,-1,0,"javascript:semana()","_self","","","../imagenes/calendario.png","../imagenes/calendario.png",14,14],115,0);
			stm_ep();
			stm_em();
			//-->
</script>

	</div>
    <!--========================Barra de menu============================-->
    </td>
    <td align="right">
    <div>
			<script type="text/javascript" src="calendarDateInput.js"></script>
					 <?php     
					      if($_POST[orderdate]!='')
					{
						?>
			<script>DateInput('orderdate', true,'DD-MM-YYYY','<?php echo "$_POST[orderdate]" ?>')</script>
						<?php
					}
					else 
					{
						?>
				
			<script>DateInput('orderdate', true,'DD-MM-YYYY')</script>
					<?php
					}
					?>
  	</div>  
    
    
    </td>
    <td align="left">
    		
    		<input name="tipo" type="hidden" value="hoy"/>
            <input type="button" value="Aceptar" onclick="javascript:launch('central','form2.php')">
    
    
    </td>
    <td rowspan="2" align="right">
    
    		<?php
    		
					$consulta = "SELECT distinct(fecha)as fecha from calendario_tabla";
					$Recurso=mysql_query($consulta,$cn);
					$num_reg=mysql_num_rows($Recurso);
			
					require_once("../source/activecalendar.php");
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
					//$cal->enableDatePicker(2000,2010,$myurl); // enables date picker (year range 2000-2010)
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

    </td>
  </tr>
  <tr>
    <td colspan="3" class="titulo" width="-30%">
    <table width="100%" border="0">
  <tr>
    <td width="35%" class="diafestivo">
    
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
			
			
			
				$fechaactual= $anio ."-". $mes ."-". $dia;
				//==================================================================================================
				if($fechaactual=='--')
						{ 
							$busqueda=date('Y-m-d');
						}
					else 
						{
							$busqueda=$fechaactual;					
						}
				
			
				//==================================================================================================
    			$consulta = "select * from tb_festivo where fecha_dia = '".$busqueda."'";
				$recurso=mysql_query($consulta,$cn);
				$num_reg= mysql_num_rows($recurso);
				$arreglo=mysql_fetch_array($recurso);
				//print_r($num_reg);		
				If ($num_reg ==0)
					{
    				echo '<a href="javascript:diafestivo(\''.$_POST["orderdate"].'\')"><img style="border:0;" src="../imagenes/new.png" width="20" height="20"></a>';
    				
				}
				else {
					echo '<a href="javascript:edit_diafestivo(\''.$_POST["orderdate"].'\' ) " class="diafestivo">'?> <?php echo $arreglo['dia_festivo'];
				
				}
   ?> 
   
   
    </td>
    <td width="45%" align="center">
    <!--=================INICIA FECHA CON LETRAS==============================================-->
    <div>
    <script language="javascript" >
				var new_fecha=document.form1.orderdate.value;
            	var fechadate = new_fecha.split('-');

            	var fecha=new Date(fechadate[2],(fechadate[1]-1),fechadate[0]);
				var diames=fecha.getDate(fecha);
				var diasemana=fecha.getDay(fecha);
				var mes=fecha.getMonth(fecha);
				var ano=fecha.getFullYear(fecha);	
				
				var textosemana = new Array (7);
					textosemana[0]="Domingo";
				    textosemana[1]="Lunes";
					textosemana[2]="Martes";
					textosemana[3]="Miercoles";
					textosemana[4]="Jueves";
					textosemana[5]="Viernes";
					textosemana[6]="Sabado";
						
				var textomes = new Array (13);
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
			  
				  
				  var fecha_letra = textosemana[diasemana] + ", " + diames + " de " + textomes[mes] + " de " + ano;
				document.write( textosemana[diasemana] + ", " + diames + " de " + textomes[mes] + " de " + ano + "<br>");

				
				function gerVar(){
					return fecha_letra;
				}
								
		</script>
		
		</div>

    <!--=================FINALIZA FECHA CON LETRAS=================================================-->
    </td>
    <td width="3%" align="right">
    
    	<img style="border:0;" src="../imagenes/reloj.png" width="22" height="22">
    
    </th>
    
    <td width="12%">
    
    <!--========INICIA RELOJ==============-->
    
    <SCRIPT LANGUAGE="JavaScript">
				
				tday  =new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
				tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
				
				function GetClock(){
				d = new Date();
				nday   = d.getDay();
				nmonth = d.getMonth();
				ndate  = d.getDate();
				nyeara = d.getYear();
				nhour  = d.getHours();
				nmin   = d.getMinutes();
				nsec   = d.getSeconds();
				
				if(nyeara<1000){nyeara=(""+(nyeara+11900)).substring(1,5);}
				else{nyeara=(""+(nyeara+10000)).substring(1,5);}
				
				     if(nhour ==  0) {ap = " AM";nhour = 12;} 
				else if(nhour <= 11) {ap = " AM";} 
				else if(nhour == 12) {ap = " PM";} 
				else if(nhour >= 13) {ap = " PM";nhour -= 12;}
				
				if(nmin <= 9) {nmin = "0" +nmin;}
				if(nsec <= 9) {nsec = "0" +nsec;}
				
				document.getElementById('clockbox').innerHTML=""+nhour+":"+nmin+":"+nsec+ap+"";
				setTimeout("GetClock()", 1000);
				}
				window.onload=function(){GetClock();}
	</script>
<div id="clockbox"></div>
<!--=============FINALIZA RELOJ==========================-->
    
    </td>
  </tr>
</table>
    
    
    
    
    </td>
  </tr>
</table>



<!------------------====================================================--------------------------------------------------->


      
<?php 

if($_POST[orderdate]!='')
{
   //echo "entra1";
   //echo ("tipo: ".$_POST["tipo"]);
   
   switch ($_POST[tipo]){
   	
   	case "mes":
   			?>
					<script language="javascript">
										var alto = screen.height-50;
										document.write('<iframe name = "central" width ="100%" src="formdia.php?orderdate=<?php echo $_POST[orderdate]; ?>" height ="'+alto+'" frameborder="0" background="imagenes/bac.png"></iframe>');
					</script>
				<?php
   		
   	break;	
	case "hoy":
   	
   	?>
					<script language="javascript">
										var alto = screen.height-350;
										document.write('<iframe name = "central" width ="100%" src="form2.php?orderdate=<?php echo $_POST[orderdate]; ?>" height ="'+alto+'" frameborder="0" background="imagenes/bac.png"></iframe>');
					</script>
	<?php
	break;
   	case "ano":
   	
   	?>
					<script language="javascript">
										var alto = screen.height-50;
										document.write('<iframe name = "central" width ="100%" src="../source/calendariomeses.php?orderdate=<?php echo $_POST[orderdate]; ?>" height ="'+alto+'" frameborder="0" background="imagenes/bac.png"></iframe>');
					</script>
	<?php
   	break;
   	
   }
	
}
else 
{
   //echo "entra2";
   //echo ("tipo: ".$_POST["tipo"]);
   if($_POST[tipo] == "hoy"){
   	
					?>
				<script language="javascript">
			
									var alto = screen.height-350;
									document.write('<iframe name = "central" width ="100%" src="form2.php?orderdate=<?php echo $_POST[orderdate]; ?>" height ="'+alto+'" frameborder="0" background="../imagenes/bac.png"></iframe>');
				</script>
					<?php
   }else{
   	
   	 if($_POST[orderdate]==''){
   	  $_POST[orderdate]=date("d-m-Y");
   	 	
   	 }
					?>
					
				<script language="javascript">
									var alto = screen.height-350;
									document.write('<iframe name = "central" width ="100%" src="form2.php?orderdate=<?php echo $_POST[orderdate]; ?>" height ="'+alto+'" frameborder="0" background="../imagenes/bac.png"></iframe>');
				</script>
					<?php
   }
}
?>
        

		<!--Finaliza el Frame-->
		
		<p></p>    </tr>
</form>
</body>
</html>


