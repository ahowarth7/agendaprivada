<?php


      include('../class/class.ezpdf.php');
  
      include('../class/class.backgroundpdf.php');
  
       
      $pdf = new backgroundPDF('a4', 'portrait', 'image', array('img'=>'../imagenes/logoiqm.jpg'));
   
      $pdf->selectFont('Helvetica.afm');
   
      $pdf->ezText('Background in PDF', 50);
   
      $pdf->ezText('', 12);
   
      $pdf->ezText('Ejemplo de PDF utilizando una imagen como Fondo.', 12);
   
      $pdf->ezNewPage();
  
      $pdf->ezText('Pagina 2', 50);
  
       
  
      $pdf->ezStream();
?>
