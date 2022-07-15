<?php 
        require "../controlador/Asesor.php";
        $ctr_asesor = new Controlador_Asesor();

  
        $idasesor = isset($_POST['idasesor'])? limpiarCadena($_POST['idasesor']):"";
        $nombre = isset($_POST['nombre'])? limpiarCadena($_POST['nombre']):"";
        $codigo = isset($_POST['codigo'])? limpiarCadena($_POST['codigo']):"";


        switch ($_GET["op"]) {

            case 'listar':
                $rspta = $ctr_asesor->ctr_asesor_listar();
                echo json_encode($rspta);
            break;

            case 'guardaryeditar':
                $rspta = $ctr_asesor->ctr_asesor_guardaryeditar($idasesor,$nombre,$codigo);
                echo $rspta;
            break;

            case 'mostrar':
                $rspta = $ctr_asesor->ctr_asesor_mostrar($idasesor);
                echo json_encode($rspta);
            break;

            case 'eliminar':
                $rspta = $ctr_asesor->ctr_asesor_eliminar($idasesor);
                echo $rspta ? "true":"false";
            break;

            case 'selectAsesor_todos':
                $rspta = $ctr_asesor->ctr_asesor_selectAsesor_todos();
                echo $rspta;
            break; 

            case 'total_cliente_x_asesor':
                $rspta = $ctr_asesor->ctr_asesor_total_cliente_x_asesor($idasesor);
                echo $rspta;
            break;

            case 'insertar_datos_mysql':
                $rspta = $ctr_asesor->ctr_asesor_insertar_datos_mysql();
                echo $rspta;
            break;
            
        }

?>