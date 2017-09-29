<?php
error_reporting (0);
session_start();

$rec=$_POST['id'];
//echo $rec
header('Content-type: application/json; charset=utf-8');
include("../class/conectar.php");

// Realizo consulta
$db=obtenerConexionSqli();


$table='marca';
$campo='id';

$sql = "delete from marca where id='".$rec."';";   

 
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
 
  