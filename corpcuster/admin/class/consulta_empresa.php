<?php
//error_reporting(0);
session_start();

header('Content-type: application/json; charset=utf-8');
include("configuracion/conectar.php");
// Realizo consulta
$db=obtenerConexion();
//recogemos las variables post del formulario
 
$jsondata = array();
$sql="select id,nombre,logo,url,a.estado,email,nemonico,fechaingreso,fechamodificacion, Code,u_usuario  from empresas a,cc_pais ,cc_user where id_pais=Code and id_usuario=u_user_id";
 
$resulset = mysql_query($sql);
        
 if(!$resulset){ //Si hubo error al insertar, se avisa
            $jsondata["success"] = false;
            $jsondata["data"] = array('message' => "Error al Ejecutar el Query ");
            echo json_encode($jsondata, JSON_FORCE_OBJECT);
			return;
        }

$arr = array();
$combo = "<select name=proveedor>";
while ($obj = mysql_fetch_row($resulset)) {

   $combo .= " <option value='".$obj[0];
   //concatenamos e insertamos el dato que se mostrara
   $combo .= "'>".utf8_encode($obj[1])."</option>";

    $arr[] = array('id' => $obj[0],
	                 'nombre' => $obj[1],
                   'logo' => $obj[2],
                   'url' => $obj[3],               
                   'estado' => $obj	[4],
                   'email' => $obj [5],
                   'nemonico' => $obj [6],                  
                   'fechaingreso' => $obj [7],
                   'fechamodificacion' => $obj [8],
                   'pais' => $obj [9],
                   'usuario' => $obj [10]                     
                  );
}

$combo .= "</select>";
echo $combo;
$row_cnt = mysql_num_rows($resulset);

cerrarConexion($db, $resulset);

if($resulset){ //Si resultado es true, se agregó correctamente
 
 if ($row_cnt==0){
	 $jsondata["success"] = false;
     $jsondata["data"] = array('message' => "no existes empresas");
	}
	else {

	$jsondata["success"] = true;
	$jsondata["data"] = $arr;     } 
	}

 
	
//echo json_encode($jsondata, JSON_FORCE_OBJECT);
?>

