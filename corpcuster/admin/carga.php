<?php require_once 'cabezera.php'; ?>
<!-- Dropzone.js -->
<link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">


<!-- page content -->
<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h4>Subida Archivo CSV</h4>
        </div>

    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Presupuesto</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up blue"></i></a>
                        </li>
                        <li><a id="btnRemoveAlldz" title="Eliminar Archivos Cargados"><i class="ace-icon fa fa-trash-o red"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p>Arrastre varios archivos al cuadro de abajo para cargar múltiples o haga clic para seleccionar archivos.</p>
                    <form action="" class="dropzone well" id="dropzone" method='post' enctype="multipart/form-data">
                           <br />
                        <br />
                        <br />
                        <br />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->
<?php require_once 'pie.php'; ?>

<script type="text/javascript">



    $(document).ready(function() {
        Dropzone.autoDiscover = false;

         $("#btnRemoveAlldz").click(function () {
                       alert("entra")
                    myDropzone.removeAllFiles();
                }
        );

          var myDropzone = new Dropzone('#dropzone', {

       // $("#dropzone").dropzone({
            url: "class/carga/uploads.php",
            addRemoveLinks: true,
           //previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class=\"progress progress-small progress-striped active\"><div class=\"progress-bar progress-bar-success\" data-dz-uploadprogress></div></div>\n  <div class=\"dz-success-mark\"><span></span></div>\n  <div class=\"dz-error-mark\"><span></span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>",
            dictDefaultMessage: "Arrastra los archivos aquí para subirlos",
            dictFallbackMessage: "Su navegador no admite la carga de archivos de arrastre.",
            dictFallbackText: "Utilice el formulario de reserva que aparece a continuación para cargar sus archivos como en los viejos tiempos.",
            dictFileTooBig: "El archivo es demasiado grande ({{filesize}} MB). Tamaño máximo del archivo: {{maxFilesize}} MB.",
            dictInvalidFileType: "No puedes subir archivos de este tipo.",
            dictResponseError: "El servidor respondió con el código {{statusCode}}.",
            dictCancelUpload: "Cancelar la subida",
            dictCancelUploadConfirmation: "¿Seguro que quieres cancelar esta subida?",
            dictRemoveFile: "Remover archivo",
            dictRemoveFileConfirmation: null,
            dictMaxFilesExceeded: "No puedes subir más archivos por configuracion.",
            maxFilesize: 5,
            uploadMultiple: false,
            maxFiles: 5,
            acceptedFiles: ".csv",
            dictDefaultMessage: '<span class="bigger-150 bolder"><i class="ace-icon fa fa-caret-right red"></i> Arrastra los archivos aquí </span> para subirlos \
            <span class="smaller-80 grey">(o click)</span> <br /> \
            <i class="upload-icon ace-icon fa fa-cloud-upload blue fa-3x"></i>',
             success: function(file, response) {
             var json = JSON.parse(response);

             if (json.success == true) {
                 _MensajeNotificacion("Informacion", json.data.message + " " + file.name + " con " + (file.size / 1024 / 1024).toFixed(2) + " MB  fue exitoso", "success", "N")
             } else {
                 file.previewElement.classList.add("dz-error");
                 $(file.previewElement).find('.dz-error-message').text(json.data.message + " " + file.name);
                 _MensajeNotificacion("Advertencia!!", json.data.message + " " + file.name, "error", "N")
             }
             },

                     /*  $("body").prepend('<div class="alert alert-success alert-dismissable">' +
                                        '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                                        '<strong>Success! </strong> ' + response + ' was uploaded successfully</div>');
                            */


         /*  complete: function(file) {
                    if (file.status == "success") {
                         _MensajeNotificacion("Informacion", "Cargada de Archivo: " + file.name + " de " + file.size / 1024 + " KB  fue exitoso", "success", "N")

                    }

                },*/
             error: function(file, serverFileName) {
                 file.previewElement.classList.add("dz-error");
                 $(file.previewElement).find('.dz-error-message').text("Cargada de Archivo: " + file.name + " de " + (file.size / 1024 / 1024 ).toFixed(2) + " MB no fue exitoso :: " + serverFileName);

                 _MensajeNotificacion("Error interno", "Cargada de Archivo: " + file.name + " de " + (file.size / 1024 / 1024 ).toFixed(2)+ " MB no fue exitoso :: " + serverFileName, "error", "N")

                 /*
                   $("body").prepend('<div class="alert alert-danger alert-dismissable">' +
                                     '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
                                     '<strong>Error!</strong> ' + serverFileName + '</div >');*/

             },

            removedfile: function(file, serverFileName) {
                var name = file.name;
                $.ajax({
                    type: "POST",
                    url: "class/carga/uploads.php?delete=true",
                    data: "filename=" + name,
                    success: function(data) {
                        var json = JSON.parse(data);
                                var element;
                        (element = file.previewElement) != null ?
                            element.parentNode.removeChild(file.previewElement) :
                            false;

                        if (json.success == true) {

                            _MensajeNotificacion("Informacion", json.data.message + " " + file.name , "info", "N")

                        } else {
                                 file.previewElement.classList.add("dz-error");
                                 $(file.previewElement).find('.dz-error-message').text(json.data.message + " " + file.name);

                            _MensajeNotificacion("Advertencia!!", json.data.message + " " + file.name, "error", "N")
                        }
                    }
                });
            }
        });
    });
</script>
