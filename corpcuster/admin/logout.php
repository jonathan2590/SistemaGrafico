<?php 
    session_start(); 
    header('Content-type: application/json; charset=utf-8');
	include("class/configuracion/conectar.php");
	include("class/configuracion/log.php");
	$idtrx=1002;
	$idsesion=(date("YmdHis"));
	$_log = new Log();

	// Realizo consulta
	$db=obtenerConexionSqli();   
    $_log->RegistrarLog($idtrx, $idsesion,'R',"Salida del sistema :: Usuario ::".$_SESSION['nick'],$db,"INFO");
    $db->close();

    session_destroy(); 
    header('location: ../login.php'); 
?>