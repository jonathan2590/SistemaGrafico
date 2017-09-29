<!DOCTYPE html>
<html lang="es-es" xml:lang="es-es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<link rel="shortcut icon" href="http://interoc-custer.com/wp-content/uploads/2015/05/favicon.png" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Administrador de WebMaster</title>
    <meta name="description" content="Pagina de Usuario" />
    <meta name="keywords" content="interoc,webmas, ecuador" />
    <meta name="author" content="Jonathan Lopez Torres" />
    <link rel="shortcut icon" href="../img/favicon.png" />
<style type="text/css" title="currentStyle">
      @import "../css/jquery-ui.css";
      @import "//cdn.datatables.net/1.10.8/css/jquery.dataTables.css";     
      
      @import "../css/estilo.css";
      @import "../css/bootstrap-dialog.min.css";
      @import "../css/bootstrap.min.css";
      
      <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
            
<style type="text/css">
        
.modal iframe {
    width: 100%;
    height: 100%;
}
    </style>  
    </div>
 
<div id="myModalA" title="Editar unidades" style="overflow-x: hidden;" style="display:none;">
<form action="edito-unidades.php" method="post" enctype="multipart/form-data" name="form_editar">
   
<table>
          <tr>
            <th >
                  <label>Código: </label><br />
                  <input type="text" required name="codigo" id="codigo" value="" class="form-control" /> 
                  <input type="hidden" name="codigo_e" id="codigo_e" />                
            </th>  
          </tr>     
          <tr>     
            <th >
              <br/>
                  <label>Descripción: </label><br />
                  <input autocomplete="off" type="text" required name="nombre" id="nombre" value="" class="form-control" />
            </th>               
          </tr>              

           <tr>
             <th >
                <br />
                <label>Estado: </label><br />
                  <select style="margin-left: 0%;" name="select_estado_a" id="select_estado_a" class="form-control" >                        
                        <option value="A">Activo</option>
                        <option value="I">Inactivo</option>
                    </select> 

                <br />
            </th>  
               
        </tr>
   
    </table>

</form>
    <input class="btn btn-danger" type="buttom" onclick="editar()" name="sub" value="Editar">
</div> 
     
<div id="myModalB" title="Agregar unidades" style="overflow-x: hidden;" style="display:none;">
<form action="agrego-unidades.php" method="post" enctype="multipart/form-data" name="form_agregar">
<table>
    <tr>

      <th >
            <label>Código: </label><br />
            <input type="text" required name="codigo_a" id="codigo_a" value="" class="form-control" />                
      </th>  
    </tr>     
    <tr>     
      <th >
        <br/>
            <label>Descripción: </label><br />
            <input autocomplete="off" type="text" required name="nombre_a" id="nombre_a" value="" class="form-control" />
      </th>               
    </tr>              
   
    </table>
</form>
    <br/>
    <input class="btn btn-danger" type="buttom" onclick="agregar()" name="sub" value="Agregar">
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
            <th>Código</th>
            <th>Descripción</th>
            <th>Id Estado</th>
            <th>Estado</th>            
            <th>Editar</th>
            <th>Eliminar</th> 
        </tr>
        </thead>
            <!--tfoot id="foot_st_usuarios" >
            <tr>
              <th>Id Usuario</th>
              <th>Usuario</th>
              <th>Email</th>
              <th>Id Rol</th>
              <th>Rol</th>
              <th>Id Empresa</th>
              <th>Nombre Empresa</th>
              <th>Editar</th>
              <th>Eliminar</th> 
             </tr>
           </tfoot-->
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

var usuario=jQuery("#codigo").val();
var nombre=jQuery("#nombre").val();

if (usuario.trim()=='')
  {
    mensajerror("Introduccir el código");
    return false;
  }

if (nombre.trim()=='')
  {
    mensajerror("Ingresar la unidades");
    return false;
  }

     BootstrapDialog.show({
                                title: 'Actualización de la unidades',
                                message: '¿Seguro desea editar el registro <b>'+jQuery("#nombre").val()+'</b> ?',
                                buttons: [{
                                    id: 'btn-ok',   
                                    icon: 'glyphicon glyphicon-check',       
                                    label: 'OK',
                                    cssClass: 'btn-primary', 
                                    autospin: true,
                                    action: function(dialogRef){  
                                    $.ajax({     data: {"usuario" : jQuery("#codigo").val()  ,unidades: jQuery("#nombre").val(),codigounidades: jQuery("#codigo_e").val(),select_estado:jQuery("#select_estado_a").val() },
                                                 type: "POST",
                                                  dataType: "json",
                                                  url: "edito-unidades.php",
                                                    })
                                                 .done(function( response ) {
                                                  if( response.success ) 
                                                  {
                                                       if ( console && console.log ) 
                                                       {
                                                            
                                                           mensaje('Se modifico Correctamente la unidades: ' + jQuery("#nombre").val());
                                                           dialog.dialog("close");
                                                           listar_unidades();//location.reload(true)
                                                      }
                                                   } 
                                                   else 
                                                   {
                                                          //response.success no es true
                                                          mensajerror('Problemas en : ' + response.data.message);
                                                   }   
                                                      })
                                         .fail(function( jqXHR, textStatus, errorThrown ) {
                                                 mensaje('Se modifico Correctamente el unidades: ' + jQuery("#nombre").val());
                                                           dialog.dialog("close");
                                                           listar_unidades();
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

var usuario=jQuery("#codigo_a").val();
var nombre=jQuery("#nombre_a").val();

if (usuario.trim()=='')
  {
    mensajerror("Introduccir el Usuario");
    return false;
  }

if (nombre.trim()=='')
  {
    mensajerror("Ingresar la unidades");
    return false;
  }

     BootstrapDialog.show({
                                title: 'Agregar unidades',
                                message: '¿Seguro desea agregar el registro <b>'+jQuery("#nombre_a").val()+'</b> ?',
                                buttons: [{
                                    id: 'btn-ok',   
                                    icon: 'glyphicon glyphicon-check',       
                                    label: 'OK',
                                    cssClass: 'btn-primary', 
                                    autospin: true,
                                    action: function(dialogRef){    
                                     $.ajax({     data: {codigo_a: jQuery("#codigo_a").val(),nombre_a: jQuery("#nombre_a").val() },
                                                 type: "POST",
                                                  dataType: "json",
                                                  url: "agrego-unidades.php",
                                                    })
                                                 .done(function( response ) {
                                                  if( response.success ) 
                                                  {
                                                       if ( console && console.log ) 
                                                       {
                                                            
                                                           mensaje('Se Agrego Correctamente la unidades: ' + jQuery("#nombre_a").val());
                                                           dialog_agregar.dialog("close");
                                                            listar_unidades();
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



function listar_unidades()
{

$.ajax({
                     type: "POST",
                      dataType: "json",
                      url: "../class/consulta_unidades.php",
                        })
                     .done(function( response ) {
                      
                        clearDataTable();
                      if( response.success ) 
                      {
                           if ( console && console.log ) 
                           {

                                jQuery.each( response.data, function( key, val ) 
                                  {
                                      
                                      var id_estado=val.estado;
                                      var estado='Activo';
                                      if(id_estado=='I')
                                      {
                                        estado='Inactivo';
                                      }

                                      addDataTable((val.id),(val.nombre),val.estado,estado);
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
                     mensajerror( "La solicitud a fallado: " +  textStatus + " " + errorThrown);
                 }
              })
}

//se inicializa el documento
 jQuery(document).ready(function() {


  jQuery("#codigo_a").change(function()
    {
var mensaje="";
mensaje="El código de unidades " + this.value + " ya existe";

$.ajax({
                     
                     type: "POST",
                      dataType: "json",
                      data: {user : this.value},  
                      url: "../class/consulta_unidades.php",
                        })
                     .done(function( response ) {
                  
                      if( response.success) 
                      {

                          mensajerror(mensaje);
                          jQuery("#codigo_a").val("");
                       }   
                          })
             .fail(function( jqXHR, textStatus, errorThrown ) {
                 if ( console && console.log ) {
                     mensajerror( "La solicitud a fallado: " +  errorThrown);
                 }
              })
    });



$.getJSON( "../class/consulta_empresa.php",{format: "json"}) 
        .done(function( data ) {
         
         if(data.success==true)
         {
         
          var miselect=$("#select_empresa");
           var miselect_a=$("#select_empresa_a");
          
          miselect.find('option').remove().end().append('').val('');
          miselect_a.find('option').remove().end().append('').val('');
          
            
          miselect_a.append('<option value="0">Seleccione Departamento</option>'); 

          $.each( data.data, function( key, val ) {
          miselect.append('<option  value="'+(val.id)+'">'+val.nombre+'</option>'); 
          miselect_a.append('<option  value="'+(val.id)+'">'+val.nombre+'</option>'); 
                       
          }); 
           }
}); 

jQuery(function () {
  jQuery('[data-toggle="tooltip"]').tooltip();
});

listar_unidades();

dialog = jQuery("#myModalA").dialog({ 
            autoOpen: false,closeOnEscape: true,//closeText: 'Cerrar',
            height: 350,
            width: 280,
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
            height: 280,
            width: 280,
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
                "targets": 4
            },
            {
 
                "render": function ( data, type, row ) {
                  return ' <button class="btn btn-danger" type="button" id="eliminar"><i class="fa fa-trash-o"></i> </button>';
                },
                "targets": 5
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
                                title: 'Eliminación del unidadess',
                                message: '¿Seguro desea eliminar el registro <b>'+data[1]+'</b> ?',
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
                                                  url: "elimino_unidades.php",
                                                    })
                                                 .done(function( response ) {
                                                  if( response.success ) 
                                                  {
                                                       if ( console && console.log ) 
                                                       {
                                                           table.row('.selected').remove().draw( false );
                                                           mensaje('Se Elimino Correctamente la unidades: ' + data[1]);
                                                           listar_unidades();//location.reload(true)
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
                                                 mensajerror( "La solicitud a fallado: " +  textStatus);
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
                  jQuery("#codigo").val(data[0])
                  jQuery("#codigo_e").val(data[0])
                  jQuery("#nombre").val(data[1])
                  jQuery("#select_estado_a").val(data[2])
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
   jQuery("#codigo_a").val("");
   jQuery("#nombre_a").val("");
   dialog_agregar.dialog("open");
 }

function addDataTable (id_usuario,nombre,email,rol,edit,deleted)
{
    table.row.add(  [
                    id_usuario,
                    nombre,
                    email,
                    rol,                    
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