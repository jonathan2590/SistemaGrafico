<?php
error_reporting(0);
session_start();

header('Content-type: application/json; charset=utf-8');
include("conectar.php");
// Realizo consulta
$db=obtenerConexion();
//recogemos las variables post del formulario
 
$jsondata = array();
$sql="select s.s_id_empresa,e.nombre,s.s_id_usuario,u.usuario,s.s_id_equipo,q.nombre_equipo,s.s_sensor,s.s_nombre_sensor,s.s_medida,s.s_minimo,s.s_maximo from sensores s , empresas e,usuarios u,equipos q where s.s_id_empresa=e.id and s.s_id_usuario=u.user_id and q.empresa_id=e.id and q.equipo_id=s.s_id_equipo order by q.empresa_id,q.equipo_id,s.s_sensor;";
 
$resulset = mysql_query($sql);
        
 if(!$resulset){ //Si hubo error al insertar, se avisa
            $jsondata["success"] = false;
            $jsondata["data"] = array('message' => "Error al Ejecutar el Query ");
            echo json_encode($jsondata, JSON_FORCE_OBJECT);
			return;
        }

$arr = array();

while ($obj = mysql_fetch_row($resulset)) {
    $arr[] = array('s_id_empresa' => $obj[0],
	               'nombre' => $obj[1],
                   's_id_usuario' => $obj[2],
                   'usuario' => $obj[3],
                   's_id_equipo' => $obj	[4]	,
                   'nombre_equipo' => $obj [5] ,
                   's_sensor' => $obj [6] ,
                   's_nombre_sensor' => $obj [7] ,
                   's_medida' => $obj [8] ,
                   's_minimo' => $obj [9] ,
                   's_maximo' => $obj [10] 
                  );
}

$row_cnt = mysql_num_rows($resulset);

cerrarConexion($db, $resulset);

if($resulset){ //Si resultado es true, se agregó correctamente
 
 if ($row_cnt==0){
	 $jsondata["success"] = false;
     $jsondata["data"] = array('message' => "No existen sensores");
	}
	else {

	$jsondata["success"] = true;
	$jsondata["data"] = $arr;     } 
	}

 
	
echo json_encode($jsondata, JSON_FORCE_OBJECT);
?>

