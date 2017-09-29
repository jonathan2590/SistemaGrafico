<?php
class Log {
  
       function RegistrarLog($_Trx,$_Sec,$_Tipo,$_Mensaje,$db,$_TipoLog) {

				$table='db_admin.cc_log';
				$coduser=0;
				$codempresa=0;
 
				  if( isset($_SESSION["codigo_usr"]) ) 
				  {
				     $coduser = ($_SESSION['codigo_usr']);
				  } 

				  if( isset($_SESSION["empresa"]) ) 
				  {
				     $codempresa = ($_SESSION['empresa']);

				  } 
				 
				  $arch = fopen("../../logs/LogServer_".date("Y-m-d").".txt", "a+"); 
				  fwrite($arch, "[".date("Y-m-d H:i:s.u")." ".$_SERVER['REMOTE_ADDR']." - ".$_Sec."-".$_TipoLog." ] ".$_Mensaje."\n");
	              fclose($arch);

				  	$sql = 'insert into '.$table.' (cl_sec,cl_trx,cl_tipo,cl_mensaje,cl_usuario,cl_empresa)  values ('.$_Sec.','.$_Trx.',"'.$_Tipo.'","'.$_Mensaje.'",'.$coduser.','.$codempresa.');';
					if ($db->query($sql) === FALSE) {
					      return false;
					    }

 			return true;     
		}
  }
 ?>
 
  