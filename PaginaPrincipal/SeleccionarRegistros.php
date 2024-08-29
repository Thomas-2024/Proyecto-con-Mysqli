<?php
function MatrizRegistros(){
   include_once "../Uso_multiple/Conexion.php";
   $Mienlace = MiConexion();
   $sentencia_select = "SELECT E.id_empleado, R.rol_nombre, R.id_rol, E.Nombre, E.Edad, E.Correo, E.Contrasena, E.Telefono, E.Imagen_perfil FROM empleados E INNER JOIN rol R ON E.id_rol = R.id_rol WHERE NOT E.id_rol = '1000'";
   $result = mysqli_query($Mienlace, $sentencia_select);

   if(isset($_POST['boton_consultar'])){
      $buscar_text = $_POST['buscar'];
      $select_buscar="SELECT E.id_empleado, R.rol_nombre, R.id_rol, E.Nombre, E.Edad, E.Correo, E.Contrasena, E.Telefono, E.Imagen_perfil FROM empleados E INNER JOIN rol R ON E.id_rol = R.id_rol WHERE NOT E.id_rol = '1000' AND (id_empleado = '".$buscar_text."' OR Nombre LIKE '%".$buscar_text."%')";
      $result = mysqli_query($Mienlace, $select_buscar);
   }
   include "MostrarRegistros.php";
   return $tablaRegistros;
}

$result = MatrizRegistros();
echo $result;
?>