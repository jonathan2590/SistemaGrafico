<?php

session_start();

header('Content-type: application/json; charset=utf-8');
include("conectar.php");
// Realizo consulta
$db=obtenerConexion();
//recogemos las variables post del formulario
 
$jsondata = array();
$sql="select s.s_sensor,s.s_nombre_sensor,s.s_medida,s.s_minimo,s.s_maximo,e.nombre_equipo FROM sensores s,equipos e where e.equipo_id=s.s_id_equipo and s.s_id_empresa=".$_SESSION['empresa']." and s.s_estado='A' and s.s_id_equipo=".$_POST['id_equipo'].";";
 
$resulset = mysql_query($sql);
        
 if(!$resulset){ //Si hubo error al insertar, se avisa
            $jsondata["success"] = false;
            $jsondata["data"] = array('message' => "Error al Ejecutar el Query ".$sql);
            echo json_encode($jsondata, JSON_FORCE_OBJECT);
			return;
        }

$arr = array();

while ($obj = mysql_fetch_row($resulset)) {
    $arr[] = array('sensor' => $obj[0],
	                 'nombre_sensor' => $obj[1],
                   'medida' => $obj[2],
                   'minimo' => $obj[3],
                   'maximo' => $obj	[4]	,
                   'nombre_equipo' => $obj  [5]
                  );
}

$row_cnt = mysql_num_rows($resulset);

cerrarConexion($db, $resulset);

if($resulset){ //Si resultado es true, se agregó correctamente
 
 if ($row_cnt==0){
	 $jsondata["success"] = false;
     $jsondata["data"] = array('message' => "no existe sensor");
	}
	else {

	$jsondata["success"] = true;
	$jsondata["data"] = $arr;     } 
	}

 
	
echo json_encode($jsondata, JSON_FORCE_OBJECT);
?>

