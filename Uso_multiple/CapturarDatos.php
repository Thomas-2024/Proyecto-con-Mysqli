<?php
    $Id = $_POST['Id'];
    $Nombre = $_POST['Nombre'];
    $Rol = $_POST['Rol'];
    $Edad = $_POST['Edad'];
    $Correo = $_POST['Correo'];
    $Contraseña = $_POST['Contraseña'];
    if (isset($_POST['ConfirmarContraseña'])) {
        $ConfirmarContraseña = $_POST['ConfirmarContraseña'];
    }
    $Telefono = $_POST['Telefono'];
     
    $Img_perfil = $_FILES['Img_perfil'];
    $Img_perfil_Name = $_FILES['Img_perfil']['name'];
    $Img_perfil_TmpName = $_FILES['Img_perfil']['tmp_name'];
    $Img_perfil_Size = $_FILES['Img_perfil']['size'];
    $Img_perfil_Error = $_FILES['Img_perfil']['error'];
    $Img_perfil_Type = $_FILES['Img_perfil']['type'];

    $Img_perfil_Ext = explode('.', $Img_perfil_Name);//explode es una funcion que divide un string en varios strings: en este caso divide el nombre de la imagen en un array de strings si la imagen se llama image.jpg entonces el array quedaria asi: [image, jpg]
    for ($i=0; $i < count($Img_perfil_Ext); $i++) { 
        echo $Img_perfil_Ext[$i]."<br>";
    }
    $Img_perfil_Actual_Ext = strtolower(end($Img_perfil_Ext));

    $allowed = array("jpg", "jpeg", "png", "pdf");
    $table = "empleados";
    $dir_img_perfil = capturar($Img_perfil_Actual_Ext, $allowed, $Img_perfil_Error, $Img_perfil_Size, $Img_perfil_TmpName, $Img_perfil_Name);
    
    function capturar($ext, $allow, $error, $size, $tmp, $name) {
    $Img_perfil_Dest = "";
    if (empty($Img_perfil)){
        if (!empty($_POST['Img_perfilOld'])){
            $Img_perfil_Dest = $_POST['Img_perfilOld'];
        }
    }
    if (in_array($ext, $allow)) {
        if ($error === 0) {//
            if ($size < 1000000) {

                $Img_perfil_Dest = '../../Images/'.$name;
                move_uploaded_file($tmp, $Img_perfil_Dest);
// el header redirecciona a la pagina de inicio
            } else {
                echo "La imagen es muy grande";
            }
        } else {
            echo "Hubo un error al subir la imagen";
        }
    } else {
        echo "Solo puedes subir archivos de tipo (jpg, jpeg, png y pdf)";
    }
    return $Img_perfil_Dest;
}
?>