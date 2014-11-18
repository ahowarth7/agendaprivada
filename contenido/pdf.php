<?php

include("../includes/conexion_bd.php");
include("../includes/funciones_v2.php");
define('FPDF_FONTPATH','../includes/font/');

require('../class/fpdf.php');

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
			
			
			
			$mes_arreglo=array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');	
			
			//$fechaactual=  $dia."-". $mes."-". $anio;
			$fechaactual="$anio-$mes-$dia";
			
			if($fechaactual=='--')
						{ 
							//$busqueda=$fechaactual;
						$busqueda=date("d-M-Y");
						
						
						}
					else 
						{
					
							$busqueda = $fechaactual;
							
							
						}

//=================================================================================================================




//print_r($busqueda);
//exit;
class PDF extends FPDF
{
//Cabecera de página
function Header()
{
	
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
			
			
			
			$mes_arreglo=array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');	
			$mes=$mes-1;
			//$fechaactual=  $dia."-". $mes."-". $anio;
			$fechaactual="$anio-$mes-$dia";
			$imprimir="$dia - $mes_arreglo[$mes] - $anio";
			//print_r($fechaactual);
			//exit;
			
			//==========================================================================================
	
	if($fechaactual=='--')
						{ 
							//$busqueda=$fechaactual;
						$busqueda=date("d-M-Y");
						
						
						}
					else 
						{
					
							$busqueda = $fechaactual;
							
							
						}
						

			
						
	//Logo
	$this->Image('../imagenes/logoiqm.jpg',150,8,70);
	$this->Ln(8);
	//Arial bold 15
	$this->SetFont('Arial','B',11);
	//Movernos a la derecha
	$this->Cell(1);
	//Título
	$this->Ln(2);
	$this->Cell('120',10,'AGENDA PERSONAL',0,0,'C');
	$this->SetFont('Arial','B',11);
	$this->Cell('120',10,'LIC. CECILIA LORIA MARIN',0,0,'C');	
	$this->SetFont('Arial','B',11);
	$this->Cell('170',10,$imprimir,0,1,'L');	
	$this->SetFont('Arial','B',8);
	$this->Ln(10);


}

//Encabezados
function ImprovedTable($header,$width)
{
	//Anchuras de las columnas

	//Cabeceras
	$this->SetFillColor(20,150,36);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],8,$header[$i],1,0,'C',1);
	$this->Ln();
}


//Pie de página
function Footer()
{
	//Posición: a 1,5 cm del final
	$this->SetY(-15);
	//Arial italic 8
	$this->SetFont('Arial','I',8);
	//Número de página
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
//====================================================================================
//Creación del objeto de la clase heredada

$width=array(20,160,90,95);
$header=array('HORA','ASUNTO','LUGAR','RESPONSABLE');
//Carga de datos

$pdf=new PDF();
$pdf->FPDF('P','mm','letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->ImprovedTable($header,$width);

      
      $qryDatos="SELECT * FROM calendario_tabla where fecha='$busqueda' order by hora";
     // print_r($qryDatos);
      //exit;     
   $rdsDatos=mysql_query($qryDatos,$cn);
   $registros=mysql_num_rows($rdsDatos);
   

$y=60;
for($i=0;$i<$registros;$i++)
{
      $row=mysql_fetch_array($rdsDatos);
      
       $pdf->SetFillColor(20,150,36);
	   $pdf->SetFont('Times','',8); 
		
		$pdf->SetXY(18,$y);
		$pdf->MultiCell(20,6,$row['hora'],'0','LR',0);
		
		
		$pdf->SetXY(40,$y);
		$pdf->MultiCell(160,6,$row['asunto'],'0','LR',0,$fill);
		
		$pdf->SetXY(200,$y);
		$pdf->MultiCell(90,6,$row['lugar'],'0','LR',0);
		
		$pdf->SetXY(292,$y);
		$pdf->multiCell(95,6,$row['infor'],'0','LR',0);
		
		$y=$y+18;
			
}

	//Línea de cierre
	$pdf->Cell(array_sum($width),10,'','T');

$pdf->SetFont('Times','',10);

$pdf->Output();
?>