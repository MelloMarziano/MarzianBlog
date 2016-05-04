<?php 

	$host="185.27.134.10";
	$user="n260m_17081553";
	$pw="jpkhf164";
	$db="n260m_17081553_blog";

	$con =new mysqli($host,$user,$pw,$db);
	if ($con->connect_errno){
		echo "Error al conectar {$con->connect_errno}";
	}
 ?>