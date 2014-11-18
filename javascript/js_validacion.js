/*********************************************************************************************************/
/*FUNCION JS PARA VALIDAR EL INGRESO DE SOLO DIGITOS
  
EJEMPLO:
  -SIN DECIMALES
  		event="return valida_digitos(event)"
  -CON DECIMALES
  		event="return valida_digitos(event,'decimal')"
*/
function valida_digitos(e,decReq) {  
var isIE = document.all?true:false;
var isNS = document.layers?true:false;	

var key = (isIE) ? window.event.keyCode : e.which;
var obj = (isIE) ? event.srcElement : e.target;
var isNum = (key > 47 && key < 58) ? true:false;
var dotOK = (key==46 && decReq=='decimal' && (obj.value.indexOf(".")<0 || obj.value.length==0)) ? true:false;
if(key < 32)
return true;
return (isNum || dotOK);
}

/********************************************************************************************************/
/*FUNCION JS PARA VALIDAD ENTRADA DE CARACTERES NO NUMERICOS O ESPECIALES
EJEMPLO:
  		event="return valida_caracteres(event)" 
*/
function valida_caracter(evt) {  
  var nav4 = window.Event ? true : false;
  var key = nav4 ? evt.which : evt.keyCode;
  return (((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27)) || 
           (key>=97 && key<=122) || (key>=65 && key<=90));
}

