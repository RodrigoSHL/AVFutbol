 $.post("class/login.php",{tipo : 1},
                 function (data) {

         data = $.parseJSON(data);

         if(data.respuesta == 0)
         	window.location.href = "login.php";
         else{
         	$(".entrenador").html(data.usuario);
         }

 });

 $(document).on("click","#cerrar_sesion",function(){

 		  $.post("class/login.php",{tipo : 3},
                 function (data) {

		         data = $.parseJSON(data);

		         if(data.respuesta == 1)
		         	window.location.href = "login.php";
		         else
		         	 mostrar_notificacion("Advertencia", "No se puede cerrar sesión", "warning", "bottom-left");

		        

		 });

 });