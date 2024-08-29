<?php 
$tablaRegistros = "<script src='../code/eliminar.js'></script>
    <h2>Lista de empleados</h2>
    <form name='consultar' action='' method='post' class='fi1'>
        <input type='text' name='buscar' class='Valor'>
        <input type='submit' name='boton_consultar' value='Consultar'>
    </form>
    <div class='fi2'>
        <button onclick=\"window.location.href='PaginaPrincipal.php'\" id='f1'>Ver todos los registros</button>
    </div>
    <table border='1' cellspacing='1' cellpadding='1' id='registros'>
        <tr>
            <td class='co'>&nbsp;Identificacion&nbsp;</td>
            <td class='co'>&nbsp;Nombre&nbsp;</td>
            <td class='co'>&nbsp;Rol&nbsp;</td>
            <td class='co'>&nbsp;Edad&nbsp;</td>
            <td class='co'>&nbsp;Correo&nbsp;</td>
            <td class='co'>&nbsp;Telefono&nbsp;</td>
            <td class='co'>&nbsp;Imagen de perfil&nbsp;</td>
            <td class='co' colspan='2'>&nbsp;Accion&nbsp;</td>
        </tr>";
    $i=0; foreach ($result as $fila): $i++;
    $tablaRegistros.= "
    <tr class='si'>
            <td>".$fila['id_empleado']."</td>
            <td>".$fila['Nombre']."</td>
            <td>".$fila['rol_nombre']."</td>
            <td>".$fila['Edad']."</td>
            <td>".$fila['Correo']."</td>
            <td>".$fila['Telefono']."</td>
            <td><img src='".$fila['Imagen_perfil']."' width='100px'></td>
            <td id='letra'><div class='boton_editar'><a  href='ActualizarRegistros.php?id_empleado=".$fila['id_empleado']."' class='btn__update'>Editar</a></div></td>
            <td id='letra'><div class='boton_eliminar'><a onclick=\"confirmacionEliminar(event, ".'\''.$fila['id_empleado'].'\''.")\" href='' id='boton_eliminar' class='btn__delete'>Eliminar</a></div></td>
        </tr>";
    endforeach;
    $tablaRegistros .= "<div class='fi3'>"."Se encontraron: ".$i." registros</div>";?>
