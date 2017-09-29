<?php

session_start();

header('Content-type: application/json; charset=utf-8');
include("configuracion/conectar.php");
// Realizo consulta
$db=obtenerConexion();
//recogemos las variables post del formulario

if(!isset($_POST['id_empresa']))
{
  $sql="select equipo_id,url_equipo,nombre_equipo,b.logo,b.url,b.nombre,a.empresa_id from equipos a, empresas b where a.empresa_id=b.id and empresa_id=".$_SESSION['empresa']." order by a.empresa_id;";
}
else
{
  if($_POST['id_empresa']==0)
  {
  $sql="select equipo_id,url_equipo,nombre_equipo,b.logo,b.url,b.nombre,a.empresa_id from equipos a, empresas b where a.empresa_id=b.id order by a.empresa_id;";
  }
  else
  {
    $sql="select equipo_id,url_equipo,nombre_equipo,b.logo,b.url,b.nombre,a.empresa_id from equipos a, empresas b where a.empresa_id=b.id and empresa_id=".$_POST['id_empresa']." order by a.empresa_id;";
  }
}
 
$jsondata = array();

$resulset = mysql_query($sql);
        
 if(!$resulset){ //Si hubo error al insertar, se avisa
            $jsondata["success"] = false;
            $jsondata["data"] = array('message' => "Error al Ejecutar el Query ");
            echo json_encode($jsondata, JSON_FORCE_OBJECT);
			return;
        }

$arr = array();

while ($obj = mysql_fetch_row($resulset)) {
    $arr[] = array('equipo_id' => $obj[0],
	                 'url_equipo' => $obj[1],
                   'nombre_equipo' => $obj[2],
                   'logo' => $obj[3],
                   'url_empresa' => $obj[4]	,
                   'nombre_empresa'	=> $obj[5],
                   'empresa_id' => $obj[6]
                      
        );
}

$row_cnt = mysql_num_rows($resulset);

cerrarConexion($db, $resulset);

if($resulset){ //Si resultado es true, se agregó correctamente
 
 if ($row_cnt==0){
	 $jsondata["success"] = false;
     $jsondata["data"] = array('message' => "No existen Equipos");
	}
	else {

	$jsondata["success"] = true;
	$jsondata["data"] = $arr;     } 
	}

	$pos=0;
while ($pos<=$row_cnt-1){
$arr[$pos]["url_equipo"]=utf8_encode($arr[$pos]["url_equipo"]);
$arr[$pos]["nombre_equipo"]=utf8_encode($arr[$pos]["nombre_equipo"]);
$arr[$pos]["logo"]=utf8_encode($arr[$pos]["logo"]);
$pos=$pos+1;
}
	
echo json_encode($jsondata, JSON_FORCE_OBJECT);
?>

