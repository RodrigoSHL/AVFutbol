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
	       <input type="text" class="form-control desde" placeholder="Desde" name="fecha_inicio" id="desde" value="21-04-2018" data-date-format="dd-mm-yyyy">
	    </div>
	        
	</div>

	<div class="col-md-2">
	      <div class="input-group date">
	        <div class="input-group-addon">
	          <i class="fa fa-calendar"></i>
	        </div>
	          <input type="text" class="form-control hasta" placeholder="Hasta" name="fecha_hasta" id="hasta" value="22-04-2018" data-date-format="dd-mm-yyyy">
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
          <td align="center"><input type="checkbox" class="datos" value="1" data-nombre="calorias" checked=""></td>
          <td align="center"><input type="checkbox" class="datos" value="2" data-nombre="pasos"></td>
          <td align="center"><input type="checkbox" class="datos" value="3" data-nombre="ritmo_cardiaco"></td>
          <td align="center"><input type="checkbox" class="datos" value="4" data-nombre="tiempo"></td>
          <td align="center"><input type="checkbox" class="datos" value="5" data-nombre="hrv"></td>
        </tr>
    </tbody></table>
    </div>
  </div>

  <button class="btn btn-success pull-right" id="generar">Generar </button>
  <br>
  <hr>

  <input type="hidden" id="dia">
  <input type="hidden" id="mes">
  <input type="hidden" id="ano">

  <button class="btn btn-primary disabled" id="btn_calorias">Calorías</button>
  <button class="btn btn-primary disabled" id="btn_pasos">Pasos</button>
  <button class="btn btn-primary disabled" id="btn_ritmo_cardiaco">Ritmo Cardiaco</button>

  <br><br>
  <div id="data"></div>

</div>


  <div id="detalle_calorias" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><center><small><b>Gráfico Calorias</b></small></center></h4>
                </div>
                <div class="modal-body">


                  <div class="panel panel-warning">
                        
                      <div class="panel-heading"><b id="texto" class="text-warning">DETALLE DE GRÁFICO POR DEPORTISTA</b></div>
                      

                      <div class="panel-body">
                          <div class="col-md-12">
                            <div id="grafico_calorias"></div>
                          </div>

                      </div>

                  </div>

                  <footer><button class="btn btn-danger pull-right" data-dismiss="modal">Cerrar</button><br></footer>
                  <br>
              </div>
            </div>

          </div>
  </div>


  <div id="detalle_pasos" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><center><small><b>Gráfico Pasos</b></small></center></h4>
                </div>
                <div class="modal-body">


                  <div class="panel panel-warning">
                        
                      <div class="panel-heading"><b id="texto" class="text-warning">DETALLE DE GRÁFICO POR DEPORTISTA</b></div>
                      

                      <div class="panel-body">
                          <div class="col-md-12">
                            <div id="grafico_pasos"></div>
                          </div>

                      </div>

                  </div>

                  <footer><button class="btn btn-danger pull-right" data-dismiss="modal">Cerrar</button><br></footer>
                  <br>
              </div>
            </div>

          </div>
  </div>


  <div id="detalle_ritmo_cardiaco" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><center><small><b>Gráfico Ritmo Caridaco</b></small></center></h4>
                </div>
                <div class="modal-body">


                  <div class="panel panel-warning">
                        
                      <div class="panel-heading"><b id="texto" class="text-warning">DETALLE DE GRÁFICO POR DEPORTISTA</b></div>
                      

                      <div class="panel-body">
                          <div class="col-md-12">
                            <div id="grafico_cardiaco"></div>
                          </div>

                      </div>

                  </div>

                  <footer><button class="btn btn-danger pull-right" data-dismiss="modal">Cerrar</button><br></footer>
                  <br>
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
<script src="../hoteleria_2/prueba/js/select2-4.0.0-beta.3/dist/js/select2.min.js" type="text/javascript"></script>
<script src="../hoteleria_2/prueba/js/bootstrap-datepicker.js"></script>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<script src="../hoteleria_2/prueba/js/tableHeadFixer.js"></script>



<script type="text/javascript">



function sumarDias(fecha, dias){
	fecha.setDate(fecha.getDate() + dias);
	return fecha;
}


var grafico = [];
var ano = "";
var mes = "";
var dia = "";

$(document).on("ready",function(){

    grafico.length = 0;

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

$("#btn_calorias").on("click",function(){
	$("#detalle_calorias").modal("show");
});

$("#btn_pasos").on("click",function(){
	$("#detalle_pasos").modal("show");
});

$("#btn_ritmo_cardiaco").on("click",function(){
	$("#detalle_ritmo_cardiaco").modal("show");
});

$("#generar").on("click",function(){
		
    $("#data").html("");
    grafico.length = 0;


		var datos = [];
		var cont = 0;
		var opciones = [];

        $(".datos").each(function(){

          var obj = {};

          if($(this).is(":checked")){
          	cont+=1; 
          	opciones.push($(this).data("nombre")); 
          }else 
          	datos.push($(this).data("nombre")); 

        });

       var nombres = $("#nombres").val();
       var desde = $("#desde").val();
       var hasta = $("#hasta").val();

       if(!(nombres) || desde == "" || hasta == "" || cont == 0){
       	    $("#data").html("");
       		mostrar_notificacion("Advertencia", "No debe dejar ningún campo en blanco", "warning", "bottom-left");
       }else{

       		 $.post("buscar_informacion.php",{tipo : 2, desde : desde, hasta : hasta, nombres : nombres, buscar : datos, buscando : 1},
		          function (data) {
		             data = $.parseJSON(data);
                 	 

                 	 $("#dia").val(data.dia_inicio);
                 	 $("#mes").val(data.mes_inicio);
                 	 $("#ano").val(data.ano_inicio);

                 	 ano = data.ano_inicio;
                 	 mes = data.mes_inicio;
                 	 dia = data.dia_inicio;

                 	 tabla(data,nombres,datos,opciones);

		         }
		    );



       }

});


  

  function tabla(data,nombres,opciones,activos){

        var th = "";
        var tr = "";

        $.each(data.dias, function(i,dias){
          th += "<td style='white-space: nowrap !important ;' align='center'><span class='badge progress-bar-warning'><i class='fa fa-calendar'></i> <strong>"+dias.dias+"</strong></span></td>";
        });

  

        var tabla ='<table class="table table-bordered responsive" id="tabla_detalle_dia" width="100%"><thead>'
                        +'<tr>'
                          +'<td align="center">Deportista</td>'
                          +th
                        +'</tr></thead><tbody>';

        var td = "";
        $.each(nombres, function (i, nombre) {

           var box = '<div class="panel panel-warning">'
                          +'<div class="panel-header"><center><b><small>'+nombre.toUpperCase()+'</small></b></center></div>'
                      +'</div>'

         nombre_id = nombre.replace(" ","");

          tabla += "<tr><td>"+box+"</td>";
            $.each(data.dias, function(i,dias){
              td+= "<td id='"+dias.dias+nombre_id+"'></td>";
            });

          tabla += td+"</tr>";
          td = "";
            
        });


      
        tabla += "</tbody></table>"; 
        
        $("#data").html(tabla);
        

        $.each(data.dias, function(i,dias){

          if(!jQuery.isEmptyObject(data[dias.dias])){
             agregar_info(1,dias.dias,data,nombres);
          }else
             agregar_info(2,dias.dias,data,nombres);

              

        });

        var validar = 0;
        $("#tabla_detalle_dia tbody tr").each(function(){

          var tr = $(this).attr("class");
          
          if(tr === undefined)
            $(this).before().remove();

        });


    $("#tabla_detalle_dia").tableHeadFixer({"left" : 1}); 

      $.each(opciones, function (i, dato) {
          $("."+dato).css("display","none");
          $("#btn_"+dato).addClass("disabled");
      }); 

       $.each(activos, function (i, dato) {
          $("#btn_"+dato).removeClass("disabled");
      }); 

      mostrar_grafico(data.dias,nombres,"calorias");
      mostrar_grafico(data.dias,nombres,"pasos");
      mostrar_grafico(data.dias,nombres,"cardiaco");


  }


   function agregar_info(tipo,dias,data,nombres){

          switch(tipo){

            case 1:

                 var arr = [];


                    $.each(nombres, function (i, nombre) {

                      var obj = {};
                      var nombre_id = nombre.replace(" ","");
                      var sum_caloria = 0;
                      var sum_pasos = 0;
                      var sum_ritmo_cardiaco = 0;
                      var sum_minutos = 0;

                      $.each(data[dias], function(x,datos){

                        if(datos.nombre_id == nombre_id){
                           sum_caloria += datos.calorias;
                           sum_pasos = parseInt(datos.pasos) + parseInt(sum_pasos);
                           sum_ritmo_cardiaco = parseInt(datos.ritmo_cardiaco) + parseInt(sum_ritmo_cardiaco) ;
                           sum_minutos = parseFloat(datos.tiempo) + parseFloat(sum_minutos);
                        }
                        
                      });

                      obj["sum_caloria"+dias+nombre_id] = sum_caloria;
                      obj["sum_pasos"+dias+nombre_id] = sum_pasos;
                      obj["sum_ritmo_cardiaco"+dias+nombre_id] = sum_ritmo_cardiaco;
                      obj["sum_minutos"+dias+nombre_id] = sum_minutos;

                      arr.push(obj);
                     
                    
                    });

                  var arr_grafico_calorias = [];
                  var arr_grafico_pasos = [];
                  var arr_grafico_ritmo_cardiaco = [];

                  $.each(nombres, function (i, nombre) {
                      nombre_id = nombre.replace(" ","");

                      var hrv = 0;
                      if(data["rhv"+nombre_id] !== undefined)
                        hrv = data["rhv"+nombre_id];


                        var caloria = arr[i]["sum_caloria"+dias+nombre_id];
                        var pasos = arr[i]["sum_pasos"+dias+nombre_id];
                        var ritmo_cardiaco = arr[i]["sum_ritmo_cardiaco"+dias+nombre_id];
                        var minutos = arr[i]["sum_minutos"+dias+nombre_id];

                        if(caloria === null || caloria == "") caloria = 0;
                        if(pasos === null || pasos == "") pasos = 0;
                        if(ritmo_cardiaco === null || ritmo_cardiaco == "") ritmo_cardiaco = 0;
                        if(minutos === null || minutos === undefined) minutos = 0;


                        arr_grafico_calorias.push(caloria);
                        arr_grafico_pasos.push(pasos);
                        arr_grafico_ritmo_cardiaco.push(ritmo_cardiaco);
                        //arr_grafico.push(0);

                       

                      $("#"+dias+nombre_id).html('<span class="pull-right calorias">'
                                                                +'<small>Calorías</small> '
                                                                +'<small><strong>'+arr[i]["sum_caloria"+dias+nombre_id]+'</strong></small>'
                                                              +'</span><br>'

                                                              +'<span class="pull-right pasos">'
                                                                +'<small>Pasos</small> '
                                                                +'<small><strong>'+arr[i]["sum_pasos"+dias+nombre_id]+'</strong></small>'
                                                              +'</span><br>'

                                                              +'<span class="pull-right ritmo_cardiaco">'
                                                                +'<small>Ritmo Cardiaco</small> '
                                                                +'<small><strong>'+arr[i]["sum_ritmo_cardiaco"+dias+nombre_id]+'</strong></small>'
                                                              +'</span><br>'

                                                              +'<span class="pull-right tiempo">'
                                                                +'<small>Tiempo</small> '
                                                                +'<small><strong>'+arr[i]["sum_minutos"+dias+nombre_id]+'</strong></small>'
                                                              +'</span><br>'

                                                              +'<span class="pull-right hrv">'
                                                                +'<small>HRV</small> '
                                                                +'<small><strong>'+hrv+'</strong></small>'
                                                              +'</span><br>'

                                                              ).closest("tr").addClass("mostrar");
                  });

                   var obj = {}; 
                   obj["data_calorias"] = arr_grafico_calorias;
                   obj["data_pasos"] = arr_grafico_pasos;
                   obj["data_ritmo_cardiaco"] = arr_grafico_ritmo_cardiaco;

                   grafico.push(obj);

            break;

            case 2:

                  var arr_grafico_calorias = [0,0,0,0];
                  var arr_grafico_pasos = [0,0,0,0];
                  var arr_grafico_ritmo_cardiaco = [0,0,0,0];


	                   var obj = {}; 
	                   obj["data_calorias"] = arr_grafico_calorias;
	                   obj["data_pasos"] = arr_grafico_pasos;
	                   obj["data_ritmo_cardiaco"] = arr_grafico_ritmo_cardiaco;

	                   grafico.push(obj);


            break;

          }
         
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


function mostrar_grafico(dias,nombres,tipo){

	console.log(tipo);

	var chart =  Highcharts.chart('grafico_'+tipo, {

	    title: {
	        text: 'GRÁFICO DE '+tipo.toUpperCase()+' '
	    },

	    yAxis: {
	        title: {
	            text: 'Cantidad'
	        }
	    },
	    legend: {
	        layout: 'vertical',
	        align: 'right',
	        verticalAlign: 'middle'
	    },
	    xAxis: [
                {
                  type:'datetime',
                    dateTimeLableFormats:{
                      day:'%e. %b',
                      hour:'%H',
                      month:'%b \'%Y',
                      year:'%Y'
                    }
                }
              ],
	    responsive: {
	        rules: [{
	            condition: {
	                maxWidth: 500
	            },
	            chartOptions: {
	                legend: {
	                    layout: 'horizontal',
	                    align: 'center',
	                    verticalAlign: 'bottom'
	                }
	            }
	        }]
	    }

	});


	var grafico_final = [];
    var obj = {};

		$.each(nombres, function(i, nombre){
	       	
	       	var calorias = [];
	       	var pasos = [];
	       	var ritmo_cardiaco = [];

				$.each(grafico, function(x, datos){
					calorias.push(datos["data_calorias"][i]);
					pasos.push(datos["data_pasos"][i]);
					ritmo_cardiaco.push(datos["data_ritmo_cardiaco"][i]);
				});

				obj[nombre.replace(" ","")+"_calorias"] = calorias;
				obj[nombre.replace(" ","")+"_pasos"] = pasos;
				obj[nombre.replace(" ","")+"_cardiaco"] = ritmo_cardiaco;
				grafico_final.push(obj);
			
		});

	

	var fecha = Date.UTC(ano,mes,dia);

   
	$.each(nombres, function(i, nombre){
		
		chart.addSeries({                        
		    name: nombre,
		    data: grafico_final[i][nombre.replace(" ","")+"_"+tipo+""],
		    pointStart: fecha,
		    pointInterval: 24 * 3600 * 1000
		}, false);
		chart.redraw();

	});	

}


function mostrar_graficox(){

    console.log(JSON.stringify(grafico));

    var informacion = JSON.stringify(grafico);

    Highcharts.chart('grafico', {

        chart: {
            pankey:'shift',
            panning:true,
            type: 'column',
            zoomType:'xy'
        },
        
        series: {
             allowPointSelect: true,
             cursor: 'pointer',
             stacking: 'normal',
         },

        xAxis: [
                {
                  categories: ["elias","otro"],
                  lineColor:'#ffffff'
                },
                {
                  type:'datetime',
                    dateTimeLableFormats:{
                        day:'%e. %b',
                      hour:'%H',
                      month:'%b \'%Y',
                      year:'%Y'
                    }
                }
              ],

        series:[{
                 id : "juntar",
                 data:[
                        [1527033600000, 14251],
                        [1527120000000, 123],
                  ],
                 name: 'Caloria',
                 stack: 'calorias',
                 xAxis: 1
              },
              {
                linkedTo: 'juntar',
                data:[
                    [1527033600000, 9500],
                    [1527120000000, 4000],
                ],
                name: 'Pasos',
                stack: 'Pasos ',
                xAxis:1
              },
              {
                linkedTo: 'juntar',
                data:[
                    [1527033600000, 9500],
                    [1527120000000, 4000],
                ],
                name: 'Ritmo Cardiaco',
                stack: 'Ritmo Cardiaco ',
                xAxis:1
              },

              //asdasdasdasdasdasd

              {
                 id : "juntar2",
                 data:[
                        [1527033600000, 14251],
                        [1527120000000, 123],
                  ],
                 name: 'Calorias',
                 stack: 'Calorias ',
                 xAxis: 1
              },
              {
                linkedTo: 'juntar2',
                data:[
                    [1527033600000, 9500],
                    [1527120000000, 4000],
                ],
                name: 'Pasos',
                stack: 'Pasos ',
                xAxis:1
              },
              {
                linkedTo: 'juntar2',
                data:[
                    [1527033600000, 9500],
                    [1527120000000, 4000],
                ],
                name: 'Ritmo Cardiaco',
                stack: 'Ritmo Cardiaco ',
                xAxis:1
              }

        ],
         tooltip: {
            crosshairs: true,
            headerFormat:'<b>{point.x:%e. %b} : {series.options.stack}</b>'
        },
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });

  }


    

</script>

</body>
</html>