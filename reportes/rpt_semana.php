<?php
//include("../includes/excel.php");
include ("../includes/conexion_bd.php");
//include ("../includes/funciones_v2.php");
//include("../includes/conexion.php");
//set_time_limit(10);
require_once("../includes/excel/class.writeexcel_workbook.inc.php");
require_once("../includes/excel/class.writeexcel_worksheet.inc.php");
//f_imprime_arreglo($_POST);
$bus_fechaini=$_POST[bus_fechaini];
$bus_fechafin=$_POST[bus_fechafin];
$impresion=$_POST[impresion];

$dias=array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
$mes=array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');

$Ary_mes=split('-',$bus_fechaini);
$sel_mes=$Ary_mes[1];

$Ary_mes2=split('-',$bus_fechafin);
$sel_mes2=$Ary_mes2[1];


$Query="select *,date_format(fecha,'%w') as dia from calendario_tabla where fecha>='$bus_fechaini' and fecha<='$bus_fechafin' order by fecha,hora";
$rdsQuery=mysql_query($Query,$cn);

$registros=mysql_num_rows($rdsQuery);

$fname = tempnam("/tmp", "Agenda.xls");

$workbook = &new writeexcel_workbook($fname);
$worksheet = &$workbook->addworksheet();

if($impresion=='Media Carta')
{
$worksheet->set_paper(6);
$worksheet->set_landscape();
}
else
{
  $worksheet->set_paper(1);
}
$worksheet->set_margins(0.2);
$worksheet->set_margin_bottom(0.4);
$worksheet->center_horizontally();
$worksheet->hide_gridlines(1);
//$worksheet->set_footer('&RPagina &P de &N');

$heading =& $workbook->addformat(array('align' => 'center', 'bold' => 1,'fg_color' => 'green','color' => 'white','border' => 1,'size' => 8,merge   => 1));

$border1 =& $workbook->addformat();
$border1->set_size(15);

$numero =& $workbook->addformat(array('align' => 'center','border' => 1,'size' => 10));
$estandar=& $workbook->addformat(array('border' => 1,'size' => 7,valign  => 'vcenter'));
$estandar->set_text_wrap();

$verde=$workbook->set_custom_color(40, 231,  242,  210   ); # Orange

$estandar2=& $workbook->addformat(array('border' => 1,'fg_color' => $verde ,'size' => 7,valign  => 'vcenter'));
$estandar2->set_text_wrap();


$estandar4=& $workbook->addformat(array('border' => 0,'size' => 12,valign  => 'vcenter',merge   => 2));


$worksheet->set_column(0, 0, 5);
$worksheet->set_column(1, 1, 28);
$worksheet->set_column(2, 2, 5);
$worksheet->set_column(3, 3, 28);
$worksheet->set_column(4, 4, 5);
$worksheet->set_column(5, 5, 28);

$worksheet->insert_bitmap('A1','iqm.bmp',5,5,0,0);

$heading3  =& $workbook->addformat(
array('align' => 'center', 'bold' => 1,'fg_color' => 'green','color' => 'white','border' => 0,'size' => 8,merge   => 2));

$contenido = array('AGENDA PERSONAL', '','');
$worksheet->write_row('D1', $contenido, $heading3);

$datos=mysql_fetch_array($rdsQuery);
$sel_dia=$datos[dia];
$sel_mes=$sel_mes-1;

$sel_mes2=$sel_mes2-1;
$fecha_print="$Ary_mes[2] de $mes[$sel_mes] del $Ary_mes[0] al $Ary_mes2[2] de $mes[$sel_mes2] del $Ary_mes2[0] ";
//$worksheet->write(1, 2, "$fecha_print", $estandar4);

$contenido2= array($fecha_print, '','');
$worksheet->write_row('D3', $contenido2, $estandar4);

$fechaini="$bus_fechaini";

$x=0;

$y=4;
$y_ant=4;
$y_max=0;
$elementos=1;
$abajo=1;

do  {
  
  
  $dia=$datos[dia];
  $fecha_sel=split('-',$datos[fecha]);
  
  $contenido3= array("$dias[$dia] $fecha_sel[2]", '');
//$worksheet->write_row('D3', $contenido2, $estandar4);
  $worksheet->write($y, $x, $contenido3, $heading);
  //$worksheet->write($y, $x, "Hora", $heading);
  //$worksheet->write($y, $x+1, "$dias[$dia] - $datos[fecha] ", $heading);
  //**************
 
  while ($datos[fecha]==$fechaini)
  {
    if($color == 0)
    {
      $formato=$estandar;
      $color=1;
    }
    else
    { 
      $formato=$estandar2;
      $color=0;
    }
    $y++;
    $worksheet->write($y, $x, "$datos[hora]",$formato);
    $worksheet->write($y, $x+1, "$datos[asunto] ",$formato);
    $datos=mysql_fetch_array($rdsQuery);
    $elementos++;
    
  }
  $color=0;
  $abajo++;
  $x=$x+2;
  if($y_max<$y)
  {
    $y_max=$y;
  }
  
  if($abajo>3)
  {
    
    $x=0;
    $abajo=1;
    $y_ant=$y_max+1;
  }
  $y=$y_ant;
  
  
  $fechaini=$datos[fecha];
  
  //**************

}while ($elementos<=$registros);
//$datos=mysql_fetch_array($rdsQuery)


$workbook->close();

header("Content-Type: application/x-msexcel; name=\"Agenda.xls\"");
header("Content-Disposition: inline; filename=\"Agenda.xls\"");
$fh=fopen($fname, "rb");
fpassthru($fh);
unlink($fname);

?>

?>