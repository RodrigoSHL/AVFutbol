<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Mi Entrenamiento</title>
 
  <? include("css.php");?>

</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Iniciar Sesión</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input class="form-control" id="email" type="email" aria-describedby="emailHelp" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="pass" type="password" placeholder="Password">
          </div>
          <!--div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox">Recordar Password</label>
            </div>
          </div-->
          <button class="btn btn-primary btn-block" id="login">Iniciar</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Registrar Entrenador</a>
          <a class="d-block small mt-3" href="olvido_pass.html">Olvido Contraseña?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="js/jquery.js" type="text/javascript"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="js/jquery.gritter.js" type="text/javascript"></script>
  <script src="js/notificaciones.js" type="text/javascript"></script>

  <script type="text/javascript">

  $("#login").on("click", function(e){

       e.preventDefault();
        
       var mail = $("#email").val();
       var pass = $("#pass").val();

       $.post("class/login.php",{tipo : 2, mail:mail, pass:pass},
                 function (data) {

               data = $.parseJSON(data);

               if(data.respuesta != 0)
                window.location.href = "index.php";
              else 
                mostrar_notificacion("Advertencia", "El usuario no existe", "warning", "bottom-left");
       

       });

     });


  </script>
</body>

</html>
