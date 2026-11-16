<?php

// MUESTRA TODOS LOS USUARIOS
function mostrarDatos (){
    
    $titulos = ["codigo","nombre","stock","stock_min","precio"];
    $msg = "<table>\n";
     // Identificador de la tabla
    $msg .= "<tr>";
    for ($j=0; $j < count($titulos); $j++){
        $msg .= "<th>$titulos[$j]</th>";
    }  
    $msg .= "</tr>";
    $auto = $_SERVER['PHP_SELF'];
    $db = AccesoDatos::getModelo();
    $tpro = $db->getProductos();
    foreach ($tpro as $produ) {
        $msg .= "<tr>";
        $msg .= "<td>$produ->codigo</td>";
        $msg .= "<td>$produ->nombre</td>";
        $msg .= "<td>$produ->stock</td>";
        $msg .= "<td>$produ->stock_min</td>";
        $msg .= "<td>$produ->precio</td>";
        $msg .="<td><a href=\"#\" onclick=\"confirmarBorrar('$produ->nombre','$produ->login');\" >🗑️</a></td>\n";
        $msg .="<td><a href=\"".$auto."?orden=Modificar&id=$produ->login\">✏️</a></td>\n";
        $msg .="<td><a href=\"".$auto."?orden=Detalles&id=$produ->login\" >👁️</a></td>\n";
        $msg .="</tr>\n";
        
    }
    $msg .= "</table>";
   
    return $msg;    
}

/*
 *  Funciones para limpiar la entreda de posibles inyecciones
 */

function limpiarEntrada(string $entrada):string{
    $salida = trim($entrada); // Elimina espacios antes y después de los datos
    $salida = strip_tags($salida); // Elimina marcas
    return $salida;
}
// Función para limpiar todos elementos de un array
function limpiarArrayEntrada(array &$entrada){
 
    foreach ($entrada as $key => $value ) {
        $entrada[$key] = limpiarEntrada($value);
    }
}

