function confirmacionEliminar(event, id) {
    event.preventDefault();
    Swal.fire({
        title: "Se eliminara el registro",
        text: "¿Estas seguro de que deseas continuar? No se podra revertir",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "No",
    }).then((result) => {
    if (result.isConfirmed) {
        if (result.isConfirmed) {
                Swal.fire({
                    title: "Eliminado con éxito",
                    icon: "success",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "BorrarRegistros.php?id_empleado="+id;
                    }
                });
            }
    } else {
        Swal.fire("Proceso cancelado", "", "error");
        event.preventDefault();
    }
    });
}