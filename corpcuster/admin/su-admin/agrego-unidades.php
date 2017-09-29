 
<?php 

session_start();
  
header('Content-type: application/json; charset=utf-8');
include("../class/conectar.php");

// Realizo consulta
$db=obtenerConexionSqli();
$codigo_a=$_POST['codigo_a'];
$nombre_a=$_POST['nombre_a']; 
$fecha=getdate();

$table='unidades';
$sql = "insert into unidades (id,descricpcion) values('$codigo_a','$nombre_a')";
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