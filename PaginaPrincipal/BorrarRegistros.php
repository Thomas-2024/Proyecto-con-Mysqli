<?php
    include_once "../Uso_multiple/Conexion.php";
    $Mienlace=MiConexion();

    $sentencia_delete ="DELETE FROM empleados WHERE id_empleado='".$_GET['id_empleado']."'";
    mysqli_query($Mienlace, $sentencia_delete);

    include "EliminarImagen.php";
    eliminarImagen($dir_img_perfil);
    header("Location: PaginaPrincipal.php");
    echo "se elimino la imagen del: ".$dir_img_perfil;
?>