<?php
//error_reporting(E_ALL);
session_start();

header('Content-type: application/json; charset=utf-8');
include("class/configuracion/conectar.php");

// Realizo consulta
$db=obtenerConexionSqli();



$sql="select * from db_admin.usuarios";
$anio=2012;
if ($result = $db->query($sql)) {

    /* obtener el array de objetos */
    while ($fila = $result->fetch_row()) {
      $array[] = array($anio=$anio+1,
                        $fila[0],
                        $fila[0],
                        $fila[0],
                        $fila[0],
                        $fila[0],
                        $fila[0],
                        $fila[0],
                        $fila[0],
                        $fila[0],
                        $fila[0],
                        $fila[0],
                        $fila[0],
                        $fila[0],
                        $fila[0],
                        $fila[0],
                        $fila[0],
                        $fila[0],
                        $fila[0]
                    );
    }

    /* liberar el conjunto de results */
    $result->close();
}

$jsondata["draw"] = "1";
$jsondata["recordsTotal"] = "4";
$jsondata["recordsFiltered"] = "4";
$jsondata["data"] = $array;

echo json_encode($jsondata);

?>
