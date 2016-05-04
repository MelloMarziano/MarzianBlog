<?php 

	$host="127.0.0.1";
	$user="root";
	$pw="";
	$db="blog";

	$con =new mysqli($host,$user,$pw,$db);
	if ($con->connect_errno){
		echo "Error al conectar {$con->connect_errno}";
	}
 ?>