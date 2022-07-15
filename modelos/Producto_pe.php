<?php 

    require "../config/Conexion.php";

    Class Producto_pe
    {

        public function insertar($cantidad,$idproducto,$idcliente){
            $sql = "INSERT INTO producto_pe (cantidad,idproducto,idcliente) 
            VALUES('$cantidad','$idproducto','$idcliente')";
            // echo $sql;
            return ejecutarConsulta($sql);
        }

        public function editar($idproducto_pe,$cantidad,$idproducto,$idcliente){
            $sql = "UPDATE producto_pe SET cantidad='$cantidad',idproducto='$idproducto',idcliente='$idcliente'
            WHERE idproducto_pe='$idproducto_pe'";
            // echo $sql;
            return ejecutarConsulta($sql);
        }

        // public function mostrar($idproducto_pe){
        //     $sql = "SELECT * FROM producto_pe WHERE idproducto_pe='$idproducto_pe'";
        //     // echo $sql;
        //     return ejecutarConsultaSimpleFila($sql);
        // }

        // public function listar(){
        //     $sql = "SELECT * FROM producto_pe";
        //     return ejecutarConsulta($sql);
        // }


        // public function eliminar($idproducto_pe){
        //     $sql = "DELETE FROM producto_pe WHERE idproducto_pe='$idproducto_pe'";
        //     // echo $sql;
        //     return ejecutarConsulta($sql);
        // }
        
    }


?>