<?php
error_reporting (0);
session_start();

$rec=$_POST['id'];
//echo $rec
header('Content-type: application/json; charset=utf-8');
include("../class/conectar.php");

// Realizo consulta
$db=obtenerConexionSqli();


/*$table='equipos';
$campo='empresa_id';

$sql = "delete ".$table." from ".$table." where " .$campo."=".$rec;
 

if ($db->query($sql) === FALSE) {
    $jsondata["success"] = false;
    $jsondata["data"] = array('message' => "Error al Ejecutar el Query ".$db->error);
    echo json_encode($jsondata, JSON_FORCE_OBJECT);
    return;
}*/


$table='empresas';
$campo='id';

$sql = "delete ".$table." from ".$table." where " .$campo."=".$rec;
 

if ($db->query($sql) === FALSE) {
    $jsondata["success"] = false;
    $jsondata["data"] = array('message' => "Existen usuarios/equipos que estan asociados a la empresa");
    echo json_encode($jsondata, JSON_FORCE_OBJECT);
    return;
}
else
{

	$jsondata["success"] = true;
	$jsondata["data"] = array('message' => "ok"); 
}

    echo json_encode($jsondata, JSON_FORCE_OBJECT);
    return;

 ?>
 
  