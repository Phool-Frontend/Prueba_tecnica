<?php

require "../modelos/Pedido.php";



class Controlador_Pedido{

	public function ctr_pedido_listar(){
		$pedido = new Pedido();
		$rspta = $pedido->listar();
		$data = Array();
		while ($reg=$rspta->fetch_object()) {
			$data[] = array(
				
				"0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idpedido.')"><i class="fa fa-pencil"></i></button> 
				<button class="btn btn-danger" onclick="eliminar('.$reg->idpedido.')"><i class="fa fa-trash"></i></button>
				<button class="btn btn-success" onclick="no_pagar('.$reg->idpedido.')"><i class="fa fa-check"></i></button>':
				'<button class="btn btn-warning" onclick="mostrar('.$reg->idpedido.')"><i class="fa fa-pencil"></i></button> 
				<button class="btn btn-danger" onclick="eliminar('.$reg->idpedido.')"><i class="fa fa-trash"></i></button>
				<button class="btn btn-primary" onclick="pagar('.$reg->idpedido.')"><i class="fa fa-close"></i></button>',
				"1"=>$reg->nombre,
				"2"=>$reg->cantidad,
				"3"=>$reg->precio_unitario,
				"4"=>$reg->total,
				"5"=>$reg->detalle_pedido,
				"6"=>($reg->estado)?'Pagado':'Sin pagar',
				"7"=>$reg->fecha_pago,
				"8"=>$reg->asesor
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

	public function ctr_pedido_guardaryeditar($idpedido,$idasesor,$idproducto_pe,$cantidad,$idproducto,$idcliente,$detalle_pedido,$total){
		$pedido = new Pedido();
		if(empty($idpedido)){

			//Producto_pe
			$sql = "INSERT INTO producto_pe (cantidad,idproducto,idcliente,idasesor)
			VALUES ('$cantidad','$idproducto','$idcliente','$idasesor')";
			$idproducto_pe = ejecutarConsulta_retornarID($sql);
			

			$rspta = $pedido->insertar($detalle_pedido,$total,$idproducto_pe);
			return $rspta ? "Pedido registrado":"Pedido no se pudo registrar";
		}
		else{
			$sql = "UPDATE producto_pe SET cantidad='$cantidad',
			idproducto='$idproducto',idcliente='$idcliente',idasesor='$idasesor' WHERE idproducto_pe='$idproducto_pe' ";
			ejecutarConsulta($sql);
			echo $sql;

			$rspta = $pedido->editar($idpedido,$detalle_pedido,$total,$idproducto_pe);
			return $rspta ? "Pedido actualizado":"Pedido no se pudo actualizar";
		}
	}

	public function ctr_pedido_mostrar($idpedido){
		$pedido = new Pedido();
		$rspta = $pedido->mostrar($idpedido);
		return $rspta;
	}

	public function ctr_pedido_eliminar($idpedido){
		$pedido = new Pedido();
		$rspta = $pedido->eliminar($idpedido);
		return $rspta;
	}

	public function ctr_pedido_activar($idpedido){
		$pedido = new Pedido();
		$rspta = $pedido->activar($idpedido);
		return $rspta;
	}

	public function ctr_pedido_desactivar($idpedido){
		$pedido = new Pedido();
		$rspta = $pedido->desactivar($idpedido);
		return $rspta;
	}

	public function ctr_pedido_total_pedido_x_cliente($idcliente){
		$pedido = new Pedido();
		$rspta = $pedido->total_pedido_x_cliente($idcliente);
		return $rspta->total_pedido_x_cliente;
	}

	
}


?>
 