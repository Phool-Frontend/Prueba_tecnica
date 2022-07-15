<?php 
        require "../controlador/Producto.php";
        $ctr_producto = new Controlador_Producto();

  
        $idproducto = isset($_POST['idproducto'])? limpiarCadena($_POST['idproducto']):"";
        $nombre = isset($_POST['nombre'])? limpiarCadena($_POST['nombre']):"";
        $tipo = isset($_POST['tipo'])? limpiarCadena($_POST['tipo']):"";
        $cantidad = isset($_POST['cantidad'])? limpiarCadena($_POST['cantidad']):"";
        $precio_unitario = isset($_POST['precio_unitario'])? limpiarCadena($_POST['precio_unitario']):"";

        switch ($_GET["op"]) {

            case 'listar':
                $rspta = $ctr_producto->ctr_producto_listar();
                echo json_encode($rspta);
            break;

            case 'guardaryeditar':
                $rspta = $ctr_producto->ctr_producto_guardaryeditar($idproducto,$nombre,$tipo,$cantidad,$precio_unitario);
                echo $rspta;
            break;

            case 'mostrar':
                $rspta = $ctr_producto->ctr_producto_mostrar($idproducto);
                echo json_encode($rspta);
            break;

            case 'eliminar':
                $rspta = $ctr_producto->ctr_producto_eliminar($idproducto);
                echo $rspta ? "true":"false";
            break;

            case 'selectProducto_todos':
                $rspta = $ctr_producto->ctr_producto_selectProducto_todos();
                echo $rspta;
            break;
            
            // case 'selectAsesor_todos':
            //     $rspta = $ctr_producto->ctr_producto_selectAsesor_todos();
            //     echo $rspta;
            // break; 

            // case 'total_cliente_x_asesor':
            //     $rspta = $ctr_producto->ctr_producto_total_cliente_x_asesor($idproducto);
            //     echo $rspta;
            // break;
            
        }

?>