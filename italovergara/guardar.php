<?php

	
	require_once('/var/www/h2o/Connections/db1.php');
    $json = file_get_contents('php://input');
    $obj = json_decode($json);
    
    $mail = "";

    if(isset($obj) and !empty($obj)){


	    //foreach($obj as $data){
	    	$insertar = "insert into hoteles.prueba_app(prueba,creacion) values ('".serialize($obj)."',now())";
	    	$guardar = $db1->Execute($insertar);

	    	mail_errores($insertar);

	    //}

	}else{
		//$mail = "No existe JSON";
		print_r(extract($_POST));
		mail_errores($_POST["contextElements"]);
	}



	 function mail_errores($mail){

      $mail = " $mail ";
      $titulo = "Mi Entrenar (PRUEBA)";
          
          $headers = "MIME-Version: 1.0\r\n"; 
          $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
          $headers .= "From: DISTANTIS < noreply@distantis.com >\r\n";
          $mail = mail("elias@distantis.com",$titulo,$mail,$headers);
     }

?>

