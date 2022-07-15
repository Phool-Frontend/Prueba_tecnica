<?php 

    require "../config/Conexion.php";

    Class Pedido
    {

        public function insertar($detalle_pedido,$total,$idproducto_pe){
            $sql = "INSERT INTO pedido (estado,fecha_pago,detalle_pedido,total,idproducto_pe) 
            VALUES('0',CURRENT_TIMESTAMP,'$detalle_pedido','$total','$idproducto_pe')";
            echo $sql;
            return ejecutarConsulta($sql);
        }

        public function editar($idpedido,$detalle_pedido,$total,$idproducto_pe){
            $sql = "UPDATE pedido SET fecha_pago=CURRENT_TIMESTAMP,detalle_pedido='$detalle_pedido',total='$total',idproducto_pe='$idproducto_pe'
            WHERE idpedido='$idpedido'";
            // echo $sql;
            return ejecutarConsulta($sql);
        }

        public function mostrar($idpedido){
            $sql = "SELECT pe.idpedido,p.idproducto,cl.idcliente,ppe.idproducto_pe,pe.detalle_pedido,ppe.cantidad,p.precio_unitario,pe.total,pe.estado,pe.fecha_pago,a.idasesor FROM producto_pe ppe 
            INNER JOIN asesor a 
            ON a.idasesor = ppe.idasesor 
            
            INNER JOIN producto p 
            ON p.idproducto = ppe.idproducto 
            
            INNER JOIN pedido pe 
            ON pe.idproducto_pe = ppe.idproducto_pe
            
            INNER JOIN cliente cl 
            ON cl.idcliente = ppe.idcliente

            WHERE pe.idpedido='$idpedido'";
            // echo $sql;
            return ejecutarConsultaSimpleFila($sql);
        }

        public function listar(){
            $sql = "SELECT pe.idpedido,p.nombre,ppe.cantidad,p.precio_unitario,pe.total,pe.detalle_pedido,pe.estado,pe.fecha_pago,a.nombre as asesor FROM producto_pe ppe 
            INNER JOIN asesor a 
            ON a.idasesor = ppe.idasesor 
            
            INNER JOIN producto p 
            ON p.idproducto = ppe.idproducto 
            
            INNER JOIN pedido pe 
            ON pe.idproducto_pe = ppe.idproducto_pe";
            return ejecutarConsulta($sql);

            //asesor
            //campos de pedido
        }

        public function eliminar($idpedido){
            $sql = "DELETE FROM pedido WHERE idpedido='$idpedido'";
            // echo $sql;
            return ejecutarConsulta($sql);
        }

        public function activar($idpedido){
            $sql = "UPDATE pedido SET estado='1' WHERE idpedido='$idpedido'";
            // echo $sql;
            return ejecutarConsulta($sql);
        }

        public function desactivar($idpedido){
            $sql = "UPDATE pedido SET estado='0' WHERE idpedido='$idpedido'";
            // echo $sql;
            return ejecutarConsulta($sql);
        }
        
        public function total_pedido_x_cliente($idcliente){
            $sql = "SELECT COUNT(*) as total_pedido_x_cliente FROM producto_pe WHERE idcliente='$idcliente'";
            // echo $sql;
            return ejecutar_objeto($sql);
        }
        
  
        

        
    }


// Alumno::insertar('Quito','Mendoza','Savedra','quito@hotmail.com','962521637');
// Alumno::insertar('Carlos','Soto','Tucto','carloncho_chacra@gmail.com','900521637');
// Alumno::insertar('Herbert','Rojas','Chavez','tienda@rojas.com','98011637');
// Alumno::editar(3,'Wuakanda','Forever','Tachala','pantera@gmail.com','990520206');
// Alumno::mostrar(2);

?>