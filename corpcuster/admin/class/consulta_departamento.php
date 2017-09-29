<?php

session_start();

header('Content-type: application/json; charset=utf-8');
include("conectar.php");
// Realizo consulta
$db=obtenerConexion();
//recogemos las variables post del formulario
 
$jsondata = array();
$sql="select depart_id,nombre_depart, fecha_ingreso,fecha_hasta,empresa_id,e.nombre, s.estado  FROM departamento s,empresas e where empresa_id=id";

$resulset = mysql_query($sql);
        
 if(!$resulset){ //Si hubo error al insertar, se avisa
            $jsondata["success"] = false;
            $jsondata["data"] = array('message' => "Error al Ejecutar el Query ".$sql);
            echo json_encode($jsondata, JSON_FORCE_OBJECT);
			return;
        }

$arr = array();

while ($obj = mysql_fetch_row($resulset)) {
    $arr[] = array('depart_id' => $obj[0],
	                 'nombre_depart' => $obj[1],
                   'fecha_ingreso' => $obj[2],
                   'fecha_hasta' => $obj[3],
                   'empresa_id' => $obj	[4]	,                  
                   'nombre_empresa' => $obj [5],
                   'estado' => $obj  [6]                   
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

