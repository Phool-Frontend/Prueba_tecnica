<?php 

    require "../config/Conexion.php";

    Class Producto
    {

        public function insertar($nombre,$tipo,$cantidad,$precio_unitario){
            $sql = "INSERT INTO producto (nombre,tipo,cantidad,precio_unitario) 
            VALUES('$nombre','$tipo','$cantidad','$precio_unitario')";
            // echo $sql;
            return ejecutarConsulta($sql);
        }

        public function editar($idproducto,$nombre,$tipo,$cantidad,$precio_unitario){
            $sql = "UPDATE producto SET nombre='$nombre',tipo='$tipo',cantidad='$cantidad',precio_unitario='$precio_unitario'
            WHERE idproducto='$idproducto'";
            // echo $sql;
            return ejecutarConsulta($sql);
        }

        public function mostrar($idproducto){
            $sql = "SELECT * FROM producto WHERE idproducto='$idproducto'";
            // echo $sql;
            return ejecutarConsultaSimpleFila($sql);
        }

        public function listar(){
            $sql = "SELECT * FROM producto";
            return ejecutarConsulta($sql);
        }

        public function eliminar($idproducto){
            $sql = "DELETE FROM producto WHERE idproducto='$idproducto'";
            // echo $sql;
            return ejecutarConsulta($sql);
        }
        
        public function selectProducto_todos(){
            $sql = "SELECT idproducto,nombre,precio_unitario FROM producto";
            return ejecutarConsulta($sql);
        }

        
    }


// Alumno::insertar('Quito','Mendoza','Savedra','quito@hotmail.com','962521637');
// Alumno::insertar('Carlos','Soto','Tucto','carloncho_chacra@gmail.com','900521637');
// Alumno::insertar('Herbert','Rojas','Chavez','tienda@rojas.com','98011637');
// Alumno::editar(3,'Wuakanda','Forever','Tachala','pantera@gmail.com','990520206');
// Alumno::mostrar(2);

?>