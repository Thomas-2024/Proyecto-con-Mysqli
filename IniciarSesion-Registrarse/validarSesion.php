<?php
        session_start();
        include_once '../Uso_multiple/Conexion.php';
        $Miconexion = MiConexion();
        $Correo = $_POST['Correo'];
        $Contraseña = $_POST['Contra'];

        if (isset($_SESSION['usuario']) && isset($_SESSION['Img_perfil']) && isset($_SESSION['Rol'])) {
            unset($_SESSION['usuario']); //Ya hay una sesion iniciada
            unset($_SESSION['Img_perfil']);// Ya hay una sesion iniciada
            unset($_SESSION['Rol']); //Ya hay una sesion iniciada
        }

        if (isset($_SESSION['mostrar'])){
            unset($_SESSION['mostrar']);
        }
        // Validar que el correo y contraseña no estén vacíos
        if (empty($Correo) || empty($Contraseña)) {
            header("Location: IniciaSesion.php");
            $_SESSION['mensaje'] = '4'; //campos vacios
            exit();
        }
        // Validar que el correo sea válido
        if (!filter_var($Correo, FILTER_VALIDATE_EMAIL)) {
            header("Location: IniciaSesion.php");
            $_SESSION['mensaje'] = '5'; //Correo invalido
            exit();
        }
        $sql = "SELECT * FROM empleados INNER JOIN rol ON empleados.id_rol = rol.id_rol WHERE Correo = '".$Correo."'";
        $matriz = mysqli_query($Miconexion, $sql);

        if(isset($_SESSION['visualizarPersonal'])){
            unset($_SESSION['visualizarPersonal']);
        }
        
        if (mysqli_num_rows($matriz) > 0) {
            while($usuario = mysqli_fetch_assoc($matriz)){
                if ($usuario['id_rol'] === '1000'){
                    $_SESSION['visualizarPersonal'] = true;
                }

                if ($usuario['Contrasena'] === $Contraseña){
                    $_SESSION['usuario'] = $usuario['Nombre'];
                    $_SESSION['Img_perfil'] = $usuario['Imagen_perfil'];
                    $_SESSION['Rol'] = $usuario['rol_nombre'];
                    $_SESSION['mensaje'] = '1'; //Inicio sesion correctamente
                    header("Location: IniciaSesion.php");
                }
                else {
                    $_SESSION['mensaje'] = '2'; //Contraseña incorrecta
                    header("Location: IniciaSesion.php");
                }
            }
        } else {
            header("Location: IniciaSesion.php");
            $_SESSION['mensaje'] = '3'; //Correo no registrado
            $_SESSION['CorreoError'] = $Correo;
        }
    exit();
?>