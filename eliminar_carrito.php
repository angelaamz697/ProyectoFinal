<?php
//Eliminar un producto determinado
session_start(); //Iniciar sesión

if(!isset($_GET['id']) OR !is_numeric($_GET['id']))// si no existe id o no es un número
    header('Location: carrito.php');//que vuelva al carrito

$id = $_GET['id'];//recogemos id en una variable

if(isset($_SESSION['carrito'])){ //si la sesion carrito existe
    unset($_SESSION['carrito'][$id]);   //eliminamos la sesion y quite el producto por el id
    header('Location: carrito.php'); // y vuelva al carrito
}else{
    header('Location: index.php');//sino existe que vuelva al index
}


