<?php 

// PHP DB Control Panel
//
//Developed by: 	Humayun Shabbir Bhutta
//Email:			humayun_sa@hotmail.com
//website:			hm.munirbrothers.net
//Location:			Pakistan
//

$link = mysql_connect("localhost", "josue", "josueiqm85")

        or die("no hay conexion");

$db = mysql_select_db("calendario", $link)
		or die("no hay conexion database");
?>
