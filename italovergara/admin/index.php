<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Mi Entrenamiento</title>

  <?php include("css.php") ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>

</head>



<body class="fixed-nav sticky-footer bg-dark" id="page-top">

 <?php include("menu_izquierdo.php") ?>

 <div class="content-wrapper">
 	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Principal</a>
        </li>
        <li class="breadcrumb-item active">Mis Entrenamientos</li>
      </ol>




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

				    </div>
				  </div>
				</div>

			</div>




      </div>

 </div>






 <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Mi Entrenamiento <?=date("Y");?></small>
        </div>
      </div>
    </footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fa fa-angle-up"></i>
</a>



  <?php include("jquery.php") ?>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>
<script src="js/date-de.js" type="text/javascript"></script>
<script src="js/bootbox.js" type="text/javascript"></script>


  <script>
  	

   
   $(document).ready(function(){
     buscar_info();
   }); 		



function buscar_info(){

        $.post("class/buscar_informacion.php",{tipo : 2},
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
                                                    "sZeroRecords": "No se han entrenamientos disponibles",
                                                    "sEmptyTable": "No se han entrenamientos disponibles",
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

                                    //table.buttons().container().prependTo(table.table().container());
            });


         setInterval(buscar_info, 22000);

        }


    $(document).on("click",".borrando",function(){

      var id = $(this).attr("data-id");
        

        bootbox.confirm({
                    title: "",
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

      $.post("class/buscar_informacion.php",{tipo : 3, id : id },
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