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

$dias=array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
$mes=array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');

$Ary_mes=split('-',$bus_fechaini);
$sel_mes=$Ary_mes[1];


$Query="select *,date_format(fecha,'%w') as dia from calendario_tabla where fecha='$bus_fechaini' order by hora";
$rdsQuery=mysql_query($Query,$cn);

$registros=mysql_num_rows($rdsQuery);

$fname = tempnam("/tmp", "Agenda.xls");

$workbook = &new writeexcel_workbook($fname);
$worksheet = &$workbook->addworksheet();
$worksheet->set_paper(6);

$worksheet->set_landscape();
//$worksheet->set_margins(0.2);
$worksheet->set_margin_left(0.7);   # Set left margin
$worksheet->set_margin_right(0.0);  # Set right margin
$worksheet->set_margin_top(0.4);    # Set top margin
$worksheet->set_margin_bottom(0.2); # Set bottom margin

$worksheet->center_horizontally();
$worksheet->hide_gridlines(1);
$heading =& $workbook->addformat(array('align' => 'center', 'bold' => 1,'fg_color' => 'green','color' => 'white','border' => 1,'size' => 8));

$border1 =& $workbook->addformat();
$border1->set_size(15);

$numero =& $workbook->addformat(array('align' => 'center','border' => 1,'size' => 10));
$estandar=& $workbook->addformat(array('border' => 1,'size' => 8,valign  => 'vcenter'));
$estandar->set_text_wrap();

$verde=$workbook->set_custom_color(40, 231,  242,  210   ); # Orange

$estandar2=& $workbook->addformat(array('border' => 1,'fg_color' => $verde ,'size' => 8,valign  => 'vcenter'));
$estandar2->set_text_wrap();


$estandar4=& $workbook->addformat(array('border' => 0,'size' => 12,valign  => 'vcenter',merge   => 1));


$worksheet->set_column(0, 0, 6);
$worksheet->set_column(1, 1, 32);
$worksheet->set_column(2, 2, 28);
$worksheet->set_column(3, 3, 28);

//$worksheet->insert_bitmap('A1','iqm.bmp',5,5,0,0);

$heading3  =& $workbook->addformat(
array('align' => 'center', 'bold' => 1,'fg_color' => 'green','color' => 'white','border' => 0,'size' => 12,merge   => 1));

$contenido = array('AGENDA PERSONAL', '');
$worksheet->write_row('A1', $contenido, $heading3);

$worksheet->write(4, 0, "Hora", $heading);
$worksheet->write(4, 1, "Asunto", $heading);
$worksheet->write(4, 2, "Lugar",  $heading);
$worksheet->write(4, 3, "Descripcion", $heading);
$i=4;

$datos=mysql_fetch_array($rdsQuery);
$sel_dia=$datos[dia];
$sel_mes=$sel_mes-1;
$fecha_print="$dias[$sel_dia] , $Ary_mes[2] de $mes[$sel_mes] del $Ary_mes[0]";
//$worksheet->write(1, 2, "$fecha_print", $estandar4);

$contenido2= array($fecha_print, '');
$worksheet->write_row('C3', $contenido2, $estandar4);

do  {
  
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
  
  $worksheet->write($i+1, 0, "$datos[hora]",$formato);
  $worksheet->write($i+1, 1, "$datos[asunto] ",$formato);
  $worksheet->write($i+1, 2, "$datos[lugar]",$formato);
  $worksheet->write($i+1, 3, "$datos[descripcion]",$formato);
  $i++;
}while ($datos=mysql_fetch_array($rdsQuery));



$workbook->close();

header("Content-Type: application/x-msexcel; name=\"Agenda.xls\"");
header("Content-Disposition: inline; filename=\"Agenda.xls\"");
$fh=fopen($fname, "rb");
fpassthru($fh);
unlink($fname);

?>

?>