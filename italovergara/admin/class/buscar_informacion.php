<?php

$traer_datos = new TraerDatos();

class TraerDatos{
	protected $sql_con;
	protected $datos = array();
	protected $info = array();

	public function __construct(){
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
				$this->traer_nombres();	
			break;

			case 2:
				$this->traer_info();
			break;

			case 3:
				$this->eliminar();
			break;

			case 4:
				$this->grafico();
			break;

		}

	}


	protected function grafico(){




	}

	protected function traer_nombres(){

		$consulta = "select * from prueba_app";
		$traer = $this->sql_con->SelectLimit($consulta) or $this->errores(__LINE__);

		$this->info["nombres"] = array();

		while(!$traer->EOF){

			$variable = unserialize($traer->Fields("prueba"));
			foreach ($variable->contextElements as $key => $value) {
				if(!empty($value->nombre_user))
					$this->info["nombres"][] = $value->nombre_user;
			}

			$traer->MoveNext();
		}

		$this->datos["nombre_entrenando"] = array_unique($this->info["nombres"]);

	}


	protected function actualizar(){

		$act = "update prueba_app set estado = 1";
		$actualizar = $this->sql_con->Execute($act) or $this->errores(__LINE__);
	}


	protected function eliminar(){

		$eliminar = "update prueba_app set estado = 1 where id = ".$this->info["id"]." ";
		$eliminando = $this->sql_con->Execute($eliminar) or $this->errores(__LINE__);

		if($eliminando)
			$this->datos["respuesta"] = 1;
		else
			$this->datos["respuesta"] = 0;

	}

	protected function traer_info(){


		if($this->info["tipo"] == 1)
			$consulta = "select * from prueba_app where estado = 0  order by creacion desc";
		else{


			$desde = date("Y-m-d",strtotime($this->info["desde"]));
	        $hasta = date("Y-m-d",strtotime($this->info["hasta"]));

	        $this->datos["fecha_inicio"] = date("d-m-Y",strtotime($this->info["desde"]));
	        $this->datos["dia_inicio"] = intval(date("d",strtotime($this->info["desde"])));
	        $this->datos["mes_inicio"] = intval(date("m",strtotime($this->info["desde"])));
	        $this->datos["ano_inicio"] = intval(date("Y",strtotime($this->info["desde"])));

	        $this->datos["dias"] = array();

	        for($i=$desde;$i<=$hasta;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){
	          $dia = date("d-m-Y",strtotime($i));
	          $this->datos[$dia] = array();
	          $datos = array("dias"=>$dia);
	          array_push($this->datos["dias"], $datos);
	        }



			if(!empty($this->info["desde"]) and !empty($this->info["hasta"])){
				$desde = date("Y-m-d",strtotime($this->info["desde"]));
				$hasta = date("Y-m-d",strtotime($this->info["hasta"]));
				$consulta = "select * from prueba_app where DATE_FORMAT(creacion,'%Y-%m-%d') between '".$desde."' and '".$hasta."' order by creacion desc";
			}else{
				$hoy = date("Y-m-d");
				$consulta = "select * from prueba_app where estado = 0 and creacion>='$hoy' order by creacion desc";
			}
		}


		$traer = $this->sql_con->SelectLimit($consulta) or $this->errores(__LINE__);

		$this->datos["todo"] = array();

		$cont = 0;
		$contando = 0;
		
		$this->info["prueba"] = array();

		if($this->info["nombres"] != ""){
			foreach($this->info["nombres"] as $nombre){
				$this->datos["info".trim(str_replace(' ', '', $nombre))] = array();
			}
		}	

		while(!$traer->EOF){

			$variable = unserialize($traer->Fields("prueba"));
			$crea = date('Y-m-d H:i:s', strtotime($traer->Fields("creacion").'-3 hour'));
			$fecha = $crea ;
			$id =$traer->fields("id");

			foreach ($variable->contextElements as $key => $value) {
				
				// and !empty($value->minutos);

				

				if(!empty($value->nombre_user)){
					$cont+=1;
					

					if($this->info["nombres"] != ""){


						foreach($this->info["nombres"] as $nombre){

							 //echo $value->nombre_user."<=>".$nombre."<br>";

							if($value->nombre_user == $nombre){

								$datos = array("ritmo_cardiaco"=>$value->ritmo_cardiaco,"nombre"=>$value->nombre_user);
								array_push($this->info["prueba"],$datos);
								
								$this->agregar_informacion(date("d-m-Y",strtotime($fecha)),$value->nombre_user,round($value->calorias,2),$value->pasos,$value->ritmo_cardiaco,$value->minutos);


								$datos = array(
												"nombre"=>$value->nombre_user,
												"pasos"=>$value->pasos,
												"calorias"=>round($value->calorias,2),
												"ritmo_cardiaco"=>$value->ritmo_cardiaco,
												"minutos"=>$value->minutos,
												"creacion"=>date("d-m-Y H:i:s",strtotime($fecha)),
												"dia"=>date("d",strtotime($fecha)),
												"mes"=>date("m",strtotime($fecha)),
												"ano"=>date("Y",strtotime($fecha)),
												"hora"=>date("H",strtotime($fecha)),
												"minuto"=>date("i",strtotime($fecha)),
												"seg"=>date("s",strtotime($fecha)),
												"timestamp"=>1000 * strtotime($fecha),
												"dias"=>date("d-m-Y",strtotime($fecha)),
												"id"=>$id,
												"id_name"=>trim(str_replace(' ', '', $value->nombre_user))
											  );

								array_push($this->datos["info".trim(str_replace(' ', '', $value->nombre_user))],$datos);

							}

						}

					}else{

						$datos = array("ritmo_cardiaco"=>$value->ritmo_cardiaco,"nombre"=>$value->nombre_user);
						array_push($this->info["prueba"],$datos);

						$datos = array(
										"nombre"=>$value->nombre_user,
										"pasos"=>$value->pasos,
										"calorias"=>round($value->calorias,2),
										"ritmo_cardiaco"=>$value->ritmo_cardiaco,
										"minutos"=>$value->minutos,
										"creacion"=>date("d-m-Y",strtotime($fecha)),
										"id"=>$id,
										"id_name"=>trim(str_replace(' ', '', $value->nombre_user))
									  );
						array_push($this->datos["todo"],$datos);
					}

					

				}
			}



			$traer->MoveNext();
		}



		$this->info["agrupar"] = array();
                                   
        foreach($this->info["prueba"] as $info=>$d){

            $primero = strtoupper($this->info["prueba"][$info]["nombre"]);

            if (!isset($this->info["agrupar"][$primero])) 
                $this->info["agrupar"][$primero] = array();
            
            $this->info["agrupar"][$primero][$info] = $d;

        }



        foreach($this->info["agrupar"] as $nombre => $datos){


        	$this->info["otro"] = array();
	        $prueba = 0;

	        foreach($datos as $info=>$d){
	        	$prueba+=1;


	            if(($prueba % 2) == 0){
	            	$this->info["otro"][$info] = array();
	            	$this->info["otro"][$info][] = $d;
	            	$this->info["otro"][$info][] = $datos[$info+1];

	            }else{
	            	$this->info["otro"][$info] = array();
	            	$this->info["otro"][$info][] = $d;
	            	$this->info["otro"][$info][] = $datos[$info+1];
	            }
		    
	        }


	        $sum = 0;
	        $cont = 0;

	

		        foreach ($this->info["otro"] as $key => $value) {

		        	$cantidad_en_arreglo = count($this->info["otro"][$key]);
		        	$restar = 0;
		        	if($cantidad_en_arreglo != 1){
		        		$cont+=1;
			        	foreach ($value as $id=>$data) {

			        		if($value[$id]>1)
			        			$restar = $data["ritmo_cardiaco"] - $restar;
			        		else
			        			$restar = 0;
			        	}

			        	//echo $nombre."=>".$restar."<br>";
		        		$sum+=abs($restar);
		        	}
		        }


		    $name = str_replace(' ', '', $nombre);
			$this->datos["rhv".trim(strtolower($name))] = round($sum/$cont,2);

	    }

	}


	protected function agregar_informacion($fecha,$nombre,$calorias,$pasos,$ritmo_cardiaco,$tiempo){

		$nombre_id = trim(str_replace(' ', '', $nombre));
		
		$datos = array("dia"=>$fecha,
					   "nombre"=>$nombre,
					   "nombre_id"=>$nombre_id,
					   "calorias"=>$calorias,
					   "pasos"=>$pasos,
					   "ritmo_cardiaco"=>$ritmo_cardiaco,
					   "tiempo"=>$tiempo
					   );

		array_push($this->datos[$fecha], $datos);

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