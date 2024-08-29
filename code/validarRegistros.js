/*function validarRegistro(event) {
    event.preventDefault();
    var Id = document.forms["Registrar"]["Id"];
    var Nombre = document.forms["Registrar"]["Nombre"];
    var Rol = document.forms["Registrar"]["Rol"];
    var Correo = document.forms["Registrar"]["Correo"];
    var Contrasena = document.forms["Registrar"]["Contraseña"];
    var ConfirmarContrasena = document.forms["Registrar"]["ConfirmarContraseña"];
    var incompletos=0;
    var campos = [Id, Nombre, Rol, Correo, Contrasena, ConfirmarContrasena];
    var camposVacios = "";
    for (let i = 0; i < campos.length; i++) {
        if (campos[i].value == ""){
            incompletos++;
            if(incompletos > 1){
                camposVacios += ", ";
            }
            camposVacios += campos[i].getAttribute("name");
        }
    }

    if(incompletos == 0){
        idRepetida = validarID(array_ids, Id);
        event.preventDefault();
        if (idRepetida){
            event.preventDefault();
            Swal.fire({
                title: "La identificacion que ingresaste esta repetida",
                text: "Ingresa una nueva identificacion",
                icon: "error",
            });
            return false;
        } else {
            if (ConfirmarContrasena.value == Contrasena.value){
                Swal.fire({
                    title: "Todos los campos obligatorios estan completos",
                    text: "Pero debes recordar que la identificacion no se podra modificar, ¿quieres continuar con el proceso?",
                    icon: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si",
                    cancelButtonText: "No",
                }).then((result) => {
                if (result.isConfirmed) {
                    if (result.isConfirmed) {
                            Swal.fire({
                                title: "Enviado con éxito",
                                icon: "success",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    event.target.submit();
                                }
                            });
                        }
                } else {
                    Swal.fire("Proceso cancelado", "", "error");
                    event.preventDefault();
                }
                });
            } else {
                Swal.fire("Las contraseñas no coinciden", "", "error");
                event.preventDefault();
            }
        }
        } else {
            idRepetida = validarID(array_ids, Id);
            if (idRepetida){
                event.preventDefault();
                Swal.fire({
                    title: "La identificacion que ingresaste esta repetida",
                    text: "Ingresa una nueva identificacion",
                    icon: "error",
                    color: "white",
                    
                }).then(function(result) {
                    if (result.isConfirmed && incompletos != 0) {
                        Swal.fire({
                            title: "Y te falta ingresar los campos de: "+camposVacios,
                            text: "Es obligatorio.",
                            icon: "error",
        
                        });
                        return false;
                    }
                });
            } else {
                Swal.fire({
                        title: "Debes ingresar los campos de: "+camposVacios,
                        text: "Es obligatorio.",
                        icon: "error",

                    });
                return false;
            }
        }
}

function validarID(array, id) {
    if(id.value.length != 0){
        for (let i = 0; i < array.length; i++) {
            if (id.value == array[i]){
                repetida = true;
                break;
            }else {
                repetida = false;
            }
        }
    }else {
        repetida = false;
    }
    return repetida;
}*/