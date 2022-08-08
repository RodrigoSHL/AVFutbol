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

    <div id="grafico"></div><hr>

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
  
  $(document).on("ready",function(){

       Highcharts.chart('grafico', {

          title: {
              text: 'Solar Employment Growth by Sector, 2010-2016'
          },

          subtitle: {
              text: 'Source: thesolarfoundation.com'
          },

          yAxis: {
              title: {
                  text: 'Number of Employees'
              }
          },
          legend: {
              layout: 'vertical',
              align: 'right',
              verticalAlign: 'middle'
          },

          plotOptions: {
              series: {
                  label: {
                      connectorAllowed: false
                  },
                  pointStart: 2010
              }
          },

          series: [{
              name: 'Installation',
              data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
          }, {
              name: 'Manufacturing',
              data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
          }, {
              name: 'Sales & Distribution',
              data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
          }, {
              name: 'Project Development',
              data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
          }, {
              name: 'Other',
              data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
          }],

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

  });



</script>