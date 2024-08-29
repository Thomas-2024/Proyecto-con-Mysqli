<?php
    session_start();
    $SeguroAlerta = 1;
    $Seguro = 1;
    $SeguroRegistro = 1;


    if (isset($_SESSION['mensaje'])){  //Obtiene el codigo de "mensaje" para ajustar los valores del sweet alert
        $Mensaje = $_SESSION['mensaje'];
        unset($_SESSION['mensaje']);
    } else {
        $Mensaje = '0';  //Si no hay mensaje seteado en sesion, seteo el mensaje a 0
    }

    if (isset($_SESSION['CorreoError'])){ //Verifica si captura el valor de un correo no registrado
        $CorreoError = $_SESSION['CorreoError'];
        unset($_SESSION['CorreoError']);
    }
    if (isset($_SESSION['usuario'])){ //Verifica si captura el valor de usuario
        $Usuario = $_SESSION['usuario'];
    }
    if (isset($_SESSION['CorreoRep'])){ //Verifica si captura el valor de un correo repetido
        $CorreoRep = $_SESSION['CorreoRep'];
        unset($_SESSION['CorreoRep']);
    }
    if(isset($_SESSION['Idrep'])){//
        $Idrep = $_SESSION['Idrep'];
        unset($_SESSION['Idrep']);
    }
    

    switch ($Mensaje){
         case '1':  //Inicio sesion correctamente
            $icono = "success";
            $titulo = "¡Bienvenido(a) $Usuario!";
            $texto = "Iniciando sesion...";
            $Seguro = 0;
            break;
        case '2': //Cuando la contraseña es incorrecta
            $icono = "info";
            $titulo = "¡Espera!";
            $texto = "La contraseña es incorrecta";
            $SeguroAlerta = 0;
            break;
        case '3': //Cuando el correo no esta registrado en la db
            $icono = "warning";
            $titulo = "¡Atención!";
            $texto = "El correo ($CorreoError) no esta registrado";
            $SeguroAlerta = 0; 
            break;
        case '4': //Cuando faltan campos por llenar
            $icono = "info";
            $titulo = "¡Oh no...!";
            $texto = "Deben llenar todos los campos obligatorios";
            $SeguroAlerta = 0;
            break;
        case '5': //Direccion de correo no valida
            $icono = "error";
            $titulo = "¡Ocurrio un error...!";
            $texto = "Esta direccion de correo electronico no es valida.";
            $SeguroAlerta = 0;
            break;
        case '6.1': //Cuando la id ya existe en la db al quere registrarse
                $icono = "warning";
                $titulo = "¡Atención!";
                $texto = "la identificacion ($Idrep) ya esta registrada, utilize otra";
                $SeguroAlerta = 0; 
                break;
        case '6.2': //Cuando el correo ya existe en la db al quere registrarse
            $icono = "warning";
            $titulo = "¡Atención!";
            $texto = "El correo ($CorreoRep) ya esta registrado, utilize otro";
            $SeguroAlerta = 0; 
            break;
        case '7': //Cuando se registra una nueva cuenta exitosamente
            $icono = "success";
            $titulo = "Registro exitoso";
            $texto = "Se envio el registro de manera exitosa";
            $SeguroAlerta = 0;
            break;  //Este es solo cuando se registra una nueva cuenta exitosamente, lo redirige a la pagina principal
        case '8':
            $icono = "warning";
            $titulo = "¡Atención!";
            $texto = "Las contraseñas no coinciden";
            $SeguroAlerta = 0;
            break;
        case '9':
            $icono = 'error';
            $titulo = '¡Codigo Incorrecto!';
            $texto = 'El codigo ingresado es incorrecto';
            $SeguroAlerta = 0;
            break;
        default: //No use
            $icono = "question";
            $titulo = "¡Espera!";
            $texto = "Ocurrio un error, contacta con soporte.";
    };

    if ($SeguroAlerta == 0){ //Aqui mostrara distintas alertas dependiendo de los resultados
    echo "<script>
    Swal.fire({
    title: '$titulo',
    text: '$texto',
    icon: '$icono'
    });
    </script>";
    }

    if ($Seguro == 0){ //Este es solo cuando inicia sesion correctamente, lo redirige a la pagina principal
        echo "
        <script>
        Swal.fire({
        title: '$titulo',
        text: '$texto',
        icon: '$icono',
        timer: 2500, // Temporizador en milisegundos (2.5 segundos)
        timerProgressBar: true,
        showConfirmButton: false,
        willClose: () => {
        window.location.href = '../PaginaPrincipal/PaginaPrincipal.php'
        }
        })
        </script>";
    }
?>