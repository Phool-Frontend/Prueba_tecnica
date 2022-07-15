<?php 
        require "../controlador/Cliente.php";
        $ctr_cliente = new Controlador_Cliente();

  
        $idcliente = isset($_POST['idcliente'])? limpiarCadena($_POST['idcliente']):"";
        $idasesor = isset($_POST['idasesor'])? limpiarCadena($_POST['idasesor']):"";
        $nombres = isset($_POST['nombres'])? limpiarCadena($_POST['nombres']):"";
        $apellidos = isset($_POST['apellidos'])? limpiarCadena($_POST['apellidos']):"";
        $correo = isset($_POST['correo'])? limpiarCadena($_POST['correo']):"";
        


        switch ($_GET["op"]) {

            case 'listar':
                $rspta = $ctr_cliente->ctr_cliente_listar();
                echo json_encode($rspta);
            break;

            case 'guardaryeditar':
                $rspta = $ctr_cliente->ctr_cliente_guardaryeditar($idcliente,$nombres,$apellidos,$correo,$idasesor);
                echo $rspta;
            break;

            case 'mostrar':
                $rspta = $ctr_cliente->ctr_cliente_mostrar($idcliente);
                echo json_encode($rspta);
            break;

            case 'eliminar':
                $rspta = $ctr_cliente->ctr_cliente_eliminar($idcliente);
                echo $rspta ? "true":"false";
            break;

            case 'selectCliente_todos':
                $rspta = $ctr_cliente->ctr_cliente_selectCliente_todos();
                echo $rspta;
            break; 

       
            
        }

?>