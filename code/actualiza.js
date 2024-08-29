window.onload = function() {
    mostrarRol();
}
function mostrarRol() {
    const registro = document.getElementsByTagName("form")[0];
    console.log(registro);
    var select = registro[3];
    console.log(select);
    if(registro.getAttribute("name")=="Registrar"){
        select = registro[2];
        console.log(select);
    }

    const codigo = document.getElementById("Codigo");

    if(document.body.contains(codigo)){
        if (select.className == "1000") {
            codigo.type = 'password';
            codigo.disabled = false;
        } else {
            codigo.type = 'hidden';
            codigo.disabled = true;
        }
    }
    const selectValue = select.className;
    for (let j = 0; j < select.length; j++) {
        if (selectValue == select[j].value){
            console.log("selecionado");
            select[j].selected = true;
            break;
        }
    }   
}