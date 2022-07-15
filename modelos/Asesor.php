<?php 

    require "../config/Conexion.php";

    Class Asesor
    {

        public function insertar($nombre,$codigo){
            $sql = "INSERT INTO asesor (nombre,codigo) 
            VALUES('$nombre','$codigo')";
            // echo $sql;
            return ejecutarConsulta($sql);
        }

        public function editar($idasesor,$nombre,$codigo){
            $sql = "UPDATE asesor SET nombre='$nombre',codigo='$codigo'
            WHERE idasesor='$idasesor'";
            // echo $sql;
            return ejecutarConsulta($sql);
        }

        public function mostrar($idasesor){
            $sql = "SELECT * FROM asesor WHERE idasesor='$idasesor'";
            // echo $sql;
            return ejecutarConsultaSimpleFila($sql);
        }

        public function listar(){
            $sql = "SELECT * FROM asesor";
            return ejecutarConsulta($sql);
        }


        public function eliminar($idasesor){
            $sql = "DELETE FROM asesor WHERE idasesor='$idasesor'";
            // echo $sql;
            return ejecutarConsulta($sql);
        }

        public function insertar_datos_mysql(){
            $sql = "SELECT * FROM asesor";
            echo $sql;
            return ejecutarConsulta($sql);
        }

        

        
    }


// Alumno::insertar('Quito','Mendoza','Savedra','quito@hotmail.com','962521637');
// Alumno::insertar('Carlos','Soto','Tucto','carloncho_chacra@gmail.com','900521637');
// Alumno::insertar('Herbert','Rojas','Chavez','tienda@rojas.com','98011637');
// Alumno::editar(3,'Wuakanda','Forever','Tachala','pantera@gmail.com','990520206');
// Alumno::mostrar(2);

?>