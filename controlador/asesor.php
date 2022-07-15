<?php

require "../modelos/Asesor.php";
require "../modelos/Cliente.php";


class Controlador_Asesor{

	public function ctr_asesor_listar(){
		$asesor = new Asesor();
		$rspta = $asesor->listar();
		$data = Array();
		while ($reg=$rspta->fetch_object()) {
			$data[] = array(
				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idasesor.')"><i class="fa fa-pencil"></i></button> 
				<button class="btn btn-danger" onclick="eliminar('.$reg->idasesor.')"><i class="fa fa-trash"></i></button>',
				"1"=>$reg->nombre,
				"2"=>$reg->codigo
			   );
			}
		$results = array(
			"sEcho"=>1,//Informacion para el datables
			"iTotalRecords" => count($data),//enviamos el total registros al datable
			"iTotalDisplayRecords" =>count($data),//Enviamos el total registros a visualizar
			"aaData" => $data
		);
		return $results;
	}

	public function ctr_asesor_guardaryeditar($idasesor,$nombre,$codigo){
		$asesor = new Asesor();
		if(empty($idasesor)){
			$rspta = $asesor->insertar($nombre,$codigo);
			return $rspta ? "Asesor registrado":"Asesor no se pudo registrar";
		}
		else{
			$rspta = $asesor->editar($idasesor,$nombre,$codigo);
			return $rspta ? "Asesor actualizado":"Asesor no se pudo actualizar";
		}
	}

	public function ctr_asesor_mostrar($idasesor){
		$asesor = new Asesor();
		$rspta = $asesor->mostrar($idasesor);
		return $rspta;
	}

	public function ctr_asesor_eliminar($idasesor){
		$asesor = new Asesor();
		$rspta = $asesor->eliminar($idasesor);
		return $rspta;
	}

	public function ctr_asesor_selectAsesor_todos(){
		$asesor = new Asesor();
		$rspta = $asesor->listar();
		$asesores_array = [];
		while ($reg = $rspta->fetch_object()) {
                   echo '<option value='.$reg->idasesor.'>'
                        .$reg->nombre.'
                    </option>';
        }
	}	

	public function ctr_asesor_total_cliente_x_asesor($idasesor){
		$cliente = new Cliente();
		$rspta = $cliente->total_cliente_x_asesor($idasesor);
		return $rspta->total_clientes_x_asesor;
	}

	public function ctr_asesor_insertar_datos_mysql(){
		$asesor = new Asesor();
		$rspta = $asesor->insertar_datos_mysql();
		return $rspta;
	}
	

}


?>
 