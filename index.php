<?php
include("includes/cn.php");
$msg = "";
if (isset($_POST['Submit']))
{
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
   	$result = mysql_query("Select * From admin where username='$username'",$link);
	
	if(mysql_num_rows($result)>0)
	{
		$row = mysql_fetch_array($result, MYSQL_BOTH);
		if($password == $row["password"])
		{
			$_SESSION['adminok'] = "ok";
			$_SESSION['username'] = "username";
			$_SESSION['password'] = "password";


           header("location:contenido/index2.php");


		}
		else
		{
			$msg = "Password incorrect";
		}
	}
	else
	{
		$msg = "Username incorrect";
    }

}
?>
<!--__________________________________________________________________________________________________________________________-->
<html>
<head>
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilos/estilo.css" rel="stylesheet" type="text/css" />
<style>
body{
  background-color: #007b66;
}

</style>
</head>

<body >
<p align="center" class="titulologin"><strong>Agenda Privada Administrativa</strong></p>

<form name="form1" method="post" action="">
  <p align="center" class="estilo5">Por favor, introduzca correctamente nombre de usuario y contraseña para entrar</font></p>
  
  
 <!--tabla de login--------------------------------> 
  <table width="30%" border="0" align="center" cellpadding="1" cellspacing="1" bordercolor="#000000">
  
    <tr bgcolor="#CCCCCC"> 
      <td colspan="2" align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Panel de Control de Usuarios</strong></font></td>
    </tr>
    <tr> 
      <td><font size="4" class="usuario">Usuario</font></td>
      <td><font size="3" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input name="username" type="text" id="username">
        </font></td>
    </tr>
    <tr> 
      <td><font size="4" class="usuario">Contraseña</font></td>
      <td><font size="3"> 
        <input name="password" type="password" id="password">
        </font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Aceptar"></td>
    </tr>
  </table>
  
<p>&nbsp;</p></form>


</body>
</html>
