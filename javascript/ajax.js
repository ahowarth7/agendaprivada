//Funci�n que crea el nuevo objeto de AJAX
function nuevoAjax(){  
  var xmlhttp=false;
  try 
  {
   xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } 
  catch (e) 
  {
   try 
   {
     // Creaci�n del objet ajax para Explorer
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 
   } 
   catch (E) 
   {
     xmlhttp = false;
   }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') 
  {
     xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
} 
