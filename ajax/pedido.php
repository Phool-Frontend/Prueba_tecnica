<?php 
        require "../controlador/Pedido.php";
        $ctr_pedido = new Controlador_Pedido();

  
        $idpedido = isset($_POST['idpedido'])? limpiarCadena($_POST['idpedido']):"";
        $idproducto_pe = isset($_POST['idproducto_pe'])? limpiarCadena($_POST['idproducto_pe']):"";
        $idasesor = isset($_POST['idasesor'])? limpiarCadena($_POST['idasesor']):"";
        $idproducto = isset($_POST['idproducto'])? limpiarCadena($_POST['idproducto']):"";
        $idcliente = isset($_POST['idcliente'])? limpiarCadena($_POST['idcliente']):"";
        $cantidad = isset($_POST['cantidad'])? limpiarCadena($_POST['cantidad']):"";
        $detalle_pedido = isset($_POST['detalle_pedido'])? limpiarCadena($_POST['detalle_pedido']):"";
        $total = isset($_POST['total'])? limpiarCadena($_POST['total']):"";


        switch ($_GET["op"]) {

            case 'listar':
                $rspta = $ctr_pedido->ctr_pedido_listar();
                echo json_encode($rspta);
            break;

            case 'guardaryeditar':
                // var_dump($_REQUEST);
                $rspta = $ctr_pedido->ctr_pedido_guardaryeditar($idpedido,$idasesor,$idproducto_pe,$cantidad,$idproducto,$idcliente,$detalle_pedido,$total);
                echo $rspta;
            break;

            case 'mostrar':
                $rspta = $ctr_pedido->ctr_pedido_mostrar($idpedido);
                echo json_encode($rspta);
            break;

            case 'eliminar':
                $rspta = $ctr_pedido->ctr_pedido_eliminar($idpedido);
                echo $rspta ? "true":"false";
            break;

            case 'activar':
                $rspta = $ctr_pedido->ctr_pedido_activar($idpedido);
                echo $rspta ? "Pedido Pagado":"Pedido no se puede pagar";
            break;

            case 'desactivar':
                $rspta = $ctr_pedido->ctr_pedido_desactivar($idpedido);
                echo $rspta ? "Pedido No Pagado":"Pedido no se puede despagar";
            break;


            case 'total_pedido_x_cliente':
                $rspta = $ctr_pedido->ctr_pedido_total_pedido_x_cliente($idcliente);
                echo $rspta;
            break;
            
        }

?>