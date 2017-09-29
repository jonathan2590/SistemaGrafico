 
<?php 

session_start();
  

//echo $rec
header('Content-type: application/json; charset=utf-8');
include("../class/conectar.php");

// Realizo consulta
$db=obtenerConexionSqli();
 
$empresa = $_POST['id_empresa'];
$equipo = $_POST['id_equipo'];
$sensor_new=$_POST['sensor'];
$sensor_id=$_POST['id_sensor'];
$medida = $_POST['medida'];
$minimo = $_POST['minimo'];
$maximo = $_POST['maximo'];
$nombre_sensor=$_POST['nombre_sensor'];
 

 
$table='sensores';
$campo='s_id_empresa';

 
$sql = "update ".$table." set s_sensor='".$sensor_new."',s_nombre_sensor='".$nombre_sensor."', s_medida='".$medida."', s_minimo='".$minimo."',s_maximo='".$maximo."',s_id_empresa='".$empresa."' where " .$campo."=".$empresa." and s_id_equipo=".$equipo." and s_sensor='".$sensor_id."' ;";

 
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

 
    echo json_encode($jsondata, JSON_FORCE_OBJECT);
 ?>