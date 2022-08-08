<!DOCTYPE html>
<html>
<head>
<title>Mi Entrenamiento</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">	
 <link rel="stylesheet" href="../hoteleria_2/dist/css/AdminLTE.css">
 <link href="../prueba/css/bootstrap.css" rel="stylesheet">
 <link href="../prueba/fonts/font-awesome-4/css/font-awesome.css" rel="stylesheet" type="text/css">
 <link href="../prueba/css/jquery.gritter.css" rel="stylesheet">
 <link href="../prueba/css/style_gritter.css"  rel="stylesheet">
 <link href="../prueba/css/datepicker.css" rel="stylesheet" type="text/css"/>
 <link rel="stylesheet" type="text/css" href="../prueba/js/jquery.datatables/bootstrap-adapter/css/datatables.css" />
 <link href="../prueba/js/select2-4.0.0-beta.3/dist/css/select2.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="../prueba/js/jquery.niftymodals/css/component.css"/>
  <link href="../hoteleria_2/prueba/css/jquery.gritter.css" rel="stylesheet">
  <link href="../hoteleria_2/prueba/css/style_gritter.css"  rel="stylesheet">
</head>
<body>

<style type="text/css">
	#container{
		font-family: "Times New Roman", Times, serif;
	}
</style>
                

<div class="container">

<center><h1>Mi entrenamiento</h1></center>
  <span>Bienvenido entrenador <b>Ejemplo</b> <span id="entrenador"></span></span><br>

<br>

	<div class="panel-group">
				  <div class="panel panel-warning">
				  <div class="panel-heading">
				    <center><b><h1 class="panel-title" id="operador">Entrenamientos Actuales</h1></center></b>
				  </div>
				    <div class="panel-body">

				    	<div class="col-md-11">
				    		<div class="table-responsive">
				    			<div id="informacion"></div>
				    		</div>
				    		<br>
				    	</div>

                <a href="entrenamientos_anteriores.php"><button class="pull-left btn btn-success">Buscar entrenamientos anteriores</button></a>

				    </div>
				  </div>
				</div>

</div>








<script src="../prueba/js/jquery.js" type="text/javascript"></script>
<script src="../hoteleria_2/bootstrap/js/bootstrap.min.js"></script>
<script src="../hoteleria_2/prueba/js/bootbox.js" type="text/javascript"></script>
<script src="../hoteleria_2/prueba/js/jquery.gritter.js" type="text/javascript"></script>
<script src="../hoteleria_2/prueba/js/notificaciones.js" type="text/javascript"></script>
<script src="../hoteleria_2/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../hoteleria_2/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../hoteleria_2/prueba/js/jquery.datatables.sorting-plugins.js"></script>
<script src="../hoteleria_2/prueba/js/dataTables.buttons.min.js"></script>
<script src="../hoteleria_2/prueba/js/buttons.html5.min.js"></script>
<script src="../hoteleria_2/prueba/js/buttons.flash.min.js" type="text/javascript"></script>
<script src="../hoteleria_2/prueba/js/jszip.min.js" type="text/javascript"></script>
<script src="../hoteleria_2/prueba/js/date-de.js" type="text/javascript"></script>
<script type="text/javascript">


$(document).on("ready",function(){
    buscar_info();
});


function buscar_info(){

        $.post("buscar_informacion.php",{tipo : 2},
                 function (data) {

                        data = $.parseJSON(data);

                         var tabla ='<table class="table table-bordered table-striped" id="tabla" width="100%"><thead>'
                                          +'<tr>'
                                            +'<td align="center">Nombre</td>'
                                            +'<td align="center">Calorías</td>'
                                            +'<td align="center">Pasos</td>'
                                            +'<td align="center">Ritmo cardíaco</td>'
                                            +'<td align="center">Tiempo</td>'
                                            +'<td align="center">HRV</td>'
                                            +'<td align="center">Fecha</td>'
                                            +'<td align="center">-</td>'
                                          +'</tr></thead><tbody>';


                         $.each(data.todo, function (i, datos) {

                                var minutos = "";
                                var ritmo_cardiaco = "";

                                if(datos.minutos !== null)
                                    minutos = datos.minutos;

                                if(datos.ritmo_cardiaco !== null)
                                    ritmo_cardiaco = datos.ritmo_cardiaco;
                                    
                                    
                                 tabla += "<tr id='mostrar_"+datos.id+"'>"
                                            +"<td align='left'>"+datos.nombre+"</td>"
                                            +"<td align='center'>"+datos.calorias+"</td>"
                                            +"<td align='center'>"+datos.pasos+"</td>"
                                            +"<td align='center'>"+ritmo_cardiaco+"</td>"
                                            +"<td align='center'>"+minutos+"</td>"
                                            +"<td align='center'>"+data["rhv"+datos.id_name]+"</td>"
                                            +"<td align='center'>"+datos.creacion+"</td>"
                                            +"<td align='center'><i class='fa fa-trash text-danger borrando' data-id='"+datos.id+"' id='eliminando_"+datos.id+"'></i></td>"
                                         +"</tr>"

                        });

                         $("#informacion").html(tabla);



                 }  
        ).done(function(){
                  var table = $("#tabla").DataTable({
                                  dom: 'Bfrtip',
                                               buttons: [ {
                                                        extend:'csv',
                                                        text:'<i class="fa fa-file-excel-o text-success fa-2x"></i>',
                                                      },
                                                      {
                                                        extend:'pdfHtml5',
                                                        text:'<i class="fa fa-file-pdf-o"></i>',
                                                        fieldBoundary: '"',
                                                        className: 'btn-danger'
                                                      }

                                                ],
                                                "aaSorting": [[7, 'desc']],
                                                 "columnDefs": [ {
                                                                "targets": 0,
                                                                "orderable": false,
                                                                },
                                                                {
                                                                "targets": 1,
                                                                "orderable": false
                                                                },
                                                                {
                                                                "targets": 2,
                                                                "orderable": false
                                                                },
                                                                {
                                                                "targets": 3,
                                                                "orderable": false
                                                                },
                                                                {
                                                                "targets": 4,
                                                                "orderable": false
                                                                },
                                                                {
                                                                "targets": 5,
                                                                "orderable": false
                                                                },
                                                                {
                                                                "targets": 7,
                                                                "orderable": false
                                                                }
                                                             ],
                                                "aoColumns": [
                                                            null,
                                                            null,
                                                            null,
                                                            null,
                                                            null,
                                                            null,
                                                            {"sType": "date-euro" },
                                                            null,
                                                ],
                                                "oLanguage": {
                                                    "sProcessing": "Procesando...",
                                                    "sLengthMenu": "Mostrar _MENU_ ",
                                                    "sZeroRecords": "No se han encontrado datos disponibles",
                                                    "sEmptyTable": "No se han encontrado datos disponibles",
                                                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                                    "sInfoEmpty": "Mostrando  del 0 al 0 de un total de 0 ",
                                                    "sInfoFiltered": "(filtrado de un total de _MAX_ datos)",
                                                    "sInfoPostFix": "",
                                                    "sSearch": "Buscar: ",
                                                    "sUrl": "",
                                                    "sInfoThousands": ",",
                                                    "sLoadingRecords": "Cargando...",
                                                    "oPaginate": {
                                                        "sFirst": "Primero",
                                                        "sLast": "Último",
                                                        "sNext": "Siguiente",
                                                        "sPrevious": "Anterior"
                                                    },
                                                    "oAria": {
                                                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                                                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                                                    }
                                                }
                                        });



                                  /*table.columns().every( function () {
                                        var that = this;
                                 
                                        $( 'input', this.footer() ).on( 'keyup change', function () {
                                            if ( that.search() !== this.value ) {
                                                that
                                                    .search( this.value )
                                                    .draw();
                                            }
                                        } );
                                    } );*/

                                table.buttons().container().prependTo(table.table().container());
        });


       //setInterval(buscar_info, 22000);

    }


$(document).on("click",".borrando",function(){

	var id = $(this).attr("data-id");
    

		bootbox.confirm({
                title: "¿Esta borrando?",
                message: "Esta seguro de eliminar el dato?",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancelar',
                        className: 'btn-danger'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Confirmar',
                        className: 'btn-success'
                    }
                },
                    callback: function (result) {

                        if(result){
                        	eliminar(id);
                        }
                        
                    }
            });


});


function eliminar(id){

	$("#eliminando_"+id).removeClass("fa-trash").addClass("fa-spinner fa-spin");

	$.post("buscar_informacion.php",{tipo : 2, id : id },
			 function (data) {

			 		data = $.parseJSON(data);

			 		if(data.respuesta == 1){
			 			mostrar_notificacion("Éxito", "Dato eliminado correctamente", "success", "bottom-left");
			 			$("#mostrar_"+id).html("");
			 		}else
			 			mostrar_notificacion("ERROR", "Ocurrio un error al intentar eliminar", "danger", "bottom-left");




			 }
	);

}
    

</script>

</body>
</html>