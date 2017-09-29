 
<?php 

session_start();
  

//echo $rec
header('Content-type: application/json; charset=utf-8');
include("../class/conectar.php");

// Realizo consulta
$db=obtenerConexionSqli();
 
$id_usuario=$_POST['id_usuario'];
$usuario=$_POST['usuario'];
$correo=$_POST['correo']; 
$empresa = $_POST['select_empresa'];
$rol = $_POST['select_rol'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
 
$table='usuarios';
$campo='user_id';
//$nombre ='prueba2';
 
$sql = "update ".$table." set pass='".md5($password)."', usuario='".$usuario."', nombre='".$nombre."' ,correo='".$correo."',empresa_id='".$empresa."' , rol=".$rol." where " .$campo."=".$id_usuario;

 
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

if ($id_usuario==$_SESSION['codigo_usr'])
{
$_SESSION['empresa'] = $empresa;  
$_SESSION['rol'] = $rol; 
$_SESSION['nick'] = $usuario;  
}

    echo json_encode($jsondata, JSON_FORCE_OBJECT);
 ?>