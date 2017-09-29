 
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
$medida = $_POST['medida'];
$minimo = $_POST['minimo'];
$maximo = $_POST['maximo'];
$nombre_sensor=$_POST['nombre_sensor'];

if ($medida=='')
	$medida=0;

if ($minimo=='')
	$minimo=0;

if ($maximo=='')
	$maximo=0;

 


$table='sensores';

$sql = "insert into ".$table." (s_fecha,s_id_empresa,s_id_usuario,s_id_equipo,s_sensor,s_nombre_sensor,s_medida,s_maximo,s_minimo,s_fecha_ini,s_fecha_fin) values (now(),".$empresa.",".$_SESSION['codigo_usr'].",".$equipo.",'".$sensor_new."','".$nombre_sensor."','".$medida."',".$maximo.",".$minimo.",now(),now());";
 
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