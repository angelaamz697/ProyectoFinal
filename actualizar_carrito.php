<?php
//Enviamos aquí la info del formulario del carrito
session_start();//Iniciamos sesión

if($_SERVER['REQUEST_METHOD'] ==='POST'){ //Que todo se haga através de POST
    require 'funciones.php'; //llamamos a funciones.php para la funcion actualizarManga
    $id = $_POST['id']; //recogemos el id
    $cantidad = $_POST['cantidad'];// y la cantidad

    if(is_numeric($cantidad )){ //si la cantidad es un número

        if(array_key_exists($id,$_SESSION['carrito'])) //si existe el producto
            actualizarManga($id,$cantidad); //pasamos como parámetros id y cantidad
    }
    //sino lo mando al carrito
    header('Location: carrito.php');
}
 