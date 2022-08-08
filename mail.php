
<?php
$nombre = $_POST['txtNombre'];
$mail = $_POST['txtMail'];
$phone = $_POST['txtPhone'];
$coment = $_POST['txtComment'];


//Para quien va el mail
$para = 'mauri.dg@hotmail.com, director@revistaanfavial.cl';

//Aunto
$titulo = 'Mensaje Web EML';

//Cabeceras para asegurar que no llegue a spam o correo no deseado, y que lea el mesnaje HTML
$headers  = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "X-Priority: 3\n";
$headers .= "X-MSMail-Priority: Normal\n";
$headers .= "X-Mailer: php\n";

//Mail quien envia
$headers .= "From: \"".$nombre."\" <".$mail.">\n";
 

$mensaje = '
<html>
<head>
  <title>Mensaje Web de Ediciones Ministeriales</title>
</head>
<body>
  <table>
    <tr>
      <td>Nombre</td>
	  <td>'.$nombre .'</td>
    </tr>
    <tr>
      <td>Mail</td>
	  <td>'.$mail.'</td>
    </tr>
	<tr>
      <td>Teléfono</td>
	  <td>'.$phone.'</td>
    </tr>
	<tr>
      <td>Mensaje</td>
	  <td>'.$coment.'</td>
    </tr>
  </table>
</body>
</html>
';

$mensaje = utf8_decode($mensaje);

mail($para, $titulo, $mensaje, $headers);
?>

<script language="javascript"> 
	window.location="index.html"; 
</script>