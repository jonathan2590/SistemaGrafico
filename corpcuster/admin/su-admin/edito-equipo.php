 
<?php 

session_start();
  

//echo $rec
header('Content-type: application/json; charset=utf-8');
include("../class/conectar.php");

// Realizo consulta
$db=obtenerConexionSqli();
 
$empresa = $_POST['id_empresa'];
$equipo = $_POST['id_equipo'];
$url_equipo=$_POST['url_equipo'];
$nombre_equipo=$_POST['nombre_equipo'];
 

 
$table='equipos';
$campo='equipo_id';

 
$sql = "update ".$table." set url_equipo='".$url_equipo."',nombre_equipo='".$nombre_equipo."', empresa_id='".$empresa."' where ".$campo."=".$equipo.";";

 
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