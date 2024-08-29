<?php
    function showRols() {
        $lista_roles = "";
        include_once "Conexion.php";
        $Mienlace=MiConexion();
        $roles = "SELECT * FROM rol";
        $matriz = mysqli_query($Mienlace, $roles);

        while ($filaRol = mysqli_fetch_assoc($matriz)) {
            $lista_roles .= "<option value='".$filaRol["id_rol"]."'>".$filaRol["rol_nombre"]."</option>";
        }
        return $lista_roles;
    }
?>