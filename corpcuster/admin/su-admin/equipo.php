<!DOCTYPE html>
<html lang="es-es" xml:lang="es-es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Administrador de WebMaster</title>
    <meta name="description" content="Pagina de Equipo" />
    <meta name="keywords" content="interoc,webmas" />
    <meta name="author" content="Jonathan Lopez Torres" />
    <link rel="shortcut icon" href="../img/favicon.png" />
<style type="text/css" title="currentStyle">
      @import "../css/jquery-ui.css";
      @import "//cdn.datatables.net/1.10.8/css/jquery.dataTables.css";     
      
      @import "../css/estilo.css";
      @import "../css/bootstrap-dialog.min.css";
      @import "../css/bootstrap.min.css";
.ui-dialog-titlebar-close{
  display:none;
}

.btn-default {
    background-color: #e7e7e7 !important;
    border-color: #e7e7e7 !important;
}
</style>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<script text="text/javascript" language="javascript" src="../js/bootstrap-dialog.min2.js"></script>
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

 
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
<script text="text/javascript" language="javascript" src="../js/jquery-ui.min.js"> </script>
<script text="text/javascript" language="javascript" src="../js/dataTables.fixedHeader.js"> </script>
<script text="text/javascript" language="javascript" src="http://datatables.net/release-datatables/extensions/FixedColumns/js/dataTables.fixedColumns.js"> </script>
<script text="text/javascript" language="javascript" src="http://datatables.net/release-datatables/extensions/ColReorder/js/dataTables.colReorder.js"> </script>
 <?php

 session_start();
$rol=0;
if(isset($_SESSION["rol"]))
{
$rol=$_SESSION['rol'];
}

if($rol==1)
{
?>   


    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
</head><!--/head-->
<body style="background-color: #ffffff">
     <div id="menu" class="context-menu files-menu" style="top: 215px; left: 645px;">
    <a id="atras" style="text-decoration:none;" class="context-menu-item reply-to-all" style="display: block;">Menu</a>
    <div class="context-menu-divider"></div>
    <a id="seleccionar" style="text-decoration:none;" class="context-menu-item preview-item" style="display: block;">Cargar</a>
    <a id="simular" style="text-decoration:none;" class="context-menu-item getlink-item" style="display: block;">Grafico</a>
    <div class="context-menu-divider"></div>
    <a id="recargar" style="text-decoration:none;" class="context-menu-item refresh-item" style="display: block;">Recargar</a>
  </div>
	<header id="header"><!--header-->

		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="../cliente.php"><img src="../img/logo.png" alt="" /></a>
						</div>
					
					</div>
					
				</div>
			</div>
		</div><!--/header-middle-->
	

	</header><!--/header-->
 
<body style="background-color: #EFEFEF;">

              

<!-- Solo Administradores -->
 
        <style type="text/css">
        
.modal iframe {
    width: 100%;
    height: 100%;
}
    </style>  
    </div>
 
<div id="myModalA" title="Editar Equipo" style="overflow-x: hidden;" style="display:none;">
<form action="edito-equipo.php" method="post" enctype="multipart/form-data" name="form_editar">
   
<table>

            <tr>
                <th >
               <label>Nombre Equipo: </label>
                <input type="text" autocomplete="off"  required name="nombre_equipo" id="nombre_equipo" value="" class="form-control" />
           <br /><br />
            </th>  

            <th>
               
                <input type="hidden" required  name="id_equipo" id="id_equipo" value="" class="form-control" /> 
            </th>
           
                      
        </tr>           
        <tr>
        <th>
                <label  >Url Equipo: </label><br />
                <input   type="text" required name="url_equipo" id="url_equipo" value="" class="form-control" />
            </th>
            
             <th>
                <label style="margin-left: 15px;">Empresa: </label>
                    <select style="margin-left: 15px;"style="margin-left: 0%;" name="select_empresa" id="select_empresa" class="form-control" >
                    </select> 
            </th>
         </tr> 
   </table>

</form>
    <input style="margin-left: 30%;margin-top: 30px;"class="btn btn-danger" type="buttom" onclick="editar()"name="sub" value="Editar">
</div> 
     
<div id="myModalB" title="Agregar Equipo" style="overflow-x: hidden;" style="display:none;">
<form action="agrego-equipo.php" method="post" enctype="multipart/form-data" name="form_agregar">
<table>

            <tr>
            
       
             <th >
                <label style="margin-left: 0px;">Nombre Equipo: </label><br />
                <input style="margin-left: 0px;" type="text" required name="nombre_equipo_a" id="nombre_equipo_a" value="" class="form-control" /><br /> <br />
            </th>               
        </tr>           
        <tr>
        <th>
                <label>Url Equipo: </label>
                <input type="text" autocomplete="off"  required name="url_equipo_a" id="url_equipo_a" value="" class="form-control" />
            </th>
            
             <th>
                <label style="margin-left: 15px;">Empresa: </label>
                    <select style="margin-left: 15px;"style="margin-left: 0%;" name="select_empresa_a" id="select_empresa_a" class="form-control" >
                    </select> 
            </th>
         </tr> 
   </table>
</form>
    <input style="margin-left: 30%;margin-top: 30px;"class="btn btn-danger" type="buttom" onclick="agregar()"name="sub" value="Agregar">
</div> 

 <?php require_once 'menu.php'; ?> 
</div><!-- /.navbar-collapse -->
</nav>	

<div class="col-lg-12">
                        <div class="table-responsive">
    <div>
<table id="st_usuarios" class="table table-bordered table-hover" class="display hover" cellspacing="0" width="99.8%">
        <thead id="head_st_usuarios">
         <tr>   
            <th>Id Equipo</th>
            <th>Url Equipo</th>
            <th>Nombre Equipo</th>
            <th>Id Empresa</th>
            <th>Nombre Empresa</th>
            <th>Editar</th>
            <th>Eliminar</th> 
        </tr>
        </thead>
            <tfoot id="foot_st_usuarios" >
            <tr>
              <th>Id Equipo</th>
              <th>Url Equipo</th>
              <th>Nombre Equipo</th>
              <th>Id Empresa</th>
              <th>Nombre Empresa</th>
              <th>Editar</th>
              <th>Eliminar</th> 
            </tr>
           </tfoot>
       <tbody>
       </tbody>
</table>
 </div>
         
<button class="btn btn-danger" style="margin-left:50%;"type="button" onclick="agregar2()" >Agregar</buttom> 

<script type="text/javascript">
    var table;
    var id_empresa      = 0;
    var dialog_agregar; 
    var dialog;
    var counter =0;
    var id;
    var selected = new Array();
    var i=0;
    var count=0;

 
function editar()
{ 

  var url_equipo=jQuery("#url_equipo").val();

if (url_equipo.trim()=='')
  {
    mensajerror("Introduccir la url del Equipo");
    return false;
  }

    var nombre_equipo=jQuery("#nombre_equipo").val();

if (nombre_equipo.trim()=='')
  {
    mensajerror("Introduccir el nombre del Equipo");
    return false;
  }


     BootstrapDialog.show({
                                title: 'Actualizacion de Equipos',
                                message: '¿Seguro desea editar el registro <b>'+jQuery("#nombre_equipo").val()+'</b> ?',
                                buttons: [{
                                    id: 'btn-ok',   
                                    icon: 'glyphicon glyphicon-check',       
                                    label: 'OK',
                                    cssClass: 'btn-primary', 
                                    autospin: true,
                                    action: function(dialogRef){  
                                    $.ajax({     data: {id_empresa:jQuery("#select_empresa").val(),url_equipo:jQuery("#url_equipo").val(),id_equipo:jQuery("#id_equipo").val(),nombre_equipo:jQuery("#nombre_equipo").val() },
                                                 type: "POST",
                                                  dataType: "json",
                                                  url: "edito-equipo.php",
                                                    })
                                                 .done(function( response ) {
                                                  if( response.success ) 
                                                  {
                                                       if ( console && console.log ) 
                                                       {
                                                            
                                                           mensaje('Se modifico Correctamente el Equipo: ' + jQuery("#nombre_equipo").val());
                                                           dialog.dialog("close");
                                                           listar_empresa();
                                                      }
                                                   } 
                                                   else 
                                                   {
                                                          //response.success no es true
                                                          mensajerror('Problemas en : ' + response.data.message);
                                                   }   
                                                      })
                                         .fail(function( jqXHR, textStatus, errorThrown ) {
                                             if ( console && console.log ) {
                                                 mensajerror( "La solicitud a fallado: " +  errorThrown);
                                             }
                                          })
                                    dialogRef.close();
                                    }

                                },
                                {
                                    id: 'btn-cancel',   
                                    icon: 'glyphicon glyphicon-log-out',       
                                    label: 'CANCEL',
                                    cssClass: 'btn-danger', 
                                    autospin: true,
                                    action: function(dialogRef){
                        
                                        dialogRef.close();
                                        dialog.dialog("close");
                                    }
                                }


                                ]
                            });
        
}

function agregar()
{ 
    var url_equipo_a=jQuery("#url_equipo_a").val();

if (url_equipo_a.trim()=='')
  {
    mensajerror("Introduccir la url del Equipo");
    return false;
  }

    var nombre_equipo_a=jQuery("#nombre_equipo_a").val();

if (nombre_equipo_a.trim()=='')
  {
    mensajerror("Introduccir el nombre del Equipo");
    return false;
  }

     BootstrapDialog.show({
                                title: 'Agregar de Equipo',
                                message: '¿Seguro desea agregar el registro <b>'+jQuery("#nombre_equipo_a").val()+'</b> ?',
                                buttons: [{
                                    id: 'btn-ok',   
                                    icon: 'glyphicon glyphicon-check',       
                                    label: 'OK',
                                    cssClass: 'btn-primary', 
                                    autospin: true,
                                    action: function(dialogRef){    
                                     $.ajax({     data: {id_empresa:jQuery("#select_empresa_a").val(),url_equipo:jQuery("#url_equipo_a").val(),nombre_equipo:jQuery("#nombre_equipo_a").val() },
                                                 type: "POST",
                                                  dataType: "json",
                                                  url: "agrego-equipo.php",
                                                    })
                                                 .done(function( response ) {
                                                  if( response.success ) 
                                                  {
                                                       if ( console && console.log ) 
                                                       {
                                                            
                                                           mensaje('Se Agrego Correctamente el Equipo: ' + jQuery("#nombre_equipo_a").val());
                                                           listar_empresa();
                                                           dialog_agregar.dialog("close");
                                                           
                                                      }
                                                   } 
                                                   else 
                                                   {
                                                          //response.success no es true
                                                          mensajerror('Problemas en : ' + response.data.message);
                                                   }   
                                                      })
                                         .fail(function( jqXHR, textStatus, errorThrown ) {
                                             if ( console && console.log ) {
                                                 mensajerror( "La solicitud a fallado: " +  errorThrown);
                                             }
                                          })
                                    dialogRef.close();
                                    }

                                },
                                {
                                    id: 'btn-cancel',   
                                    icon: 'glyphicon glyphicon-log-out',       
                                    label: 'CANCEL',
                                    cssClass: 'btn-danger', 
                                    autospin: true,
                                    action: function(dialogRef){
                        
                                        dialogRef.close();
                                        dialog_agregar.dialog("close");
                                    }
                                }


                                ]
                            });
        
}



function listar_empresa()
{

$.ajax({             data:{id_empresa:0},
                     type: "POST",
                      dataType: "json",
                      url: "../class/consultaequipo.php",
                        })
                     .done(function( response ) {
                        clearDataTable();
                      if( response.success ) 
                      {
                           if ( console && console.log ) 
                           {

                                jQuery.each( response.data, function( key, val ) 
                                  {
                                      addDataTable(parseInt(val.equipo_id),(val.url_equipo),val.nombre_equipo,val.empresa_id,val.nombre_empresa,'','');
                                  });

                          }
                       } 
                       else 
                       {
                              //response.success no es true
                              mensajerror('Problemas en : ' + response.data.message);
                       }   
                          })
             .fail(function( jqXHR, textStatus, errorThrown ) {
                 if ( console && console.log ) {
                     mensajerror( "La solicitud a fallado: " +  errorThrown);
                 }
              })
}

//se inicializa el documento
 jQuery(document).ready(function() {

$.getJSON( "../class/consulta_empresa.php",{format: "json"}) 
        .done(function( data ) {
         
         if(data.success==true)
         {
         
          var miselect=$("#select_empresa");
           var miselect_a=$("#select_empresa_a");
          
          miselect.find('option').remove().end().append('').val('');
          miselect_a.find('option').remove().end().append('').val('');
          
          miselect_a.append('<option value="0">Seleccione Empresa</option>'); 

          $.each( data.data, function( key, val ) {
          miselect.append('<option  value="'+(val.id)+'">'+val.nombre+'</option>'); 
          miselect_a.append('<option  value="'+(val.id)+'">'+val.nombre+'</option>'); 
                       
          }); 
           }
}); 

jQuery(function () {
  jQuery('[data-toggle="tooltip"]').tooltip();
});

listar_empresa();

dialog = jQuery("#myModalA").dialog({ 
            autoOpen: false,closeOnEscape: true,//closeText: 'Cerrar',
            height: 320,
            width: 520,
            modal: true,
         
            show: {  duration: 500 ,  effect: "explode"},
            hide: {  duration: 500 ,  effect: "fold" } ,
            resizable: false ,
            draggable: false,
            buttons: { "Cerrar": 
                      function () 
                      {
                      $(this).dialog("close");
                      //sessionStorage.clear(); //Elimina todos los datos de las variables de sessionStorage
                      }
                      }
}) ;


dialog_agregar = jQuery("#myModalB").dialog({ 
            autoOpen: false,closeOnEscape: true,//closeText: 'Cerrar',
            height: 320,
            width: 520,
            modal: true,
            show: {  duration: 500 ,  effect: "explode"},
            hide: {  duration: 500 ,  effect: "fold" } ,
            resizable: false ,
            draggable: false,
            buttons: { "Cerrar": 
                      function () 
                      {
                      $(this).dialog("close");
                      }
                      }
}) ;




/*jQuery('#st_usuarios tbody').on( 'click', 'tr', function () {
        jQuery(this).toggleClass('selected');
        //console.dir(table.rows('.selected').data().lenth());
        selected[i]=parseInt(jQuery(this).find("td:first").html());
        i++;
    } );*/

 table = jQuery('#st_usuarios').DataTable({
   
      "autoWidth": true,
      "columnDefs": [
            {
 
                "render": function ( data, type, row ) {
                  return '<button class="btn btn-danger" type="button" id="editar" ><i class="fa fa-pencil"></i></buttom>';
                },
                "targets": 5
            },
            {
 
                "render": function ( data, type, row ) {
                  return ' <button class="btn btn-danger" type="button" id="eliminar"><i class="fa fa-trash-o"></i></button>';
                },
                "targets": 6
            }
        ],

            "ordering": true,
            "scrollY": "360px",
            "scrollX": "99%",
            "scrollCollapse": true,
            "bDestroy": true,
            "bPaginate": true,
            "sPaginationType": "full_numbers",
             
            "searching": true,
            "lengthMenu": [[5,10,25, 50, -1], [5,10,25, 50, "Todos"]],
            "language": {
                    "url": "../json/Spanish.json"
                        }
            });

 jQuery('#st_usuarios tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        if(this.id=='eliminar')
        {
         BootstrapDialog.show({
                                title: 'Eliminacion el Equipo',
                                message: '¿Seguro desea eliminar el registro <b>'+data[2]+'</b> ?',
                                buttons: [{
                                    id: 'btn-ok',   
                                    icon: 'glyphicon glyphicon-check',       
                                    label: 'OK',
                                    cssClass: 'btn-primary', 
                                    autospin: true,
                                    action: function(dialogRef){    
                                          
                                   $.ajax({     data: {"id" : data[0]},
                                                 type: "POST",
                                                  dataType: "json",
                                                  url: "elimino_equipo.php",
                                                    })
                                                 .done(function( response ) {
                                                  if( response.success ) 
                                                  {
                                                       if ( console && console.log ) 
                                                       {
                                                           table.row('.selected').remove().draw( false );
                                                           mensaje('Se Elimino Correctamente el Equipo: ' + data[1]);
                                                           listar_empresa();
                                                      }
                                                   } 
                                                   else 
                                                   {
                                                          //response.success no es true
                                                          mensajerror('Problemas en : ' + response.data.message);
                                                   }   
                                                      })
                                         .fail(function( jqXHR, textStatus, errorThrown ) {
                                             if ( console && console.log ) {
                                                 mensajerror( "La solicitud a fallado: " +  errorThrown);
                                             }
                                          })
                                         dialogRef.close();
                                    }

                                },
                                {
                                    id: 'btn-cancel',   
                                    icon: 'glyphicon glyphicon-log-out',       
                                    label: 'CANCEL',
                                    cssClass: 'btn-danger', 
                                    autospin: true,
                                    action: function(dialogRef){
                                      console.log($(this).parents('tr'));
                                     table.$('tr.selected').removeClass('selected');  
                                        dialogRef.close();
                                    }
                                }


                                ]
                            });
                }
                else
                {
                dialog.dialog("open");
                jQuery("#id_equipo").val(data[0])
                jQuery("#url_equipo").val(data[1])
                jQuery("#nombre_equipo").val(data[2])
                jQuery("#select_empresa").val(data[3])
                

                }
                    } );

jQuery('#st_usuarios tbody').on( 'click', 'tr', function () {
        if ( jQuery(this).hasClass('selected') ) {
            jQuery(this).removeClass('selected');
        }
        else {
            jQuery('tr.selected').removeClass('selected');
            jQuery(this).addClass('selected');
         
        }
    } );




})

function agregar2()
 {
     jQuery("#url_equipo_a").val("");

 
     jQuery("#nombre_equipo_a").val("");
      dialog_agregar.dialog("open");
 }

function addDataTable (id_equipo,url_equipo,nombre_equipo,id_empresa,nombre_empresa,edit,deleted)
{
    table.row.add(  [
                    id_equipo,
                    url_equipo,
                    nombre_equipo,
                    id_empresa,
                    nombre_empresa,
                    edit,
                    deleted
                    ] ).draw();
}

function clearDataTable ()
{
    table.rows().remove().draw(false);
}
 



//Ocultamos el menú al cargar la página
$("#menu").hide();
 
/* mostramos el menú si hacemos click derecho
con el ratón */
$(document).bind("contextmenu", function(e){
      $("#menu").css({'display':'block', 'left':e.pageX, 'top':e.pageY});
      return false;
});
 
 
//cuando hagamos click, el menú desaparecerá
$(document).click(function(e){
      if(e.button == 0){
            $("#menu").css("display", "none");
      }
});
 
//si pulsamos escape, el menú desaparecerá
$(document).keydown(function(e){
      if(e.keyCode == 27){
            $("#menu").css("display", "none");
      }
});
             
     //controlamos los botones del menú
jQuery(document).on('click','#menu',function(e)
{   
       switch(e.target.id){

                        case "seleccionar":
                              window.location.href='../carga.php';
                              break;  
                        case "simular":
                              window.location.href='../grafico.php';
                              break;
                        case "atras":
                              window.location.href='../';
                              break;  
                       case "recargar":
                              location.reload(true);
                        break;   
                  }
});

function mensajerror (titulo){

   BootstrapDialog.show({
            title: '¡ADVERTENCIA!',
            message: titulo,
            type: BootstrapDialog.TYPE_DEFAULT, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
            closable: true, // <-- Default value is false
            draggable: true, // <-- Default value is false
            buttons: [{
                label: 'Ok',
                action: function(dialogItself){
                    dialogItself.close();
                }
            }]
        });
}



function mensaje (titulo){

   BootstrapDialog.show({
            title: 'CONFIMACION',
            message: titulo,
            type: BootstrapDialog.TYPE_DEFAULT, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
            closable: true, // <-- Default value is false
            draggable: true, // <-- Default value is false
            buttons: [{
                label: 'Ok',
                action: function(dialogItself){
                    dialogItself.close();
                }
            }]
        });

}




</script>
  <?php  }
  else
  {
      header("Location:../logout.php");
  }

?>
</body>
</html>