<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->  
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->  
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->  
<!--[if gt IE 8]><!--> <html lang="es"> <!--<![endif]-->  
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="description" content="Agenda Administrativa">
  	<meta name="keywords" content="agenda">
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Agenda Privada Administrativa</title>

<link rel="stylesheet" href="../css/normalize.css" />
<link rel="stylesheet" href="../css/styles.css" />
<?php
include("../includes/conexion_bd.php");
/*if($_POST["orderdate"]=='2014-11-18'){
   $_POST["orderdate"] = $_GET["orderdate"];
}
if($_POST["tipo"]==''){
   $_POST["tipo"] = $_GET["tipo"];
}*/
$_GET["orderdate"] = date('d-m-Y');
$_POST["orderdate"] = '18-11-2014';
$_POST["tipo"] = 'hoy';
?>

<body>
<header>
		<div class="logo">
			<img src="../img/logo.png" alt="Puls4" />
		</div>
		<div class="titular">
			<h1 class="titulo">
				Agenda Privada Administrativa
			</h1>
			<div>
				<a class="filtro" href="#">
					CONALEP Quintana Roo
				</a>
			</div>
		</div>
		<div class="usuario">
			<figure class="avatar">
				<img src="../img/connections.png" alt="freddier" />
			</figure>
			<a class="flechita" href="#"></a>
		</div>
</header>
<nav>
		<ul class="menu">
			<li><a href="#">Inicio</a></li>
			<li><a href="#">Evento</a></li>
			<li><a href="#">Recordatorio</a></li>
			<li><a href="#">Hoy</a></li>
			<li><a href="#">Imprimir</a></li>
			<li><input type="date" value="<?php echo date('Y-m-d'); ?>" /> <input type="submit" value="Buscar" ></li>
			<li class="id_diafestivo">
			<div >	
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
				if($fechaactual=='--'){ 
					$busqueda=date('Y-m-d');
				}else{
					$busqueda=$fechaactual;					
				}
				//==================================================================================================
    			echo $consulta = "select * from tb_diafestivo where fecha_dia = '".$busqueda."'";
				echo $recurso=mysql_query($consulta,$cn);
				$num_reg= mysql_num_rows($recurso);
				$arreglo=mysql_fetch_array($recurso);	
				If ($num_reg ==0){ ?> 
					<a class="boton_diafestivo" href="javascript:diafestivo(\''.$_POST["orderdate"].'\')"><img src="../img/plus.png"></a>
    			<?php }else { ?> 
    				<a href="javascript:edit_diafestivo(\''.$_POST["orderdate"].'\' )" class="diafestivo"> <?php echo $arreglo['dia_festivo'];?></a>
				<?php } ?> 


		</div>
		</li>
		</ul>		
</nav>

<section class="contenido">
<?php 
$consulta = "select  min(fecha) as fecha, min(hora) as hora, min(total_recordatorios) as total_recordatorios,
min(total_eventos) as total_eventos,
min(id) as id, min(asunto)as asunto, min(lugar) as lugar, min(asiste) as asiste,
min(descripcion) as descripcion, min(infor) as infor, min(notas) as notas

FROM
(
    Select tabla_final.*, tb_recordatorio.total_recordatorios
    FROM
    (
    select tabla_guia.fecha, tabla_guia.hora, tb_calendario.id,tb_calendario.asunto, tb_calendario.lugar,tb_calendario.asiste, 
    tb_calendario.descripcion,  tb_calendario.infor, tb_calendario.notas 
    from 
    (select '$busqueda' as fecha, hora from cat_horario) as tabla_guia left join tb_calendario
    ON
    tabla_guia.fecha = tb_calendario.fecha and tabla_guia.hora = tb_calendario.hora order by tabla_guia.fecha, tabla_guia.hora
    ) as tabla_final
    
    LEFT JOIN
    
    (select min(fecha) as fecha_recordatorio, min(hora) as hora_recordatorio, count(fecha) as total_recordatorios 
     from tb_recordatorio group by fecha, hora) as tb_recordatorio
    
    ON tabla_final.fecha = tb_recordatorio.fecha_recordatorio
    and
    tabla_final.hora = tb_recordatorio.hora_recordatorio
) as consulta_final

left join

(
    select min(fecha) as fecha_evento, min(hora) as hora_evento, count(fecha) as total_eventos 
     from tb_calendario group by fecha, hora
) as tabla_eventos
ON 
consulta_final.fecha = tabla_eventos.fecha_evento AND consulta_final.hora = tabla_eventos.hora_evento 
GROUP BY fecha, hora";

$recurso=mysql_query($consulta,$cn);
$num_reg=mysql_num_rows($recurso);
?>

<table class="tabla">
<caption>A Simple table <strong>NOT</strong> WCAG 2.0</caption>
	<thead>
	<tr>
		<th width="4%"></th>
		<th width="5%">Hora</th>
		<th width="25%">Asunto</th>
		<th width="25%">Lugar</th>
		<th width="35%">Descripción</th>
		<th width="3%"><img src="../imagenes/edit.png" width="12" height="12"></th>
		<th width="3%"><img src="../imagenes/eliminar.png" width="12" height="12"></th>
	</tr>
	</thead>
	<tbody class="color">
		<?php 
		while ($arreglo=mysql_fetch_array($recurso) ){
	   	?>
	   	<tr background="#fff">
		<th class="col_1">
 			<?php
 				if ($arreglo['total_recordatorios'] > 0){
					echo '<table border="0" cellspacing="5"><tr> <td height"20px">'.$arreglo['total_recordatorios'].'</td><td height"20px><p align="center"><a href="javascript:ver_recordatorios(\''.$arreglo['fecha'].'\',\''.$arreglo['hora'].'\')"><img style="border:0;" src="../imagenes/recordatorio.png" width="20" height="20"></a></td></tr></table>';
				}else {
 					echo '&nbsp;';
 				}
 			?>
		</th>
		<th width="5%"><?php $arreglo['hora'];?></th>
		<th width="25%"><?php $arreglo['asunto'];?></th>
		<th width="25%"><?php $arreglo['lugar'];?></th>
		<th width="35%"><?php $arreglo['descripcion'];?></th>
		<th width="3%"><img src="../imagenes/edit.png" width="12" height="12"></th>
		<th width="3%"><img src="../imagenes/eliminar.png" width="12" height="12"></th>
		</tr>
		<?php 
		}
	   	?>
	</tbody>
</table>
</section>

<aside class="sidebar">
                (( ANUNCIO DEL PDF ))
</aside>



</body>
</html>