<?php


$traer_datos = new TraerDatos();

class TraerDatos{
	protected $sql_con;
	protected $datos = array();
	protected $info = array();

	public function __construct(){
		session_start();
		error_reporting(0);
		require_once(''.dirname(__FILE__).'/Connections/db1.php');
		$this->conectar($db1);
		$this->obtener_info();
	}

	protected function conectar($db1){
		$this->sql_con = $db1;
	}

	protected function obtener_info(){

		extract($_POST);

		foreach ($_POST as $key => $value) {
			$this->info["".$key.""] = $value;
		}

		switch ($this->info["tipo"]) {
			case 1:
				$this->verificar();	
			break;

			case 2:
				$this->verificar_entrenador();	
			break;

			case 3:
				$this->cerrar_session();	
			break;

			case 4:
				$this->registrar();	
			break;

			case 5:
				$this->recuperar_pass();	
			break;
		}

	}

	 protected function recuperar_pass(){

	 	$consulta = "select * from usuario_app where mail='".$this->info["mail"]."'";
	 	$traer = $this->sql_con->SelectLimit($consulta) or $this->errores(__LINE__);

	 	if($traer->RecordCount() > 0){
	 		$pass = $traer->Fields("pass");
	 		$this->enviar_mail($pass);
	 		$this->datos["respuesta"] = 1;

	 	}else 
	 		$this->datos["respuesta"] = 0;
	 }


	 protected function registrar(){


    	$consulta = "select * from usuario_app where mail='".$this->info["mail"]."'";
    	$traer = $this->sql_con->SelectLimit($consulta) or $this->errores(__LINE__);

    	if($traer->RecordCount() > 0){
    		$this->datos["respuesta"] = 2;
    	}else{

    		$insertar = "insert into usuario_app(mail,nombre,apellido,pass) values ('".$this->info["mail"]."','".$this->info["nombre"]."','".$this->info["app"]."','".$this->info["pass"]."')";
    		$guardar = $this->sql_con->Execute($insertar) or $this->errores(__LINE__);

    		if($guardar)
	    		$this->datos["respuesta"] = 1;
	    	else
	    		$this->datos["respuesta"] = 0;

    	}
    	

    	

    }

	protected function verificar(){


    	if(isset($_SESSION["entrenador"])){
    		$this->datos["respuesta"] = 1;
    		$this->datos["usuario"]  = trim($_SESSION['entrenador']);
    	}else
    		$this->datos["respuesta"] = 0;

    }

    protected function verificar_entrenador(){

    	$cont = 0;

    	$consulta = "select * from usuario_app where mail='".$this->info["mail"]."' and pass='".$this->info["pass"]."' ";
    	$traer = $this->sql_con->SelectLimit($consulta) or $this->errores(__LINE__);

    	if($traer->RecordCount() > 0){
    		$_SESSION["entrenador"] = trim($traer->fields("nombre"))." ".trim($traer->fields("apellido"));
    		$cont+=1;
    	}
    	

    	if($cont > 0)
    		$this->datos["respuesta"] = 1;
    	else
    		$this->datos["respuesta"] = 0;

    }

    protected function cerrar_session(){

    	session_destroy();
    	$this->datos["respuesta"] = 1;

    }

    protected function enviar_mail($pass){

      $mail = " Tu password es : $pass  ";
      $titulo = "Mi Entrenamiento";
          
          $headers = "MIME-Version: 1.0\r\n"; 
          $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
          $headers .= "From: MI ENTRENAMIENTO < noreply@mientrenamiento.com >\r\n";
          $mail = mail("".$this->info["mail"]."",$titulo,$mail,$headers);
    
    }

	protected function errores($linea){
		die($_SERVER['REQUEST_URI']." - ".$linea." : ".$this->sql_con->ErrorMsg());
	}

	public function __destruct(){
		$this->sql_con->close();
		echo json_encode($this->datos);
	}

}



?>