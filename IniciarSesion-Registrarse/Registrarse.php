<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="estilos/EstiloFormulario.css">
    <script src="ocultar-mostrarContra.php"></script>
    <script>
    function mostrarValidarRolAdmin(){
        const select = document.getElementById("Rol");
        const codigo = document.getElementById("Codigo");
        if (select.value == "1000") {
            codigo.type = 'password';
            codigo.disabled = false;
        } else {
            codigo.type = 'hidden';
            codigo.disabled = true;
        }
    }
</script>
    <title>Document</title>
</head>
<body>
<script src="../code/actualiza.js"></script>
<?php include "Mensajes.php";?>
<div class="index"  id="Iniciar-sesion">
<form name="Registrar" id="Registrar" action="Registrar.php" method="post" enctype="multipart/form-data">
    <h1>Reporte de Empleados</h1>
    <p>Campos con * son obligatorios</p>    
    Identificacion: *<br><input type="text" name="Id" value="<?php if(isset($_SESSION['id'])){echo $_SESSION['id']; unset($_SESSION['id']);}?>" size="20" maxlength="30"><br><br>
    Nombre: *<br><input type="text" name="Nombre" value="<?php if(isset($_SESSION['nombre'])){echo $_SESSION['nombre'];unset($_SESSION['nombre']);}?>" size="20" maxlength="30"><br><br>
    Rol: *<br><select id="roles" name="Rol" id="Rol" onchange="mostrarValidarRolAdmin();" class="<?php if(isset($_SESSION['rol'])){echo $_SESSION['rol'];    unset($_SESSION['rol']);}?>">
                <option value="">Seleccione</option>
                <?php
                    require_once "../Uso_multiple/MostrarRoles.php";
                    $lista_roles = showRols();
                    printf($lista_roles);
                ?>
            </select><br><br>
    <input type="hidden" name="Codigo" id="Codigo" placeholder="Codigo Administrador: "><br><br>
    Edad: <br><input type="text" name="Edad" value="<?php if(isset($_SESSION['edad'])){echo $_SESSION['edad'];    unset($_SESSION['edad']);}?>" size="20" maxlength="30"><br><br>
    Correo: *<br><input type="text" name="Correo" value="<?php if(isset($_SESSION['correo'])){echo $_SESSION['correo'];    unset($_SESSION['correo']);}?>" size="20" maxlength="30"><br><br>
    <a onclick="ocultarContra()" id="Ver"><i class="fas fa-eye"></i></a>
    <a onclick="ocultarContra()" id="Ocultar"><i class="fas fa-eye-slash"></i></a>
    Contraseña: *<br><input type="password" name="Contraseña" value="<?php if(isset($_SESSION['contrasena'])){echo $_SESSION['contrasena'];    unset($_SESSION['contrasena']);}?>" id="Contra" size="20" maxlength="30"><br><br>
    Confirmar Contraseña: *<br><input type="password" name="ConfirmarContraseña" value="<?php if(isset($_SESSION['confirmar_contrasena'])){echo $_SESSION['confirmar_contrasena'];    unset($_SESSION['confirmar_contrasena']);}?>" id="ConfirmarContraseña" size="20" maxlength="30"><br><br>
    Telefono:<br><input type="text" name="Telefono" value="<?php if(isset($_SESSION['telefono'])){echo $_SESSION['telefono'];     unset($_SESSION['telefono']);}?>" size="20" maxlength="30"><br><br>
    Imagen de perfil:<br><input type="file" name="Img_perfil" value="<?php if(isset($_SESSION['Img_perfil'])){echo $_SESSION['Img_perfil'];    unset($_SESSION['Img_perfil']);}?>" id="Img_perfil"><br><br>
    <input type="submit" name="registrar" id="boton_registrar" value="Registrarse"><br><br>
    O tambien puedes <a href="IniciaSesion.php">Iniciar sesion</a>
</form>
</div>
<hr>
</body>
</html>
