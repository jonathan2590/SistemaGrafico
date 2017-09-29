<?php
error_reporting(0);
session_start();

header('Content-type: application/json; charset=utf-8');
include("conectar.php");
// Realizo consulta
$db=obtenerConexion();
//recogemos las variables post del formulario
 
$jsondata = array();
if(!isset($_POST['codigotipo']))
{
   $sql="select a.id,depart_id, nombre_depart descricpcion, a.estado,a.fecha_registro from linea_negocio a, departamento where  a.descricpcion = depart_id; ";
}
else
{
   $sql="select a.id,a.descricpcion, a.estado,a.fecha_registro from linea_negocio a where a.id='".$_POST["codigotipo"]."';";   
} 

$resulset = mysql_query($sql);
        
 if(!$resulset){ //Si hubo error al insertar, se avisa
            $jsondata["success"] = false;
            $jsondata["data"] = array('message' => "Error al Ejecutar el Query ");
            echo json_encode($jsondata, JSON_FORCE_OBJECT);
      return;
        }

$arr = array();

while ($obj = mysql_fetch_row($resulset)) {
    $arr[] = array('id' => $obj[0],
                   'id_depa' => $obj[1],
                   'nombre' => $obj[2],
                   'estado' => $obj[3],
                   'fecha' => $obj[4]                   
                  );
}

$row_cnt = mysql_num_rows($resulset);

cerrarConexion($db, $resulset);

if($resulset){ //Si resultado es true, se agregó correctamente
 
 if ($row_cnt==0){
   $jsondata["success"] = false;
     $jsondata["data"] = array('message' => "No existen registros");
  }
  else {

  $jsondata["success"] = true;
  $jsondata["data"] = $arr;     } 
  }
  
echo json_encode($jsondata, JSON_FORCE_OBJECT);
?>

