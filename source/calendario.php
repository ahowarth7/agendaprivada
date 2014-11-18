<link href="../estilos/default.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php print @$_GET['css'] ?>" />	

<?php

include("../includes/conexion_bd.php");
include("../includes/funciones_v2.php");
?>

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
			
			
<?php print "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head><title>Active Calendar Class :: Example</title>
<link rel="stylesheet" type="text/css" href="<?php print @$_GET['css'] ?>" />
<script src="functions.js" type="text/javascript" language="javascript"></script>
</head>
<body>
<center>
<?php print $cal->showMonth(); ?>
<br />
<a href="javascript:self.close();">Close Calendar</a>
</center>
</body>
</html>