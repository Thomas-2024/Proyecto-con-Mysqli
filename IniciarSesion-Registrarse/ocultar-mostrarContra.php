<?php
   header('Content-Type: application/javascript');
?>

function ocultarContra(){
    let password=document.getElementById("Contra");
    let ver=document.getElementById("Ver");
    let ocultar=document.getElementById("Ocultar");
    if(password.type=="password"){
        password.type="text";
        ver.style.display="inline";
        ocultar.style.display="none";
    }else{
        password.type="password";
        ver.style.display="none";
        ocultar.style.display="inline";
    }
}
