<?php

// PHP DB Control Panel
//
//Developed by: 	Humayun Shabbir Bhutta
//Email:			humayun_sa@hotmail.com
//website:			hm.munirbrothers.net
//Location:			Pakistan
//


$tipo_host = "servidor";

switch ($tipo_host)
{
   case "localhost":
         $link = mysql_connect("localhost", "admin", "000");	
         $db = mysql_select_db("calendario", $link)
		or die("no hay conexio database");			 // Cookie max life time in seconds
        break;
        
   case "servidor":
           $link = mysql_connect("conalepdireccion.db.7750832.hostedresource.com", "conalepdireccion", "Conalep2011");
           $db = mysql_select_db("conalepdireccion", $link)
			or die("no hay conexio database");
        break;
}

?>
