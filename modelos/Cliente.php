<?php 

    require "../config/Conexion.php";

    Class Cliente
    { 

        public function total_cliente_x_asesor($idasesor){
            $sql = "SELECT COUNT(*) as total_clientes_x_asesor FROM cliente WHERE idasesor = '$idasesor'";
            // echo $sql;
            return ejecutar_objeto($sql);
        }

        public function insertar($nombres,$apellidos,$correo,$idasesor){
            $sql = "INSERT INTO cliente (nombres,apellidos,correo,idasesor) 
            VALUES('$nombres','$apellidos','$correo','$idasesor')";
            // echo $sql;
            return ejecutarConsulta($sql);
        }

        public function editar($idcliente,$nombres,$apellidos,$correo,$idasesor){
            $sql = "UPDATE cliente SET nombres='$nombres',apellidos='$apellidos',correo='$correo',idasesor='$idasesor' 
            WHERE idcliente='$idcliente'";
            // echo $sql;
            return ejecutarConsulta($sql);
        }

        public function mostrar($idcliente){
            $sql = "SELECT * FROM cliente WHERE idcliente='$idcliente'";
            // echo $sql;
            return ejecutarConsultaSimpleFila($sql);
        }

        public function listar(){
            $sql = "SELECT c.idcliente,c.nombres,c.apellidos,c.correo,a.nombre as asesor FROM cliente c 
            INNER JOIN asesor a 
            ON a.idasesor = c.idasesor ";
            return ejecutarConsulta($sql);
        }


        public function eliminar($idcliente){
            $sql = "DELETE FROM cliente WHERE idcliente='$idcliente'";
            // echo $sql;
            return ejecutarConsulta($sql);
        }

        public function selectCliente_todos(){
            $sql = "SELECT idcliente,idasesor,CONCAT(nombres,' ',apellidos) as clientes FROM cliente";
            return ejecutarConsulta($sql);
        }

        

        
    }




?>

