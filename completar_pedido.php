<?php
//Recibimos la información del formulario de finalizar compra
session_start();//Iniciamos sesión

if($_SERVER['REQUEST_METHOD'] ==='POST'){ //Validamos que la información venga através de POST

    require 'funciones.php'; //llamamos a funciones.php
    require 'vendor/autoload.php';

    if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){ // sesion no tiene que estar vacia y tieneque existir la sesion carrito
        $cliente = new angelamunoz\Cliente; // instancia para la clase Cliente
    
        $_params = array( //los parámetros de cliente
            'nombre' => $_POST['nombre'],
            'apellidos' => $_POST['apellidos'],
            'email' => $_POST['email'],
            'telefono' => $_POST['telefono'],
            'comentario' => $_POST['comentario']
        );
    
        $cliente_id = $cliente->registrar($_params); //varible cliente_id nos devuelve cuando ejecutemos registrar
        // y le pasamos los parámetros , el id del cliente q se registra
    
        $pedido = new angelamunoz\Pedido; //La clase pedido y la nueva variable
    
        $_params = array( //array 
            'cliente_id'=>$cliente_id, //como parámetro recojemos lo que nos de la funcion registrar de cliente
            'total' => calcularTotal(), //funcion calcularTotal()
            'fecha' => date('Y-m-d') //Año, més y día
        );
        
        $pedido_id =  $pedido->registrar($_params); //variable pedido_id y recojemos lo que devuelva registrar, y le pasamos los parámetros

        foreach($_SESSION['carrito'] as $indice => $value){//
            $_params = array(
                "pedido_id" => $pedido_id, //de la tabla pedido
                "manga_id" => $value['id'], //de value
                "precio" => $value['precio'],
                "cantidad" => $value['cantidad'],
            );

            $pedido->registrarDetalle($_params); //le pasamos el array como parámetro
        }

        $_SESSION['carrito'] = array();//limpiar la sesion

        header('Location: gracias.php');//y enviar al usuario a gracias.php donde se le dirá que la compra
        //a sido realizada correctamente

    }

    

     




}