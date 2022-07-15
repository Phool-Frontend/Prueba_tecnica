<?php

require "../modelos/Producto.php";



class Controlador_Producto{

	public function ctr_producto_listar(){
		$producto = new Producto();
		$rspta = $producto->listar();
		$data = Array();
		while ($reg=$rspta->fetch_object()) {
			$data[] = array(
				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idproducto.')"><i class="fa fa-pencil"></i></button> 
				<button class="btn btn-danger" onclick="eliminar('.$reg->idproducto.')"><i class="fa fa-trash"></i></button>',
				"1"=>$reg->nombre,
				"2"=>$reg->tipo,
				"3"=>$reg->cantidad,
				"4"=>$reg->precio_unitario
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

	public function ctr_producto_guardaryeditar($idproducto,$nombre,$tipo,$cantidad,$precio_unitario){
		$producto = new Producto();
		if(empty($idproducto)){
			$rspta = $producto->insertar($nombre,$tipo,$cantidad,$precio_unitario);
			return $rspta ? "Producto registrado":"Producto no se pudo registrar";
		}
		else{
			$rspta = $producto->editar($idproducto,$nombre,$tipo,$cantidad,$precio_unitario);
			return $rspta ? "Producto actualizado":"Producto no se pudo actualizar";
		}
	}

	public function ctr_producto_mostrar($idproducto){
		$producto = new Producto();
		$rspta = $producto->mostrar($idproducto);
		return $rspta;
	}

	public function ctr_producto_eliminar($idproducto){
		$producto = new Producto();
		$rspta = $producto->eliminar($idproducto);
		return $rspta;
	}

	public function ctr_producto_selectProducto_todos(){
		$producto = new Producto();
		$rspta = $producto->selectProducto_todos();
		while ($reg = $rspta->fetch_object()) {
                   echo '<option value='.$reg->idproducto.' data-precio_unitario='.$reg->precio_unitario.'>'
                        .$reg->nombre.'
                    </option>';
        }
	}	

	// public function ctr_producto_total_cliente_x_asesor($idproducto){
	// 	$cliente = new Cliente();
	// 	$rspta = $cliente->total_cliente_x_asesor($idproducto);
	// 	return $rspta->total_clientes_x_asesor;
	// }

}


?>
 