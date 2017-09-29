<?php
error_reporting (0);
session_start();

//echo $rec
header('Content-type: application/json; charset=utf-8');
include("../class/conectar.php");

// Realizo consulta
$db=obtenerConexionSqli();

$id_empresa=$_POST['id_empresa'];
$id_equipo=$_POST['id_equipo'];
$id_usuario=$_POST['id_usuario'];
$sensor=$_POST['sensor'];

$table='sensores';


$sql = "delete ".$table." from ".$table." where s_id_empresa=" .$id_empresa." and s_id_equipo=".$id_equipo." and s_id_usuario =".$id_usuario." and s_sensor='".$sensor."';";
 
if ($db->query($sql) === FALSE) {
    $jsondata["success"] = false;
    $jsondata["data"] = array('message' => "Error al Ejecutar el Query ".$db->error);
    echo json_encode($jsondata, JSON_FORCE_OBJECT);
    return;
}
else
{

	$jsondata["success"] = true;
	$jsondata["data"] = array('message' => "ok"); 
}


if ($rec==$_SESSION['codigo_usr'])
{
$_SESSION['empresa'] = '';  
$_SESSION['rol'] = ''; 
$_SESSION['nick'] = '';  
}

    echo json_encode($jsondata, JSON_FORCE_OBJECT);
    return;

 ?>
 
  