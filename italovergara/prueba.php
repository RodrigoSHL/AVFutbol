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
  <link href="../hoteleria_2/prueba/js/select2-4.0.0-beta.3/dist/css/select2.css" rel="stylesheet">
</head>
<body>

<style type="text/css">
	#container{
		font-family: "Times New Roman", Times, serif;
	}
</style>
                

<div class="container">

  <div class="row">
    <div class="col-md-3">
      <br>
        Buscar <select id="nombres" name="nombre" class="form-control select2"></select>
      <br><br>
    </div>
  </div>


	     <div class="panel-group">
				  <div class="panel panel-warning">
				  <div class="panel-heading">
				    <center><b><h1 class="panel-title" id="operador">Mi Entrenamiento</h1><span class="cargar pull-right"></span></center></b>
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








<script src="../prueba/js/jquery.js" type="text/javascript"></script>
<script src="../hoteleria_2/bootstrap/js/bootstrap.min.js"></script>
<script src="../hoteleria_2/prueba/js/bootbox.js" type="text/javascript"></script>
<script src="../hoteleria_2/prueba/js/jquery.gritter.js" type="text/javascript"></script>
<script src="../hoteleria_2/prueba/js/notificaciones.js" type="text/javascript"></script>
<script src="../hoteleria_2/prueba/js/select2-4.0.0-beta.3/dist/js/select2.min.js" type="text/javascript"></script>
<script type="text/javascript">


$(document).on("ready",function(){

    $('select#nombres').select2({
            placeholder: "Seleccione.."
    });

    $.post("buscar_informacion.php",{tipo : 1},
          function (data) {
             data = $.parseJSON(data);

             var nombre =  '<option value=\'\'></option>';

             $.each(data.nombre_entrenando, function (i, datos) {
                nombre += '<option  value="' + datos + '">' + datos.toUpperCase() + '</option>';
             });
             
             $("#nombres").html(nombre);
          }
    );      

});

$("#nombres").on("change",function(){
    var valor = $(this).val();
    $(".cargar").addClass("fa fa-spinner fa-spin");
    buscar_datos(valor)
});


function buscar_datos(valor){


        $.post("buscar_informacion.php",{tipo : 2, nombre : valor},
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
                                         +"</tr>"

                        });

                         $("#informacion").html(tabla);



                 }  
        ).done(function(){
          $(".cargar").removeClass("fa fa-spinner fa-spin");
        });


    }

</script>

</body>
</html>