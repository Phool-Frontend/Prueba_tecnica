<?php

require "../modelos/Asesor.php";
require "../modelos/Cliente.php";


class Controlador_Cliente{

	public function ctr_cliente_listar(){
		$cliente = new Cliente();
		$rspta = $cliente->listar();
		$data = Array();
		while ($reg=$rspta->fetch_object()) {
			$data[] = array(
				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idcliente.')"><i class="fa fa-pencil"></i></button> 
				<button class="btn btn-danger" onclick="eliminar('.$reg->idcliente.')"><i class="fa fa-trash"></i></button>',
				"1"=>$reg->nombres,
				"2"=>$reg->apellidos,
				"3"=>$reg->correo,
				"4"=>$reg->asesor
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

	public function ctr_cliente_guardaryeditar($idcliente,$nombres,$apellidos,$correo,$idasesor){
		$cliente = new Cliente();
		if(empty($idcliente)){
			$rspta = $cliente->insertar($nombres,$apellidos,$correo,$idasesor);
			echo $rspta ? "Cliente registrado":"Cliente no se pudo registrar";
		}
		else{
			$rspta = $cliente->editar($idcliente,$nombres,$apellidos,$correo,$idasesor);
			echo $rspta ? "Cliente actualizado":"Cliente no se pudo actualizar";
		}
	}

	public function ctr_cliente_mostrar($idcliente){
		$cliente = new Cliente();
		$rspta = $cliente->mostrar($idcliente);
		return $rspta;
	}

	public function ctr_cliente_eliminar($idcliente){
		$cliente = new Cliente();
		$rspta = $cliente->eliminar($idcliente);
		return $rspta;
	}

	public function ctr_cliente_selectCliente_todos(){
		$cliente = new Cliente();
		$rspta = $cliente->selectCliente_todos();
		while ($reg = $rspta->fetch_object()) {
                   echo '<option value='.$reg->idcliente.' data-idasesor='.$reg->idasesor.' 	>'
                        .$reg->clientes.'
                    </option>';
        }
	}	

	// public function ctr_cliente_total_cliente_x_asesor($idcliente){
	// 	$cliente = new Cliente();
	// 	$rspta = $cliente->total_cliente_x_asesor($idcliente);
	// 	return $rspta->total_clientes_x_asesor;
	// }

}


?>
 