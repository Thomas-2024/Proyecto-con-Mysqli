<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
    
</head>
<body>
<script src="../code/actualiza.js"></script>
<script>
    if(<?php echo $_GET['confirmar']?>){
        Swal.fire({
                    title: "Se actualizo correctamente",
                    text: "¿Deseas volver al menu principal?",
                    icon: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si",
                    cancelButtonText: "No",
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "PaginaPrincipal.php";
                } else {
                    Swal.fire({
                        title: "Mira a ver si tienes que modificar otra cosa",
                        text: "",
                        icon: "info"
                    }).then(function (response){
                        if (response.isConfirmed) {
                            window.location.href = "ActualizarRegistros.php?id_empleado="+<?php echo "'".$_GET['id_empleado']."'"?>;
                        } 
                    });
                    }
                });
    }
</script>
<?php
    include_once '../Uso_multiple/Conexion.php';
    $Mienlace=MiConexion();
    $id_modificar = $_GET['id_empleado'];
    $sentencia_select_modificar='SELECT E.id_empleado, R.rol_nombre, R.id_rol, E.Nombre, E.Edad, E.Correo, E.Contrasena, E.Telefono, E.Imagen_perfil FROM empleados E INNER JOIN rol R ON E.id_rol = R.id_rol WHERE id_empleado='.$id_modificar.';';
    $matriz2 = mysqli_query($Mienlace, $sentencia_select_modificar);

    require_once "../Uso_multiple/MostrarRoles.php";
    $lista_roles = showRols();

    while ($fila = mysqli_fetch_assoc($matriz2)) {
    ?>
        <form method="post" action='' enctype="multipart/form-data" name='registro<?php echo $fila['id_empleado']?>' class="formulario">
            Identificacion: <input type="text" name='Id' id="Id" value='<?php echo $fila['id_empleado']?>'>
            Nombre: <input type='text' name='Nombre' value='<?php echo $fila['Nombre']?>'>
            <input type='text' name='oldRol' value='<?php echo $fila['rol_nombre']?>' disabled style='display: none'>
            Rol: <select name='Rol' id="Rol" class='<?php echo $fila['id_rol']?>'><?php printf($lista_roles) ?></select>
            Edad: <input type='text' name='Edad' value='<?php echo $fila['Edad']?>'>
            Correo: <input type='text' name='Correo' value='<?php echo $fila['Correo']?>'>
            Contraseña: <input type='password' name='Contraseña' value='<?php echo $fila['Contrasena']?>'>
            <button type="button" onclick="mostrarContrasena()">Mostrar Contraseña</button>
            Telefono: <input type='text' name='Telefono' value='<?php echo $fila['Telefono']?>'>
            Imagen de perfil: <img src="<?php echo $fila['Imagen_perfil']?>" width='100px'>
            <input type='file' name='Img_perfil'>
            <input type='text' name='Img_perfilOld' value='<?php echo $fila['Imagen_perfil']?>' style='display: none;'>
            <input type="submit" name="modificar" value="Modificar">
        </form>
        <script src="code/contraseña.js"></script>
    <?php
    }
    if (isset($_POST['modificar'])){
        include "../Uso_multiple/CapturarDatos.php";
        $sentencia_update ="UPDATE empleados SET id_rol='".$Rol."', Nombre='".$Nombre."', Edad=".$Edad.", Correo='".$Correo."', Contrasena='".$Contraseña."', Telefono='".$Telefono."', Imagen_perfil='".$dir_img_perfil."' WHERE id_empleado='".$Id."'";
        mysqli_query($Mienlace, $sentencia_update);
        ?>
        <script>
            window.location.href = "ActualizarRegistros.php?id_empleado="+<?php echo "'".$_POST['Id']."'"?>+"&confirmar=true";
        </script>
        <?php
    }
?>
</body>
</html>
