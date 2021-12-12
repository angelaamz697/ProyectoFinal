<?php
//Archivo con funciones que utilizaremos en el carrito.
//3 funciones agregar manga, total productos y su cantidad.

function agregarManga($resultado, $id, $cantidad = 1){ //3 parámetros, cantidad ya le pongo el valor 1 
    $_SESSION['carrito'][$id] = array( //con el id los agrega por su id , y no coje el mismo siempre.
        'id' => $resultado['id'],
        'titulo' => $resultado['titulo'],
        'foto' => $resultado['foto'],
        'precio' => $resultado['precio'],
        'cantidad' => $cantidad
   );
}


function actualizarManga($id,$cantidad = FALSE){ //cantidad false

    if($cantidad)
        $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
    else//incrementamos en 1 la cantidad
        $_SESSION['carrito'][$id]['cantidad']+=1;
}


function calcularTotal(){

    $total = 0; //variable total nueva con valor inicial de 0
    if(isset($_SESSION['carrito'])){ //si la sesion carrito existe
        foreach($_SESSION['carrito'] as $indice => $value){ //leemos la sesion y sus valores
            $total += $value['precio'] * $value['cantidad'];// el total es igual a lo que encuentre en la sesion el precio x la cantidad
        }
    }
    return $total; //devuelve total

}

function cantidadMangas(){
    $cantidad = 0; //variable nueva con valor 0
    if(isset($_SESSION['carrito'])){ //si la sesion carrito existe
        foreach($_SESSION['carrito'] as $indice => $value){ 
           $cantidad++; //la cantidad se incrementa de 1 en 1
        }
    }

    return $cantidad; //y devuelve cantidad
}