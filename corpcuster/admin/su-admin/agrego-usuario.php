 
<?php 

session_start();
  

//echo $rec
header('Content-type: application/json; charset=utf-8');
include("../class/conectar.php");

// Realizo consulta
$db=obtenerConexionSqli();
 

$usuario=$_POST['usuario_a'];
$correo=$_POST['correo_a']; 
$empresa = $_POST['select_empresa_a'];
$rol = $_POST['select_rol_a'];
$password = $_POST['password_a'];

 
$table='usuarios';
 
 
$sql = "insert into ".$table."(usuario,pass,correo,rol,empresa_id) values('".$usuario."','".md5($password)."','".$correo."',".$rol.",".$empresa.");";
 
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