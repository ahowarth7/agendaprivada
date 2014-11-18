<?php

function f_verifica_session(){
  session_name("sistema");
  session_start();
 
  if (!isset($_SESSION['id_usuario']) or !isset($_SESSION['id_tipo']) or !isset($_SESSION['usuario'])){
     session_unset();
     session_destroy();
          ?>
            <meta http-equiv="refresh" content="5;URL=/comando/sistema/login/login.php?mensaje=2">
      <?php
      exit();
  }
  else
  {  
  ?>
  
  <div id="user_login" align="right">
  <table cellpadding="0" cellspacing="0" >
  <tr >
   <td rowspan="2">
   <img  src="../imagenes/iconos/Profile.png" /> 
   </td>
  <td><font size="2" ><b><?php echo $_SESSION['d_tipo'];?></b></><div><font  size="1.5" ><?php echo "$_SESSION[usuario]" ?></></div></td>
  <tr>

  </table>
  
  
  </div>
  <?php
}
}

//************************************************************
// GENERA EL TITULO PRINCIPAL DE LA PAGINA  ******************
//************************************************************
function f_titulo($titulo)
{
?>
 
<table align="center" cellpadding="0" cellspacing="0"  id="titulo" >
  <tr>
   <td>
    <?php echo $titulo; ?>
   </td>
  </tr>
</table> 
<?php
}


//**** CREA UN CUADRO DE MENSAJE CON  IMAGEN A LA IZQUIERDA
function f_imprime_mensaje($mensaje,$ancho,$tipo_mensaje,$imagen)
{
   $_nivel="../";
   switch ($tipo_mensaje)
   {
    default:
       $bgcolor="#F3F5F8";
       $linea="#B1C3D9";       
       break;
   }
   ?>  
   <table id= 'mensaje_pantalla' align='center' width='<? echo $ancho ?>"'  border='0' cellpadding='3' cellspacing='0' 
   bgcolor='#FFFCC6' style='border: 1px solid <?php echo $linea ?> '>
    <tr bgcolor='<?php echo $bgcolor ?>' valign='middle'>
      <td  align="center" width='13'>
      <?php
      if((!isset($image)) or ($imagen != ''))
      {
       ?>
      <img src= '<?php echo $_nivel."imagenes/".$image ?>' >
      <?php
      }
      ?>
      </td>
      <td width='90%'><?php echo $mensaje ?></td>
    </tr>
   </table>
<?php
}

//*********************************************************************
//**** IMPRIME EL CONTENIDO DE UN ARREGLO *****************************
//*********************************************************************
function f_imprime_arreglo ($arreglo)
{
   echo '<pre>';
   print_r($arreglo);
   echo '<pre>';
}

//*********************************************************************
//****  GENERA UN COMBOBOX CON LOS RESULTADOS DE UNA CONSULTA *********
//****  A LA BASE DE DATOS                                    *********
//*********************************************************************

function f_type_combobox($nombre,$rds,$default,$campo_mostrar,$campo_valor,$seleccionado,$size,$accion,$disabled,$clase)
{
  /*
  $nombre         = Nombre de la variable donde se almacena el valor seleccionado
  $rds            = Recurso de la base de datos obtenido mediante Ej: $rds=mysql_query('CONSULTA SQL','$CONEXION');
  $default        = Valor inicial del campo seleccionado Ej: Todos...  , Seleccionar...
  $campo_mostrar  = De la consulta el nombre del campo que se va a mostrar en el combobox
  $campo_valor    = De la consulta el nombre del campo que contiene el valor ID que se guardara en la variable
  $seleccionado   = Variable que contiene el valor ID
  $size           = Permite que la altura del combobox muestre el numero de resultados que se especifique
  $accion         = Sirve para ejecutar eventos Ej: onclick='funcion()';
  $disabled       = Permite desabilitar el campo si se coloca disabled
  $clase          = Especifica la clase que tendra en el caso de CSS el formato
  */
  
   $unico=0;  // Sirve para indicar si solo hay un registro
   $lleno=0;  // Lleno nos indica si hay registros

   $registros=mysql_num_rows($rds);
   ?>
   <select name="<?php echo $nombre ?>"  <?php echo $accion ?> <?php echo "$disabled" ?> size="<?php echo $size ?>" class="<?php echo $clase ?>"  >
   <?php
   if ( isset($default) and $default != '')
   {
      if (!isset($seleccionado))
      {
         ?>
         <option value="0" selected><?php echo $default; ?></option>
         <?php
      }
      else
      {
         ?>
         <option value="0"><?php echo $default; ?></option>
         <?php
      }
   }

   if ($registros>0){
      while ($arreglo = mysql_fetch_assoc($rds)){

         $descripcion=$arreglo[$campo_mostrar];
         //echo	$seleccionado;
         if ($arreglo[$campo_valor]==$seleccionado){
            printf ("<option value=\"%s\" selected>%s</option>",$arreglo[$campo_valor],$descripcion);
         }
         else
         printf ("<option value=\"%s\">%s</option>",$arreglo[$campo_valor],$descripcion);
      }
   }
   ?>
   </select>
   <?php 
}



//*******************************************
// FUNCIONES F_TYPE  
//*******************************************

function f_type_text($nombre,$valor,$tamaño,$maxlenght,$disabled,$validacion)
{
   ?>
   <input type="text" class="texto" size="<? echo $tamaño ?>" name="<? echo $nombre ?>" value="<? echo $valor ?>" maxlength="<? echo $maxlenght ?>" <? echo "$disabled" ?>  onblur="javascript:this.value=this.value.toUpperCase();" , <? echo "$validacion" ?>  >
   <?php
}

function f_type_text_num($nombre,$valor,$tamaño,$maxlenght,$disabled,$validacion,$onkeypress)
{
   ?>
   <input type="text" class="texto" size="<? echo $tamaño ?>" name="<? echo $nombre ?>" value="<? echo $valor ?>"  onkeypress="return onlyDigits(event,'noDec')"  maxlength="<? echo $maxlenght ?>" <? echo "$disabled" ?>  onblur="javascript:this.value=this.value.toUpperCase();"     >
   <?php
}

function f_type_text_mail($nombre,$valor,$tamaño,$maxlenght,$disabled,$validacion)
{
   ?>
   <input type="text" class="texto" size="<? echo $tamaño ?>" name="<? echo $nombre ?>" value="<? echo $valor ?>"   maxlength="<? echo $maxlenght ?>" <? echo "$disabled" ?>  onblur="return isEmailAddress(<? echo $nombre ?>,'<? echo $nombre ?>' )"     >
   <?php
}

function f_type_hidden($nombre,$valor)
{
   ?>
   <input type="hidden" name="<? echo $nombre ?>" value="<? echo $valor ?>" >
   <?php
}

function f_type_radio($nombre,$valor)
{
   ?>
   <input type="radio" name="<? echo $nombre ?>" value="<? echo $valor ?>" >
   <?php
}

function  f_type_pass($nombre,$valor)
{
   ?>
   <input type="password" name="<? echo $nombre ?>" value="<? echo $valor ?>" >
   <?php
}

function f_type_button($nombre,$valor,$ancho,$tipo_accion,$accion,$clase,$disabled,$title)
{
   ?>  
   <input  type="button" name="<? echo $nombre ?>" style="width:<? echo $ancho ?>"  title="<? echo $title ?>"  value="<? echo $valor ?>"  <? echo "$tipo_accion=" ?>"<? echo $accion ?>" class="<?php echo $clase; ?>" <?php echo $disabled ?>  >
   
   <?php
}

function f_type_checkbox($nombre,$valor,$tipo_accion,$accion,$descripcion)
{
   if($tipo_accion != '')
   $accion="$tipo_accion=$accion";

   ?>
   <input type="checkbox" name="<? echo $nombre; ?>" value="<? echo $valor; ?>" <? echo $accion ?> title="<? echo $descripcion ?>"  >
   <?php
}


function f_trans_begin($conexion)
{
   mysql_query("set autocommit='0'",$conexion);
   mysql_query("BEGIN",$cn);
}

function f_trans_commit($conexion)
{
   mysql_query("commit",$conexion);
   mysql_query("set autocommit='1'",$conexion);
}

function f_trans_rollback($conexion)
{
   mysql_query("rollback",$conexionn);
   mysql_query("set autocommit='1'",$conexion);
}


function f_asigna_id($tabla, $campo_id,$conexion)
{
    $qryId="select $campo_id from $tabla
           order by $campo_id DESC limit 1";

   $rdsId=mysql_query($qryId,$conexion);

   $Id_array=mysql_fetch_assoc($rdsId);

    $Id = $Id_array["$campo_id"]+1;

   return $Id;
}

?>