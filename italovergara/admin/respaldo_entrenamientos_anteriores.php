<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Mi Entrenamiento</title>

  <?php include("css.php");?>
  <link href="css/tableexport.css" rel="stylesheet">
  <link rel="stylesheet" href="../../hoteleria_2/prueba/css/datepicker.css">
  <link href="../../prueba/js/select2-4.0.0-beta.3/dist/css/select2.css" rel="stylesheet">


</head>



<body class="fixed-nav sticky-footer bg-dark" id="page-top">

 <?php include("menu_izquierdo.php");?>

 <div class="content-wrapper">
 	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Principal</a>
        </li>
        <li class="breadcrumb-item active">Entrenamientos Anteriores</li>
      </ol>
      <br><br>


    
          <div class="row">
              <div class="col-md-2">
                <strong>Deportista</strong>
              </div>
                <div class="col-md-6">
                  <div class="input-group">
                    <br>
                      <small>Todos <input type="checkbox" id="all_deportista"></small>
                      <select id="nombres" name="nombre" multiple class="form-control select2"></select>
                    <br><br>
                  </div>
                </div>
           </div>
            <br><br>
				    	


                  <div class="row">

                  <div class="col-md-2">
                    <strong>Seleccione fechas</strong>
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

                <br><br>
                <div class="row">
                  <div class="col-md-2">
                    <br>
                  </div>
                  <div class="input-group">
                      <div class="col-md-8">
                        <table class="table table-striped table-bordered table-responsive">
                          <thead><tr>
                            <td align="center"><b>Calorías</b></td>
                            <td align="center"><b>Pasos</b></td>
                            <td align="center"><b>Ritmo Cardiaco</b></td>
                            <td align="center"><b>Tiempo</b></td>
                            <td align="center"><b>HRV</b></td>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td align="center"><input type="checkbox" class="datos" value="1" data-nombre="calorias"></td>
                            <td align="center"><input type="checkbox" class="datos" value="2" data-nombre="pasos"></td>
                            <td align="center"><input type="checkbox" class="datos" value="3" data-nombre="ritmo_cardiaco"></td>
                            <td align="center"><input type="checkbox" class="datos" value="4" data-nombre="minutos"></td>
                            <td align="center"><input type="checkbox" class="datos" value="5" data-nombre="hrv"></td>
                          </tr>
                      </tbody></table>
                      </div>
                    </div>
                  </div>

                  <input type="hidden" id="dia">
                  <input type="hidden" id="mes">
                  <input type="hidden" id="ano">

                  <div class="alert alert-warning alert-dismissable" id="alert_grafico" style="display:none;">   
                      <strong>Gráficos</strong> 
                  </div>

                  <div class="col-md-12 table-responsive">
                    <table>
                        <tr>
                          <td><button class="btn btn-primary btn-xs botones" style="display:none;" id="btn_calorias">Calorías</button></td>
                          <td><button class="btn btn-primary btn-xs botones" style="display:none;" id="btn_pasos">Pasos</button></td>
                          <td><button class="btn btn-primary btn-xs botones" style="display:none;" id="btn_ritmo_cardiaco">Ritmo Cardiaco</button></td>
                          <td><button class="btn btn-primary btn-xs botones" style="display:none;" id="btn_minutos">Minutos</button></td>
                          <td><button class="btn btn-primary btn-xs botones" style="display:none;" id="btn_hrv">HRV</button></td>
                        </tr>
                      </table>
                  </div>

                <hr>
                <br>
               
                  <button class="btn btn-success pull-right" id="generar">Generar </button>
                  <br>
                
                  <br><br>
                  <div id="data"></div>



      </div>

 </div>

  <div id="detalle_calorias" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">

            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
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
                <h4 class="modal-title"></h4>
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
                <h4 class="modal-title"></h4>
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

 <div id="detalle_minutos" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">


                  <div class="panel panel-warning">
                        
                      <div class="panel-heading"><b id="texto" class="text-warning">DETALLE DE GRÁFICO POR DEPORTISTA</b></div>
                      

                      <div class="panel-body">
                          <div class="col-md-12">
                            <div id="grafico_minutos"></div>
                          </div>

                      </div>

                  </div>

                  <footer><button class="btn btn-danger pull-right" data-dismiss="modal">Cerrar</button><br></footer>
                  <br>
              </div>
            </div>

          </div>
  </div>

   <div id="detalle_hrv" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">


                  <div class="panel panel-warning">
                        
                      <div class="panel-heading"><b id="texto" class="text-warning">DETALLE DE GRÁFICO POR DEPORTISTA</b></div>
                      

                      <div class="panel-body">
                          <div class="col-md-12">
                            <div id="grafico_hrv"></div>
                          </div>

                      </div>

                  </div>

                  <footer><button class="btn btn-danger pull-right" data-dismiss="modal">Cerrar</button><br></footer>
                  <br>
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



  <?php include("jquery.php");?>

  <script src="js/jszip.min.js"></script>
  <script src="js/FileSaver.min.js"></script>
  <script src="js/excel-gen.js"></script>

  <script src="../../hoteleria_2/prueba/js/select2-4.0.0-beta.3/dist/js/select2.min.js" type="text/javascript"></script>
  <script src="../../hoteleria_2/prueba/js/bootstrap-datepicker.js"></script>


  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>

  <script src="../../hoteleria_2/prueba/js/tableHeadFixer.js"></script>
  

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

    $.post("class/buscar_informacion.php",{tipo : 1},
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

$("#btn_minutos").on("click",function(){
  $("#detalle_minutos").modal("show");
});

$("#btn_hrv").on("click",function(){
  $("#detalle_hrv").modal("show");
});

$("#generar").on("click",function(){
    
    $("#data").html("<center><i class='fa fa-spinner fa-spin fa-2x'></i></center> ");
    $("#alert_grafico").css("display","block");
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
            $(".botones").css("display","none");
            $("#alert_grafico").css("display","none");
       }else{

           $.post("class/buscar_informacion.php",{tipo : 2, desde : desde, hasta : hasta, nombres : nombres, buscar : datos, buscando : 1},
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
          th += "<td style='white-space: nowrap !important ;' align='center'><span class='badge badge-warning'><i class='fa fa-calendar'></i> <strong>"+dias.dias+"</strong></span></td>";
        });

  

        var tabla ='<table class="table table-bordered table-striped responsive" id="tabla_detalle_dia" width="100%"><thead>'
                        +'<tr>'
                          +'<td align="center">Deportista</td>'
                          +th
                        +'</tr></thead><tbody>';

        var td = "";
        $.each(nombres, function (i, nombre) {

           var box = '<div class="panel panel-warning">'
                          +'<div class="panel-header"><center><b><small class="badge badge-info">'+nombre.toUpperCase()+'</small></b></center></div>'
                      +'</div>'

         nombre_id = nombre.replace(" ","");

          tabla += "<tr><td>"+box+"</td>";
            $.each(data.dias, function(i,dias){
              td+= "<td style='white-space: nowrap !important ;' id='"+dias.dias+nombre_id+"'></td>";
            });

          tabla += td+"</tr>";
          td = "";
            
        });


      
        tabla += "</tbody></table>"; 
        
        $("#data").html("<hr><br><button id='csv' class='btn btn-success pull-left'><i class='fa fa-file-excel-o btn-xs'></i> CSV</button><button id='excel' class='btn btn-success pull-right'><i class='fa fa-file-excel-o btn-xs'></i> EXCEL</button>"+tabla);
        

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
          $("."+dato).css("display","none").remove();
          $("#btn_"+dato).css("display","none");
      }); 

       $.each(activos, function (i, dato) {
          $("#btn_"+dato).css("display","block");
      }); 


    
      mostrar_grafico(data,data.dias,nombres,"calorias");
      mostrar_grafico(data,data.dias,nombres,"pasos");
      mostrar_grafico(data,data.dias,nombres,"cardiaco");
      mostrar_grafico(data,data.dias,nombres,"minutos");
      mostrar_grafico(data,data.dias,nombres,"hrv");


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
                  var arr_grafico_minutos = [];
                  var arr_grafico_hrv = [];

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
                        arr_grafico_minutos.push(minutos);
                        arr_grafico_hrv.push(hrv);
                        //arr_grafico.push(0);

                        
                        if(data["info"+nombre.replace(" ","")] === undefined || data["info"+nombre.replace(" ","")] == ""){

                          $("#"+dias+nombre_id).html('<span class="pull-right calorias">'
                                                                    +'<small>Calorías</small> '
                                                                    +'<small><strong>'+arr[i]["sum_caloria"+dias+nombre_id]+'</strong></small>'
                                                                  +'</span><br>'

                                                                  +'<span class="pull-right pasos">'
                                                                    +'<small>Pasos</small> '
                                                                    +'<small><strong>'+arr[i]["sum_pasos"+dias+nombre_id]+'</strong></small>'
                                                                  +'</span><br>'

                                                                  +'<span class="pull-right ritmo_cardiaco">'
                                                                    +'<small>R.H</small> '
                                                                    +'<small><strong>'+arr[i]["sum_ritmo_cardiaco"+dias+nombre_id]+'</strong></small>'
                                                                  +'</span><br>'

                                                                  +'<span class="pull-right minutos">'
                                                                    +'<small>Tiempo</small> '
                                                                    +'<small><strong>0</strong></small>' //'+arr[i]["sum_minutos"+dias+nombre_id]+'
                                                                  +'</span><br>'

                                                                  +'<span class="pull-right hrv">'
                                                                    +'<small>HRV</small> '
                                                                    +'<small><strong>'+hrv+'</strong></small>'
                                                                  +'</span><br>'

                                                                  ).closest("tr").addClass("mostrar");

                        }else{


                        $.each(data["info"+nombre.replace(" ","")], function(x, datos){

                          if(dias == datos.dias){
                            $("#"+dias+nombre_id).append('<small class="badge badge-info"><i class="fa fa-calendar"></i> '+datos.creacion+'</small><br><span class="pull-right calorias">'
                                                                      +'<small>Calorías</small> '
                                                                      +'<small><strong>'+datos.calorias+'</strong></small>'
                                                                    +'</span><br>'

                                                                    +'<span class="pull-right pasos">'
                                                                      +'<small>Pasos</small> '
                                                                      +'<small><strong>'+datos.pasos+'</strong></small>'
                                                                    +'</span><br>'

                                                                    +'<span class="pull-right ritmo_cardiaco">'
                                                                      +'<small>R.H</small> '
                                                                      +'<small><strong>'+datos.ritmo_cardiaco+'</strong></small>'
                                                                    +'</span><br>'

                                                                    +'<span class="pull-right minutos">'
                                                                      +'<small>Tiempo</small> '
                                                                      +'<small><strong>0</strong></small>' //'+arr[i]["sum_minutos"+dias+nombre_id]+'
                                                                    +'</span><br>'

                                                                    +'<span class="pull-right hrv">'
                                                                      +'<small>HRV</small> '
                                                                      +'<small><strong>'+hrv+'</strong></small>'
                                                                    +'</span><br>'

                                                                    ).closest("tr").addClass("mostrar");
                          }

                        });
                      }

                    });



                   var obj = {}; 
                   obj["data_calorias"] = arr_grafico_calorias;
                   obj["data_pasos"] = arr_grafico_pasos;
                   obj["data_ritmo_cardiaco"] = arr_grafico_ritmo_cardiaco;
                   obj["data_minutos"] = arr_grafico_minutos;
                   obj["data_hrv"] = arr_grafico_hrv;

                   grafico.push(obj);

            break;

            case 2:

                  var arr_grafico_calorias = [0,0,0,0];
                  var arr_grafico_pasos = [0,0,0,0];
                  var arr_grafico_ritmo_cardiaco = [0,0,0,0];
                  var arr_grafico_minutos = [0,0,0,0];
                  var arr_grafico_hrv = [0,0,0,0];


                     var obj = {}; 
                     obj["data_calorias"] = arr_grafico_calorias;
                     obj["data_pasos"] = arr_grafico_pasos;
                     obj["data_ritmo_cardiaco"] = arr_grafico_ritmo_cardiaco;
                     obj["data_minutos"] = arr_grafico_minutos;
                     obj["data_hrv"] = arr_grafico_hrv;

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


function mostrar_grafico(data,dias,nombres,tipo){

var titulo = tipo;

  if(titulo == "cardiaco")
    titulo = "ritmo cardiaco";

  if(tipo == "cardiaco"){

  var chart =  Highcharts.chart('grafico_'+tipo, {

      title: {
          text: 'GRÁFICO DE '+titulo.toUpperCase()+' '
      },
      lang: {
	    printChart: 'Imprimir',
	    downloadPNG: 'Descargar PNG',
	    downloadJPEG: 'Descargar JPEG',
	    downloadPDF: 'Descargar PDF',
	    downloadSVG: 'Descargar SVG',
	    downloadCSV: 'Descargar CSV',
	    downloadXLS: 'Descargar XLS',
	    contextButtonTitle: 'Menu descargas',
	    openInCloud : 'Abrir en highchart ICloud',
	    viewData : 'Ver Información'
	 },
	 exporting: {
            buttons: {
                contextButton: {
                    	menuItems: [{
                            textKey: 'downloadPNG',
                            onclick: function () {
                                this.exportChart();
                            }
                        }, {
                            textKey: 'downloadJPEG',
                            onclick: function () {
                                this.exportChart({
                                    type: 'image/jpeg'
                                });
                            }
                        }/*,{
                            textKey: 'downloadPDF',
                            onclick: function () {
                               type: 'application/pdf'
                            }
                        }*/,{
                            textKey: 'downloadCSV',
                            onclick: function () {
                                this.downloadCSV();
                            }
                        }
                        ]
                }
            }
        },

      yAxis: {
          title: {
              text: 'Cantidad'
          },
          type: 'double',
          min: 0
      },
      legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle'
      },
       xAxis: {
            type: 'datetime',
            labels: {
                formatter: function () {
                    return Highcharts.dateFormat('%a %d %b %H:%M', this.value);
                },
                dateTimeLabelFormats: {
                    hour: '%I %p',
                    minute: '%I:%M %p'
                }
            }
        },
        tooltip: {
          formatter: function() {
              return ''+
                      "" +
                      'Entrenamiento: '+ Highcharts.dateFormat('%d %b %I:%M %p', this.x)+' Valor : '+this.y ;
          }
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


}else{

  var chart =  Highcharts.chart('grafico_'+tipo, {

      title: {
          text: 'GRÁFICO DE '+titulo.toUpperCase()+' '
      },
      lang: {
      printChart: 'Imprimir',
      downloadPNG: 'Descargar PNG',
      downloadJPEG: 'Descargar JPEG',
      downloadPDF: 'Descargar PDF',
      downloadSVG: 'Descargar SVG',
      downloadCSV: 'Descargar CSV',
      downloadXLS: 'Descargar XLS',
      contextButtonTitle: 'Menu descargas',
      openInCloud : 'Abrir en highchart ICloud',
      viewData : 'Ver Información'
   },
   exporting: {
            buttons: {
                contextButton: {
                      menuItems: [{
                            textKey: 'downloadPNG',
                            onclick: function () {
                                this.exportChart();
                            }
                        }, {
                            textKey: 'downloadJPEG',
                            onclick: function () {
                                this.exportChart({
                                    type: 'image/jpeg'
                                });
                            }
                        }/*,{
                            textKey: 'downloadPDF',
                            onclick: function () {
                               type: 'application/pdf'
                            }
                        }*/,{
                            textKey: 'downloadCSV',
                            onclick: function () {
                                this.downloadCSV();
                            }
                        }
                        ]
                }
            }
        },

      yAxis: {
          title: {
              text: 'Cantidad'
          },
          type: 'double',
          min: 0
      },
      legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle'
      },
       xAxis: {
            type: 'datetime',
            labels: {
                formatter: function () {
                    return Highcharts.dateFormat('%a %d %b %H:%M', this.value);
                },
                dateTimeLabelFormats: {
                    hour: '%I %p',
                    minute: '%I:%M %p'
                }
            }
        },
        tooltip: {
          formatter: function() {
              return ''+
                      "" +
                      'Entrenamiento: '+ Highcharts.dateFormat('%d %b %Y', this.x)+' Valor : '+this.y ;
          }
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


  var grafico_final = [];
    var obj = {};

    $.each(nombres, function(i, nombre){
          
          var calorias = [];
          var pasos = [];
          var ritmo_cardiaco = [];
          var minutos = [];
          var hrv = [];

        $.each(grafico, function(x, datos){
          calorias.push(datos["data_calorias"][i]);
          pasos.push(datos["data_pasos"][i]);
          ritmo_cardiaco.push(datos["data_ritmo_cardiaco"][i]);
          minutos.push(datos["data_minutos"][i]);
          hrv.push(datos["data_hrv"][i]);
        });

        obj[nombre.replace(" ","")+"_calorias"] = calorias;
        obj[nombre.replace(" ","")+"_pasos"] = pasos;
        obj[nombre.replace(" ","")+"_cardiaco"] = ritmo_cardiaco;
        obj[nombre.replace(" ","")+"_minutos"] = minutos;
        obj[nombre.replace(" ","")+"_hrv"] = hrv;

        grafico_final.push(obj);
      
    });

  

  var fecha = Date.UTC(ano,mes,dia);

  if(tipo == "cardiaco"){

    var arreglo_ritmo_cardiaco = [];

      $.each(nombres, function(i, nombre){

        var cardiaco = new Array();
        var cardiaco_final = [];

          $.each(data["info"+nombre.replace(" ","")], function(x, datos){
               var cambiar = Date.UTC(datos.ano, datos.mes, datos.dia, datos.hora, datos.minuto);
               cardiaco[x] = new Array(cambiar,parseInt(datos.ritmo_cardiaco));
           });

          obj[nombre.replace(" ","")+"_cardiaco"] = cardiaco;
          arreglo_ritmo_cardiaco.push(obj);

      });


      $.each(nombres, function(i, nombre){

        chart.addSeries({                        
            name: nombre,
            data: arreglo_ritmo_cardiaco[i][nombre.replace(" ","")+"_cardiaco"],
            //pointStart: arreglo_ritmo_cardiaco[i][nombre.replace(" ","")+"_creacion"]
        }, false);
        chart.redraw();

      }); 

  }else{

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

}


  $(document).on('click',"#csv", function(event) {
    $("#tabla_detalle_dia").tableToCSV();
  });

  $(document).on('click',"#excel", function(event) {
      excel = new ExcelGen({
          "src_id": "tabla_detalle_dia",
          "show_header": true
      });
      excel.generate();
  });

  


  jQuery.fn.tableToCSV = function() {
    
    var clean_text = function(text){
        text = text.replace(/"/g, '\\"').replace(/'/g, "\\'");
        return '"'+text+'"';
    };
    
  $(this).each(function(){
      var table = $(this);
      var caption = $(this).find('caption').text();
      var title = [];
      var rows = [];

      $(this).find('tr').each(function(){
        var data = [];
        $(this).find('th').each(function(){
                    var text = clean_text($(this).text());
          title.push(text);
          });
        $(this).find('td').each(function(){
                    var text = clean_text($(this).text());
          data.push(text);
          });
        data = data.join(",");
        rows.push(data);
        });
      title = title.join(",");
      rows = rows.join("\n");

      var csv = title + rows;
      var uri = 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv);
      var download_link = document.createElement('a');
      download_link.href = uri;
      var ts = new Date().getTime();
      if(caption==""){
        download_link.download = "Entrenamientos.csv";
      } else {
        download_link.download = "Entrenamientos.csv";
      }
      document.body.appendChild(download_link);
      download_link.click();
      document.body.removeChild(download_link);
  });
    



};


</script>


</body>
</html>