 
<?php 

session_start();

//echo $rec
header('Content-type: application/json; charset=utf-8');
include("../class/conectar.php");

// Realizo consulta
$db=obtenerConexionSqli();
 
$codigo=$_POST['usuario'];
$nombre=$_POST['marca']; 
$codigo_p=$_POST['codigomarca'];
$select_estado=$_POST['select_estado'];

$table='marca';
$campo='id';

//$sql = "update ".$table." set Code='".$codigo."', Name='".$nombre."',estado='".$select_estado."' where " .$campo."='".$codigo_p."';"; 
$sql = "update marca set id='$codigo', descricpcion='$nombre', estado='$select_estado' where id='$codigo_p'";

if ($db->query($sql) === FALSE) 
	{
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