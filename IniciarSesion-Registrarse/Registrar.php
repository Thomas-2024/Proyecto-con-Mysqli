<?php
    session_start();
    include_once '../Uso_multiple/Conexion.php';
    $Miconexion = MiConexion();
    include "../Uso_multiple/CapturarDatos.php";

    $_SESSION['id'] = $Id;
    $_SESSION['nombre'] = $Nombre;
    $_SESSION['edad'] = $Edad;
    $_SESSION['rol'] = $Rol;
    $_SESSION['correo'] = $Correo;
    $_SESSION['contrasena'] = $Contraseña;
    $_SESSION['confirmar_contrasena'] = $ConfirmarContraseña;
    $_SESSION['telefono'] = $Telefono;
    $_SESSION['Img_perfil'] = $dir_img_perfil;
    // Validar que el nombre y contraseña no estén vacíos
    if (empty($Id) || empty($Nombre) || empty($Rol) || empty($Correo) || empty($Contraseña) || empty($ConfirmarContraseña)) {
        $_SESSION['mensaje'] = '4';  //campos vacios
        header("Location: registrarse.php");
        exit();
    }
    // Validar que el correo sea valido
    if (!filter_var($Correo, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['mensaje'] = '5';  //correo invalido
        header("Location: registrarse.php");
        exit();
    }

    // Validar que las contraseñas coincidan
    if($Contraseña != $ConfirmarContraseña){
        $_SESSION['mensaje'] = '8';  //contraseñas no coinciden
        header("Location: registrarse.php");
        exit();
    }
    //Validar que la id no este repetida
    $sqlId = "SELECT COUNT(*) as cuenta FROM empleados WHERE id_empleado = ".$Id;
    $Lista_ids = mysqli_query($Miconexion,  $sqlId);
    while($resultIds = mysqli_fetch_assoc($Lista_ids)){   
    if($resultIds['cuenta'] > 0){
        $_SESSION['mensaje'] = '6.1';  //id repetido
        $_SESSION['Idrep'] = $Id;
        header("Location: registrarse.php");
        exit();
    }}


    // Validar que el correo no este repetido
    $sqlCorreo = "SELECT COUNT(*) as cuentas FROM empleados WHERE Correo = '".$Correo."'";
    $ListaCorreo = mysqli_query($Miconexion, $sqlCorreo);
    if (mysqli_num_rows($ListaCorreo) > 0) {
        while ($resultCorreos = mysqli_fetch_assoc($ListaCorreo)){
        if ($resultCorreos['cuentas'] > 0) {
            $_SESSION['mensaje'] = '6.2';  //correo repetido
            $_SESSION['CorreoRep'] = $Correo;
            header("Location: registrarse.php");
            exit();
        }
        }
    }

    if (isset($_POST['Codigo']) && $Rol == "1000") {
        $codigo = $_POST['Codigo'];
        if($codigo != "20756"){
            $_SESSION['mensaje'] = '9';
            $validado = false;
            header("Location: registrarse.php");
            exit();
        } else {
            $_SESSION['mensaje'] = '7';
            $validado = true;
            header("Location: registrarse.php");
        }
    }else {
        $_SESSION['mensaje'] = '7';
        $validado = true;
    }


    $Id = mysqli_real_escape_string($Miconexion, $Id);
    $Rol = mysqli_real_escape_string($Miconexion, $Rol);
    $Nombre = mysqli_real_escape_string($Miconexion, $Nombre);
    $Edad = !empty($Edad) ? (int)$Edad : 'NULL'; // Si Edad está vacío, usar NULL
    $Correo = mysqli_real_escape_string($Miconexion, $Correo);
    $Contraseña = mysqli_real_escape_string($Miconexion, $Contraseña);
    $Telefono = !empty($Telefono) ? mysqli_real_escape_string($Miconexion, $Telefono) : 'NULL'; // Si Teléfono está vacío, usar NULL
    $dir_img_perfil = !empty($dir_img_perfil) ? mysqli_real_escape_string($Miconexion, $dir_img_perfil) : 'NULL'; // Si Imagen de perfil está vacío, usar NULL
    
    $registrado = "INSERT INTO empleados VALUES ('".$Id."', '".$Rol."', '".$Nombre."', ".$Edad.", '".$Correo."', '".$Contraseña."', '".$Telefono."', '".$dir_img_perfil."')";
    if (mysqli_query($Miconexion, $registrado)) {
        echo "Se registro el usuario de manera exitosa<br>";
    } else {
        echo "Error: " . $registrado . "<br>" . mysqli_error($Miconexion);
        exit;
    }

    //destruir las sesiones con el valor de los datos del formulario con unset
    if($validado == true){
        unset($_SESSION['id']);
        unset($_SESSION['nombre']);
        unset($_SESSION['edad']);
        unset($_SESSION['rol']);
        unset($_SESSION['correo']);
        unset($_SESSION['contrasena']);
        unset($_SESSION['confirmar_contrasena']);
        unset($_SESSION['telefono']);
        unset($_SESSION['Img_perfil']);
    }

    mysqli_close($Miconexion);
    header("Location: registrarse.php");
?>