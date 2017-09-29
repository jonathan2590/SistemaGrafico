<?php
error_reporting (0);
session_start();

if( isset($_POST["oper"]) )
  {
     $operacion = mysql_real_escape_string($_POST['oper']);
  }

$nombre=$_POST['name'];
$usuario=$_POST['usuario'];
$correo=$_POST['correo'];
$estado=$_POST['estado'];
$password=$_POST['password'];
$empresa=$_POST['empresa'];
$rol=$_POST['rol'];
$rec=$_POST['id'];
//echo $rec
header('Content-type: application/json; charset=utf-8');
include("../configuracion/conectar.php");

// Realizo consulta
$db=obtenerConexionSqli();


$table='db_admin.usuarios';
$campo='user_id';
$num_reg=0;
$jsondata="";

if($operacion=='edit')
{
$sql="select count(1) from ".$table." where usuario='".$usuario."' and user_id<>".$rec;
 }

if($operacion=='add')
{
$sql="select count(1) from ".$table." where usuario='".$usuario."'";
}

if ($result = $db->query($sql)) {

    /* obtener el array de objetos */
    while ($fila = $result->fetch_row()) {
        $num_reg=$fila[0];
    }

    /* liberar el conjunto de results */
    $result->close();
}
	if($num_reg<>0)
{
  $db->close();
  $jsondata="Error :: Usuario ya existe " .$usuario;
  echo $jsondata;
  return false;
}

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

}
if($operacion=='edit')
{

		$sql = "update ".$table." set empresa_id=".$empresa.", estado='".$estado."', usuario='".$usuario."', rol =".$rol.",nombre='".$nombre."',correo='".$correo."',pass='".$password."' where " .$campo." in(".$rec.")";

			if ($rec==$_SESSION['codigo_usr'])
			{
			  $_SESSION['nick'] = $nombre;
			  $_SESSION['rol'] = $rol;
			}
}
if($operacion=='add')
{
	$sql = "insert into ".$table." (usuario,pass,correo,rol,nombre,estado,empresa_id)  values ('".$usuario."','".($password)."','".$correo."',".$rol.",'".$nombre."','".$estado."',".$empresa.");";
}
if ($db->query($sql) === FALSE) {
    //$jsondata["success"] = false;
    //$jsondata["data"] = array('message' => "Error al Ejecutar el Query ".$sql.$db->error);
    $jsondata="Error :: " .$db->error;
   // echo json_encode($jsondata, JSON_FORCE_OBJECT);

}
else
{

	//$jsondata["success"] = true;
	//$jsondata["data"] = array('message' => $db->affected_rows);


	if($operacion=='del')
	{
		if ($rec==$_SESSION['codigo_usr'])
		{
			session_destroy();
	        echo '<script> window.location.href = "../../../login.php"; </script>';
	        return;
		}

        if($db->affected_rows!=0)
        {
		$jsondata="Eliminacion con exito :: " .$db->affected_rows. " filas afectadas";
		}
		else
		{
		  $jsondata="Error Eliminacion :: " .$db->affected_rows. " filas afectadas";
		}

	}

	if($operacion=='edit')
	{
			if ($rec==$_SESSION['codigo_usr'])
			{
			  $_SESSION['nick'] = $nombre;
			  $_SESSION['rol'] = $rol;
			}

	    if($db->affected_rows!=0)
        {
		$jsondata="Actualizacion con exito :: " .$db->affected_rows. " filas afectadas";
		}
		else
		{
		  $jsondata="Error Actualizacion :: " .$db->affected_rows. " filas afectadas";
		}
	}

}


/* cerrar la conexión */
$db->close();

echo ($jsondata);


 ?>
