 
<?php 

session_start();
  

//echo $rec
header('Content-type: application/json; charset=utf-8');
include("../class/conectar.php");

// Realizo consulta
$db=obtenerConexionSqli();
 

$empresa = $_POST['id_empresa'];
$fecha_inicio_a=$_POST['fecha_inicio_a'];
$fecha_fin_a=$_POST['fecha_fin_a'];
$nombre_depart_a=$_POST['nombre_depart_a'];
 
$table='departamento';
 
 
$sql = "insert into ".$table."(nombre_depart,fecha_ingreso,fecha_hasta,empresa_id) values('".$nombre_depart_a."','".$fecha_inicio_a."','".$fecha_fin_a."',".$empresa.");";
 
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
 ?>s