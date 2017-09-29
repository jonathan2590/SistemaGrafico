 
<?php 

session_start();
  

//echo $rec
header('Content-type: application/json; charset=utf-8');
include("../class/conectar.php");

// Realizo consulta
$db=obtenerConexionSqli();
 
$empresa = $_POST['id_empresa'];
$id_departamento = $_POST['id_departamento'];
$fecha_inicio=$_POST['fecha_inicio'];
$fecha_fin=$_POST['fecha_fin'];
$nombre_depart=$_POST['nombre_depart'];
 

 
$table='departamento';
$campo='depart_id';

 
$sql = "update ".$table." set nombre_depart='".$nombre_depart."',fecha_ingreso='".$fecha_inicio."',	fecha_hasta='".$fecha_fin."', empresa_id='".$empresa."' where ".$campo."=".$id_departamento.";";

 
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