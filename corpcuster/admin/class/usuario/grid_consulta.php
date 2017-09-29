<?php
error_reporting(0);
session_start();

header('Content-type: application/json; charset=utf-8');
include("../configuracion/conectar.php");
// Realizo consulta
$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction
if(!$sidx) $sidx =1;
// connect to the database
$db = obtenerConexion();

 $table='db_admin.usuarios';
$result = mysql_query("SELECT COUNT(*) AS count FROM " .$table);
$row = mysql_fetch_array($result,MYSQL_ASSOC);
$count = $row['count'];

if( $count >0 ) {
  $total_pages = ceil($count/$limit);
} else {
  $total_pages = 0;
}
if ($page > $total_pages) $page=$total_pages;
$start = $limit*$page - $limit; // do not put $limit*($page - 1)
$SQL = "select u.user_id as id,u.nombre as name,u.correo,u.pass as password,u.rol,(case u.rol when 1 then 'Administrador' when 2 then 'SuperAdmin' when 3 then 'Consultor' else 'Usuario' end ) rol, (case u.estado when 'A' then 'Si' else 'No' end) estado , u.usuario,e.nombre empresa from db_admin.usuarios u , empresas e where empresa_id=e.id and e.estado='A' ORDER BY $sidx $sord LIMIT $start , $limit";
$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());

$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count;
$i=0;
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
    $responce->rows[$i]['id']=$row[id];
    $responce->rows[$i]['cell']=array('',$row[id],$row[usuario],$row[name],$row[password],$row[correo],$row[rol],$row[empresa],$row[estado]);
    $i++;
}        
echo json_encode($responce);
?>

