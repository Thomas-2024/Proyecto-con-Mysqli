/*function validarConsulta(event) {
    var formulario = document.forms["consultar"];
    var incompletos = 0;
    var camposVacios = "";

    for (let i = 0; i < formulario.length-1; i++) {
        if(formulario[i].value == ""){
            incompletos++;
            if(incompletos > 1){
                camposVacios += " y ";
            }
            camposVacios += formulario[i].getAttribute("class");
        }
    }
    if (incompletos == 0){
        event.preventDefault();
        Swal.fire({
            title: "Consulta realizada con exito",
            text: "Desea continuar",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si",
            cancelButtonText: "No",
            icon: "success",
        }).then((result) => {
            if(result.isConfirmed){
                window.location.href="Index.php?tipoConsulta="+formulario["tipoConsulta"].value+"&buscar="+formulario["buscar"].value+"";
            }
        });
    }else {
        Swal.fire({
            title: "No se pudo realizar la consulta",
            text: "Debes ingresar los campos de: "+camposVacios,
            icon: "error",
            color: "white"
        })
        return false;
    }
}*/