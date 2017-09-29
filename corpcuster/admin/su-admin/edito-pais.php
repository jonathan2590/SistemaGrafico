 
<?php 

session_start();

//echo $rec
header('Content-type: application/json; charset=utf-8');
include("../class/conectar.php");

// Realizo consulta
$db=obtenerConexionSqli();
 
$codigo=$_POST['usuario'];
$nombre=$_POST['pais']; 
$codigo_p=$_POST['codigopais'];
$select_estado=$_POST['select_estado'];

$table='cc_pais';
$campo='Code';

//$sql = "update ".$table." set Code='".$codigo."', Name='".$nombre."',estado='".$select_estado."' where " .$campo."='".$codigo_p."';"; 
$sql = "update cc_pais set Code='$codigo', Name='$nombre', estado='$select_estado' where Code='$codigo_p'";

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