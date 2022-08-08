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
  <script src="../hoteleria_2/prueba/js/select2-4.0.0-beta.3/dist/js/select2.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="../hoteleria_2/prueba/css/datepicker.css">

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

 <div class="row">
 	<hr>
 	<div class="col-md-2">
 		Deportista
 	</div>
    <div class="col-md-3">
      <br>
      	<small>Todos <input type="checkbox" id="all_deportista"></small>
        <select id="nombres" name="nombre" multiple class="form-control select2"></select>
      <br><br>
    </div>
  </div>


  <div class="row">

  	<div class="col-md-2">
 		Seleccione fechas
 	</div>

 	<div class="col-md-2">
	    <div class="input-group date">
	      <div class="input-group-addon">
	        <i class="fa fa-calendar"></i>
	      </div>
	       <input type="text" class="form-control desde" placeholder="Desde" name="fecha_inicio" id="desde" data-date-format="dd-mm-yyyy">
	    </div>
	        
	</div>

	<div class="col-md-2">
	      <div class="input-group date">
	        <div class="input-group-addon">
	          <i class="fa fa-calendar"></i>
	        </div>
	          <input type="text" class="form-control hasta" placeholder="Hasta" name="fecha_hasta" id="hasta" data-date-format="dd-mm-yyyy">
	      </div>
	 
	</div>
  </div>


   <div class="row">
 	<hr>
 	<div class="col-md-2">
 		Datos
 	</div>
    <div class="col-md-5">
      <table class="table table-striped table-bordered table-responsive">
        <tbody><tr>
          <td align="center" class="bg-warning"><b>Calorías</b></td>
          <td align="center" class="bg-warning"><b>Pasos</b></td>
          <td align="center" class="bg-warning"><b>Ritmo Cardiaco</b></td>
          <td align="center" class="bg-warning"><b>Tiempo</b></td>
          <td align="center" class="bg-warning"><b>HRV</b></td>
        </tr>
        <tr>
          <td align="center"><input type="checkbox" class="datos" value="1" data-nombre="calorias"></td>
          <td align="center"><input type="checkbox" class="datos" value="2" data-nombre="pasos"></td>
          <td align="center"><input type="checkbox" class="datos" value="3" data-nombre="ritmo_cardiaco"></td>
          <td align="center"><input type="checkbox" class="datos" value="4" data-nombre="tiempo"></td>
          <td align="center"><input type="checkbox" class="datos" value="5" data-nombre="hrv"></td>
        </tr>
    </tbody></table>
    </div>
  </div>

  <button class="btn btn-success pull-right" id="generar">Generar Comparativa</button>
  <br>
  <hr>

  <div id="grafico"></div><hr>
  <div id="data"></div>
	<!--div class="panel-group">
	  <div class="panel panel-warning">
	  <div class="panel-heading">
	    <center><b><h1 class="panel-title" id="operador">Entrenamientos Anteriores</h1><span class="cargar pull-right"></span></center></b>
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
	</div-->

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
<script src="../hoteleria_2/prueba/js/select2-4.0.0-beta.3/dist/js/select2.min.js" type="text/javascript"></script>
<script src="../hoteleria_2/prueba/js/bootstrap-datepicker.js"></script>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>



<script type="text/javascript">

function sumarDias(fecha, dias){
	fecha.setDate(fecha.getDate() + dias);
	return fecha;
}


$(document).on("ready",function(){


	 var now = new Date();
      var nueva_fecha = sumarDias(now, -1);

      var checkin = $('.desde').datepicker({
        onRender: function(date) {
           return date.valueOf() < nueva_fecha.valueOf() ? '' : '';
        }
      }).on('changeDate', function(ev) {

        if (ev.date.valueOf() > checkout.date.valueOf()) {
          var newDate = new Date(ev.date)
          newDate.setDate(newDate.getDate() + 1);
          checkout.setValue(newDate);
        }
        checkin.hide();
        $('.hasta')[0].focus();
      }).data('datepicker');
      var checkout = $('.hasta').datepicker({
        onRender: function(date) {
          return date.valueOf() < checkin.date.valueOf() ? '' : '';
        }
      }).on('changeDate', function(ev) {
        checkout.hide();
      }).data('datepicker');



    $('select#nombres').select2({
            placeholder: "Seleccione.."
    });

    $.post("buscar_informacion.php",{tipo : 1},
          function (data) {
             data = $.parseJSON(data);

             //var nombre =  '<option value=\'\'></option>';
             var nombre = "";
             $.each(data.nombre_entrenando, function (i, datos) {
                nombre += '<option  value="' + datos + '">' + datos.toUpperCase() + '</option>';
             });
             
             $("#nombres").html(nombre);
          }
    );      
});


$("#generar").on("click",function(){
		$("#data").html("");
		var datos = [];
		var cont = 0;
        $(".datos").each(function(){

          var obj = {};

          if($(this).is(":checked"))
          	cont+=1; 
          else 
          	datos.push($(this).data("nombre")); 

        });

       var nombres = $("#nombres").val();
       var desde = $("#desde").val();
       var hasta = $("#hasta").val();

       if(!(nombres) || desde == "" || hasta == "" || cont == 0){
       	    $("#data").html("");
       		mostrar_notificacion("Advertencia", "No debe dejar ningún campo en blanco", "warning", "bottom-left");
       }else{

       		var todo = "";
       		var panel = "<div class='col-md-12'>";

       		 $.post("buscar_informacion.php",{tipo : 2, desde : desde, hasta : hasta, nombres : nombres, buscar : datos, buscando : 1},
		          function (data) {
		             data = $.parseJSON(data);
		             
		             $.each(nombres, function (i, nombre) {



		             	panel+='<div class="col-md-5"><div class="panel-group">'
							  +'<div class="panel panel-warning">'
							  +'<div class="panel-heading">'
							    +'<center><b><h1 class="panel-title">Entrenamiento '+nombre.toUpperCase()+'</h1></center></b>'
							  +'</div>'
							    +'<div class="panel-body">'
							    	+'<div class="col-md-12">'
							    		+'<div class="table-responsive">'
							    			+'<div id="informacion_'+nombre.replace(" ","")+'"></div>'
							    		+'</div>'
							    		+'<br>'
							    	+'</div>'
							    +'</div>'
							  +'</div>'
							+'</div></div>'
		             });

		            panel+="</div>";
       				$("#data").html(panel);

       				$.each(nombres, function (i, nombre) {

       					nombre = nombre.replace(" ","");

						var tabla ='<table class="table table-bordered table-striped col-md-10" id="tabla'+nombre+'" width="90%"><thead>'
                                          +'<tr>'
                                            +'<td align="center" class="revisar calorias" data-nombre="calorias">Calorías</td>'
                                            +'<td align="center" class="revisar pasos" data-nombre="pasos">Pasos</td>'
                                            +'<td align="center" class="revisar ritmo_cardiaco" data-nombre="ritmo_cardiaco">Ritmo cardíaco</td>'
                                            +'<td align="center" class="revisar tiempo" data-nombre="tiempo">Tiempo</td>'
                                            +'<td align="center" class="revisar hrv" data-nombre="hrv">HRV</td>'
                                            +'<td align="center">Fecha</td>'
                                          +'</tr></thead><tbody>';


                        if(data["info"+nombre].length !== 0){
			             	$.each(data["info"+nombre], function (x, datos) {
			             			var minutos = "";
	                                var ritmo_cardiaco = "";

	                                if(datos.minutos !== null)
	                                    minutos = datos.minutos;

	                                if(datos.ritmo_cardiaco !== null)
	                                    ritmo_cardiaco = datos.ritmo_cardiaco;
	                                    
	                                    
	                                 tabla += "<tr id='mostrar_"+datos.id+"'>"
	                                            +"<td align='center' class='revisar calorias' data-nombre='calorias'>"+datos.calorias+"</td>"
	                                            +"<td align='center' class='revisar pasos' data-nombre='pasos'>"+datos.pasos+"</td>"
	                                            +"<td align='center' class='revisar ritmo_cardiaco' data-nombre='ritmo_cardiaco'>"+ritmo_cardiaco+"</td>"
	                                            +"<td align='center' class='revisar tiempo' data-nombre='tiempo'>"+minutos+"</td>"
	                                            +"<td align='center' class='revisar hrv' data-nombre='hrv'>"+data["rhv"+datos.id_name]+"</td>"
	                                            +"<td align='center' >"+datos.creacion+"</td>"
	                                         +"</tr>"

			             	});
			             }else
			             	tabla = '<div class="alert alert-warning alert-dismissable col-md-10"><center><strong>El deportista no cuenta con entrenamientos para el período seleccionado.</strong></center></div>';

		             	$("#informacion_"+nombre).html(tabla);
		             	datatable(nombre);

		             });



       				$.each(datos, function(i,dato){
       					$("."+dato).css("display","none");
       				});

       				//grafico();
		         }
		    );



       }

});

  

  function datatable(id){

  	 var table = $("#tabla"+id).DataTable({
      			   dom: 'Bfrtip',
      			   "scrollX": true,
                   buttons: [ {
                            extend:'csv',
                            text:'<i class="fa fa-file-excel-o text-success "></i>',
                          },
                          {
                            extend:'pdf',
                            text:'<i class="fa fa-file-pdf-o"></i>',
                          }

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

  	  table.buttons().container().prependTo(table.table().container());
  }


  $(document).on("click","#all_deportista",function(){
    if($("#all_deportista").is(':checked') ){
        $("#nombres > option").prop("selected","selected");
        $("#nombres").trigger("change");
    }else{
        $("#nombres > option").removeAttr("selected");
        $("#nombres").trigger("change");
     }
});


function grafico(datos){

	Highcharts.chart('grafico', {
	    chart: {
	        plotBackgroundColor: null,
	        plotBorderWidth: null,
	        plotShadow: false,
	        type: 'pie'
	    },
	    title: {
	        text: 'Gráfico comparativa'
	    },
	    tooltip: {
	        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	    },
	    plotOptions: {
	        pie: {
	            allowPointSelect: true,
	            cursor: 'pointer',
	            dataLabels: {
	                enabled: true,
	                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
	                style: {
	                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
	                }
	            }
	        }
	    },
	    series: [{
	        name: 'Brands',
	        colorByPoint: true,
	        data: [{
	            name: 'Chrome',
	            y: 61.41,
	            sliced: true,
	            selected: true
	        }, {
	            name: 'Internet Explorer',
	            y: 11.84
	        }, {
	            name: 'Firefox',
	            y: 10.85
	        }, {
	            name: 'Edge',
	            y: 4.67
	        }, {
	            name: 'Safari',
	            y: 4.18
	        }, {
	            name: 'Sogou Explorer',
	            y: 1.64
	        }, {
	            name: 'Opera',
	            y: 1.6
	        }, {
	            name: 'QQ',
	            y: 1.2
	        }, {
	            name: 'Other',
	            y: 2.61
	        }]
	    }]
	});

}


    

</script>

</body>
</html>