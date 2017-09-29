<?php
error_reporting (0);
session_start();

$operacion=$_POST['oper'];
$nombre=$_POST['name'];
$usuario=$_POST['usuario'];
$correo=$_POST['correo'];
$estado=$_POST['estado'];
$password=$_POST['password'];
$rol=$_POST['rol'];
$rec=$_POST['id'];
//echo $rec
header('Content-type: application/json; charset=utf-8');
include("../conectar.php");

// Realizo consulta
$db=obtenerConexionSqli();


$table='db_admin.usuarios';
$campo='user_id';


if($estado=='Si')
{
	$estado='A';
}
else
{
	$estado='D';
}

if($operacion=='del')
{
	$sql = "delete ".$table." from ".$table." where " .$campo." in(".$rec.")";

	if ($rec==$_SESSION['codigo_usr'])
	{
		session_destroy(); 
    	header('location: ../../login.php'); 
	}


}
if($operacion=='edit')
{
	$sql = "update ".$table." set estado='".$estado."', usuario='".$usuario."', rol =".$rol.",nombre='".$nombre."',correo='".$correo."',pass='".$password."' where " .$campo." in(".$rec.")";
	$_SESSION['codigo_usr'] = $rec; 
  $_SESSION['nick'] = $nombre; 
  $_SESSION['rol'] = $rol;  
}
if($operacion=='add')
{
	$sql = "insert into ".$table." (usuario,pass,correo,rol,nombre)  values ('".$usuario."','".($password)."','".$correo."',".$rol.",'".$nombre."');";
}
if ($db->query($sql) === FALSE) {
    $jsondata["success"] = false;
    $jsondata["data"] = array('message' => "Error al Ejecutar el Query ".$sql.$db->error);
    echo json_encode($jsondata, JSON_FORCE_OBJECT);
    return;
}
else
{

	$jsondata["success"] = true;
	$jsondata["error"] = "Integer should be a positive";//array('message' => $sql.$db->affected_rows); 
}


    echo json_encode($jsondata);
    return;

 ?>
 
  