<?php
    function MiConexion(){
        $database="iua";
        $user='root';
        $password='';
        $conexion=mysqli_connect("localhost:3307",$user,$password,$database);

        if($conexion->connect_error){
            die("Error en la conexion: ".$conexion->connect_error);
        }
        return $conexion;
    }
?>
