<?php require_once 'cabezera.php';
?>



<!-- page specific plugin styles -->
<link rel="stylesheet" href="assets/css/ui.jqgrid.min.css" />
<!-- ace styles -->
<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />


<!--<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
-->
<!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
<!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->
<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
<!--[if lte IE 8]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
<div class="pull-left breadcrumb_admin clear_both">

    <div class="pull-right">
                <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="index.php">Home</a>
                            </li>

                            <li>
                                <a href="#">Tablero de planificación</a>
                            </li>
                            <li class="fa fa-table" class="active" >Ingreso</li>
                        </ul><!-- /.breadcrumb -->

    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2 > Tablero de planificación de la demanda </h2>

                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up blue"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
<!-- PAGE CONTENT BEGINS -->
<div class="x_content">
    <div class="row">
        <div class="col-xs-12">
            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <!-- div.table-responsive -->

            <!-- div.dataTables_borderWrap -->
        <!--    <div>
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="tablero">
                            <th>AÑO</th>
                            <th>ENERO</th>
                            <th>FEBRERO</th>
                            <th>MARZO</th>
                            <th>ABRIL</th>
                            <th>MAYO</th>
                            <th>JUNIO</th>
                            <th>JULIO</th>
                            <th>AGOSTO</th>
                            <th>SEPTIEMBR</th>
                            <th>OCTUBRE</th>
                            <th>NOVIEMBRE</th>
                            <th>DICIEMBRE</th>
                            <th>ΣS1</th>
                            <th>ΣS2</th>
                            <th>ΣAÑO</th>
                            <th>MEDIA</th>
                            <th>DESV/STD.</th>
                            <th>CRECIMIENTO</th>

                        </tr>
                    </thead>


                </table>
            </div>-->
            <div class="x_content">
                <table id="grid-table"></table>
                <div id="grid-pager"></div>
            </div>
        </div>
    </div>

</div>

                                <!-- PAGE CONTENT ENDS -->
        </div>
    </div>
</div>

<?php require_once 'pie.php'; ?>
<!--[if !IE]> -->
<script src="assets/js/jquery.jqGrid.min.js"></script>
<script src="assets/js/grid.locale-en.js"></script>

<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
PNotify.removeAll();

if(!_OpeExport)
{
jQuery("#export").hide()
}
/*
grid_data=response.data;*/

/*var subgrid_data =
[
{id:"1", name:"sub grid item 1", qty: 11},
{id:"2", name:"sub grid item 2", qty: 3},
{id:"3", name:"sub grid item 3", qty: 12},
{id:"4", name:"sub grid item 4", qty: 5},
{id:"5", name:"sub grid item 5", qty: 2},
{id:"6", name:"sub grid item 6", qty: 9},
{id:"7", name:"sub grid item 7", qty: 3},
{id:"8", name:"sub grid item 8", qty: 8}
];*/

jQuery(function($) {
   var grid_selector = "#grid-table";
   var pager_selector = "#grid-pager";


   var parent_column = $(".x_title").closest('[class*="col-"]');
   //resize to fit page size
   $(window).on('resize.jqGrid', function() {
       $(grid_selector).jqGrid('setGridWidth', parent_column.width() - 60);
   })

   //resize on sidebar collapse/expand
   $(document).on('settings.ace.jqGrid', function(ev, event_name, collapsed) {
       if (event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed') {
           //setTimeout is for webkit only to give time for DOM changes and then redraw!!!
           setTimeout(function() {
               $(grid_selector).jqGrid('setGridWidth', parent_column.width() - 60);
           }, 20);
       }
   })

   //if your grid is inside another element, for example a tab pane, you should use its parent's width:

   $(window).on('resize.jqGrid', function () {
     var parent_width = $(grid_selector).closest('.tab-pane').width();
     $(grid_selector).jqGrid( 'setGridWidth', parent_width );
   })
   //and also set width when tab pane becomes visible
   $('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
     if($(e.target).attr('href') == '#mygrid') {
     var parent_width = $(grid_selector).closest('.tab-pane').width();
     $(grid_selector).jqGrid( 'setGridWidth', parent_width );
     }
   })


columnausuario={name: 'usuario',index: 'usuario',width: 100,editable: true,frozen : false,editrules:{custom_func: validateRequerid,custom: true},editoptions: {size: "20",maxlength: "20"}
}


   jQuery(grid_selector).jqGrid({
       //direction: "rtl",
       dialog_opts: {
       

           show: 'blind',
           hide: 'explode',
           dividerLocation: 0.5
       } ,
       //subgrid options
       subGrid: false,
       //subGridModel: [{ name : ['No','Item Name','Qty'], width : [55,200,80] }],
       //datatype: "xml",
       subGridOptions: {
           plusicon: "ace-icon fa fa-plus center bigger-110 blue",
           minusicon: "ace-icon fa fa-minus center bigger-110 blue",
           openicon: "ace-icon fa fa-chevron-right center orange"
       },

       url: "class/usuario/grid_consulta.php",
       //data: grid_data,
       datatype: "json",
       //datatype: "local",
       height: 250,

       rowTotals: false,
       colTotals: false,
       //frozenStaticCols : true,
       colNames: [' ',  "AÑO",'ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DIEMBRE','ΣS1','ΣS2','ΣAÑO','MEDIA','DESV/STD.','CRECIMIENTO',],



       colModel: [{
               name: 'myac',
               index: '',
               width: 80,
               fixed: true,
               sortable: true,
               resize: true,
               formatter: 'actions',
               formatoptions: {
                   keys: true,
                   delbutton: false,//disable delete button
                   editbutton: true,//disable delete button

                   delOptions: {
                       recreateForm: true,
                       beforeShowForm: beforeDeleteCallback,
                       afterSubmit : function( data, postdata, oper) {
                       var response = data.responseText;

                        if (response.indexOf("Error") >= 0) {
                               return [false,response ];
                       }
                       return [true,"",""];
                       },
                   },
                   editformbutton:true, editOptions:{recreateForm: true,
                       beforeShowForm:beforeEditCallback,
                     afterSubmit : function( data, postdata, oper) {
                               var response = data.responseText;
                                if (response.indexOf("Error") >= 0) {
                                       return [false,response ];
                               }
                               return [true,"",""];
                               },
           }
               }
           },
           {
               name: 'id',
               index: 'id',
               width: 60,
               sorttype: "int",
               hidden:false,
               editable: true,
               editrules:{readonly:true},
               frozen : false
           },columnausuario,




           {
               name: 'name',
               index: 'name',
               width: 150,
               editable: true,
               frozen : false,

               editrules:{custom_func: validateRequerid,
                       custom: true},
               editoptions: {
                   size: "20",
                   maxlength: "50"
               }
           },
           {
               name: 'password',
               index: 'password',
               width: 150,
               editable: true,
               //frozen : false,
               edittype: "password",
               formatter:"password",
               hidden:true,
               editrules: {edithidden:true,required:true},
               editoptions: {
                   size: "20",
                   maxlength: "50"
               }
           },
           {
               name: 'correo',
               index: 'correo',
               width: 150,
               editable: true,
               email : true,
               editoptions: {
                   size: "20",
                   maxlength: "50"
               },
               //sopt : ['eq'] busqueda en la fila
           },
           {
               name: 'rol',
               index: 'rol',
               width: 90,
               editable: true,
               //formatter: 'select',
               editrules:{required:true,sorttype:'int'},
               edittype: "select",
               //editoptions:{dataUrl:'test.txt', defaultValue:'Intime'}

               editoptions: {
                 //  dataUrl:'class/consulta_empresa.php'
                  value: "1:Administrador;2:SuperAdmin;3:Consultor;4:Usuario",defaultValue:'4'
               }
           },
           {
               name: 'empresa',
               index: 'empresa',
               width: 90,
               editable: true,
               //formatter: 'select',
               editrules:{required:true},
               edittype: "select",
               //editoptions:{dataUrl:'test.txt', defaultValue:'Intime'}

               editoptions: {
                   dataUrl:'class/consulta_empresa.php'
                  //value: "1:Administrador;2:SuperAdmin;3:Consultor;4:Usuario",defaultValue:'4'
               }
           },
           {
               name: 'estado',
               index: 'estado',
               width: 70,
               editable: true,
               edittype: "checkbox",
               editoptions: {
                   value: "Si:No",defaultValue:'Si'
               },
               unformat: aceSwitch
           },
           {
               name: 'agosto',
               index: 'agosto',
               width: 70,
               editable: true
           },
           {
               name: 'septiembre',
               index: 'septiembre',
               width: 70,
               editable: true
           },
           {
               name: 'octubre',
               index: 'octubre',
               width: 70,
               editable: true
           },
           {
               name: 'noviembre',
               index: 'noviembre',
               width: 70,
               editable: true
           },
           {
               name: 'diciembre',
               index: 'diciembre',
               width: 70,
               editable: true
           },
           {
               name: 'agosto',
               index: 'agosto',
               width: 70,
               editable: true
           },
           {
               name: 'septiembre',
               index: 'septiembre',
               width: 70,
               editable: true
           },
           {
               name: 'octubre',
               index: 'octubre',
               width: 70,
               editable: true
           },
           {
               name: 'noviembre',
               index: 'noviembre',
               width: 70,
               editable: true
           },
           {
               name: 'diciembre',
               index: 'diciembre',
               width: 70,
               editable: true
           },{
               name: 'diciembre',
               index: 'diciembre',
               width: 70,
               editable: true
           }


       ],

       viewrecords: true,
       rowNum: 10,
//            rownumbers: true, // show row numbers
//            rownumWidth: 25, // the width of the row numbers columns
       viewsortcols: true,
       rowList: [10, 20, 30],
       //pager: pager_selector,
       altRows: true,
       //sortname: ['name','id'],
     //  sortorder: "asc",
       loadonce: true,
       colMenu : true,
       shrinkToFit : true,
       //toppager: true,

       //multiselect: true,
       //multikey: "ctrlKey",
       //multiboxonly: true,

       loadComplete: function() {
           var table = this;
           setTimeout(function() {
              // styleCheckbox(table);
               //navigateToLang('en');
         //      jQuery(grid_selector).jqGrid('setGridParam',{url:"class/consulta_usuarios.php"}).trigger("reloadGrid")
               updateActionIcons(table);
               updatePagerIcons(table);
               enableTooltips(table);
           }, 0);
       },

       editurl: "class/usuario/ad_usuario.php", //nothing is saved
       caption: "<i class='ace-icon fa fa-user'> Mantenimiento de Usuario</i>",
        loadError : function(serverresponse,st,err) {
           //_MensajeNotificacion("Error Load info","Type: "+st+"; Response: "+ xhr.status + " "+xhr.statusText,"error","S")
           //$.jgrid.info_dialog("Error","Type: "+st+"; Response: "+ xhr.status + " "+xhr.statusText)
           $.jgrid.info_dialog(
                               $.jgrid.getRegional(this, "errors").errcap,
                               serverresponse.responseText,
                               $.jgrid.getRegional(this, "edit").bClose,
                               {
                                   zIndex: 1500
                               }
                           );
        }
       ,autowidth: false,

       jsonReader: {
           repeatitems : true
       }//,

       //,
     /*  grouping:false,
       groupingView : {
       groupField : ['empresa','rol'],
       groupDataSorted : true,
       //groupText : ['<b>{0}</b>'],
       plusicon : 'fa fa-chevron-down bigger-110',
       minusicon : 'fa fa-chevron-up bigger-110',
       groupCollapse : false,
       groupOrder: ['asc', 'desc'],
       //groupSummary : [true, true]
     }*/



   });
   $(window).triggerHandler('resize.jqGrid'); //trigger window resize to make the grid get the correct size
   //recargar el load

   //jQuery(grid_selector).jqGrid('inlineNav',pager_selector);

   //enable search/filter toolbar
   //jQuery(grid_selector).jqGrid('filterToolbar',{defaultSearch:true,stringResult:true})
   //jQuery(grid_selector).filterToolbar({});

   //switch element when editing inline
   function aceSwitch(cellvalue, options, cell) {
       setTimeout(function() {
           $(cell).find('input[type=checkbox]')
               .addClass('ace ace-switch ace-switch-5')
               .after('<span class="lbl"></span>');
       }, 0);
   }
   //enable datepicker
   function pickDate(cellvalue, options, cell) {
       setTimeout(function() {
           $(cell).find('input[type=text]')
               .datepicker({
                   format: 'yy-mm-dd',
                   autoclose: true
               });
       }, 0);
   }


      // add first custom button
  /* $(grid_selector).navButtonAdd(pager_selector,
           {
             // buttonicon: "ace-icon fa fa-plus-circle purple",
               title: "Imprimir",
               caption: "Imprimir",
               position: "last",
               onClickButton: setPrintGrid('grid_table','grid-pager','Listado Usuarios')
           });*/

   //setPrintGrid('grid-table','grid-pager','Listado Usuarios')

      function validateRequerid (value, column) {
               if ( value=="")
                   return [false, "El campo " + column + " es requerido"];
               else
                   return [true, ""];
           }



   function style_edit_form(form) {
       //enable datepicker on "sdate" field and switches for "stock" field
       form.find('input[name=sdate]').datepicker({
           format: 'yyyy-mm-dd',
           autoclose: true
       })

       form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
       //don't wrap inside a label element, the checkbox value won't be submitted (POST'ed)
       //.addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');


       //update buttons classes
       var buttons = form.next().find('.EditButton .fm-button');
       buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide(); //ui-icon, s-icon
       buttons.eq(0).addClass('btn-primary').prepend('<i class="ace-icon fa fa-check"></i>');
       buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>')

       buttons = form.next().find('.navButton a');
       buttons.find('.ui-icon').hide();
       buttons.eq(0).append('<i class="ace-icon fa fa-chevron-left"></i>');
       buttons.eq(1).append('<i class="ace-icon fa fa-chevron-right"></i>');
   }

   function style_delete_form(form) {
       var buttons = form.next().find('.EditButton .fm-button');
       buttons.addClass('btn btn-sm btn-white btn-round').find('[class*="-icon"]').hide(); //ui-icon, s-icon
       buttons.eq(0).addClass('btn-danger').prepend('<i class="ace-icon fa fa-trash-o"></i>');
       buttons.eq(1).addClass('btn-default').prepend('<i class="ace-icon fa fa-times"></i>')
   }

   function style_search_filters(form) {
       form.find('.delete-rule').val('X');
       form.find('.add-rule').addClass('btn btn-xs btn-primary');
       form.find('.add-group').addClass('btn btn-xs btn-success');
       form.find('.delete-group').addClass('btn btn-xs btn-danger');
   }

   function style_search_form(form) {
       var dialog = form.closest('.ui-jqdialog');
       var buttons = dialog.find('.EditTable')
       buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'ace-icon fa fa-retweet');
       buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'ace-icon fa fa-comment-o');
       buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'ace-icon fa fa-search');
   }

   function beforeDeleteCallback(e) {
       var form = $(e[0]);

       if (form.data('styled')) return false;


       form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
       style_delete_form(form);

       form.data('styled', true);
   }

   function beforeEditCallback(e) {
       var form = $(e[0]);

       form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
       style_edit_form(form);
   }

 function getObjects(obj, key, val) {
       var objects = [];
       for (var i in obj) {
           if (!obj.hasOwnProperty(i)) continue;
           if (typeof obj[i] == 'object') {
               objects = objects.concat(getObjects(obj[i], key, val));
           } else if (i == key && obj[key] == val) {
               objects.push(obj);
           }
       }
       return objects;
   }

   //unlike navButtons icons, action icons in rows seem to be hard-coded
   //you can change them like this in here if you want
   function updateActionIcons(table) {

       var replacement = {
           'ui-ace-icon fa fa-pencil': 'ace-icon fa fa-pencil blue',
           'ui-ace-icon fa fa-trash-o': 'ace-icon fa fa-trash-o red',
           'ui-icon-disk': 'ace-icon fa fa-check green',
           'ui-icon-cancel': 'ace-icon fa fa-times red'
       };
       $(table).find('.ui-pg-div span.ui-icon').each(function() {
           var icon = $(this);
           var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
           if ($class in replacement) icon.attr('class', 'ui-icon ' + replacement[$class]);
       })

   }

   //replace icons with FontAwesome icons like above
   function updatePagerIcons(table) {
       var replacement = {
           'ui-icon-seek-first': 'ace-icon fa fa-angle-double-left bigger-140',
           'ui-icon-seek-prev': 'ace-icon fa fa-angle-left bigger-140',
           'ui-icon-seek-next': 'ace-icon fa fa-angle-right bigger-140',
           'ui-icon-seek-end': 'ace-icon fa fa-angle-double-right bigger-140'
       };
       $('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function() {
           var icon = $(this);
           var $class = $.trim(icon.attr('class').replace('ui-icon', ''));

           if ($class in replacement) icon.attr('class', 'ui-icon ' + replacement[$class]);
       })
   }

   function enableTooltips(table) {
       $('.navtable .ui-pg-button').tooltip({
           container: 'body'
       });
       $(table).find('.ui-pg-div').tooltip({
           container: 'body'
       });
   }

   $("#pdf").on("click", function(){
       empresa='<?php echo $_SESSION['nombreempresa']?>';
           $(grid_selector).jqGrid("exportToPdf",{
               title: 'Listado de Usuarios - ' + empresa ,
               orientation: 'portrait',
               pageSize: 'A4',
               //description: 'description of the exported document',
               customSettings: null,
               download: 'download',
               includeLabels : true,
               includeGroupHeader : true,
               includeFooter: true,
               fileName : "Listado Usuarios.pdf"
           })
       })

   $("#excel").on("click", function(){
           $(grid_selector).jqGrid("exportToExcel",{
               includeLabels : true,
               includeGroupHeader : true,
               includeFooter: true,
               fileName : "Listado Usuarios.xlsx",
               maxlength : 40 // maxlength for visible string data
           })
       })

    $("#csv").on("click", function(){
         $(grid_selector).jqGrid("exportToCsv",{
               separator: ";",
               separatorReplace : "", // in order to interpret numbers
               quote : '"',
               escquote : '"',
               newLine : "\r\n", // navigator.userAgent.match(/Windows/) ? '\r\n' : '\n';
               replaceNewLine : " ",
               includeCaption : false,
               includeLabels : false,
               includeGroupHeader : false,
               includeFooter: false,
               fileName : "Listado Usuarios.csv",
               returnAsString : false
           })
       })

// setup grid print capability. Add print button to navigation bar and bind to click.
function setPrintGrid(gid,pid,pgTitle){
   // print button title.
   var btnTitle = 'Print Grid';
   // setup print button in the grid top navigation bar.
   $('#'+gid).jqGrid('navSeparatorAdd','#'+gid+'_toppager_left', {sepclass :'ui-separator'});
   $('#'+gid).jqGrid('navButtonAdd','#'+gid+'_toppager_left', {caption: '', title: btnTitle, position: 'last', buttonicon: 'ace-icon fa fa-print', onClickButton: function() {    PrintGrid();    } });

   // setup print button in the grid bottom navigation bar.
   $('#'+gid).jqGrid('navSeparatorAdd','#'+pid, {sepclass : "ui-separator"});
   $('#'+gid).jqGrid('navButtonAdd','#'+pid, {caption: '', title: btnTitle, position: 'last', buttonicon: 'ace-icon fa fa-print', onClickButton: function() { PrintGrid();    } });


   $('#'+gid).jqGrid('navSeparatorAdd','#'+pid, {sepclass : "ui-separator"});
   $('#'+gid).jqGrid('navButtonAdd','#'+pid, {caption: '', title: btnTitle, position: 'last', buttonicon: 'ace-icon fa fa-excel', onClickButton: function() { PrintGrid();    } });

   function PrintGrid(){
       // attach print container style and div to DOM.
       $('head').append('<style type="text/css">.prt-hide {display:none;}</style>');
       $('body').append('<div id="prt-container" class="prt-hide"></div>');


       // copy and append grid view to print div container.
       $('#gview_'+gid).clone().appendTo('#prt-container').css({'page-break-after':'auto'});

       // remove navigation divs.
       $('#prt-container div').remove('.ui-jqgrid-toppager,.ui-jqgrid-titlebar,.ui-jqgrid-pager');

       // print the contents of the print container.
       $('#prt-container').printElement({pageTitle:pgTitle, overrideElementCSS:[{href:'assets/css/ui.jqgrid.min.css',media:'print'}]});

       // remove print container style and div from DOM after printing is done.
       $('head style').remove();
       $('body #prt-container').remove();
   }
}

   //var selr = jQuery(grid_selector).jqGrid('getGridParam','selrow');

   $(document).one('ajaxloadstart.page', function(e) {
       $.jgrid.gridDestroy(grid_selector);
       $('.ui-jqdialog').remove();
   });
});
 </script>
